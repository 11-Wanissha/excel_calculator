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
        <button type="submit" class="btn btn-primary px-5 me-4">Submit</button>
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
  <div id="url" class="d-none"><?= $props['url'] ?></div>
</div>
<script>
  $(document).ready(function () {
    $('#form').on('submit', function (e) {
      e.preventDefault(); // Prevent the default form submission
      const url = document.getElementById('url').innerHTML;
      // ajax serialize()
      console.log(url)
      $.ajax({
        type: 'POST',
        url: `${url}`, // Your form action URL
        data: $(this).serialize(), // Serialize the form data
        success: function (response) {
          // Handle the response from the server
          alert('Form submitted successfully!');
          console.log(response); // You can log the response for debugging
        },
        error: function (xhr, status, error) {
          // Handle errors
          alert('Form submission failed! Please input Data or Import File');
          console.log(xhr.responseText); // Log the error response for debugging
        }
      });

      // ajax event
      // var form = e.target;
      // var formData = new FormData(form);
      // $.ajax({
      //     type: 'POST',
      //     url: form.action, // Use the form's action URL
      //     data: formData, // Send the FormData object
      //     processData: false, // Prevent jQuery from automatically processing the data
      //     contentType: false, // Prevent jQuery from setting the content type
      //     success: function (response) {
      //         // Handle the response from the server
      //         alert('Form submitted successfully!');
      //         console.log(response); // You can log the response for debugging
      //     },
      //     error: function (xhr, status, error) {
      //         // Handle errors
      //         alert('Form submission failed!');
      //         console.log(xhr.responseText); // Log the error response for debugging
      //     }
      // });
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