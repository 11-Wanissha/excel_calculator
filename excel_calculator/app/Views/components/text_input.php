<?php 
$props = new stdClass();
$props = [
    'label' => isset($text) ? $label : '',
    'id' => isset($id) ? $id : null,
    'name' => isset($name) ? $name : 'asdsa' 
]
?>

<label for="<?= $props['name'] ?>" class="form-label">
    <?= $props['label'] ?>
</label>

<input type="text" class="form-control" id="<?= $props['id'] ?>" name="<?= $props['name'] ?>" />