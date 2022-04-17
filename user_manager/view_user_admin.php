<!--

Copyright Apr 17, 2022 Kyle Fisk

-->
<?php require_once '../view/header.php';?><br>
<main class="container" style="height: 100vh;">
    <div class="card" style='background-color: #ADD8E6;'>
        <div class="card-header">
            <h1 class='text-center p-2'>Search for a User</h1>
            <div class="d-flex justify-content-center mb-2">
                <form action="user_manager/index.php" method="post">
                    <div class="form-outline mb-4">
                        <input type="text" id="search_name" name="search_name" class="form-control bg-white" required/>
                        <label class="form-label" for="search_name">Search for a User:</label>
                    </div>
                    <input type="hidden" name="controllerRequest" value="search_user_list_admin">
                    <button type="submit" class="btn btn-primary btn-block">Search</button>
                </form>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered border-dark">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Active</th>
                            <th scope="col">Edit User</th>
                            <th scope="col">View User Decks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) : ?>
                        <tr>
                            <th scope="row"><?php echo $user->getID();?></th>
                            <td><?php echo $user->getFirstName()." ".$user->getLastName();?></td>
                            <td><?php echo $user->getActiveString();?></td>
                            <td>
                                <button type="button" class="btn btn-primary" data-mdb-toggle="modal"  data-mdb-target="#editModal<?php echo $user->getID();?>">Edit User</button>
                                <div class="modal fade" id="editModal<?php echo $user->getID();?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel">Edit User Admin</h5>
                                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body">
                                        <form class="row g-3" action="user_manager/index.php" method="post">
                                        <input type="hidden" name="editUserId" value='<?php echo $user->getID();?>'>
                                          <div class="col-md-4">
                                            <div class="form-outline">
                                              <input type="text" class="form-control" name="editFirstName" id= "editFirstName"  value="<?php echo $user->getFirstName();?>" required />
                                            <label for="editFirstName" class="form-label">First name</label>
                                          </div>
                                        </div>
                                        <div class="col-md-4">
                                          <div class="form-outline">
                                            <input type="text" class="form-control" name="editLastName" id= "editLastName"  value="<?php echo $user->getLastName();?>" required />
                                            <label for="editLastName" class="form-label">Last name</label>
                                          </div>
                                        </div>
                                        <div class="col-md-6">
                                          <div class="form-outline">
                                            <input type="email" id="editEmail" name="editEmail" class="form-control" value="<?php echo $user->getEmail();?>" required />
                                              <label class="form-label" for="inputEmail">Email</label>
                                            </div>
                                          </div>
                                          <div class="col-md-6">
                                            <div class="form-outline">
                                                <input type="password" id="inputPassword" name = "editPassword" class="form-control" placeholder="Change only at user request!" required />
                                              <label class="form-label" for="inputPassword">Password</label>
                                            </div>
                                          </div>
                                          <div class="col-12">
                                            <input type="hidden" name="controllerRequest" value="edit_user_admin">
                                            <button class="btn btn-primary" type="submit">Save User</button>
                                          </div>
                                        </form>
                                      </div>
                                      <div class="modal-footer">
                                        <?php if($user->getActive() == 1){?>
                                            <form  action="user_manager/index.php" method="post">
                                            <input type="hidden" name="controllerRequest" value="deactivate_user_admin">
                                            <input type="hidden" name="editUserId" value='<?php echo $user->getID();?>'>
                                            <button class="btn btn-danger" type="submit">Deactivate User</button>
                                            <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                                            </form>
                                        <?php }else {?>
                                            <form  action="user_manager/index.php" method="post">
                                            <input type="hidden" name="controllerRequest" value="activate_user_admin">
                                            <input type="hidden" name="editUserId" value='<?php echo $user->getID();?>'>
                                            <button class="btn btn-primary" type="submit">activate User</button>
                                            <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                                            </form>
                                        <?php } ?>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </td>
                            <td>
                                <form  action="deck_manager/index.php" method="post">
                                <input type="hidden" name="controllerRequest" value="view_decks_admin">
                                <input type="hidden" name="deckUserId" value='<?php echo $user->getID();?>'>
                                <button class="btn btn-primary" type="submit">View Decks</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<?php require_once '../view/footer.php';?>