<?php
$formProps = new stdClass();
$formProps = isset($formProperties) ? $formProperties : [];

echo view("/main/main_page", [
    "formProperties" => $formProps,
]);

?>
<script>
    $(document).ready(function () {
        $('#C7any, #E14any, #E15any, #E16any, #E17any').on('input', function () {
            // Loop through each selected input and set value to 0 if empty
    

            // Collect data from inputs
            const data = {
                length: parseFloat($('#C7any').val()) || 0,
                P1: parseFloat($('#E14any').val()) || 0,
                P2: parseFloat($('#E15any').val()) || 0,
                P3: parseFloat($('#E16any').val()) || 0,
                P4: parseFloat($('#E17any').val()) || 0,
                Ra: 0, // Placeholder for actual calculation
                Rb: 0, // Placeholder for actual calculation
                q: 0   // Placeholder for actual calculation
            };

            console.log(data);

            // Uncomment this line if updateFunction is defined
            updateFunction(data);
        });
    });

    function externalFunction(response) {
        // ฟังก์ชันสร้างกราฟ Scatter


        // เรียกใช้ฟังก์ชันเพื่อสร้างกราฟ
        createChart('myChartMoment', 'T', 'X', 'Moment (kNm)', response); // กราฟ Moment
        createChart('myChartShear', 'U', 'Y', 'Shear (kN)', response); // กราฟ Shear
        createChart('myChartDeflection', 'V', 'Z', 'Deflection (mm)', response); // กราฟ Deflection

        console.log(response);
    }

    function createChart(chartId, ulsKey, slsKey, title, response) {
        const ctx = document.getElementById(chartId);

        // ตรวจสอบว่ามีกราฟเดิมอยู่หรือไม่ ถ้ามีให้ลบก่อน
        if (window[chartId]) {
            // ตรวจสอบว่า window[chartId] เป็น instance ของ Chart หรือไม่
            if (window[chartId] instanceof Chart) {
                window[chartId].destroy(); // ลบกราฟเก่า
            }
        }

        // ข้อมูลสำหรับกราฟ
        const ulsData = [];
        const slsData = [];

        // สร้างข้อมูล ULS และ SLS จากข้อมูลใน response
        for (let i = 6; i <= 106; i++) {
            const qKey = `Q${i}any`;
            const uKey = `${ulsKey}${i}any`; // ใช้ค่า ULS สำหรับกราฟนี้
            const sKey = `${slsKey}${i}any`; // ใช้ค่า SLS สำหรับกราฟนี้

            // ตรวจสอบว่า response มีค่าที่ต้องการหรือไม่
            if (response[qKey] !== undefined && response[uKey] !== undefined) {
                ulsData.push({ x: parseFloat(response[qKey]), y: parseFloat(response[uKey]) });
            }
            if (response[qKey] !== undefined && response[sKey] !== undefined) {
                slsData.push({ x: parseFloat(response[qKey]), y: parseFloat(response[sKey]) });
            }
        }

        // ตั้งค่า datasets สำหรับ ULS และ SLS
        const datasets = [
            {
                label: 'ULS',
                data: ulsData,
                borderColor: 'rgb(54, 162, 235)',
                backgroundColor: 'rgb(54, 162, 235)',
                showLine: false, // เส้นกราฟ
                fill: false,    // ไม่เติมสีด้านใน
                pointRadius: 5, // ขนาดจุด
                pointHoverRadius: 7
            },
            {
                label: 'SLS',
                data: slsData,
                borderColor: 'rgb(255, 99, 132)',
                backgroundColor: 'rgb(255, 99, 132)',
                showLine: false, // เส้นกราฟ
                fill: false,    // ไม่เติมสีด้านใน
                pointRadius: 5, // ขนาดจุด
                pointHoverRadius: 7
            }
        ];

        // สร้างกราฟ
        window[chartId] = new Chart(ctx, {
            type: 'scatter', // ใช้กราฟ scatter
            data: {
                datasets: datasets
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        mode: 'nearest',
                        intersect: false,
                    },
                    title: {
                        display: true, // ทำให้แสดงชื่อกราฟ
                        text: title, // ชื่อกราฟที่จะแสดง
                        font: {
                            size: 18, // ขนาดตัวอักษร
                            weight: 'bold', // น้ำหนักตัวอักษร
                        },
                    }
                },
                scales: {
                    x: {
                        type: 'linear',
                        position: 'bottom',
                        title: {
                            display: true,
                        }
                    },
                    y: {
                        title: {
                            display: true,
                        }
                    },
                }
            }
        });
    }


</script>