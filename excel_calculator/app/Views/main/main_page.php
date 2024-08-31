<!-- เรียกใช้ layouts/main -->
<?= $this->extend('layouts/main'); ?>

<!-- บ่งบอกว่าส่วนที่อยู่ด้านล่างนี้คือ section -->
<?= $this->section('content') ?>
<?php
// ตัวแปรรับ section menu
$count = 0;

$props = new stdClass();
$props = isset($formProperties) ? $formProperties : [];
?>
<div class="mb-5">
  <div class="bg-blue">
    <div class="h5 p-5 text-center">
      <strong>
        <?= $props['title'] ?>
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
      <!-- ข้อมูลการ์ดฝั่งซ้าย ขวา -->
      <?php foreach ($props['secTion'] as $secTion): ?>
        <div class="col-xl-6 col-sm-12 col-md-12 col-xs-12 pt-2 isRow">
          <div class="accordion">
            <!-- section ข้อๆ -->
            <?php foreach ($secTion['menu'] as $menu): ?>
              <div class="accordion-item overflow" title=" <?= $menu['menuTitle'] ?>">
                <h2 class="accordion-header overflow">
                  <button class="accordion-button collapsed overflow" type="button" data-bs-toggle="collapse"
                    data-bs-target="#section-<?= $count ?>" aria-expanded="false" aria-controls="section-<?= $count ?>">
                    <!-- แสดงข้อๆ เปิดปิด -->
                    <?= $menu['menuTitle'] ?>
                  </button>
                </h2>
                <div id="section-<?= $count ?>"
                  class="accordion-collapse collapse <?= $count === 0 || $count === $props['lastIndex'] ? 'show' : '' ?>"
                  aria-labelledby="section-<?= $count ?>" data-bs-parent="#section-<?= $count ?>">
                  <div class="accordion-body">
                    <?php if (isset($menu['canvas'])): ?>
                      <?= $menu['canvas']; ?>
                    <?php endif; ?>
                    <?php ++$count ?>
                    <!-- input ต่างๆ -->
                    <div class="row align-items-end">
                      <?php if (isset($menu['input']) && !empty($menu['input'])):
                        foreach ($menu['input'] as $input): ?>
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
                                'type' => (isset($input['type']) ? $input['type'] : 'text'),
                              ]);
                            } else if ($input['inputType'] == "dropdown") {
                              echo view('components/dropdown', [
                                'id' => (isset($input['id']) ? $input['id'] : ''), // required
                                'label' => (isset($input['label']) ? $input['label'] : ''),
                                'selectOption' => (isset($input['selectOption']) ? $input['selectOption'] : '--- Please Select ---'),
                                'disabled' => (isset($input['disabled']) ? $input['disabled'] : false),
                                'option' => (isset($input['option']) ? $input['option'] : '')
                              ]);
                            } else if ($input['inputType'] == "table") {
                              echo view('components/table', [
                                'column' => (isset($input['column']) ? $input['column'] : ''),
                                'row' => (isset($input['row']) ? $input['row'] : ''),
                              ]);
                            } else if ($input['inputType'] == "file") {
                              echo view('components/file_input', [
                                'id' => (isset($input['id']) ? $input['id'] : ''),
                                'label' => (isset($input['label']) ? $input['label'] : '')
                              ]);
                            }
                            ?>
                          </div>
                        <?php endforeach;
                      endif; ?>
                      <div>
                        <?php if (isset($menu['subMenu']) && !empty($menu['subMenu'])): ?>
                          <?php foreach ($menu['subMenu'] as $subMenu): ?>
                            <div class="accordion mt-3">
                              <div class="accordion-item overflow" title=" <?= $subMenu['subMenuTitle'] ?>">
                                <h2 class="accordion-header overflow">
                                  <button class="accordion-button collapsed overflow" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#section-<?= $count ?>" aria-expanded="false"
                                    aria-controls="section-<?= $count ?>">
                                    <?= $subMenu['subMenuTitle'] ?>
                                  </button>
                                </h2>
                                <div id="section-<?= $count ?>" class="accordion-collapse collapse"
                                  aria-labelledby="section-<?= $count ?>" data-bs-parent="#section-<?= $count ?>">
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
                                              'type' => (isset($input['type']) ? $input['type'] : 'text'),
                                            ]);
                                          } else if ($input['inputType'] == "dropdown") {
                                            echo view('components/dropdown', [
                                              'id' => (isset($input['id']) ? $input['id'] : ''), // required
                                              'label' => (isset($input['label']) ? $input['label'] : ''),
                                              'selectOption' => (isset($input['selectOption']) ? $input['selectOption'] : '--- Please Select ---'),
                                              'disabled' => (isset($input['disabled']) ? $input['disabled'] : false),
                                            ]);
                                          } else if ($input['inputType'] == "table") {
                                            echo view('components/table', [
                                              'column' => $input['column'],
                                              'row' => $input['row']
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
  </form>
  <div id="url" class="d-none"><?= $props['url'] ?></div>
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
        Form submission failed! Please input Data or Import File and try again
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

  #renderCanvas {
    width: 100%;
    height: 100%;
    touch-action: none;
  }
</style>
<script src="<?= base_url('assets/js/' . $props['url'] . '.js') ?>"></script>
<script>
  const importUrl = <?= json_encode($props['importUrl']) ?>;
  const canvas = document.getElementById("renderCanvas"); // Get the canvas element
  let engine;
  let scene
  if (canvas) {
    engine = new BABYLON.Engine(canvas, true); // Generate the BABYLON 3D engine
    scene = createScene(); //Call the createScene function
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    // Register a render loop to repeatedly render the scene
    engine.runRenderLoop(function () {
      scene.render();
    });
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
      const url = document.getElementById('url').innerHTML;
      $('#submitBtn').hide();
      // Show the loading spinner
      $('#loadingSpinner').show();
      $.ajax({
        type: 'POST',
        url: `${url}`, // Your form action URL
        data: $(this).serialize(), // Serialize the form data
        success: function (response) {
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
            }
            else if (tdElement) {
              tdElement.value = response[data];
              tdElement.style.width = "auto";
            } else if (element) {
              element.value = response[data];
              element.style.width = "auto";
            } else {
              console.warn(`No element found with ID: ${data}`);
            }
          }
          if (canvas) {
            reGenerate(response);
          }
          var toastElement = document.getElementById('liveToast-success');
          var toast = new bootstrap.Toast(toastElement);
          toast.show();
        },
        error: function (xhr, status, error) {
          $('#loadingSpinner').hide();
          // Show the loading spinner
          $('#submitBtn').show();
          var toastElement = document.getElementById('liveToast-err');
          var toast = new bootstrap.Toast(toastElement);
          toast.show();
          console.log(xhr.responseText); // Log the error response for debugging
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
      divElements.forEach(function (div) {  // Loop through each div element
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

      const fileEl = $('#file')[0]
      const file = fileEl.files[0]

      if (!file) {
        $('#loadingSpinner').hide();
        $('#submitBtn').show();
        var toastElement = document.getElementById('liveToast-err');
        var toastBody = toastElement.querySelector('.toast-body');
        toastBody.textContent = 'Please Input File First';
        var toast = new bootstrap.Toast(toastElement);
        toast.show();
        return;
      }

      const formData = new FormData();
      formData.append('file', file)

      $.ajax({
        url: importUrl,
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
            }
            else if (tdElement) {
              tdElement.value = response[data];
            } else if (element) {
              element.value = response[data];
            } else {
              console.warn(`No element found with ID: ${data}`);
            }
          }
          var toastElement = document.getElementById('liveToast-success');
          var toast = new bootstrap.Toast(toastElement);
          toast.show();
        },
        error: function (xhr, status, error) {
          $('#loadingSpinner').hide();
          $('#submitBtn').show();
          console.log(error)
        }
      })
    });
  });
</script>

<style>
  .bg-blue {
    color: #fff;
    background-color: #3559c7 !important;
  }
</style>
<?= $this->endsection(); ?>