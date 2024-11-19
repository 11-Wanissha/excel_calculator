<?php
$formProps = new stdClass();
$formProps = isset($formProperties) ? $formProperties : [];

echo view("/main/main_page", [
    "formProperties" => $formProps,
]);
?>

<script>
    function updateGraphic() {
        let data = {
            length: 5,
            Hw: parseFloat($('#B10').val()) || 0, // wall height
            backslope: parseFloat($('#B12').val()) || 0,
            toeslope: parseFloat($('#B13').val()) || 0,
            e0: parseFloat($('#B14').val()) || 0, // inactive zone
            d: parseFloat($('#B17').val()) || 0, // diameter of timber pole
            D: parseFloat($('#B18').val()) || 0, // diameter of concrete
            Z0: parseFloat($('#B19').val()) || 0, // depth of rotation
            LTS: parseFloat($('#B33').val()) || 0,
            LS: parseFloat($('#B11').val()) || 0,
            HTS: 0,
        };

        data.HTS = data.toeslope === 0 || data.toeslope <= 5 ? 0 : data.LTS * Math.tan(data.toeslope * Math.PI / 180);

        // Uncomment this line if updateFunction is defined
        updateFunction(data);
    }

    $(document).ready(function() {
        $('#B10,#B12,#B13,#B14,#B17,#B18,#B19,#B33,B11').on('input', updateGraphic);
    });
</script>