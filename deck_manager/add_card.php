<!--

Copyright Mar 12, 2022 Kyle Fisk

-->
<?php require_once '../view/header.php';?><br>
<main class="container" style="height: 100%;">
    <div class="card align-items-center">
        <h1 class = "text-center p-2">Add card to <?php echo $deck->getName();?></h1>
    </div>
    <br>
    <?php foreach ($pokemonCards as $card) : ?>
    <div>
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

                <form action="deck_manager/index.php" method = "post"> <input type="hidden" name="controllerRequest" value="add_card">
                    <input type="hidden" name="deck_id" value='<?php echo $deck->getID();?>'>
                    <input type="hidden" name="card_id" value='<?php echo $card->getID();?>'>
                    <button type="submit" class="btn btn-primary btn-block">Add Card to Deck</button>
                </form>
            </div>
        </div>
    <br>
    </div>
    <?php endforeach; ?>
    <div class="card align-items-center p-1" style='background-color: #ADD8E6;'>
        <nav aria-label="Page navigation">
          <ul class="pagination">
            <?php if($pageNumber >=2 ){?>
            <li class="page-item">
                <form action="deck_manager/index.php" method = "post"> <input type="hidden" name="controllerRequest" value="previous_page">
                    <input type="hidden" name="deck_id" value='<?php echo $deck->getID();?>'>
                    <input type="hidden" name="page_number" value='<?php echo $pageNumber-1;?>'>
                    <button type="submit" class="page-link">Previous</button>
                </form>
            </li>
            <?php } ?>
            <?php if($pageNumber >=2 ){?>
            <li class="page-item">
                <form action="deck_manager/index.php" method = "post"> <input type="hidden" name="controllerRequest" value="to_page">
                    <input type="hidden" name="deck_id" value='<?php echo $deck->getID();?>'>
                    <input type="hidden" name="page_number" value='<?php echo $pageNumber-1;?>'>
                    <button type="submit" class="page-link"><?php echo $pageNumber-1;?></button>
                </form>
            </li>
            <?php } ?>
            <li class="page-item active">
                <form action="deck_manager/index.php" method = "post"> <input type="hidden" name="controllerRequest" value="to_page">
                    <input type="hidden" name="deck_id" value='<?php echo $deck->getID();?>'>
                    <input type="hidden" name="page_number" value='<?php echo $pageNumber;?>'>
                    <button type="submit" class="page-link"><?php echo $pageNumber;?></button>
                </form>
            </li>
            <?php if($pageNumber <=24 ){?>
            <li class="page-item">
                <form action="deck_manager/index.php" method = "post"> <input type="hidden" name="controllerRequest" value="to_page">
                    <input type="hidden" name="deck_id" value='<?php echo $deck->getID();?>'>
                    <input type="hidden" name="page_number" value='<?php echo $pageNumber+2;?>'>
                    <button type="submit" class="page-link"><?php echo $pageNumber+1;?></button>
                </form>
            </li>
            <?php } ?>
            <?php if($pageNumber <25 ){?>
            <li class="page-item">
                <form action="deck_manager/index.php" method = "post"> <input type="hidden" name="controllerRequest" value="next_page">
                    <input type="hidden" name="deck_id" value='<?php echo $deck->getID();?>'>
                    <input type="hidden" name="page_number" value='<?php echo $pageNumber+1;?>'>
                    <button type="submit" class="page-link">Next</button>
                </form>
            </li>
            <?php } ?>
          </ul>
        </nav>
    </div>
</main>
<?php require_once '../view/footer.php';?>