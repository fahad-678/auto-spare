@props(['name', 'label' => null, 'id' => null, 'placeholder' => null, 'nullable' => false, 'showLabel' => true])

<x-forms.select :name="$name" :label="$label" :id="$id" :placeholder="$placeholder" :showLabel="$showLabel"
    :nullable="$nullable">

</x-forms.select>

<script>
    $(document).ready(function() {
        $.getJSON("{{ asset('assets/json/countries.json') }}", function(data) {
            let options = data.map(item => new Option(item.flag + " " + item.country, item.country,
                false, false));
            $('#{{ $id }}').append(options).trigger('change');
        });

    });
</script>
