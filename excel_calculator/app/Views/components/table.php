<?php
$props = new stdClass();
$props = [
    'column' => isset($column) ? $column : null,
    'row' => isset($row) ? $row : null,
];
?>
<div class="table-responsive w-100 h-100">
    <table class="table  border table-sm align-middle table-bordered border-info">
        <thead>
            <tr class='text-center'>
                <?php foreach ($props['column'] as $col): ?>
                    <th class="overflow text-center" scope="col" key="<?= $col['id'] ?>" <?php if (isset($props['width'])) echo "style='width: {$col['width']} !important'"; ?> title=" <?= $col['label'] ?>">
                        <?php
                        if (isset($col['unit'])) {
                            echo $col['label'] . '<br>' . $col['unit'];
                        } else {
                            echo "<div class='pb-3'>" . $col['label'] . "</div>";
                        }
                        ?>
                    </th>
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
                        <?php foreach ($props['column'] as $key => $col): ?>
                            <?php
                            // Initialize the class string with default classes
                            $class = 'overflow';

                            // Check if 'textColor' is set in the current column data
                            if (isset($row[$col['id']][0]['textColor'])) {
                                $class = 'overflow ' . $row[$col['id']][0]['textColor'];
                            }
                            ?>
                            <td class="<?= $class ?>" title="<?= $row[$col['id']][0]['text'] ?>" ><?= $row[$col['id']][0]['text'] ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>