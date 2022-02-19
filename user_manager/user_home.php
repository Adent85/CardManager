<!DOCTYPE html>
<!--

Copyright Feb 4, 2022 Kyle Fisk

-->
<?php require_once '../view/header.php';?>
<main>
<div class="border border-white">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="card_manager/?controllerRequest=show_card_list">Card List</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Deck List</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Friend List</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled">Disabled</a>
      </li>
    </ul>
</div>
<a  aria-current="page" href="card_manager/?controllerRequest=show_card_list">Card List</a>
</main>
<?php require_once '../view/footer.php';?>