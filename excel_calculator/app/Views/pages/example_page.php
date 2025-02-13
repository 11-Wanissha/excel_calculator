<!-- เรียกใช้ layouts/main -->
<?= $this->extend('layouts/main'); ?>

<!-- บ่งบอกว่าส่วนที่อยู่ด้านล่างนี้คือ section -->
<?= $this->section('content') ?>
<div class="mb-5">
    <div class="bg-blue">
        <div class="h5 p-5 text-center">
            <strong>
                <!-- Title กล่องสีฟ้า -->
            </strong>
        </div>
    </div>
    <form id="form">
        <div class="col-xl-12 py-3">
            <div class="d-flex gap-2 align-items-center justify-content-between">
                <div class="btn-group btn-group-sm" role="group" aria-label="">
                    <button type="button" class="btn btn-outline-secondary" disabled="">Share</button>
                    <button type="button" class="btn btn-outline-secondary" id="export">Export</button>
                </div>
                <button type="submit" class="btn btn-primary px-5 me-4" id="submitBtn">Calculate</button>
                <div id="loadingSpinner" style="display: none;">
                    <div class="spinner-grow text-danger" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-grow text-warning" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <div class="spinner-grow text-info" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="ps-3">
                <div class="form-check form-switch">
                    <input class="form-check-input px-4 py-2" type="checkbox" id="Row">
                    <label class="form-check-label ps-3" for="Row">Row</label>
                </div>
            </div>
            <div class="col-12 pt-2 isRow">
                <!-- Code Here -->
                <div>
                    <div class="Input">
                        <strong>Input</strong>
                        <!-- วิธีเรียกใช้ component Input -->
                        <?php
                        echo view('components/text_input', [
                            'id' => '',
                            'label' => '',
                            'name' => '',
                            'unit' => '',
                            'disabled' => false,
                            'value' => '',
                            'type' => '',
                            'required' => true,
                        ]);
                        ?>
                    </div>
                    <div class="Dropdown">
                        <strong>Dropdown</strong>
                        <!-- วิธีเรียกใช้ component Dropdown -->
                        <?php
                        echo view('components/dropdown', [
                            'id' => '', // required
                            'label' => '',
                            'selectOption' => '--- Please Select ---',
                            'disabled' => false,
                            'option' => array(
                                [
                                    'optionName' => "Shaving",
                                    'value' => 0,
                                    'selected' => true,
                                ],
                                [
                                    'optionName' => "Peeling",
                                    'value' => 1,
                                ],
                                [
                                    'optionGroup' => array(
                                        [
                                            'label' => 'label',
                                            'optionInGroup' => array(
                                                [
                                                    'optionName' => "Shaving",
                                                    'value' => 0,
                                                ],
                                                [
                                                    'optionName' => "Peeling",
                                                    'value' => 1,
                                                ],
                                            ),
                                        ]
                                    ),
                                ]
                            ),
                        ]);
                        ?>
                    </div>
                    <div class="table">
                        <strong>Table</strong>
                        <!-- วิธีเรียกใช้ component Table -->
                        <?php
                        echo view('components/table', [
                            'column' => array(
                                [
                                    'id' => "mstatic",
                                    'label' => "Mstatic",
                                ],
                                [
                                    'id' => "Mn,static",
                                    'label' => "φMn,static",
                                    'unit' => "kN·m",
                                ],
                                [
                                    'id' => "ok",
                                    'label' => "OK/NG!",
                                ],
                            ),
                            'row' => array(
                                [
                                    'mstatic' => array(
                                        [
                                            'text' => '<p id="G59" name="G59">0</p>',
                                        ]
                                    ),
                                    'Mn,static' => array(
                                        [
                                            'text' => '<p id="I59" name="I59">0</p>',
                                        ]
                                    ),
                                    'ok' => array(
                                        [
                                            'text' => '<p id="K59" name="K59">-</p>',
                                        ]
                                    ),
                                ],
                            ),
                        ]);
                        ?>
                    </div>
                    <div class="File Input">
                        <strong>File</strong>
                        <?php
                        echo view('components/file_input', [
                            'id' => '',
                            'label' => ''
                        ]);
                        ?>
                    </div>
                </div>
            </div>
            <!-- element สำหรับ 3D -->
            <canvas id="renderCanvas" touch-action="none"></canvas>
        </div>
    </form>
</div>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 99999">
    <div id="liveToast-success" class="toast align-items-center text-white bg-success border-0" role="alert"
        aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                Success
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>
</div>
<div class="position-fixed bottom-0 end-0 p-3" style="z-index: 99999">
    <div id="liveToast-err" class="toast align-items-center text-white bg-danger border-0" role="alert"
        aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                Form submission failed! Please check your input and try again.
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>
</div>
<style>
    input {
        width: auto;
    }

    td.overflow p {
        margin-top: 8px;
        margin-bottom: 8px;
    }

    #renderCanvas {
        width: 100%;
        height: 100%;
        touch-action: none;
    }

    .bg-blue {
        color: #fff;
        background-color: #3559c7 !important;
    }
