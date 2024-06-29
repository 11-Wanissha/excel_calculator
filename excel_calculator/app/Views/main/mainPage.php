<!-- เรียกใช้ layouts/main -->
<?= $this->extend('layouts/main'); ?>

<!-- บ่งบอกว่าส่วนที่อยู่ด้านล่างนี้คือ section -->
<?= $this->section('content') ?>
<?php

$props = [
    'title' => 'Soakage Design &amp; Calculation',
    'secTion' => array(
        [
            'menu' => array(
                [
                    'menuTitle' => '1. Kuygun',
                    'input' => array(
                        [
                            'inputType' => 'text',
                            'slot' => 1,
                        ],
                        [
                            'inputType' => 'dropdown',
                        ],
                    ),
                ],
                [
                    'menuTitle' => '2. Kuygun2',
                    'input' => array(
                        [
                            'inputType' => 'text',
                        ],
                        [
                            'inputType' => 'dropdown',
                        ],
                    ),
                ],
            ),
        ],
        [
            'menu' => array(
                [
                    'menuTitle' => '3. Kuygun',
                    'subMenu' => array(
                        [
                            'subMenuTitle' => '3.1 ไอสัสกันต์',
                            'input' => array(
                                [
                                    'inputType' => 'text',
                                ],
                                [
                                    'inputType' => 'dropdown',
                                ],
                            ),
                        ],
                    ),
                    'input' => array(
                        [
                            'inputType' => 'text',
                        ],
                        [
                            'inputType' => 'dropdown',
                        ],
                    ),
                ],
                [
                    'menuTitle' => '4. Kuygun',
                    'input' => array(
                        [
                            'inputType' => 'text',
                        ],
                        [
                            'inputType' => 'dropdown',
                        ],
                    ),
                ],
            )
        ],
    ),
    'rows' => array(
        [
            'request' => 'kuy',
            'kuy' => 'haha',
            'gun' => 'kuygun',
        ],
        [
            'request' => 'kuy2',
            'kuy' => 'haha2',
            'gun' => 'kuygun2',
        ],
        [
            'request' => 'kuy3',
            'kuy' => 'haha3',
            'gun' => 'kuygun3',
        ],
    ),
    'columns' => array(
        [
            'id' => "request",
            'label' => "Req",
            'unit' => "mt",
        ],
        [
            'id' => "kuy",
            'label' => "Kuy",
            'unit' => "mt",
        ],
        [
            'id' => "gun",
            'label' => "gun",
            'unit' => "mt",
        ]
    ),

]
    ?>
