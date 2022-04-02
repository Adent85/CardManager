<!--

Copyright Mar 6, 2022 Kyle Fisk

-->
<?php require_once '../view/header.php';?><br>
<main class="container" style="height: 100vh;">
    <div class="card" style='background-color: #ADD8E6;'>
      <div class="card-body">
          <form action="deck_manager/index.php" method="post">
              <input type="hidden" name="controllerRequest" value="update_deck">             
            <div class="form-outline mb-4">
                <input type="text" id="deckName" name="deckName" class="form-control" value="<?php echo $deck->getName();?>" required/>
                <label class="form-label" for="deckName">Name of Deck</label>
            </div>
            <div class="form-outline mb-4">
                <input type="text" id="deckDescription" name="deckDescription" class="form-control" value="<?php echo $deck->getDescription();?>" required/>
                <label class="form-label" for="deckDescription">Description of Deck</label>
            </div><br>
            <button type="submit" class="btn btn-primary btn-block">Update Deck</button>
          </form>
          <a class="btn btn-primary" href="deck_manager/?controllerRequest=view_decks" role="button">Back</a>
      </div>
    </div>
</main>
<?php require_once '../view/footer.php';?>
