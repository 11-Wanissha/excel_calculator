<!-- เรียกใช้ layouts/main -->
<?= $this->extend('layouts/main'); ?>

<!-- บ่งบอกว่าส่วนที่อยู่ด้านล่างนี้คือ section -->
<?= $this->section('content') ?>
<?php
// column table
$column = array(
    [
        'id' => "request",
        'label' => "#",
        'width' => '300px', // ใส่ ไม่ใส่ก็ได้
    ],
    [
        'id' => "kuy",
        'label' => "Test",
        'unit' => "mt",
    ],
    [
        'id' => "gun",
        'label' => "Test2",
        'unit' => "mt",
    ]
);
// row table อ้างอิงจาก id 
$row = array(
    [
        'request' => array(
            [
                'text' => '1',
                'textColor' => 'text-success' // ไม่ required
            ]
        ),
        'kuy' => array(
            [
                'text' => 'Test1',
                'textColor' => 'text-danger' // ไม่ required
            ]
        ),
        'gun' => array(
            [
                'text' => 'Test2',
            ]
        ),
    ],
);
$props = [
    'title' => 'Calculator',
    'secTion' => array(
        [
            'menu' => array(
                [
                    'menuTitle' => '1. Variable',
                    'input' => array(
                        [
                            'inputType' => 'text',
                            'slot' => 1,  // ถ้าใส่ มันจะเต็มทั้งแถว
                            'label' => 'Beam ID', // required
                            'id' => 'beamID', // required
                            'name' => 'beamID',
                        ],
                        [
                            'inputType' => 'dropdown',
                            'slot' => 1,
                            'label' => 'Beam Type', // required
                            'selectOption' => "โปรดเลือก",
                            'id' => 'beamType', // required
                            'disabled' => false,
                            // required
                            'option' => array(
                                [
                                    'optionName' => "Timber - VSG8",
                                    'value' => "VSG8",
                                    'selected' => true,
                                ],
                                [
                                    'optionName' => "Timber - VSG10",
                                    'value' => "VSG10",
                                ],
                                [
                                    'optionName' => "Glulam12",
                                    'value' => "gluLam12",
                                ],
                            ),
                        ],
                        [
                            'inputType' => 'dropdown',
                            'id' => 'beamSize', // required id กับ name จะใช้ตัวเดียวกัน ใส่เป็น text ได้
                            'label' => "Beam Size",
                            'selectOption' => "โปรดเลือก",
                            'disabled' => false,
                            // required
                            'option' => array(
                                [
                                    'optionName' => "90*45",
                                    'value' => "1",
                                ],
                                [
                                    'optionName' => "140*45",
                                    'value' => "2",
                                ],
                                [
                                    'optionName' => "190*45",
                                    'value' => "3",
                                ],
                                [
                                    // ถ้าจะเอาแบบกลุ่มตัวเลือกก็เขียนแบบนี้ ไม่ได้ required
                                    'optionGroup' => array(
                                        [
                                            'label' => "เลือกเลขโหน่ย",
                                            'optionInGroup' => array(
                                                [
                                                    'optionName' => "1",
                                                    'value' => "1",
                                                ],
                                                [
                                                    'optionName' => "1",
                                                    'value' => "1",
                                                ],
                                            ),
                                        ],
                                    ),
                                ],
                            ),
                        ],
                        [
                            'inputType' => 'text',
                            'label' => 'Span', // required
                            'id' => 'span', // required
                            'name' => 'span',
                            'unit' => 'm',
                        ],
                        [
                            'inputType' => 'text',
                            'label' => 'span/', // required
                            'id' => 'span/', // required
                            'name' => 'span/',
                            'type' => 'number',
                        ],
                        [
                            'inputType' => 'text',
                            'label' => 'Vibration Limit', // required
                            'id' => 'vibrationLimit', // required
                            'name' => 'vibrationLimit',
                            'unit' => 'mm',
                        ],
                    ),
                ],
                [
                    'menuTitle' => '2. Cal2',
                    'input' => array(
                        [
                            'inputType' => 'text',
                            'label' => 'ข้อมูล', // required
                            'name' => 'kuy', // required
                            'unit' => 'meter',
                            'id' => 'kuy' // required
                        ],
                        [
                            'inputType' => 'dropdown',
                            'id' => '1', // required id กับ name จะใช้ตัวเดียวกัน ใส่เป็น text ได้
                            'label' => "เลือกข้อมูล",
                            'selectOption' => "โปรดเลือก",
                            'disabled' => false,
                            // required
                            'option' => array(
                                [
                                    'optionName' => "1",
                                    'value' => "1",
                                    'selected' => true,
                                ],
                                [
                                    'optionName' => "2",
                                    'value' => "1",
                                ],
                                [
                                    'optionName' => "3",
                                    'value' => "1",
                                ],
                            ),
                        ],
                        [
                            'inputType' => 'table',
                            'column' => $column, // required
                            'row' => $row, // required
                            'slot' => 1, // ถ้าใส่ มันจะเต็มทั้งแถว
                        ],
                    ),
                ],
            ),
        ],
        [
            'menu' => array(
                [
                    'menuTitle' => '3. Cal3',
                    'subMenu' => array(
                        [
                            'subMenuTitle' => '3.1 Cal3-1',
                            'input' => array(
                                [
                                    'inputType' => 'text',
                                    'label' => 'ข้อมูล', // required
                                    'name' => 'kuy', // required
                                    'unit' => 'meter',
                                    'id' => 'kuy' // required
                                ],
                                [
                                    'inputType' => 'dropdown',
                                    'id' => '1', // required id กับ name จะใช้ตัวเดียวกัน ใส่เป็น text ได้
                                    'label' => "เลือกข้อมูล",
                                    'selectOption' => "โปรดเลือก",
                                    'disabled' => true,
                                    // required
                                    'option' => array(
                                        [
                                            'optionName' => "1",
                                            'value' => "1",
                                        ],
                                        [
                                            'optionName' => "2",
                                            'value' => "1",
                                        ],
                                        [
                                            'optionName' => "3",
                                            'value' => "1",
                                        ],
                                        [
                                            // ถ้าจะเอาแบบกลุ่มตัวเลือกก็เขียนแบบนี้ ไม่ได้ required
                                            'optionGroup' => array(
                                                [
                                                    'label' => "เลือกเลขโหน่ย",
                                                    'optionInGroup' => array(
                                                        [
                                                            'optionName' => "1",
                                                            'value' => "1",
                                                        ],
                                                        [
                                                            'optionName' => "1",
                                                            'value' => "1",
                                                        ],
                                                    ),
                                                ],
                                            ),
                                        ],
                                    ),
                                ],
                            ),
                        ],
                    ),
                    'input' => array(
                        [
                            'inputType' => 'text',
                            'label' => 'ข้อมูล', // required
                            'name' => 'kuy', // required
                            'unit' => 'meter',
                            'id' => 'kuy' // required
                        ],
                        [
                            'inputType' => 'dropdown',
                            'id' => '1', // required id กับ name จะใช้ตัวเดียวกัน ใส่เป็น text ได้
                            'label' => "เลือกข้อมูล",
                            'selectOption' => "โปรดเลือก ",
                            'disabled' => true,
                            // required
                            'option' => array(
                                [
                                    'optionName' => "1",
                                    'value' => "1",
                                ],
                                [
                                    'optionName' => "2",
                                    'value' => "1",
                                ],
                                [
                                    'optionName' => "3",
                                    'value' => "1",
                                ],
                                [
                                    // ถ้าจะเอาแบบกลุ่มตัวเลือกก็เขียนแบบนี้ ไม่ได้ required
                                    'optionGroup' => array(
                                        [
                                            'label' => "เลือกเลขโหน่ย",
                                            'optionInGroup' => array(
                                                [
                                                    'optionName' => "1",
                                                    'value' => "1",
                                                ],
                                                [
                                                    'optionName' => "1",
                                                    'value' => "1",
                                                ],
                                            ),
                                        ],
                                    ),
                                ],
                            ),
                        ],
                    ),
                ],
                [
                    'menuTitle' => '4. Cal4',
                    'input' => array(
                        [
                            'inputType' => 'text',
                        ],
                        [
                            'inputType' => 'dropdown',
                            'id' => '1', // required id กับ name จะใช้ตัวเดียวกัน ใส่เป็น text ได้
                            'label' => "ข้อมูล",
                            'selectOption' => "โปรดเลือก",
                            'disabled' => true,
                            // required
                            'option' => array(
                                [
                                    'optionName' => "1",
                                    'value' => "1",
                                ],
                                [
                                    'optionName' => "2",
                                    'value' => "1",
                                ],
                                [
                                    'optionName' => "3",
                                    'value' => "1",
                                ],
                                [
                                    // ถ้าจะเอาแบบกลุ่มตัวเลือกก็เขียนแบบนี้ ไม่ได้ required
                                    'optionGroup' => array(
                                        [
                                            'label' => "เลือกเลขโหน่ย",
                                            'optionInGroup' => array(
                                                [
                                                    'optionName' => "1",
                                                    'value' => "1",
                                                ],
                                                [
                                                    'optionName' => "1",
                                                    'value' => "1",
                                                ],
                                            ),
                                        ],
                                    ),
                                ],
                            ),
                        ],
                    ),
                ],
            )
        ],

    ),
]
    ?>
