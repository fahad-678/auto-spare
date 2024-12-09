function fetchData(url, name, showExtraOptions, categoryId = null) {
    return {
        url: url,
        dataType: "json",
        delay: 250,
        data: function (params) {
            if (categoryId) {
                return {
                    category_id: categoryId,
                };
            }
        },
        processResults: function (data) {
            let items = $.map(data, function (item) {
                return {
                    id: item.id,
                    text: item.name,
                };
            });
            if (showExtraOptions) {
                items.push({
                    id: "create",
                    text: "Create new " + name,
                    bold: true,
                });
                items.push({
                    id: "delete",
                    text: "Delete a " + name,
                    bold: true,
                });
            }
            return {
                results: items,
            };
        },
        cache: true,
    };
}

function handleSelect2(
    selector,
    url,
    name,
    selectedValue = null,
    showExtraOptions = true
) {
    const $element = $(selector);
    $element
        .select2({
            placeholder: "Select a " + name,
            ajax: fetchData(url, name, showExtraOptions),
            templateResult: function (data) {
                if (data.bold) {
                    return $(
                        '<span style="font-weight:bold;">' +
                            data.text +
                            "</span>"
                    );
                }
                return data.text;
            },
        })
        .on("select2:select", function (e) {
            var selected = e.params.data;
            if (selected.id === "create" && showExtraOptions) {
                Swal.fire({
                    title: `Create new ${name}`,
                    input: "text",
                    inputLabel: `Enter ${name} name`,
                    showCancelButton: true,
                    inputValidator: (value) => {
                        if (!value) {
                            return "You need to write something!";
                        }
                    },
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: url,
                            method: "POST",
                            data: {
                                name: result.value,
                                _token: $('meta[name="csrf-token"]').attr(
                                    "content"
                                ),
                            },
                            success: function (data) {
                                $element
                                    .append(
                                        new Option(
                                            data.name,
                                            data.id,
                                            true,
                                            true
                                        )
                                    )
                                    .trigger("change");
                                Swal.fire(
                                    "Saved!",
                                    `Your new ${name} has been created.`,
                                    "success"
                                );
                            },
                        });
                    }
                });
            } else if (selected.id === "delete" && showExtraOptions) {
                Swal.fire({
                    title: `Delete a ${name}`,
                    input: "select",
                    inputOptions: fetchItemOptions(url),
                    showCancelButton: true,
                    inputPlaceholder: `Select a ${name} to delete`,
                    inputValidator: (value) => {
                        if (!value) {
                            return "You need to select something!";
                        }
                    },
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: url + "/" + result.value,
                            method: "DELETE",
                            data: {
                                _token: $('meta[name="csrf-token"]').attr(
                                    "content"
                                ),
                            },
                            success: function () {
                                $element
                                    .find(
                                        'option[value="' + result.value + '"]'
                                    )
                                    .remove();
                                Swal.fire(
                                    "Deleted!",
                                    `The ${name} has been deleted.`,
                                    "success"
                                );
                            },
                        });
                    }
                });
            }
        });

    if (selectedValue) {
        $.ajax({
            url: url + "/" + selectedValue,
            method: "GET",
            success: function (data) {
                const option = new Option(data.name, data.id, true, true);
                $element.append(option).trigger("change");
            },
        });
    }
}

function fetchItemOptions(url) {
    var items = {};
    $.ajax({
        url: url,
        method: "GET",
        async: false,
        success: function (data) {
            $.each(data, function (index, item) {
                items[item.id] = item.name;
            });
        },
    });
    return items;
}

function populateSelect(selectName, url, valueKey, textKey, defaultOptionText) {
    var $select = $('select[name="' + selectName + '"]');
    var selectedValue = new URLSearchParams(window.location.search).get(
        selectName
    );

    var generatedText = selectName.replace(/_id$/, "");
    generatedText =
        generatedText.charAt(0).toUpperCase() + generatedText.slice(1);
    generatedText = "All " + generatedText + "s";

    var defaultText = defaultOptionText || generatedText;

    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        success: function (data) {
            $select.html('<option value="">' + defaultText + "</option>");

            $.each(data, function (index, item) {
                var $option = $("<option></option>")
                    .attr("value", item[valueKey])
                    .text(item[textKey]);

                if (
                    selectedValue &&
                    item[valueKey].toString() === selectedValue
                ) {
                    $option.prop("selected", true);
                }

                $select.append($option);
            });
        },
        error: function (xhr, status, error) {
            console.error(`Error fetching data from ${url}:`, error);
        },
    });
}

