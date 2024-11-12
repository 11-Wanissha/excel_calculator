<?php
$formProps = new stdClass();
$formProps = isset($formProperties) ? $formProperties : [];
echo view("/main/main_page", [
    "formProperties" => $formProps,
]);

?>

<script>

</script>