</style>

<script>
    const canvas = document.getElementById("renderCanvas"); // Get the canvas element
    let engine;
    let scene;
    let click = false;
    let latestCalculatedData = {}
    if (canvas) {
        engine = new BABYLON.Engine(canvas, true, {
            preserveDrawingBuffer: true, // Keep the drawing buffer for screenshots
            stencil: true,               // Enable stencil buffer
            disableWebGL2Support: false, // Allow WebGL 2.0 if supported
        }); // Generate the BABYLON 3D engine
        scene = createScene(); //Call the createScene function
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
        scene.render();
        // Watch for browser/canvas resize events
        window.addEventListener("resize", function () {
            engine.resize();
        });
        canvas.addEventListener('wheel', function (event) {
            event.preventDefault();
        });
    }
    $(document).ready(function () {
        $('#form').on('submit', function (e) {
            e.preventDefault(); // Prevent the default form submission
            if (click) {
                var toastElement = document.getElementById('liveToast-err');
                var toastBody = toastElement.querySelector('.toast-body');
                toastBody.textContent = 'Please Wait';
                var toast = new bootstrap.Toast(toastElement);
                toast.show();
                return;
            }
            click = true;
            $('#submitBtn').hide();
            // Show the loading spinner
            $('#loadingSpinner').show();
            $.ajax({
                type: 'POST',
                url: 'Path ส่งไป Controller calculator', // Your form action URL
                data: $(this).serialize(), // Serialize the form data
                success: function (response) {
                    latestCalculatedData = response;
                    $('#loadingSpinner').hide();
                    // Show the loading spinner
                    $('#submitBtn').show();
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
                            continue;
                        }
                    }
                    if (canvas) {
                        reGenerate(response);
                    }
                    var toastElement = document.getElementById('liveToast-success');
                    var toast = new bootstrap.Toast(toastElement);
                    toast.show();
                    click = false;
                },
                error: function (xhr, status, error) {
                    $('#loadingSpinner').hide();
                    // Show the loading spinner
                    $('#submitBtn').show();
                    var toastElement = document.getElementById('liveToast-err');
                    var toastBody = toastElement.querySelector('.toast-body');
                    var response = JSON.parse(xhr.responseText);
                    toastBody.textContent = response.error || 'Form submission failed! Please check your input and try again.';
                    var toast = new bootstrap.Toast(toastElement);
                    toast.show();
                    click = false;
                }
            });
        });
        $('.fullscreen-btn').click(function () {
            let index = $('.fullscreen-btn').index(this);
            let element = $('.table-responsive').eq(index)[0];

            if (document.fullscreenElement) {
                // Exit fullscreen
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                } else if (document.mozCancelFullScreen) { // Firefox
                    document.mozCancelFullScreen();
                } else if (document.webkitExitFullscreen) { // Chrome, Safari, and Opera
                    document.webkitExitFullscreen();
                } else if (document.msExitFullscreen) { // IE/Edge
                    document.msExitFullscreen();
                }
            } else {
                // Enter fullscreen
                if (element.requestFullscreen) {
                    element.requestFullscreen();
                } else if (element.mozRequestFullScreen) { // Firefox
                    element.mozRequestFullScreen();
                } else if (element.webkitRequestFullscreen) { // Chrome, Safari, and Opera
                    element.webkitRequestFullscreen();
                } else if (element.msRequestFullscreen) { // IE/Edge
                    element.msRequestFullscreen();
                }
            }
        });

        // Listen for fullscreen change to toggle button text/icon
        document.addEventListener('fullscreenchange', function () {
            $('.fullscreen-btn').each(function (index, button) {
                if (document.fullscreenElement) {
                    $(button).html('<img src="<?= base_url('assets/expand.png'); ?>" alt="Exit" width="20px"> Exit');
                } else {
                    $(button).html('<img src="<?= base_url('assets/expand.png'); ?>" alt="Full Screen" width="20px"> Full Screen');
                }
            });
        });
        $('#Row').on('click', function () {
            var divElements = document.querySelectorAll('.isRow');
            divElements.forEach(function (div) { // Loop through each div element
                if (this.checked) {
                    div.classList.remove('col-xl-6');
                    div.classList.add('col-xl-12');
                } else {
                    div.classList.remove('col-xl-12');
                    div.classList.add('col-xl-6');
                }
            }, this);
        });
        $('#btnImport').on('click', function () {
            $('#loadingSpinner').show();
            $('#submitBtn').hide();
            if (click) {
                var toastElement = document.getElementById('liveToast-err');
                var toastBody = toastElement.querySelector('.toast-body');
                toastBody.textContent = 'Please Wait';
                var toast = new bootstrap.Toast(toastElement);
                toast.show();
                return;
            }
            click = true;
            const fileEl = $('#file')[0]
            const file = fileEl.files[0]

            if (!file) {
                $('#loadingSpinner').hide();
                $('#submitBtn').show();
                var toastElement = document.getElementById('liveToast-err');
                var toastBody = toastElement.querySelector('.toast-body');
                toastBody.textContent = 'Please Import File';
                var toast = new bootstrap.Toast(toastElement);
                toast.show();
                click = false;
                return;
            }

            const formData = new FormData();
            formData.append('file', file)

            $.ajax({
                url: 'Path ไปหา controller import',
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                    $('#loadingSpinner').hide();
                    $('#submitBtn').show();

                    for (let data in response) {
                        let element = document.querySelector("#" + data);
                        let tdElement = document.querySelector('td.overflow input#' + data);
                        let tdNoInputElement = document.querySelector('td.overflow p#' + data);
                        if (tdNoInputElement !== null) {
                            tdNoInputElement.innerHTML = response[data];
                        } else if (tdElement) {
                            tdElement.value = response[data];
                        } else if (element) {
                            element.value = response[data];
                        } else {
                            continue;
                        }
                    }
                    var toastElement = document.getElementById('liveToast-success');
                    var toast = new bootstrap.Toast(toastElement);
                    toast.show();
                    click = false;
                },
                error: function (xhr, status, error) {
                    $('#loadingSpinner').hide();
                    $('#submitBtn').show();
                    console.log(error)
                    click = false;
                }
            })
        });

        $('#export').on('click', async function () {
            try {
                $('#loadingSpinner').show();
                $('#submitBtn').hide();
                if (click) {
                    var toastElement = document.getElementById('liveToast-err');
                    var toastBody = toastElement.querySelector('.toast-body');
                    toastBody.textContent = 'Please Wait';
                    var toast = new bootstrap.Toast(toastElement);
                    toast.show();
                    return;
                }
                if (!Object.keys(latestCalculatedData).length > 0) {
                    click = false;
                    var toastElement = document.getElementById('liveToast-err');
                    var toastBody = toastElement.querySelector('.toast-body');
                    toastBody.textContent = 'Please Calculated before export';
                    var toast = new bootstrap.Toast(toastElement);
                    toast.show();
                    $('#loadingSpinner').hide();
                    $('#submitBtn').show();
                    return;
                }
                click = true;
                const formEl = document.forms.form
                const formData = new FormData(formEl)

                formData.delete('file')

                let finalFormData = JSON.stringify({
                    ...Object.fromEntries(formData),
                    ...latestCalculatedData
                })
                getBase(JSON.parse(finalFormData), (dataURL) => {
                    // You can use the dataURL as needed, e.g., display it in an image element
                    finalFormData = JSON.stringify({
                        ...JSON.parse(finalFormData), // Convert back to an object
                        baseImage: dataURL
                    });
                    $.ajax({
                        url: 'path ไปหา controller export',
                        type: 'POST',
                        data: finalFormData,
                        cache: false,
                        contentType: "application/json",
                        processData: false,
                        success: function (response) {
                            $('#loadingSpinner').hide();
                            $('#submitBtn').show();

                            click = false;
                            const byteCharacters = atob(response.content);
                            const byteNumbers = new Array(byteCharacters.length);
                            for (let i = 0; i < byteCharacters.length; i++) {
                                byteNumbers[i] = byteCharacters.charCodeAt(i);
                            }
                            const byteArray = new Uint8Array(byteNumbers);
                            const blob = new Blob([byteArray], {
                                type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                            });

                            const link = document.createElement('a');
                            link.href = URL.createObjectURL(blob);
                            link.download = response.filename;
                            document.body.appendChild(link);
                            link.click();
                            document.body.removeChild(link);
                        },
                        error: function (xhr, status, error) {
                            console.log(error)
                            click = false;
                            $('#loadingSpinner').hide();
                            $('#submitBtn').show();
                        }
                    })
                });
            } catch (e) {
                click = false;
                var toastElement = document.getElementById('liveToast-err');
                var toastBody = toastElement.querySelector('.toast-body');
                toastBody.textContent = 'Something Error Please try again';
                var toast = new bootstrap.Toast(toastElement);
                toast.show();
                $('#loadingSpinner').hide();
                $('#submitBtn').show();
            }
        });
    });
</script>
<?= $this->endsection(); ?>