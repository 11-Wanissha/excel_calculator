<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">

    <script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

    <!-- external css -->
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>">
    <script src="<?= base_url('assets/js/jquery.js'); ?>"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- babylon -->
    <script src="https://cdn.babylonjs.com/babylon.js"></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <?php echo view('components/navbar'); ?>
    <div class="container-fluid">
        <?php echo $this->renderSection('content'); ?>
    </div>
    <?php echo view('components/footer'); ?>
    <style>
        .overflow {
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
        .bor{
            border: 1px solid red;
        }
    </style>
</body>

</html>