function populateSubCategory(
    $categorySelect,
    $subCategorySelect,
    url,
    selectedValue = null,
    showExtraOptions = true,
    showUniversalSubCategory = false
) {
    $categorySelect.on("change", function () {
        var categoryId = $(this).val();
        $subCategorySelect.empty();
        if (categoryId || showUniversalSubCategory) {
            $subCategorySelect
                .select2({
                    placeholder: "Select a SubCategory",
                    ajax: fetchData(
                        url,
                        "SubCategory",
                        showExtraOptions,
                        categoryId ? categoryId : "all"
                    ),
                    templateResult: function (data) {
                        if (data.bold) {
                            return $(
                                '<span style="font-weight:bold;">' +
                                    data.text +
                                    "</span>"
                            );
                        }
                        return data.text;
                    },
                })
                .on("select2:select", function (e) {
                    var selected = e.params.data;
                    if (selected.id === "create" && showExtraOptions) {
                        Swal.fire({
                            title: `Create new SubCategory`,
                            html: `
                                <div class="mb-3">
                                    <input id="subcategory-name" class="form-control" placeholder="Enter SubCategory Name">
                                </div>
                                <div class="form-check form-switch form-check-custom form-check-solid d-flex justify-content-between">
                                    <input type="hidden" name="subcategory-universal" value="0" />
                                    <label class="form-check-label" for="subcategory-universal">
                                        Available for All
                                    </label>
                                    <input 
                                        type="checkbox" 
                                        class="form-check-input" 
                                        name="subcategory-universal" 
                                        id="subcategory-universal" 
                                        />
                                </div>
                            `,
                            showCancelButton: true,
                            preConfirm: () => {
                                const name =
                                    document.getElementById(
                                        "subcategory-name"
                                    ).value;
                                const isUniversal = document.getElementById(
                                    "subcategory-universal"
                                ).checked
                                    ? 1
                                    : 0;
                                if (!name) {
                                    Swal.showValidationMessage(
                                        "You need to write something!"
                                    );
                                    return false;
                                }

                                return { name, isUniversal };
                            },
                        }).then((result) => {
                            if (result.isConfirmed) {
                                const { name, isUniversal } = result.value;
                                $.ajax({
                                    url: url,
                                    method: "POST",
                                    data: {
                                        category_id: isUniversal
                                            ? null
                                            : categoryId,
                                        name: name,
                                        is_universal: isUniversal,
                                        _token: $(
                                            'meta[name="csrf-token"]'
                                        ).attr("content"),
                                    },
                                    success: function (data) {
                                        $subCategorySelect
                                            .append(
                                                new Option(
                                                    data.name,
                                                    data.id,
                                                    true,
                                                    true
                                                )
                                            )
                                            .trigger("change");
                                        Swal.fire(
                                            "Saved!",
                                            `Your new SubCategory has been created.`,
                                            "success"
                                        );
                                    },
                                });
                            }
                        });
                    } else if (selected.id === "delete" && showExtraOptions) {
                        Swal.fire({
                            title: `Delete a SubCategory`,
                            input: "select",
                            inputOptions: fetchItemOptions(url),
                            showCancelButton: true,
                            inputPlaceholder: `Select a SubCategory to delete`,
                            inputValidator: (value) => {
                                if (!value) {
                                    return "You need to select something!";
                                }
                            },
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    url: url + "/" + result.value,
                                    method: "DELETE",
                                    data: {
                                        _token: $(
                                            'meta[name="csrf-token"]'
                                        ).attr("content"),
                                    },
                                    success: function () {
                                        $subCategorySelect
                                            .find(
                                                'option[value="' +
                                                    result.value +
                                                    '"]'
                                            )
                                            .remove();
                                        Swal.fire(
                                            "Deleted!",
                                            `The SubCategory has been deleted.`,
                                            "success"
                                        );
                                    },
                                });
                            }
                        });
                    }
                });

            if (selectedValue) {
                $.ajax({
                    url: url + "/" + selectedValue,
                    method: "GET",
                    success: function (data) {
                        const option = new Option(
                            data.name,
                            data.id,
                            true,
                            true
                        );
                        $subCategorySelect.append(option).trigger("change");
                    },
                });
            }
        } else {
            $subCategorySelect.html(
                '<option value="">All Subcategories</option>'
            );
        }
    });
}
