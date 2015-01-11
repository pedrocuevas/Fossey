



    $(document).ready(function() {
        $('#rut').Rut({
            on_error: function() {
                alert('Rut incorrecto');
                $('#rut').val('');
            },
            format_on: 'keyup'});
    });
