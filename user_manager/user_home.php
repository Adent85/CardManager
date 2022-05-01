<!--

Copyright Feb 4, 2022 Kyle Fisk

-->
<?php if (isset($_SESSION['user'])&& $_SESSION['user']!=false) {$user=$_SESSION['user'];$userName= $user->getFirstName()." ".$user->getLastName();} else {$userName='';}?>
<?php require_once '../model/utility.php';?>
<?php require_once '../view/header.php';?><br>
<main class="container" style="height: 100vh;">
    <div class = "card align-items-center" style='background-color: #ADD8E6;'>
        <div class="card-header">
            <h1 class="text-center p-2" id="home_h1"><?php echo $user->getFirstName();?>'s Home</h1>
        </div>
        <div class="card-body" style="width: 100%; background-color: #52c5eb;">
            <div class="row">
                <div class="col-md-4">
                    <div id="news" class="ms-5">
                    <!-- start sw-rss-feed code --> 
                    <script type="text/javascript"> 
                    <!-- 
                    rssfeed_url = new Array(); 
                    rssfeed_url[0]="https://www.sciencedaily.com/rss/top/science.xml";  
                    rssfeed_frame_width="230"; 
                    rssfeed_frame_height="660"; 
                    rssfeed_scroll="on"; 
                    rssfeed_scroll_step="6"; 
                    rssfeed_scroll_bar="off"; 
                    rssfeed_target="_blank"; 
                    rssfeed_font_size="12"; 
                    rssfeed_font_face=""; 
                    rssfeed_border="on"; 
                    rssfeed_css_url=""; 
                    rssfeed_title="on"; 
                    rssfeed_title_name=""; 
                    rssfeed_title_bgcolor="#000"; 
                    rssfeed_title_color="#fff"; 
                    rssfeed_title_bgimage=""; 
                    rssfeed_footer="off"; 
                    rssfeed_footer_name="rss feed"; 
                    rssfeed_footer_bgcolor="#fff"; 
                    rssfeed_footer_color="#333"; 
                    rssfeed_footer_bgimage=""; 
                    rssfeed_item_title_length="50"; 
                    rssfeed_item_title_color="#fff"; 
                    rssfeed_item_bgcolor="#000"; 
                    rssfeed_item_bgimage=""; 
                    rssfeed_item_border_bottom="on"; 
                    rssfeed_item_source_icon="off"; 
                    rssfeed_item_date="on"; 
                    rssfeed_item_description="on"; 
                    rssfeed_item_description_length="150"; 
                    rssfeed_item_description_color="#55a0ff"; 
                    rssfeed_item_description_link_color="#333"; 
                    rssfeed_item_description_tag="off"; 
                    rssfeed_no_items="0"; 
                    rssfeed_cache = "fdc520f97d55cdfa94e99ab240fbc3c5"; 
                    //--> 
                    </script> 
                    <script type="text/javascript" src="//feed.surfing-waves.com/js/rss-feed.js"></script> 
                    <!-- The link below helps keep this service FREE, and helps other people find the SW widget. Please be cool and keep it! Thanks. --> 
                    <div style="color:#ccc;font-size:10px; text-align:right; width:130px;">powered by <a href="https://surfing-waves.com" rel="noopener" target="_blank" style="color:#ccc;">Surfing Waves</a></div> 
                    <!-- end sw-rss-feed code -->
                    </div>
                </div>
                <div class="d-flex align-items-center col-md-4">
                  <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="v-pills-deck-tab" data-mdb-toggle="pill" data-mdb-target="#v-pills-deck" type="button" role="tab" aria-controls="v-pills-deck" aria-selected="true">Decks</button>
                    <button class="nav-link" id="v-pills-friend-tab" data-mdb-toggle="pill" data-mdb-target="#v-pills-friend" type="button" role="tab" aria-controls="v-pills-friend" aria-selected="false">Friends</button>
                    <button class="nav-link" id="v-pills-trade-tab" data-mdb-toggle="pill" data-mdb-target="#v-pills-trade" type="button" role="tab" aria-controls="v-pills-trade" aria-selected="false">Trades</button>
                    <?php if (utility::getUserRoleIdFromSession() == 2 ){?>
                    <button class="nav-link" id="v-pills-admin-tab" data-mdb-toggle="pill" data-mdb-target="#v-pills-admin" type="button" role="tab" aria-controls="v-pills-admin" aria-selected="false">Admin</button>
                    <?php } ?>
                  </div>
                  <div class="tab-content" id="v-pills-tabContent">
                      <div class="tab-pane fade p-2 show active" id="v-pills-deck" role="tabpanel" aria-labelledby="v-pills-deck-tab">
                          <div class="list-group border border-white">
                              <a href="deck_manager/?controllerRequest=create_deck" class="list-group-item list-group-item-action text-center">Create New Deck</a>
                              <a href="deck_manager/?controllerRequest=view_decks" class="list-group-item list-group-item-action text-center">Manage Decks</a>
                          </div>
                      </div>
                      <div class="tab-pane fade p-2" id="v-pills-friend" role="tabpanel" aria-labelledby="v-pills-friend-tab">
                          <div class="list-group border border-white">
                              <a href="friend_manager/?controllerRequest=view_users" class="list-group-item list-group-item-action text-center">Find Friends</a>
                              <a href="friend_manager/?controllerRequest=view_friends" class="list-group-item list-group-item-action text-center">Manage Friends</a>
                              <a href="friend_manager/?controllerRequest=friend_request" class="list-group-item list-group-item-action text-center">View Friend Requests</a>
                          </div>
                      </div>
                      <div class="tab-pane fade p-2" id="v-pills-trade" role="tabpanel" aria-labelledby="v-pills-trade-tab">
                        <div class="card-footer">
                            <div class="list-group border border-white">
                                <a href="trade_manager/?controllerRequest=view_purposed_trades" class="list-group-item list-group-item-action text-center">View Purposed Trade Status</a>
                                <a href="trade_manager/?controllerRequest=view_incoming_trades" class="list-group-item list-group-item-action text-center">View Incoming Trades</a>
                            </div>
                        </div>
                      </div>
                      <div class="tab-pane fade p-2" id="v-pills-admin" role="tabpanel" aria-labelledby="v-pills-admin-tab">
                        <div class="card-footer">
                            <div class="list-group border border-white">
                                <a href="user_manager/?controllerRequest=view_user_admin" class="list-group-item list-group-item-action text-center">View All Users</a>
                                <a href="deck_manager/?controllerRequest=view_card_type_admin" class="list-group-item list-group-item-action text-center">View Cards by Deck Type</a>
                            </div>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="col-md-2">
                    <div id="news">
                        <!-- start sw-rss-feed code --> 
                        <script type="text/javascript"> 
                        <!-- 
                        rssfeed_url = new Array(); 
                        rssfeed_url[0]="https://pokemonblog.com/feed/";  
                        rssfeed_frame_width="230"; 
                        rssfeed_frame_height="660"; 
                        rssfeed_scroll="on"; 
                        rssfeed_scroll_step="6"; 
                        rssfeed_scroll_bar="off"; 
                        rssfeed_target="_blank"; 
                        rssfeed_font_size="12"; 
                        rssfeed_font_face=""; 
                        rssfeed_border="on"; 
                        rssfeed_css_url=""; 
                        rssfeed_title="on"; 
                        rssfeed_title_name=""; 
                        rssfeed_title_bgcolor="#000"; 
                        rssfeed_title_color="#fff"; 
                        rssfeed_title_bgimage=""; 
                        rssfeed_footer="off"; 
                        rssfeed_footer_name="rss feed"; 
                        rssfeed_footer_bgcolor="#fff"; 
                        rssfeed_footer_color="#333"; 
                        rssfeed_footer_bgimage=""; 
                        rssfeed_item_title_length="50"; 
                        rssfeed_item_title_color="#fff"; 
                        rssfeed_item_bgcolor="#000"; 
                        rssfeed_item_bgimage=""; 
                        rssfeed_item_border_bottom="on"; 
                        rssfeed_item_source_icon="off"; 
                        rssfeed_item_date="on"; 
                        rssfeed_item_description="on"; 
                        rssfeed_item_description_length="150"; 
                        rssfeed_item_description_color="#55a0ff"; 
                        rssfeed_item_description_link_color="#333"; 
                        rssfeed_item_description_tag="off"; 
                        rssfeed_no_items="0"; 
                        rssfeed_cache = "fdc520f97d55cdfa94e99ab240fbc3c5"; 
                        //--> 
                        </script> 
                        <script type="text/javascript" src="//feed.surfing-waves.com/js/rss-feed.js"></script> 
                        <!-- The link below helps keep this service FREE, and helps other people find the SW widget. Please be cool and keep it! Thanks. --> 
                        <div style="color:#ccc;font-size:10px; text-align:right; width:130px;">powered by <a href="https://surfing-waves.com" rel="noopener" target="_blank" style="color:#ccc;">Surfing Waves</a></div> 
                        <!-- end sw-rss-feed code -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php require_once '../view/footer.php';?>