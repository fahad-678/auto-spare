function fetchData(url, name) {
    return {
        url: url,
        dataType: "json",
        delay: 250,
        processResults: function (data) {
            let items = $.map(data, function (item) {
                return {
                    id: item.id,
                    text: item.name,
                };
            });
            items.push({ id: "create", text: "Create new " + name, bold: true });
            items.push({ id: "delete", text: "Delete a " + name, bold: true });
            return {
                results: items,
            };
        },
        cache: true,
    };
}

function handleSelect2(selector, url, name, selectedValue = null) {
    const $element = $(selector);
    $element
        .select2({
            placeholder: "Select a " + name,
            ajax: fetchData(url, name), 
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
            if (selected.id === "create") {
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
            } else if (selected.id === "delete") {
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

    // If selectedValue is provided, set it as selected
    if (selectedValue) {
        $.ajax({
            url: url + "/" + selectedValue,
            method: "GET",
            success: function (data) {
                const option = new Option(data.name, data.id, true, true);
                $element.append(option).trigger('change');
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