<div class="">
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
        <div class="col-xl-6 col-sm-12 col-md-12 col-xs-12 ">
            <div class="accordion">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#section-1" aria-expanded="false" aria-controls="section-1">
                            1. Rainfall Data
                        </button>
                    </h2>
                    <div id="section-1" class="accordion-collapse collapse" aria-labelledby="section-1"
                        data-bs-parent="#section-1" style="">
                        <div class="accordion-body">
                            <div class="row align-items-end">
                                <div class="col-xl-12 col-md-12">
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">
                                            Upload your rainfall intensity
                                        </label>
                                        <input class="form-control" type="file" id="formFile" accept=".csv">
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-12">
                                    <div class="mb-3">
                                        <label for="design_return_period" class="form-label">
                                            Design Return Period (1 in X Year)
                                        </label>
                                        <select class="form-select" id="design_return_period"
                                            aria-label="Design Return Period" disabled="">
                                            <option value="1.58">1.58</option>
                                            <option value="2">2</option>
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                            <option value="40">40</option>
                                            <option value="50">50</option>
                                            <option value="60">60</option>
                                            <option value="80">80</option>
                                            <option value="100">100</option>
                                            <option value="250">250</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-12">
                                    <div class="mb-3">
                                        <label for="time_of_concentration" class="form-label">
                                            Time Of Concentration
                                        </label>
                                        <select class="form-select" id="time_of_concentration"
                                            aria-label="Time Of Concentration" disabled="">
                                            <option value="10m">10m</option>
                                            <option value="20m">20m</option>
                                            <option value="30m">30m</option>
                                            <option value="1h">1h</option>
                                            <option value="2h">2h</option>
                                            <option value="6h">6h</option>
                                            <option value="12h">12h</option>
                                            <option value="24h">24h</option>
                                            <option value="48h">48h</option>
                                            <option value="72h">72h</option>
                                            <option value="96h">96h</option>
                                            <option value="120h">120h</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-md-12">
                                    <div class="mb-3">
                                        <label for="climate_change_factor" class="form-label">
                                            Climate Change Factor (%)
                                        </label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="climate_change_factor"
                                                value="20" aria-describedby="addon-label" disabled="">
                                            <span class="input-group-text" id="addon-label">%</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-12 col-md-12">
                                    <div class="mb-3">
                                        <label for="intensity_without" class="form-label">
                                            Intensity I (without climate change)
                                        </label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="intensity_without"
                                                aria-describedby="addon-label" disabled="" readonly="">
                                            <span class="input-group-text" id="addon-label">mm/hr</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-12 col-md-12">
                                    <div class="mb-3">
                                        <label for="intensity" class="form-label">
                                            Intensity I (with climate change)
                                        </label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="intensity"
                                                aria-describedby="addon-label" disabled="" readonly="">
                                            <span class="input-group-text" id="addon-label">mm/hr</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-sm-12 col-md-12 col-xs-12">
            <div class="table-responsive w-100 h-100">
                <table class="table table-dark table-sm align-middle">
                    <thead>
                        <tr class='text-center'>
                            <?php foreach ($props['columns'] as $col): ?>
                                <th scope="col" key="<?= $col['id'] ?>"><?= $col['label'] ?>
                                    <br><?= $col['unit'] ?>
                                </th>
                            <?php endforeach; ?>
                        </tr class='text-center'>
                    </thead>
                    <tbody>
                        <?php foreach ($props['rows'] as $row): ?>
                            <tr class='text-center'>
                                <?php foreach ($props['columns'] as $col): ?>
                                    <td><?= $row[$col['id']] ?></td>
                                <?php endforeach; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <!-- ข้อมูลการ์ดฝั่งซ้าย ขวา -->
            <?php foreach ($props['secTion'] as $secTion): ?>
                <div class="col-xl-6 col-sm-12 col-md-12 col-xs-12">
                    <div class="row">
                        <!-- section ซ้าย ขวา -->
                        <?php foreach ($secTion['menu'] as $menu): ?>
                            <div class="col-12">
                                <!-- แสดงข้อๆ เปิดปิด -->
                                <?= $menu['menuTitle'] ?>
                                <!-- input ต่างๆ -->
                                <div class="row">
                                    <?php foreach ($menu['input'] as $input): ?>
                                        <?php $check = (isset($input['slot']) && $input['slot'] == 1) ? 'col-12' : 'col-6'; ?>
                                        <div class="<?= $check ?>">
                                            <?php
                                            if ($input['inputType'] == "text") {
                                                echo view('components/text_input', [
                                                    'label' => 'ความยาว',
                                                    'id' => 'len',
                                                    'name' => 'len'
                                                ]);
                                            } else if ($input['inputType'] == "dropdown") {
                                                echo view('components/dropdown', [
                                                    'label' => 'ควยกันต์',
                                                ]);
                                            } else if ($input['inputType'] == "table") {
                                                echo view('components/table', [
                                                    'label' => 'ควยกันต์',
                                                    'option' => $option
                                                ]);
                                            }
                                            ?>
                                        </div>
                                    <?php endforeach; ?>
                                    <div>
                                        <?php if (isset($menu['subMenu']) && !empty($menu['subMenu'])): ?>
                                            <?php foreach ($menu['subMenu'] as $subMenu): ?>
                                                <?= $subMenu['subMenuTitle'] ?>
                                                <?php foreach ($subMenu['input'] as $input): ?>
                                                    <?php $check = (isset($input['slot']) && $input['slot'] == 1) ? 'col-12' : 'col-6'; ?>
                                                    <div class="<?= $check ?>">
                                                        <?php
                                                        if ($input['inputType'] == "text") {
                                                            echo view('components/text_input', [
                                                                'label' => 'ความยาว',
                                                                'id' => 'len',
                                                                'name' => 'len'
                                                            ]);
                                                        } else if ($input['inputType'] == "dropdown") {
                                                            echo view('components/dropdown', [
                                                                'label' => 'ควยกันต์',
                                                            ]);
                                                        } else if ($input['inputType'] == "table") {
                                                            echo view('components/table', [
                                                                'label' => 'ควยกันต์',
                                                                'option' => $option
                                                            ]);
                                                        }
                                                        ?>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>


<style>
    .bor {
        border: 1px solid red;
    }

    .bg-blue {
        color: #fff;
        background-color: #3559c7 !important;
    }
</style>
<?= $this->endsection(); ?>