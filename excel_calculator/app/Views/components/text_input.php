<?php
$props = new stdClass();
$props = [
    'label' => isset($label) ? $label : '',
    'id' => isset($id) ? $id : null,
    'name' => isset($name) ? $name : '',
    'value' => isset($value) ? $value : '',
    'disabled' => isset($disabled) ? $disabled : false,
    'unit' => isset($unit) ? $unit : '',
    'required' => isset($required) ? $required : false,
    'type' => isset($type) ? $type : 'text',
]
    ?>
<div class="h-100 w-auto">
    <label for="<?= $props['name'] ?>" class="col-sm-3 col-form-label form-label w-100 overflow"
        title=" <?= $props['label'] ?>">
        <?= $props['label'] ?>
    </label>
    <?php
    if ($props['type'] === 'checkbox') {
        ?>
        <div class="form-switch">
            <input class="form-check-input px-4" type="checkbox" id="<?= htmlspecialchars($props['id']) ?>" name="<?= htmlspecialchars($props['name']) ?>"
                value="<?= htmlspecialchars($props['value']) ?>">
        </div>
        <?php
    } else {
        ?>
        <div class="input-group">
            <input value="<?= htmlspecialchars($props['value']) ?>" type="<?= htmlspecialchars($props['type']) ?>"
                class="form-control" id="<?= htmlspecialchars($props['id']) ?>" step="any"
                name="<?= htmlspecialchars($props['name']) ?>" <?php if ($props['disabled']) echo 'disabled'; ?>
                aria-describedby="basic-addon3" <?= $props['required'] ? 'required' : '' ?> />
            <span class="input-group-text" id="basic-addon3"><?= htmlspecialchars($props['unit']) ?></span>
        </div>
        <?php
    }
    ?>
</div>