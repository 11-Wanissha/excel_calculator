<?php
$props = new stdClass();
$props = [
    'id' => isset($id) ? $id : '',
    'label' => isset($label) ? $label : '',
    'required' => isset($required) ? $required : false,
];


?>

<label for="<?= $props['id'] ?>" class="form-label w-100 overflow" title=" <?= $props['label'] ?>">
    <?= $props['label'] ?>
</label>

<div class="input-group">
    <input class="form-control" type="file" id="<?= $props['id'] ?>"
        accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
        name="<?= $props['id'] ?>" <?php if ($props['required'])
              echo 'required'; ?>>
    <button type="button" class="btn btn-primary px-5 me-4" id="btnImport">Import</button>
</div>