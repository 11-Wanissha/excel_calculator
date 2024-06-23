<?php
$props = new stdClass();
$props = [
    'label' => isset($text) ? $label : '',
    'option' => isset($option) ? $option : array(),
    'setNew' => isset($setNew) ? $setNew : false,
    'selectOption' => isset($selectOption) ? $selectOption : "กรุณาเลือกข้อมูล"
]
?>
<style>
    .dropdown-toggle-component.dropdown-toggle::after {
        margin-left: auto;
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
    <div class="dropdown-menu w-100" onclick="selectOption('something')">
        <?php
        foreach ($props['option'] as $kuygun) {
            echo "<span class='dropdown-item text-wrap'>".$kuygun['optionName']."</span>";
        }
        ?>
    </div>
</div>

<script>
    function selectOption(option)
    {
        console.log(option)
    }
</script>