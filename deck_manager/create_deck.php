<!--

Copyright Feb 27, 2022 Kyle Fisk

-->
<?php if (isset($_SESSION['user'])) {$user=$_SESSION['user'];$userName= $user->getFirstName()." ".$user->getLastName();} else {$userName='';}?>
<?php require_once '../model/utility.php';?>
<?php require_once '../view/header.php';?><br>
<main class="container" style="height: 100vh;">
    <div class="card" style='background-color: #ADD8E6;'>
      <div class="card-header">
          <h1 class="text-center">Create New Deck</h1> 
      </div>
      <div class="card-body">
          <form action="deck_manager/index.php" method="post">
              <input type="hidden" name="controllerRequest" value="insert_deck">             
            <div>
                <label>Select a Deck Type</label>
                <select class="form-select"  name="selectedDeckTypeID" aria-label="Select Deck Type">
                    <option value="" disabled selected>Select Deck Type...</option>
                  <?php foreach ($deck_types as $deck_type) : ?>
                  <option value='<?php echo $deck_type->getID();?>'><?php echo $deck_type->getName();?></option>
                  <?php endforeach; ?>
                </select>
            </div><br>
            <div class="form-outline mb-4">
                <input type="text" id="deckName" name="deckName" class="form-control bg-white" required/>
                <label class="form-label" for="deckName">Name of Deck</label>
            </div>
            <div class="form-outline mb-4">
                <input type="text" id="deckDescription" name="deckDescription" class="form-control bg-white" required/>
                <label class="form-label" for="deckDescription">Description of Deck</label>
            </div><br>
            <button type="submit" class="btn btn-primary btn-block">Create Deck</button>
          </form>
      </div>
</div>
</main>
<?php require_once '../view/footer.php';?>
