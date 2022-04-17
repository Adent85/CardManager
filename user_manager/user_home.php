<!--

Copyright Feb 4, 2022 Kyle Fisk

-->
<?php if (isset($_SESSION['user'])) {$user=$_SESSION['user'];$userName= $user->getFirstName()." ".$user->getLastName();} else {$userName='';}?>
<?php require_once '../model/utility.php';?>
<?php require_once '../view/header.php';?><br>
<main class="container" style="height: 100vh;">
    <div class = "card align-items-center" style='background-color: #ADD8E6;'>
        <div class="card-header">
            <h1 class="text-center" id="home_h1"><?php echo $user->getFirstName();?>'s Home</h1>
        </div>
        <div class="card-body" style="width: 100%; background-color: #52c5eb;">
            <div class="d-flex align-items-start">
              <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <button class="nav-link active" id="v-pills-home-tab" data-mdb-toggle="pill" data-mdb-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Decks</button>
                <button class="nav-link" id="v-pills-profile-tab" data-mdb-toggle="pill" data-mdb-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Friends</button>
                <?php if (utility::getUserIdFromSession() == 1 ){?>
                <button class="nav-link" id="v-pills-messages-tab" data-mdb-toggle="pill" data-mdb-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Admin</button>
                <?php } ?>
              </div>
              <div class="tab-content" id="v-pills-tabContent">
                  <div class="tab-pane fade p-2 show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                      <div class="list-group border border-white">
                          <a href="deck_manager/?controllerRequest=create_deck" class="list-group-item list-group-item-action text-center">Create New Deck</a>
                          <a href="deck_manager/?controllerRequest=view_decks" class="list-group-item list-group-item-action text-center">Manage Decks</a>
                      </div>
                  </div>
                  <div class="tab-pane fade p-2" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                      <div class="list-group border border-white">
                          <a href="friend_manager/?controllerRequest=view_users" class="list-group-item list-group-item-action text-center">Find Friends</a>
                          <a href="friend_manager/?controllerRequest=view_friends" class="list-group-item list-group-item-action text-center">Manage Friends</a>
                          <a href="friend_manager/?controllerRequest=friend_request" class="list-group-item list-group-item-action text-center">View Friend Requests</a>
                      </div>
                  </div>
                  <div class="tab-pane fade p-2" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                    <div class="card-footer">
                        <div class="list-group border border-white">
                            <a href="user_manager/?controllerRequest=view_users_admin" class="list-group-item list-group-item-action text-center">View All Users</a>
                            <a href="deck_manager/?controllerRequest=view_cards_type_admin" class="list-group-item list-group-item-action text-center">View Cards by Deck Type</a>
                        </div>
                    </div>
                  </div>
              </div>
            </div>
        </div>
    </div>
</main>
<?php require_once '../view/footer.php';?>