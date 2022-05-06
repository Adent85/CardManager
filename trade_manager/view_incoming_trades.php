<!--

Copyright Apr 30, 2022 Kyle Fisk

-->
<?php require_once '../view/header.php';?><br>
<main class="container" style="height: 100vh;">
    <div class="card" style='background-color: #ADD8E6;'>
        <h1 class = "text-center"><?php echo $user->getFirstName();?>'s List of Incoming Trades</h1>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered border-dark">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Friend</th>
                  <th scope="col">Desired Card</th>
                  <th scope="col">Card 1 Trading</th>
                  <th scope="col">Card 2 Trading</th>
                  <th scope="col">View</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($incoming_trades as $incoming_trade) : ?>
                <?php $userFriend = user_db::getUserByID($incoming_trade->getTrade_initiator_id());?>
                <tr>
                  <th scope="row"><?php echo $incoming_trade->getID();?></th>
                  <td><?php echo $userFriend->getFirstName();?></td>
                  <td><?php echo $incoming_trade->getTrade_recipient_card()->getName();?></td>
                  <td><?php echo $incoming_trade->getTrade_initiator_card1()->getName();?></td>
                  <td><?php if($incoming_trade->getTrade_initiator_card2() != null){?>
                      <?php echo $incoming_trade->getTrade_initiator_card2()->getName();?>
                  <?php }else{?>
                      None
                  <?php } ?></td>
                  <td><button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#tradeModal<?php echo $incoming_trade->getID();?>">View Trade</button>
                    <div class="modal fade" id="tradeModal<?php echo $incoming_trade->getID();?>" tabindex="-1" aria-labelledby="tradeModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                          <div class="modal-header bg-success">
                            <h5 class="modal-title" id="tradeModalLabel">Incoming Trade</h5>
                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                          </div>
                            <div class="modal-body bg-success">
                                <div class="container">
                                  <div class="row">
                                    <div class="col">
                                        <h1 class = "text-center">Desired Card</h1>
                                        <div class="col-lg">
                                            <div class="card align-items-center" style='background-color: #ADD8E6;'>
                                                <div class="col-lg">
                                                    <br>
                                                    <div class="bg-image hover-overlay">
                                                        <img src="<?php echo $incoming_trade->getTrade_recipient_card()->getCardPicture();?>" class="card-img-top img-fluid img-thumbnail" alt="<?php echo $incoming_trade->getTrade_recipient_card()->getName();?>"/>
                                                            <div class="mask" style="background-color: rgba(0, 0, 0, 0.6)">
                                                                <div class="d-flex flex-column justify-content-center align-items-center h-100">
                                                                    <h2 class="text-white mb-0">Attributes</h2><br />
                                                                    <p class="text-white mb-0">HP: <?php echo $incoming_trade->getTrade_recipient_card()->getHp();?></p>
                                                                    <p class="text-white mb-0">Attack: <?php echo $incoming_trade->getTrade_recipient_card()->getAttribute1()->getName();?></p>
                                                                    <p class="text-white mb-0 p-2"><?php echo $incoming_trade->getTrade_recipient_card()->getAttribute1()->getDescription();?></p>
                                                                    <p class="text-white mb-0">Attack Damage: <?php echo $incoming_trade->getTrade_recipient_card()->getAttribute1()->getValue();?></p>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-title text-center"><?php echo $incoming_trade->getTrade_recipient_card()->getName();?></h5>
                                                    <p class="card-text text-center"><?php echo $incoming_trade->getTrade_recipient_card()->getDescription();?></p>
                                                </div>
                                            </div>
                                        <br>
                                        </div>
                                    </div>
                                    <div class="col">
                                          <h1 class = "text-center">Purposed Card</h1>
                                          <div class="col-lg">
                                              <div class="card align-items-center" style='background-color: #ADD8E6;'>
                                                  <div class="col-lg">
                                                      <br>
                                                      <div class="bg-image hover-overlay">
                                                          <img src="<?php echo $incoming_trade->getTrade_initiator_card1()->getCardPicture();?>" class="card-img-top img-fluid img-thumbnail" alt="<?php echo $incoming_trade->getTrade_recipient_card()->getName();?>"/>
                                                              <div class="mask" style="background-color: rgba(0, 0, 0, 0.6)">
                                                                  <div class="d-flex flex-column justify-content-center align-items-center h-100">
                                                                      <h2 class="text-white mb-0">Attributes</h2><br />
                                                                      <p class="text-white mb-0">HP: <?php echo $incoming_trade->getTrade_initiator_card1()->getHp();?></p>
                                                                      <p class="text-white mb-0">Attack: <?php echo $incoming_trade->getTrade_initiator_card1()->getAttribute1()->getName();?></p>
                                                                      <p class="text-white mb-0 p-2"><?php echo $incoming_trade->getTrade_initiator_card1()->getAttribute1()->getDescription();?></p>
                                                                      <p class="text-white mb-0">Attack Damage: <?php echo $incoming_trade->getTrade_initiator_card1()->getAttribute1()->getValue();?></p>
                                                                  </div>
                                                              </div>
                                                      </div>
                                                  </div>
                                                  <div class="card-body">
                                                      <h5 class="card-title text-center"><?php echo $incoming_trade->getTrade_initiator_card1()->getName();?></h5>
                                                      <p class="card-text text-center"><?php echo $incoming_trade->getTrade_initiator_card1()->getDescription();?></p>
                                                  </div>
                                              </div>
                                          <br>
                                          </div>
                                    </div>
                                      <div class="col" style="height:100%">
                                        <?php if($incoming_trade->getTrade_initiator_card2() !=null){?>
                                          <h1 class = "text-center">Purposed Card</h1>
                                          <div class="col-lg">
                                              <div class="card align-items-center" style='background-color: #ADD8E6;'>
                                                  <div class="col-lg">
                                                      <br>
                                                      <div class="bg-image hover-overlay">
                                                          <img src="<?php echo $incoming_trade->getTrade_initiator_card2()->getCardPicture();?>" class="card-img-top img-fluid img-thumbnail" alt="<?php echo $incoming_trade->getTrade_recipient_card()->getName();?>"/>
                                                              <div class="mask" style="background-color: rgba(0, 0, 0, 0.6)">
                                                                  <div class="d-flex flex-column justify-content-center align-items-center h-100">
                                                                      <h2 class="text-white mb-0">Attributes</h2><br />
                                                                      <p class="text-white mb-0">HP: <?php echo $incoming_trade->getTrade_initiator_card2()->getHp();?></p>
                                                                      <p class="text-white mb-0">Attack: <?php echo $incoming_trade->getTrade_initiator_card2()->getAttribute1()->getName();?></p>
                                                                      <p class="text-white mb-0 p-2"><?php echo $incoming_trade->getTrade_initiator_card2()->getAttribute1()->getDescription();?></p>
                                                                      <p class="text-white mb-0">Attack Damage: <?php echo $incoming_trade->getTrade_initiator_card2()->getAttribute1()->getValue();?></p>
                                                                  </div>
                                                              </div>
                                                      </div>
                                                  </div>
                                                  <div class="card-body">
                                                      <h5 class="card-title text-center"><?php echo $incoming_trade->getTrade_initiator_card2()->getName();?></h5>
                                                      <p class="card-text text-center"><?php echo $incoming_trade->getTrade_initiator_card2()->getDescription();?></p>
                                                  </div>
                                              </div>
                                          <br>
                                          </div>
                                        <?php }?>
                                    </div>
                                  </div>
                                </div>
                            </div>
                          <div class="modal-footer bg-success">
                            <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                                <form action="trade_manager/index.php" method = "post"> 
                                    <input type="hidden" name="controllerRequest" value="deny_trade">
                                    <input type="hidden" name="trade_id" value='<?php echo $incoming_trade->getID();?>'>
                                    <button type="submit" class="btn btn-danger">Deny Trade</button>
                                </form>
                            <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#acceptTradeModal">Accept Trade</button>
                          </div>
                        </div>
                      </div>
                    </div>
                      <div class="modal fade" id="acceptTradeModal" tabindex="-1" aria-labelledby="acceptTradeModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title text-danger" id="acceptTradeModalLabel">Accept Trade!!!</h5>
                                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body text-danger">Confirm that you want to Accept the purposed trade!</div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                                <form action="trade_manager/index.php" method = "post"> 
                                    <input type="hidden" name="controllerRequest" value="accept_trade">
                                    <input type="hidden" name="trade_id" value='<?php echo $incoming_trade->getID();?>'>
                                    <button type="submit" class="btn btn-primary">Accept Trade</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                  </td>
                <?php endforeach; ?>
                </tr>
              </tbody>
            </table>
        </div>
    </div>
</main>
<?php require_once '../view/footer.php';?>
