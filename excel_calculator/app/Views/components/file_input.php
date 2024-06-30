<?php
$props = new stdClass();
$props = [
    'id' => isset($id) ? $id : '',
    'label' => isset($label) ? $label : '',
];


?>

<label for="<?= $props['id'] ?>" class="form-label w-100 overflow" title=" <?= $props['label'] ?>">
    <?= $props['label'] ?>
</label>
<input class="form-control" type="file" id="<?= $props['id'] ?>" accept=".csv" name="<?= $props['id'] ?>">