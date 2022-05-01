<!--

Copyright Apr 2, 2022 Kyle Fisk

-->
<?php require_once '../view/header.php';?><br>
<main class="container" style="height: 100vh;">
    <div class="card" style='background-color: #ADD8E6;'>
        <div class="card-header">
          <h1 class="text-center"><?php echo $userFriend->getFirstName();?>'s List of Decks</h1> 
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered border-dark">
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Name</th>
                      <th scope="col">Description</th>
                      <th scope="col">View Cards</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($friend_decks as $friend_deck) : ?>
                    <tr>
                      <th scope="row"><?php echo $friend_deck->getID();?></th>
                      <td><?php echo $friend_deck->getName();?></td>
                      <td><?php echo $friend_deck->getDescription();?></td>
                      <td><form action="trade_manager/index.php" method = "post"> <input type="hidden" name="controllerRequest" value="view_friend_deck">
                        <input type="hidden" name="friend_deck_id" value='<?php echo $friend_deck->getID();?>'><button type="submit" class="btn btn-primary">View Cards</button></form></td>
                    <?php endforeach; ?>
                    </tr>
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?php require_once '../view/footer.php';?>
