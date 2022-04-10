
<!--

Copyright Apr 3, 2022 Kyle Fisk

-->
<?php require_once '../view/header.php';?><br>
<main class="container" style="height: 100vh;">
    <div class="container">
      <div class="row">
        <div class="col">
          <?php if($trade_request->getTrade_recipient_card() != null){?>
            <h1 class = "text-center"> Initial Trade Request</h1>
            <div class="col-lg">
                <div class="card align-items-center" style='background-color: #ADD8E6;'>
                    <div class="col-lg">
                        <br>
                        <div class="bg-image hover-overlay">
                            <img src="<?php echo $trade_request->getTrade_recipient_card()->getCardPicture();?>" class="card-img-top img-fluid img-thumbnail" alt="<?php echo $trade_request->getTrade_recipient_card()->getName();?>"/>
                                <div class="mask" style="background-color: rgba(0, 0, 0, 0.6)">
                                    <div class="d-flex flex-column justify-content-center align-items-center h-100">
                                        <h2 class="text-white mb-0">Attributes</h2><br />
                                        <p class="text-white mb-0">php code for card attributes</p><br >
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center"><?php echo $trade_request->getTrade_recipient_card()->getName();?></h5>
                        <p class="card-text text-center"><?php echo $trade_request->getTrade_recipient_card()->getDescription();?></p>
                    </div>
                </div>
            <br>
            </div>
          <?php }else{?>
              <h1 class = "text-center">Find Cards To Trade</h1>
              <div class="col-lg">
                  <div class="card align-items-center" style='background-color: #ADD8E6;'>
                        <form action="trade_manager/index.php" method = "post"> <input type="hidden" name="controllerRequest" value="find_card_Initiate_trade">
                        <button type="submit" class="btn btn-success">Find Cards to Trade</button></form>
                  </div>
              <br>
              </div>
          <?php } ?>
        </div>
        <div class="col">
            <?php if($trade_request->getTrade_initiator_card1() !=null){?>
              <h1 class = "text-center"> Initial Trade Request</h1>
              <div class="col-lg">
                  <div class="card align-items-center" style='background-color: #ADD8E6;'>
                      <div class="col-lg">
                          <br>
                          <div class="bg-image hover-overlay">
                              <img src="<?php echo $trade_request->getTrade_initiator_card1()->getCardPicture();?>" class="card-img-top img-fluid img-thumbnail" alt="<?php echo $trade_request->getTrade_recipient_card()->getName();?>"/>
                                  <div class="mask" style="background-color: rgba(0, 0, 0, 0.6)">
                                      <div class="d-flex flex-column justify-content-center align-items-center h-100">
                                          <h2 class="text-white mb-0">Attributes</h2><br />
                                          <p class="text-white mb-0">php code for card attributes</p><br >
                                      </div>
                                  </div>
                          </div>
                      </div>
                      <div class="card-body">
                          <h5 class="card-title text-center"><?php echo $trade_request->getTrade_initiator_card1()->getName();?></h5>
                          <p class="card-text text-center"><?php echo $trade_request->getTrade_initiator_card1()->getDescription();?></p>
                      </div>
                  </div>
              <br>
              </div>
            <?php }else{?>
              <h1 class = "text-center">Find Cards To Trade</h1>
              <div class="col-lg">
                  <div class="card align-items-center" style='background-color: #ADD8E6;'>
                        <form action="trade_manager/index.php" method = "post"> <input type="hidden" name="controllerRequest" value="find_card_to_trade">
                        <button type="submit" class="btn btn-success">Find Cards to Trade</button></form>
                  </div>
              <br>
              </div>
            <?php } ?>
        </div>
          <div class="col" style="height:100%">
            <?php if($trade_request->getTrade_initiator_card2() !=null){?>
              <h1 class = "text-center"> Initial Trade Request</h1>
              <div class="col-lg">
                  <div class="card align-items-center" style='background-color: #ADD8E6;'>
                      <div class="col-lg">
                          <br>
                          <div class="bg-image hover-overlay">
                              <img src="<?php echo $trade_request->getTrade_initiator_card2()->getCardPicture();?>" class="card-img-top img-fluid img-thumbnail" alt="<?php echo $trade_request->getTrade_recipient_card()->getName();?>"/>
                                  <div class="mask" style="background-color: rgba(0, 0, 0, 0.6)">
                                      <div class="d-flex flex-column justify-content-center align-items-center h-100">
                                          <h2 class="text-white mb-0">Attributes</h2><br />
                                          <p class="text-white mb-0">php code for card attributes</p><br >
                                      </div>
                                  </div>
                          </div>
                      </div>
                      <div class="card-body">
                          <h5 class="card-title text-center"><?php echo $trade_request->getTrade_initiator_card2()->getName();?></h5>
                          <p class="card-text text-center"><?php echo $trade_request->getTrade_initiator_card2()->getDescription();?></p>
                      </div>
                  </div>
              <br>
              </div>
            <?php }if($trade_request->getTrade_initiator_card1() !=null && $trade_request->getTrade_initiator_card2() == null){?>
              <h1 class = "text-center">Find Cards To Trade</h1>
                  <div class="card align-items-center" style='background-color: #ADD8E6;'>
                      <div class="col-lg">
                        <form action="trade_manager/index.php" method = "post"> <input type="hidden" name="controllerRequest" value="find_card2_to_trade">
                        <button type="submit" class="btn btn-success">Find Cards to Trade</button></form>
                      </div>
                  </div>
            <?php } ?>
        </div>
      </div>
        <?php if($trade_request->getTrade_initiator_card1() !=null){?>
        <div class="container d-flex justify-content-center">
            <form action="trade_manager/index.php" method = "post"> <input type="hidden" name="controllerRequest" value="purpose_trade">
            <button type="submit" class="btn btn-success">Purpose Trade</button></form>
        </div>
        <?php } ?>
    </div>
</main>
<?php require_once '../view/footer.php';?>
