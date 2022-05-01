
<!--

Copyright Apr 3, 2022 Kyle Fisk

-->
<?php require_once '../view/header.php';?><br>
<main class="container" style="height: 100vh;">
    <div class="container">
      <div class="row">
        <div class="col">
          <?php if($purposed_trade->getTrade_recipient_card() != null){?>
            <div class="card align-items-center" style='background-color: #ADD8E6;'>
                <h1 class = "text-center p-2">Desired Card</h1>
            </div>
            <br>
            <div class="col-lg">
                <div class="card align-items-center" style='background-color: #ADD8E6;'>
                    <div class="col-lg">
                        <br>
                        <div class="bg-image hover-overlay">
                            <img src="<?php echo $purposed_trade->getTrade_recipient_card()->getCardPicture();?>" class="card-img-top img-fluid img-thumbnail" alt="<?php echo $purposed_trade->getTrade_recipient_card()->getName();?>"/>
                                <div class="mask" style="background-color: rgba(0, 0, 0, 0.6)">
                                    <div class="d-flex flex-column justify-content-center align-items-center h-100">
                                        <h2 class="text-white mb-0">Attributes</h2><br />
                                        <p class="text-white mb-0">HP: <?php echo $purposed_trade->getTrade_recipient_card()->getHp();?></p>
                                        <p class="text-white mb-0">Attack: <?php echo $purposed_trade->getTrade_recipient_card()->getAttribute1()->getName();?></p>
                                        <p class="text-white mb-0 p-2"><?php echo $purposed_trade->getTrade_recipient_card()->getAttribute1()->getDescription();?></p>
                                        <p class="text-white mb-0">Attack Damage: <?php echo $purposed_trade->getTrade_recipient_card()->getAttribute1()->getValue();?></p>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center"><?php echo $purposed_trade->getTrade_recipient_card()->getName();?></h5>
                        <p class="card-text text-center"><?php echo $purposed_trade->getTrade_recipient_card()->getDescription();?></p>
                    </div>
                </div>
            <br>
            </div>
          <?php }else{?>
            <div class="card align-items-center" style='background-color: #ADD8E6;'>
                <h1 class = "text-center p-2">Find Cards To Trade</h1>
            </div>
            <br>
              <div class="col-lg">
                  <div class="card align-items-center" style='background-color: #ADD8E6;'>
                        <form action="trade_manager/index.php" method = "post"> <input type="hidden" name="controllerRequest" value="find_card_Initiate_trade">
                        <button type="submit" class="btn btn-success m-5">Find Cards to Trade</button></form>
                  </div>
              <br>
              </div>
          <?php } ?>
        </div>
        <div class="col">
            <?php if($purposed_trade->getTrade_initiator_card1() !=null){?>
            <div class="card align-items-center" style='background-color: #ADD8E6;'>
                <h1 class = "text-center p-2">Purposed Card</h1>
            </div>
            <br>
              <div class="col-lg">
                  <div class="card align-items-center" style='background-color: #ADD8E6;'>
                      <div class="col-lg">
                          <br>
                          <div class="bg-image hover-overlay">
                              <img src="<?php echo $purposed_trade->getTrade_initiator_card1()->getCardPicture();?>" class="card-img-top img-fluid img-thumbnail" alt="<?php echo $purposed_trade->getTrade_recipient_card()->getName();?>"/>
                                  <div class="mask" style="background-color: rgba(0, 0, 0, 0.6)">
                                      <div class="d-flex flex-column justify-content-center align-items-center h-100">
                                          <h2 class="text-white mb-0">Attributes</h2><br />
                                          <p class="text-white mb-0">HP: <?php echo $purposed_trade->getTrade_initiator_card1()->getHp();?></p>
                                          <p class="text-white mb-0">Attack: <?php echo $purposed_trade->getTrade_initiator_card1()->getAttribute1()->getName();?></p>
                                          <p class="text-white mb-0 p-2"><?php echo $purposed_trade->getTrade_initiator_card1()->getAttribute1()->getDescription();?></p>
                                          <p class="text-white mb-0">Attack Damage: <?php echo $purposed_trade->getTrade_initiator_card1()->getAttribute1()->getValue();?></p>
                                      </div>
                                  </div>
                          </div>
                      </div>
                      <div class="card-body">
                          <h5 class="card-title text-center"><?php echo $purposed_trade->getTrade_initiator_card1()->getName();?></h5>
                          <p class="card-text text-center"><?php echo $purposed_trade->getTrade_initiator_card1()->getDescription();?></p>
                      </div>
                  </div>
              <br>
              </div>
            <?php }else{?>
            <div class="card align-items-center" style='background-color: #ADD8E6;'>
              <h1 class = "text-center p-2">Find Cards To Trade</h1>
            </div>
            <br>
              <div class="col-lg">
                  <div class="card align-items-center" style='background-color: #ADD8E6;'>
                        <form action="trade_manager/index.php" method = "post"> <input type="hidden" name="controllerRequest" value="find_card_to_trade">
                        <button type="submit" class="btn btn-success m-5">Find Cards to Trade</button></form>
                  </div>
              <br>
              </div>
            <?php } ?>
        </div>
          <div class="col" style="height:100%">
            <?php if($purposed_trade->getTrade_initiator_card2() !=null){?>
              <div class="card align-items-center" style='background-color: #ADD8E6;'>
                  <h1 class = "text-center p-2">Purposed Card</h1>
              </div>
              <br>
              <div class="col-lg">
                  <div class="card align-items-center" style='background-color: #ADD8E6;'>
                      <div class="col-lg">
                          <br>
                          <div class="bg-image hover-overlay">
                              <img src="<?php echo $purposed_trade->getTrade_initiator_card2()->getCardPicture();?>" class="card-img-top img-fluid img-thumbnail" alt="<?php echo $purposed_trade->getTrade_recipient_card()->getName();?>"/>
                                  <div class="mask" style="background-color: rgba(0, 0, 0, 0.6)">
                                      <div class="d-flex flex-column justify-content-center align-items-center h-100">
                                          <h2 class="text-white mb-0">Attributes</h2><br />
                                          <p class="text-white mb-0">HP: <?php echo $purposed_trade->getTrade_initiator_card2()->getHp();?></p>
                                          <p class="text-white mb-0">Attack: <?php echo $purposed_trade->getTrade_initiator_card2()->getAttribute1()->getName();?></p>
                                          <p class="text-white mb-0 p-2"><?php echo $purposed_trade->getTrade_initiator_card2()->getAttribute1()->getDescription();?></p>
                                          <p class="text-white mb-0">Attack Damage: <?php echo $purposed_trade->getTrade_initiator_card2()->getAttribute1()->getValue();?></p>
                                      </div>
                                  </div>
                          </div>
                      </div>
                      <div class="card-body">
                          <h5 class="card-title text-center"><?php echo $purposed_trade->getTrade_initiator_card2()->getName();?></h5>
                          <p class="card-text text-center"><?php echo $purposed_trade->getTrade_initiator_card2()->getDescription();?></p>
                      </div>
                  </div>
              <br>
              </div>
            <?php }if($purposed_trade->getTrade_initiator_card1() !=null && $purposed_trade->getTrade_initiator_card2() == null){?>
              <div class="card align-items-center" style='background-color: #ADD8E6;'>
                  <h1 class = "text-center p-2">Find Cards To Trade</h1>
              </div>
              <br>
                  <div class="card align-items-center" style='background-color: #ADD8E6;'>
                      <div class="col-lg">
                        <form action="trade_manager/index.php" method = "post"> <input type="hidden" name="controllerRequest" value="find_card2_to_trade">
                        <button type="submit" class="btn btn-success m-5">Find Cards to Trade</button></form>
                      </div>
                  </div>
            <?php } ?>
        </div>
      </div>
        <?php if($purposed_trade->getTrade_initiator_card1() !=null){?>
        <div class="container d-flex justify-content-center">
            <form action="trade_manager/index.php" method = "post"> <input type="hidden" name="controllerRequest" value="purpose_trade">
            <button type="submit" class="btn btn-success">Purpose Trade</button></form>
        </div>
        <?php } ?>
    </div>
</main>
<?php require_once '../view/footer.php';?>
