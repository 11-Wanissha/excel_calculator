<!-- เรียกใช้ layouts/main -->
<?= $this->extend('layouts/main'); ?>

<!-- บ่งบอกว่าส่วนที่อยู่ด้านล่างนี้คือ section -->
<?= $this->section('content') ?>

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
<form action="/test/post" method="POST">
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
<?= isset($data) ? '<span class="text-success">Submitted data: '.$data. '</span>' : '' ?>

<script>
    document.getElementById('swal').addEventListener('click', testSwal);
    function testSwal() {
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