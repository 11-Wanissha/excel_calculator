<!-- เรียกใช้ layouts/main -->
<?= $this->extend('layouts/main'); ?>

<!-- บ่งบอกว่าส่วนที่อยู่ด้านล่างนี้คือ section -->
<?= $this->section('content') ?>
<?php
// ตัวแปรรับ section menu
$count = 0;
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
                    'menuTitle' => '1. Cal',
                    'input' => array(
                        [
                            'inputType' => 'file',
                            'slot' => 1,  // ถ้าใส่ มันจะเต็มทั้งแถว
                            'label' => 'Import File', // required
                            'id' => 'file' // required
                        ],
                        [
                            'inputType' => 'text',
                            'slot' => 1,
                            'label' => 'ข้อมูล', // required
                            'name' => 'kuy', // required
                            'unit' => 'meter',
                            'id' => 'kuy' // required
                        ],
                        [
                            'inputType' => 'dropdown',
                            'id' => '1', // required id กับ name จะใช้ตัวเดียวกัน ใส่เป็น text ได้
                            'label' => "ข้อมูลสำหรับเลือก",
                            'selectOption' => "โปรดเลือก",
                            'disabled' => false,
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
<div class="mb-5">
    <div class="bg-blue">
        <div class="h5 p-5 text-center">
            <strong>
                <?= $props['title'] ?>
            </strong>
        </div>
    </div>
    <div class="col-xl-12 py-3">
        <div class="d-flex gap-2 align-items-center">
            <div class="btn-group btn-group-sm" role="group" aria-label="">
                <button type="button" class="btn btn-outline-secondary" disabled="">Share</button>
                <button type="button" class="btn btn-outline-secondary" id="export">Export</button>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- ข้อมูลการ์ดฝั่งซ้าย ขวา -->
        <?php foreach ($props['secTion'] as $secTion): ?>
            <div class="col-xl-6 col-sm-12 col-md-12 col-xs-12">
                <div class="accordion">
                    <!-- section ซ้าย ขวา -->
                    <?php foreach ($secTion['menu'] as $menu): ?>
                        <div class="accordion-item overflow" title=" <?= $menu['menuTitle'] ?>">
                            <h2 class="accordion-header overflow">
                                <button class="accordion-button collapsed overflow" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#section-<?= $count ?>" aria-expanded="false"
                                    aria-controls="section-<?= $count ?>">
                                    <!-- แสดงข้อๆ เปิดปิด -->
                                    <?= $menu['menuTitle'] ?>
                                </button>
                            </h2>
                            <div id="section-<?= $count ?>" class="accordion-collapse collapse"
                                aria-labelledby="section-<?= $count ?>" data-bs-parent="#section-<?= $count ?>" style="">
                                <div class="accordion-body">
                                    <?php ++$count ?>
                                    <!-- input ต่างๆ -->
                                    <div class="row align-items-end">
                                        <?php foreach ($menu['input'] as $input): ?>
                                            <?php $check = (isset($input['slot']) && $input['slot'] == 1) ? 'col-12' : 'col-6'; ?>
                                            <div class="<?= $check ?> mb-2">
                                                <?php
                                                if ($input['inputType'] == "text") {
                                                    echo view('components/text_input', [
                                                        'id' => (isset($input['id']) ? $input['id'] : ''),
                                                        'label' => (isset($input['label']) ? $input['label'] : ''),
                                                        'name' => (isset($input['name']) ? $input['name'] : ''),
                                                        'unit' => (isset($input['unit']) ? $input['unit'] : ''),
                                                        'disabled' => (isset($input['disabled']) ? $input['disabled'] : false),
                                                        'value' => (isset($input['value']) ? $input['value'] : ''),
                                                    ]);
                                                } else if ($input['inputType'] == "dropdown") {
                                                    echo view('components/dropdown', [
                                                        'id' => (isset($input['id']) ? $input['id'] : ''), // required
                                                        'label' => (isset($input['label']) ? $input['label'] : ''),
                                                        'selectOption' => (isset($input['selectOption']) ? $input['selectOption'] : ''),
                                                        'disabled' => (isset($input['disabled']) ? $input['disabled'] : ''),
                                                        'option' => (isset($input['option']) ? $input['option'] : '')
                                                    ]);
                                                } else if ($input['inputType'] == "table") {
                                                    echo view('components/table', [
                                                        'column' => (isset($input['column']) ? $input['column'] : ''),
                                                        'row' => (isset($input['row']) ? $input['row'] : ''),
                                                    ]);
                                                } else {
                                                    echo view('components/file_input', [
                                                        'id' => (isset($input['id']) ? $input['id'] : ''),
                                                        'label' => (isset($input['label']) ? $input['label'] : '')
                                                    ]);
                                                }
                                                ?>
                                            </div>
                                        <?php endforeach; ?>
                                        <div class="mt-2">
                                            <?php if (isset($menu['subMenu']) && !empty($menu['subMenu'])): ?>
                                                <?php foreach ($menu['subMenu'] as $subMenu): ?>
                                                    <div class="accordion">
                                                        <div class="accordion-item overflow" title=" <?= $subMenu['subMenuTitle'] ?>">
                                                            <h2 class="accordion-header overflow">
                                                                <button class="accordion-button collapsed overflow" type="button"
                                                                    data-bs-toggle="collapse" data-bs-target="#section-<?= $count ?>"
                                                                    aria-expanded="false" aria-controls="section-<?= $count ?>">
                                                                    <?= $subMenu['subMenuTitle'] ?>
                                                                </button>
                                                            </h2>
                                                            <div id="section-<?= $count ?>" class="accordion-collapse collapse"
                                                                aria-labelledby="section-<?= $count ?>"
                                                                data-bs-parent="#section-<?= $count ?>" style="">
                                                                <div class="accordion-body">
                                                                    <div class="row align-items-end">
                                                                        <?php foreach ($subMenu['input'] as $input): ?>
                                                                            <?php $check = (isset($input['slot']) && $input['slot'] == 1) ? 'col-12' : 'col-6'; ?>
                                                                            <div class="<?= $check ?> mb-2">
                                                                                <?php
                                                                                if ($input['inputType'] == "text") {
                                                                                    echo view('components/text_input', [
                                                                                        'id' => (isset($input['id']) ? $input['id'] : ''),
                                                                                        'label' => (isset($input['label']) ? $input['label'] : ''),
                                                                                        'name' => (isset($input['name']) ? $input['name'] : ''),
                                                                                        'unit' => (isset($input['unit']) ? $input['unit'] : ''),
                                                                                        'disabled' => (isset($input['disabled']) ? $input['disabled'] : false),
                                                                                        'value' => (isset($input['value']) ? $input['value'] : ''),
                                                                                    ]);
                                                                                } else if ($input['inputType'] == "dropdown") {
                                                                                    echo view('components/dropdown', [
                                                                                        'id' => (isset($input['id']) ? $input['id'] : ''), // required
                                                                                        'label' => (isset($input['label']) ? $input['label'] : ''),
                                                                                        'selectOption' => (isset($input['selectOption']) ? $input['selectOption'] : ''),
                                                                                        'disabled' => (isset($input['disabled']) ? $input['disabled'] : ''),
                                                                                    ]);
                                                                                } else if ($input['inputType'] == "table") {
                                                                                    echo view('components/table', [
                                                                                        'column' => $input['column'],
                                                                                        'row' => $input['row']
                                                                                    ]);
                                                                                }
                                                                                ?>
                                                                            </div>
                                                                        <?php endforeach; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php ++$count ?>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<style>
    .bg-blue {
        color: #fff;
        background-color: #3559c7 !important;
    }
</style>
<?= $this->endsection(); ?>