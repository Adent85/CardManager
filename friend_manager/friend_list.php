<!--

Copyright Mar 26, 2022 Kyle Fisk

-->
<?php require_once '../view/header.php';?><br>
<main class="container" style="height: 100vh;">
    <div class="card" style='background-color: #ADD8E6;'>
      <div class="card-header">
          <h1 class='text-center p-2'>Friends</h1>
      </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered border-dark">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Friend Name</th>
                            <th scope="col">View Friend's Decks</th>
                            <th scope="col">Delete Friend</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($currentFriends as $friend) : ?>
                        <tr>
                            <th scope="row"><?php echo $friend->getID();?></th>
                            <td><?php echo $friend->getFirstName()." ".$friend->getLastName();?></td>
                            <td><form action="trade_manager/index.php" method = "post"> <input type="hidden" name="controllerRequest" value="view_decks_for_trade"><input type="hidden" name="friend_id" value='<?php echo $friend->getID();?>'>
                                <button type="submit" class="btn btn-primary">View <?php echo $friend->getFirstName()?>'s Decks</button></form></td>
                            <td><button type="button" class="btn btn-danger" data-mdb-toggle="modal" data-mdb-target="#deleteFriendModal<?php echo $friend->getID();?>">Remove Friend</button><div class="modal fade" id="deleteFriendModal<?php echo $friend->getID();?>" tabindex="-1" aria-labelledby="deleteFriendModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title text-danger" id="deleteFriendModalLabel">Remove Friend!!!</h5>
                                      <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-danger">Confirm that you want to delete <?php echo $friend->getFirstName()." ".$friend->getLastName();?> as a friend permanently!</div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                                      <form action="friend_manager/index.php" method = "post"> <input type="hidden" name="controllerRequest" value="remove_friend">
                                      <input type="hidden" name="friend_id" value='<?php echo $friend->getID();?>'><button type="submit" class="btn btn-danger">Remove Friend</button></form>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?php require_once '../view/footer.php';?>