<div class="text-danger">
    Bootstrap and Section Testing
</div>

<button class="btn btn-primary" id="swal">
    test swal
</button>

<div class="row">
    <!-- เรียกคอมโพเน้นกับ props -->
    <?= view('components/yare_component', [
        'color' => 'success',
        'text' => 'ojo sama',
        'name' => 'name'
    ])
        ?>
</div>

<div class="row">
    <!-- ลองเรียกคอมโพเน้นแบบ nullable props -->
    <?= view('components/yare_component', [
        'color' => 'primary',
        'text' => 'it\'s time to go to bed',
    ])
        ?>
</div>

<!-- ทดสอบ route กับ controller -->
<form action="/test/post" method="POST" id="form">
    <div class="row mt-5">
        <div class="col-md-4">
            <?= view('components/text_input', [
                'label' => 'ความยาว',
                'id' => 'len',
                'name' => 'len'
            ])
                ?>
        </div>
    </div>
    <button class="btn btn-success mt-3" type="submit">ส่งข้อมูล</button>
</form>

<!-- conditional rendering ??????? -->
<?= isset($data) ? '<span class="text-success">Submitted data: ' . $data . '</span>' : '' ?>
<?php
$option = array(
    [
        'optionName' => "Something",
    ],
    [
        'optionName' => "Keetapong",
    ],
    [
        'optionName' => "Keetapong2",
    ]
);
echo view('components/dropdown', [
    'label' => 'ควยกันต์',
]);

?>
<script>
    const kuygun = document.getElementById('labelSelect');
    console.log("Plam be bestie with Keeetapong" + kuygun);
    document.getElementById('swal').addEventListener('click', testSwal);
    function testSwal() {
        console.log(document.getElementById('labelSelect').textContent)
        Swal.fire({
            title: "The Internet?",
            text: "That thing is still around?",
            icon: "question"
        });
    }
</script>

<!-- test sweet alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?= $this->endsection(); ?>