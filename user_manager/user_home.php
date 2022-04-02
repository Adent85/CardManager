<!--

Copyright Feb 4, 2022 Kyle Fisk

-->
<?php if (isset($_SESSION['user'])) {$user=$_SESSION['user'];$userName= $user->getFirstName()." ".$user->getLastName();} else {$userName='';}?>
<?php require_once '../model/utility.php';?>
<?php require_once '../view/header.php';?><br>
<main class="container" style="height: 100vh;">
    <div class = "card" style='background-color: #ADD8E6;'>
        <div class="list-group border border-white">
            <h1 class="text-center"><?php echo $user->getFirstName();?>'s Home</h1>
            <a href="deck_manager/?controllerRequest=create_deck" class="list-group-item list-group-item-action text-center">Create New Deck</a>
            <a href="deck_manager/?controllerRequest=view_decks" class="list-group-item list-group-item-action text-center">Manage Decks</a>
            <a href="friend_manager/?controllerRequest=view_users" class="list-group-item list-group-item-action text-center">Find Friends</a>
            <a href="friend_manager/?controllerRequest=view_friends" class="list-group-item list-group-item-action text-center">Manage Friends</a>
            <a href="friend_manager/?controllerRequest=friend_request" class="list-group-item list-group-item-action text-center">View Friend Requests</a>
        </div>
    </div>
</main>
<?php require_once '../view/footer.php';?>