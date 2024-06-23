<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>">

    <!-- external css -->
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- script -->
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js') ?>"></script>
</head>

<body>
    <div class="container">
        <?php echo $this->renderSection('content'); ?>
    </div>


</body>

</html>