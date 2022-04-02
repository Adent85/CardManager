<?php if (isset($_SESSION['user'])) {$user=$_SESSION['user'];$userName= $user->getFirstName()." ".$user->getLastName();} else {$userName='';}?>
<?php require_once '../model/utility.php';?>
<?php include '../view/header.php'; ?>
<div class="card">    
    <div class="text-center">
        <h1>Database Error</h1>

        <p>Error message: <?php echo $error_message; ?></p>
    </div>
</div>
<?php include '../view/footer.php'; ?>