<!--

Copyright Apr 2, 2022 Kyle Fisk

-->
<?php require_once '../view/header.php';?><br>
<main class="container" style="height: 100%;">
    <h1 class = "text-center">Card's in <?php echo $friend_deck->getName();?></h1>
    <?php foreach ($friend_cards as $friend_card) : ?>
    <div class="col-md">
        <div class="card align-items-center" style='background-color: #ADD8E6;'>
            <div class="col-md-4">
                <br>
                <img src="<?php echo $friend_card->getCardPicture();?>" class="card-img-top img-fluid img-thumbnail" alt="<?php echo $friend_card->getName();?>"/>
            </div>
            <div class="card-body">
                <h5 class="card-title text-center"><?php echo $friend_card->getName();?></h5>
                <p class="card-text text-center"><?php echo $friend_card->getDescription();?></p>
                    <button type="button" class="btn btn-danger btn-block" data-mdb-toggle="modal" data-mdb-target="#deleteCardModal<?php echo $friend_card->getID();?>">Remove Card from Deck</button><div class="modal fade" id="deleteCardModal<?php echo $friend_card->getID();?>" tabindex="-1" aria-labelledby="deleteCardModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title text-danger" id="deleteCardModalLabel">Delete Card!!!</h5>
                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body text-danger">Confirm that you want to Remove <?php echo $friend_card->getName();?> from <?php echo $friend_deck->getName();?> permanently!</div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                            <form action="deck_manager/index.php" method = "post"> <input type="hidden" name="controllerRequest" value="delete_card">
                            <input type="hidden" name="deck_id" value='<?php echo $friend_deck->getID();?>'>
                            <input type="hidden" name="card_id" value='<?php echo $friend_card->getID();?>'><button type="submit" class="btn btn-danger">Remove Card from Deck</button></form>
                          </div>
                        </div>
                      </div>
                    </div>
            </div>
        </div>
    <br>
    </div>
    <?php endforeach; ?>
</main>
<?php require_once '../view/footer.php';?>
