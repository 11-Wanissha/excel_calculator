<?php
$formProps = new stdClass();
$formProps = isset($formProperties) ? $formProperties : [];

echo view("/main/main_page", [
    "formProperties" => $formProps,
]);

?>
<script>
    function externalFunction(response) {
        
        // ฟังก์ชันสร้างกราฟ Scatter
        function createChart(chartId, ulsKey, slsKey, title) {
            const ctx = document.getElementById(chartId);

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
            new Chart(ctx, {
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

        // เรียกใช้ฟังก์ชันเพื่อสร้างกราฟ
        createChart('myChartMoment', 'T', 'X', 'Moment (kNm)'); // กราฟ Moment
        createChart('myChartShear', 'U', 'Y', 'Shear (kN)'); // กราฟ Shear
        createChart('myChartDeflection', 'V', 'Z', 'Deflection (mm)'); // กราฟ Deflection

        console.log(response);
    
    }

</script>