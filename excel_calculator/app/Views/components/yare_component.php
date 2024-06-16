<?php 
$props = new stdClass();
$props = [
    'name' => isset($name) ? $name : '',
    'color' => isset($color) ? $color : '',
    'text' => isset($text) ? $text : ''
]
?>

<label for="<?= $props['name'] ?>" class="<?= 'text-'.$props['color'] ?>">
    <?= $props['text'] ?>
</label>