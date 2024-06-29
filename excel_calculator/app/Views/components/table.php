<?php
$props = new stdClass();
$props = [
    'column' => isset($column) ? $column : null,
    'row' => isset($row) ? $row : null,
    'width' => isset($width) ? "width:{$width}px;" : '',
];
$columns = array(
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
);
$rows = array(
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
);
?>
<div class="table-responsive w-100 h-100">
    <table class="table table-dark table-sm align-middle">
        <thead>
            <tr class='text-center'>
                <?php foreach ($props['column'] as $col): ?>
                    <th scope="col" key="<?= $col['id'] ?>" style="<?= $props['width'] ?>"><?= $col['label'] ?>
                        <br><?= (isset($col['unit']) ? $col['unit'] : '')?> </th>
                <?php endforeach; ?>
            </tr class='text-center'>
        </thead>
        <tbody>
            <?php if ($props['row'] == null): ?>
                <tr class='text-center'>
                    <td colspan="<?= count($columns) ?>">No data available</td>
                </tr>
            <?php else: ?>
                <?php foreach ($props['row'] as $row): ?>
                    <tr class='text-center'>
                        <?php foreach ($props['column'] as $col): ?>
                            <td><?= $row[$col['id']] ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>