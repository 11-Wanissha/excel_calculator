<?php
$props = new stdClass();
$props = [
    'column' => isset($column) ? $column : null,
    'row' => isset($row) ? $row : null,
]
    ?>
<div class="table-responsive">
    <table class="table table-dark table-sm align-middle">
        <thead>
            <tr class='text-center'>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr class='text-center'>
        </thead>
        <tbody>
            <tr class='text-center'>
                <td>1</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr class='text-center'>
            <tr class='text-center'>
                <td>2</td>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr class='text-center'>
            <tr class='text-center'>
                <td>3</td>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
            </tr class='text-center'>
        </tbody>
    </table>
</div>