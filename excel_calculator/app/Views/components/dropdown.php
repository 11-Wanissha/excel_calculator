<?php
$props = new stdClass();
$props = [
    'id' => isset($id) ? $id : '',
    'label' => isset($label) ? $label : '',
    'option' => isset($option) ? $option : array(),
    'selectOption' => isset($selectOption) ? $selectOption : "--- Please Select ---",
    'disabled' => isset($disabled) ? $disabled : false,
    'required' => isset($required) ? $required : false,
];


?>


<label for="<?= $props['id'] ?>" class="col-sm-3 col-form-label form-label w-100  overflow" title=" <?= $props['label'] ?>">
    <?= $props['label'] ?>
</label>
<select name="<?= $props['id'] ?>" class="form-select" id="<?= $props['id'] ?>" aria-label="<?= $props['id'] ?>" <?php if ($props['disabled']) echo 'disabled'; ?> <?php if ($props['required']) echo 'required'; ?>>
    <option value="null" selected="" disabled><?= $props['selectOption'] ?></option>
    <?php
    foreach ($props['option'] as $optionSelect) {
        if (isset($optionSelect['optionGroup']) && !empty($optionSelect['optionGroup'])) {
            foreach ($optionSelect['optionGroup'] as $optionGroup) {
                echo "<optgroup label='" . $optionGroup['label'] . "'>";
                foreach ($optionGroup['optionInGroup'] as $optionInGroup) {
                    // echo "<option value='" . $optionInGroup['value'] . "'>" . $optionInGroup['optionName'] . "</option>";
                    echo "<option value='" . $optionInGroup['value'] . "' ". (!empty($optionInGroup['selected']) && $optionInGroup['selected']  ? 'selected' : '')  . ">" . $optionInGroup['optionName'] . "</option>";
                }
                echo '</optgroup>';
            }
        } else {
            // echo "<option value='" . $optionSelect['value'] . "'>" . $optionSelect['optionName'] . "</option>";
             echo "<option value='" . $optionSelect['value'] . "' ". (!empty($optionSelect['selected']) && $optionSelect['selected']  ? 'selected' : '')  . ">" . $optionSelect['optionName'] . "</option>";
        }
    }
    ?>
</select>
