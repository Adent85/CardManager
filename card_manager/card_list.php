
<!--

Copyright Feb 12, 2022 Kyle Fisk

-->
<?php require_once '../view/header.php';?>
<main>
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Level</th>
      <th scope="col">Hp</th>
      <th scope="col">Evolves From</th>
      <th scope="col">Evolves To</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($cards as $card) : ?>
    <tr>
      <th scope="row"><?php$card->getId()?></th>
      <td><?php$card->getName()?></td>
      <td><?php$card->getLevel()?></td>
      <td><?php$card->getHp()?></td>
      <td><?php$card->getEvolvesFrom()?></td>
      <td><?php$card->getEvolvesTo()?></td>
    <?php endforeach; ?>
    </tr>
  </tbody>
</table>
</main>
<?php require_once '../view/footer.php';?>