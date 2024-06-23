<?php
$props = new stdClass();
$props = [
    'label' => isset($text) ? $label : '',
    'id' => isset($id) ? $id : null,
    'name' => isset($name) ? $name : 'asdsa'
]
    ?>
<style>
    .bor{
        border: 1px solid red;
    }
</style>
<div class="d-flex">
    <label for="<?= $props['name'] ?>" class="col-sm-3 col-form-label form-label">
        <?= $props['label'] ?>
    </label>
    <input type="text" class="form-control" id="<?= $props['id'] ?>" name="<?= $props['name'] ?>" />
</div>

<div></div>