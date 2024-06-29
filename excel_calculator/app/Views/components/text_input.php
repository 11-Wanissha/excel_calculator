<?php
$props = new stdClass();
$props = [
    'label' => isset($label) ? $label : '',
    'id' => isset($id) ? $id : null,
    'name' => isset($name) ? $name : '',
    'value' => isset($value) ? $value : '',
    'disabled' => isset($disabled) ? $disabled : false,
    'unit' => isset($unit) ? $unit : '',
]
    ?>
<div class="h-100 w-auto">
    <label for="<?= $props['name'] ?>" class="col-sm-3 col-form-label form-label">
        <?= $props['label'] ?>
    </label>
    <div class="d-flex align-items-center ">
        <input value="<?= htmlspecialchars($props['value']) ?>" type="text" class="form-control"
            id="<?= $props['id'] ?>" name="<?= $props['name'] ?>" <?= $props['disabled'] ? 'disabled' : '' ?> />
        <div class="d-flex align-items-center box-unit h-100 ps-1"><span><?= htmlspecialchars($props['unit']) ?></span>
        </div>
    </div>
</div>