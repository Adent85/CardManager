<!--

Copyright Mar 14, 2022 Kyle Fisk

-->
<?php require_once '../view/header.php';?><br>
<main class="container" style="height: 100%;">
    <div class="card align-items-center">
        <h1 class = "text-center p-2">Card's in <?php echo $deck->getName();?></h1>
    </div>
    
    <?php foreach ($cards as $card) : ?>
    <div class="col-md">
        <div class="card align-items-center" style='background-color: #ADD8E6;'>
            <div class="col-md-4">
                <br>
                <div class="bg-image hover-overlay">
                    <img src="<?php echo $card->getCardPicture();?>" class="card-img-top img-fluid img-thumbnail" alt="<?php echo $card->getName();?>"/>
                        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6)">
                            <div class="d-flex flex-column justify-content-center align-items-center h-100">
                                <h2 class="text-white mb-0">Attributes</h2><br />
                                <p class="text-white mb-0">HP: <?php echo $card->getHp();?></p>
                                <p class="text-white mb-0">Attack: <?php echo $card->getAttribute1()->getName();?></p>
                                <p class="text-white mb-0 p-2"><?php echo $card->getAttribute1()->getDescription();?></p>
                                <p class="text-white mb-0">Attack Damage: <?php echo $card->getAttribute1()->getValue();?></p>
                            </div>
                        </div>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title text-center"><?php echo $card->getName();?></h5>
                <p class="card-text text-center"><?php echo $card->getDescription();?></p>
                    <button type="button" class="btn btn-danger btn-block" data-mdb-toggle="modal" data-mdb-target="#deleteCardModal<?php echo $card->getID();?>">Remove Card from Deck</button>
                    <div class="modal fade" id="deleteCardModal<?php echo $card->getID();?>" tabindex="-1" aria-labelledby="deleteCardModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title text-danger" id="deleteCardModalLabel">Delete Card!!!</h5>
                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body text-danger">Confirm that you want to Remove <?php echo $card->getName();?> from <?php echo $deck->getName();?> permanently!</div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                            <form action="deck_manager/index.php" method = "post"> <input type="hidden" name="controllerRequest" value="delete_card">
                            <input type="hidden" name="deck_id" value='<?php echo $deck->getID();?>'>
                            <input type="hidden" name="card_id" value='<?php echo $card->getID();?>'><button type="submit" class="btn btn-danger">Remove Card from Deck</button></form>
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
