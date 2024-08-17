<!-- เรียกใช้ layouts/main -->
<?= $this->extend('layouts/main'); ?>

<!-- บ่งบอกว่าส่วนที่อยู่ด้านล่างนี้คือ section -->
<?= $this->section('content') ?>
<?php
// ตัวแปรรับ section menu
$count = 0;

$props = new stdClass();
$props = isset($formProperties) ? $formProperties : []

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
      <!-- ข้อมูลการ์ดฝั่งซ้าย ขวา -->
      <?php foreach ($props['secTion'] as $secTion): ?>
        <div class="col-xl-6 col-sm-12 col-md-12 col-xs-12">
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
                <div id="section-<?= $count ?>" class="accordion-collapse collapse" aria-labelledby="section-<?= $count ?>"
                  data-bs-parent="#section-<?= $count ?>" style="">
                  <div class="accordion-body">
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
                            } else {
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
                                  aria-labelledby="section-<?= $count ?>" data-bs-parent="#section-<?= $count ?>" style="">
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
  <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
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
  <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
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
  <div id="url" class="d-none"><?= $props['url'] ?></div>
</div>
<script>
  const importUrl = <?= json_encode($props['importUrl']) ?>

  $(document).ready(function() {
    $('#form').on('submit', function(e) {
      e.preventDefault(); // Prevent the default form submission
      const url = document.getElementById('url').innerHTML;
      $('#submitBtn').hide();

      // Show the loading spinner
      $('#loadingSpinner').show();
      $.ajax({
        type: 'POST',
        url: `${url}`, // Your form action URL
        data: $(this).serialize(), // Serialize the form data
        success: function(response) {
          $('#loadingSpinner').hide();
          // Show the loading spinner
          $('#submitBtn').show();
          for (let data in response) {
            let element = document.querySelector("#" + data);
            let tdElement = document.querySelector('td.overflow input#' + data);
            if (tdElement) {
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
        error: function(xhr, status, error) {
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

    $('#file').on('change', function() {
      $('#loadingSpinner').show();
      $('#submitBtn').hide();

      const fileEl = $('#file')[0]
      const file = fileEl.files[0]

      if (!file) return

      const formData = new FormData()
      formData.append('file', file)

       $.ajax({
        url: importUrl,
        type: 'POST',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(response) {
          $('#loadingSpinner').hide();
          $('#submitBtn').show();
          
          for (let data in response) {
            let element = document.querySelector("#" + data);
            let tdElement = document.querySelector('td.overflow input#' + data);
            if (tdElement) {
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
        error: function(xhr, status, error) {
          $('#loadingSpinner').hide();
          $('#submitBtn').show();
          console.log(error)
        }
      })
    })
  });
</script>

<style>
  .bg-blue {
    color: #fff;
    background-color: #3559c7 !important;
  }
</style>
<?= $this->endsection(); ?>