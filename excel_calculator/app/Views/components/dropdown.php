<?php
$props = new stdClass();
$props = [
    'option' => isset($option) ? $option : array(),
    'setNew' => isset($setNew) ? $setNew : false,
    'selectOption' => isset($selectOption) ? $selectOption : "กรุณาเลือกข้อมูล",
    'disabled'  => isset($disabled) ? $disabled : false,
  
]
?>
<style>
    .dropdown-toggle-component.dropdown-toggle::after {
        margin-left: 5px;
        margin-right: 0;
    }


    .dropdown-item.selected::after {
        float: right;
        margin-left: auto;
    }
</style>

<div class="dropdown">
    <span class="btn dropdown-toggle dropdown-toggle-component text-wrap w-100" data-bs-toggle="dropdown"
        id="labelSelect"><?= $props['selectOption'] ?></span>
    <div class="dropdown-menu w-100">
        <?php
        foreach ($props['option'] as $key=> $optionSelect) {
            echo "<span class=' ". ($props['disabled'] ? 'disabled ' : '') ." dropdown-item text-wrap' id ='kuygun[$key]' onclick=\"selectOption('".$optionSelect['optionName']."')\">".$optionSelect['optionName']."</span>";
        }
        ?>
    </div>
</div>

<script>
    function selectOption(option) {
        document.getElementById('labelSelect').innerHTML = option;
    }
</script>