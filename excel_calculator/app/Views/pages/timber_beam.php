<?php
$formProps = new stdClass();
$formProps = isset($formProperties) ? $formProperties : [];

echo view("/main/main_page", [
    "formProperties" => $formProps,
]);
?>

<script>
    const beamSize = <?= json_encode($beamSize); ?>;
    let currentBeamType = 'timber'

    function findBeamSize(val) {
        const target = Object.keys(beamSize).find(key => val.includes(key))

        if (!target) return []

        return beamSize[target]
    }

    function renderBeamSizeOptions(el, options) {        
        el.innerHTML = ''

        const staticOption = document.createElement('option')
        staticOption.text = 'โปรดเลือก'
        staticOption.selected = true
        staticOption.disabled = true
        staticOption.value = null

        el.appendChild(staticOption)

        if (!options.hasOwnProperty('1')) return

        for (const key in options) {
            const option = document.createElement('option');
            option.text = options[key].size;
            option.value = key;
            el.appendChild(option);
        }
    }

    function handleBeamTypeOptionChange() {
        const beamTypeEl = document.getElementById('C10')
        const val = beamTypeEl.value

        if (val === currentBeamType) return

        currentBeamType = val;

        const sizes = findBeamSize(val)
        const targetEl = document.getElementById('C11')

        if (!targetEl) return

        targetEl.value = null;
        renderBeamSizeOptions(targetEl, sizes)
    }

    $(document).ready(function() {
        $('#C10').on('change', handleBeamTypeOptionChange)
    })
</script>