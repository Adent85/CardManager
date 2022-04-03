<!--

Copyright Mar 12, 2022 Kyle Fisk

-->
<?php require_once '../view/header.php';?><br>
<main class="container" style="height: 100%;">
    <h1 class = "text-center">Add card to <?php echo $deck->getName();?></h1>
    <?php foreach ($cards as $card) : ?>
    <div>
        <div class="card align-items-center" style='background-color: #ADD8E6;'>
            <div class="col-md-4">
                <br>
                <img src="<?php echo $card->getCardPicture();?>" class="card-img-top img-fluid img-thumbnail" alt="<?php echo $card->getName();?>"/>
            </div>
            <div class="card-body">
                <h5 class="card-title text-center"><?php echo $card->getName();?></h5>
                <p class="card-text text-center"><?php echo $card->getDescription();?></p>
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
</main>
<?php require_once '../view/footer.php';?>