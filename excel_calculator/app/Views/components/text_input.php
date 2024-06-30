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
    <label for="<?= $props['name'] ?>" class="col-sm-3 col-form-label form-label w-100 overflow" title=" <?= $props['label'] ?>">
        <?= $props['label'] ?>
    </label>
    <div class="input-group">
        <input value="<?= htmlspecialchars($props['value']) ?>" type="text" class="form-control"
            id="<?= $props['id'] ?>" name="<?= $props['name'] ?>" <?= $props['disabled'] ? 'disabled' : '' ?>
            aria-describedby="basic-addon3" />
        <span class="input-group-text" id="basic-addon3"><?= htmlspecialchars($props['unit']) ?></span>
    </div>
</div>