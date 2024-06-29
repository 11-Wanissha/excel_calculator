<?php
$props = new stdClass();
$props = [
    'label' => isset($text) ? $label : '',
    'id' => isset($id) ? $id : null,
    'name' => isset($name) ? $name : '',
    'value' => isset($value) ? $value : '',
    'disabled' => isset($disabled) ? $disabled : false,
    'unit' => isset($unit) ? $unit : '',
]
    ?>
<div class="d-flex align-items-center h-100 w-auto">
    <label for="<?= $props['name'] ?>" class="col-sm-3 col-form-label form-label">
        <?= $props['label'] ?>
    </label>
    <input value="<?= htmlspecialchars($props['value']) ?>" type="text" class="form-control" id="<?= $props['id'] ?>"
        name="<?= $props['name'] ?>" <?= $props['disabled'] ? 'disabled' : '' ?> />
    <div class="d-flex align-items-center box-unit h-100 ps-1"><span><?=htmlspecialchars($props['unit']) ?></span></div>
</div>