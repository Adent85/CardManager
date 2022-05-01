
<!--

Copyright Apr 17, 2022 Kyle Fisk

-->
<?php require_once '../view/header.php';?><br>
<main class="container" style="height: 100vh;">
    <div class="card" style='background-color: #ADD8E6;'>
      <div class="card-header">
          <h1 class="text-center"><?php echo $user->getFirstName();?>'s List of Decks</h1> 
      </div>
      <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered border-dark">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Description</th>
                  <th scope="col">Add Cards</th>
                  <th scope="col">View Cards</th>
                  <th scope="col">Edit Deck</th>
                  <th scope="col">Delete Deck</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($user_decks as $user_deck) : ?>
                <tr>
                  <th scope="row"><?php echo $user_deck->getID();?></th>
                  <td><?php echo $user_deck->getName();?></td>
                  <td><?php echo $user_deck->getDescription();?></td>
                  <td><form action="deck_manager/index.php" method = "post"> <input type="hidden" name="controllerRequest" value="add_card_to_deck">
                    <input type="hidden" name="deck_id" value='<?php echo $user_deck->getID();?>'><button type="submit" class="btn btn-primary">Add Card</button></form></td>
                  <td><form action="deck_manager/index.php" method = "post"> <input type="hidden" name="controllerRequest" value="view_deck">
                    <input type="hidden" name="deck_id" value='<?php echo $user_deck->getID();?>'><button type="submit" class="btn btn-primary">View Cards</button></form></td>
                  <td><form action="deck_manager/index.php" method = "post"> <input type="hidden" name="controllerRequest" value="edit_deck">
                    <input type="hidden" name="deck_id" value="<?php echo $user_deck->getID();?>"><button type="submit" class="btn btn-primary">Edit Deck</button></form></td>
                  <td><button type="button" class="btn btn-danger" data-mdb-toggle="modal" data-mdb-target="#deleteDeckModal<?php echo $user_deck->getID();?>">Delete Deck</button>
                    <div class="modal fade" id="deleteDeckModal<?php echo $user_deck->getID();?>" tabindex="-1" aria-labelledby="deleteDeckModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title text-danger" id="deleteDeckModalLabel">Delete Deck!!!</h5>
                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body text-danger">Confirm that you want to delete <?php echo $user_deck->getName();?> permanently!</div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                            <form action="deck_manager/index.php" method = "post"> <input type="hidden" name="controllerRequest" value="delete_deck">
                            <input type="hidden" name="deck_id" value='<?php echo $user_deck->getID();?>'><button type="submit" class="btn btn-danger">Delete Deck</button></form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                <?php endforeach; ?>
                </tr>
              </tbody>
            </table>
        </div>
      </div>
    </div>
</main>
<?php require_once '../view/footer.php';?>
