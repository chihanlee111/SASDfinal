<?php

require('function.php');

if (isset($_SESSION['message'])) {
    ?>

    <h1><?= $_SESSION['message'] ?></h1>
    <?php
}

?>