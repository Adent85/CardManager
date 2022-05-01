<!--
Copyright Jan 28, 2022 Kyle Fisk
-->
<?php if (isset($_SESSION['user'])) {$user=$_SESSION['user'];$userName= $user->getFirstName()." ".$user->getLastName();} else {$userName='';}?>
<?php if (empty($error_message)){$error_message="";}?>
<?php if(filter_input(INPUT_COOKIE, 'email') != false && filter_input(INPUT_COOKIE, 'password') != false){
    $email = filter_input(INPUT_COOKIE, 'email');
    $password = filter_input(INPUT_COOKIE, 'password');
    $remember = filter_input(INPUT_COOKIE, 'remember');
}else{
    $email = "";
    $password = "";
    $remember = false;
}?>
<?php require_once 'model/utility.php';?>
<?php require_once 'view/header.php';?><br>
<main class="container" style="height: 100vh;">
    <div class="border border-white rounded-pill text-center" style='background-color: #ADD8E6;'>
        <p class="p-1 text-danger"><i><?php echo $error_message?></i></p>
        <h1>Welcome!</h1>
        <h4 class="p-3">Please log in to access your account or register a new account to start building your collection.</h4>
    </div>
    <div class="container">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-mdb-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/PokemonCards.jpg" class="d-block" alt="Pokemon cards">
            </div>
            <div class="carousel-item">
                <img src="img/MagicCard.jpg" class="d-block" alt="Magic the Gathering card">
            </div>
            <div class="carousel-item">
                <img src="img/Goku.jpg" class="d-block" alt="Goku-Son">
            </div>
          </div>
        </div>
    </div>
</main>
<?php require_once 'view/footer.php';?><br>
