<!--
Copyright Jan 28, 2022 Kyle Fisk
-->
<?php if (isset($_SESSION['user'])) {$user=$_SESSION['user'];$userName= $user->getFirstName()." ".$user->getLastName();} else {$userName='';}?>
<?php require_once 'model/utility.php';?>
<?php require_once 'view/header.php';?><br>
<main style="height: 100vh;">
    <div class="container border border-white rounded-pill text-center" style='background-color: #ADD8E6;'>
    <h1>Welcome!</h1>
    <p>Please log in to access your account or register a new account to start building your collection.</p>
    </div>
    <div class="container-md ">
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
