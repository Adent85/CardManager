<!--

Copyright Jan 29, 2022 Kyle Fisk

-->
<?php require_once '../view/header.php';?><br><br>
    <div>
        <h1>Registration success</h1>

        <p id = success><?php echo $success_message?></p>

        <p>Registration was completed on <?php echo date('m/d/Y'); ?>.</p><br>
    </div>
<?php require_once '../view/footer.php';?>
