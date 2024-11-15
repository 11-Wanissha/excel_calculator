<?php
$formProps = new stdClass();
$formProps = isset($formProperties) ? $formProperties : [];
echo view("/main/main_page", [
    "formProperties" => $formProps,
]);
?>

<script>
    $(document).ready(function () {
        $('#B9,#B11,#B12,#B14,#B15,#B16,#B17,#B18').on('input', function () {
            let allFilled = true;
            const B20 = $('#B20').val();
            // Loop through each selected input and check if any is empty
            $('#B9, #B11, #B12, #B14, #B15, #B16, #B17, #B18').each(function () {
                if ($(this).val() === '' || null || undefined) {
                    allFilled = false;
                    return false;  // Break the loop if one input is empty
                }
            });

            if (allFilled) {
                const datas = {
                    B20: B20,
                    B9: $('#B9').val(),
                    B11: $('#B11').val(),
                    B12: $('#B12').val(),
                    B14: $('#B14').val(),
                    B15: $('#B15').val(),
                    B16: $('#B16').val(),
                    B17: $('#B17').val(),
                    B18: $('#B18').val()
                };
                $.ajax({
                    url: '/timber-pole-retaining-wall-brooms-3D',
                    type: 'POST',
                    data: JSON.stringify(datas),
                    cache: false,
                    contentType: "application/json",
                    processData: false,
                    success: function (response) {
                        let value = {
                            H: $('#B9').val(),
                            L: response.B10,
                            d: $('#B12').val(),
                            D: response.B13,
                        };
                        for (let data in response) {
                            let element = document.querySelector("#" + data);
                            let tdElement = document.querySelector('td.overflow input#' + data);
                            let tdNoInputElement = document.querySelector('td.overflow p#' + data);
                            if (tdNoInputElement !== null) {
                                tdNoInputElement.innerHTML = response[data];
                                tdNoInputElement.style.width = "auto";
                            } else if (tdElement) {
                                tdElement.value = response[data];
                                // tdElement.style.width = "auto";
                            } else if (element) {
                                element.value = response[data];
                                // element.style.width = "auto";
                            } else {
                                console.warn(`No element found with ID: ${data}`);
                            }
                        }
                        updateFunction(value);
                    },
                    error: function (xhr, status, error) {
                    }
                })
            }
        });
    });
</script>