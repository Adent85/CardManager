<!--

Copyright Apr 2, 2022 Kyle Fisk

-->
<?php require_once '../view/header.php';?><br>
<main class="container" style="height: 100%;">
    <div class="card align-items-center" style='background-color: #ADD8E6;'>
    <h1 class = "text-center p-2">Card's in <?php echo $friend_deck->getName();?></h1>
    </div>
    <?php foreach ($friend_cards as $friend_card) : ?>
    <div class="col-md">
        <div class="card align-items-center" style='background-color: #ADD8E6;'>
            <div class="col-md-4">
                <br>
                <div class="bg-image hover-overlay">
                    <img src="<?php echo $friend_card->getCardPicture();?>" class="card-img-top img-fluid img-thumbnail" alt="<?php echo $friend_card->getName();?>"/>
                        <div class="mask" style="background-color: rgba(0, 0, 0, 0.6)">
                            <div class="d-flex flex-column justify-content-center align-items-center h-100">
                                <h2 class="text-white mb-0">Attributes</h2><br />
                                <p class="text-white mb-0">HP: <?php echo $friend_card->getHp();?></p>
                                <p class="text-white mb-0">Attack: <?php echo $friend_card->getAttribute1()->getName();?></p>
                                <p class="text-white mb-0 p-2"><?php echo $friend_card->getAttribute1()->getDescription();?></p>
                                <p class="text-white mb-0">Attack Damage: <?php echo $friend_card->getAttribute1()->getValue();?></p>
                            </div>
                        </div>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title text-center"><?php echo $friend_card->getName();?></h5>
                <p class="card-text text-center"><?php echo $friend_card->getDescription();?></p>
                    <button type="button" class="btn btn-success btn-block" data-mdb-toggle="modal" data-mdb-target="#tradeCardModal<?php echo $friend_card->getID();?>">Initiate Card Trade</button>
                    <div class="modal fade" id="tradeCardModal<?php echo $friend_card->getID();?>" tabindex="-1" aria-labelledby="tradeCardModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title text-danger" id="tradeCardModalLabel">Initiate Trade</h5>
                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body ">Confirm you want to start a trade for <?php echo $friend_card->getName();?> from <?php echo $friend_deck->getName();?></div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                            <form action="trade_manager/index.php" method = "post"> <input type="hidden" name="controllerRequest" value="initiate_friend_card_trade">
                            <input type="hidden" name="trade_friend_deck" value='<?php echo $friend_deck->getID();?>'>
                            <input type="hidden" name="trade_friend_card" value='<?php echo $friend_card->getID();?>'><button type="submit" class="btn btn-success">Start Trade</button></form>
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
