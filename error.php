<?php

require('function.php');

if (isset($_SESSION['message'])) {
    ?>

    <h1><?= $_SESSION['message'] ?></h1>
    <?php
}

?>
<script>
  (function() {
    var cx = '015789441465070688928:ulvtk8inqt4';
    var gcse = document.createElement('script');
    gcse.type = 'text/javascript';
    gcse.async = true;
    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(gcse, s);
  })();
</script>
<gcse:search></gcse:search>