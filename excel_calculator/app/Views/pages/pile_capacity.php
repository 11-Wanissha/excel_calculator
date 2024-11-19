<?php
$formProps = new stdClass();
$formProps = isset($formProperties) ? $formProperties : [];
echo view("/main/main_page", [
    "formProperties" => $formProps,
]);

?>

<script>
    $(document).ready(function(){
        $('#G9,#G28,#G23').on('input',function(){
            reGenerate();
        })
    });
</script>