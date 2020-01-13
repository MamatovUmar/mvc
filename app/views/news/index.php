<?php

use app\core\Pagination;


?>

<div class="container mt-5">
    <?php foreach ($data as $key => $value) : ?>
        <?= $key + $currentPage; ?> -
        <?= $value['username']; ?> <br>

    <?php endforeach; ?>

    <?= Pagination::widget(); ?>



</div>