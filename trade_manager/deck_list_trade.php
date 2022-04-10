<!--

Copyright Apr 10, 2022 Kyle Fisk

-->
<?php require_once '../view/header.php';?><br>
<main class="container" style="height: 100vh;">
    <div class="card" style='background-color: #ADD8E6;'>
        <h1 class = "text-center"><?php echo $user->getFirstName();?>'s List of Decks</h1>
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
                <?php foreach ($user_decks as $user_deck) : ?>
                <tr>
                  <th scope="row"><?php echo $user_deck->getID();?></th>
                  <td><?php echo $user_deck->getName();?></td>
                  <td><?php echo $user_deck->getDescription();?></td>
                  <td><form action="trade_manager/index.php" method = "post"> <input type="hidden" name="controllerRequest" value="view_deck_trade">
                    <input type="hidden" name="deck_id" value='<?php echo $user_deck->getID();?>'><button type="submit" class="btn btn-primary">View Cards</button></form></td>
                <?php endforeach; ?>
                </tr>
              </tbody>
            </table>
        </div>
    </div>
</main>
<?php require_once '../view/footer.php';?>
