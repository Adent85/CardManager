<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <base href="http://localhost/projects/CardManager/">
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
        <!-- MDB -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.css" rel="stylesheet"/>
        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
        <link href="style/main.css" rel="stylesheet" type="text/css"/>
        <link rel="icon" href="img/favicon-16x16.png">
        <title>Card Manager</title>
    </head>
        <header>
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
              <!-- Container wrapper -->
                <!-- Navbar brand -->
                <?php if(utility::getUserIdFromSession() == 0 ){?>
                    <a class="navbar-brand me-2" href="user_manager/?controllerRequest=show_home_page"><i class="fas fa-hat-wizard"></i></a>
                <?php }
                       elseif(utility::getUserIdFromSession() > 0 ){?>
                        <a class="navbar-brand me-2" href="user_manager/?controllerRequest=user_home"><i class="fas fa-hat-wizard"></i></a>
                 <?php } ?>
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarButtons" aria-controls="navbarButtons" aria-expanded="false" aria-label="Toggle navigation"><i class="fas fa-bars"></i></button>

                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbarButtons">
                  <!-- Left links -->
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                      <?php if(utility::getUserIdFromSession() == 0 ){?>
                        <a class="nav-link text-white" href="user_manager/?controllerRequest=show_home_page">Card Manager</a>
                    </li>
                      <?php }
                            elseif(utility::getUserIdFromSession() > 0 ){?>
                    <li class="nav-item">
                              <a class="nav-link text-white" href="user_manager/?controllerRequest=user_home">Card Manager</a>
                    </li>
                    <li class="nav-item">
                              <a class="nav-link text-white" href="user_manager/?controllerRequest=user_home">Home</a>
                    </li>
                      <?php } ?>               
                  </ul>
                  <!-- Left links -->
                  <?php if(utility::getUserIdFromSession() == 0 ){?>
                      <button type="button" class="btn btn-primary" data-mdb-toggle="modal" id= "loginButton" data-mdb-target="#loginModal">Login</button>
                          <!-- Modal -->
                        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModal" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="loginModalLabel">Login</h5>
                                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <form class="px-4 py-3" action="user_manager/index.php" method="post">
                                  <!-- Email input -->
                                  <div class="form-outline mb-4">
                                    <input type="email" id="email" name= "inputEmail" class="form-control" required/>
                                    <label class="form-label" for="email">Email address</label>
                                  </div>

                                  <!-- Password input -->
                                  <div class="form-outline mb-4">
                                    <input type="password" id="password" name= "inputPassword" class="form-control" required/>
                                    <label class="form-label" for="password">Password</label>
                                  </div>

                                  <!-- 2 column grid layout for inline styling -->
                                  <div class="row mb-4">
                                    <div class="col d-flex justify-content-center">
                                      <!-- Checkbox -->
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" name="rememberInput" id="rememberCheckBox" checked/>
                                        <label class="form-check-label" for="rememberCheckBox"> Remember me </label>
                                      </div>
                                    </div>
                                  </div>

                                  <!-- Submit button -->
                                  <input type="hidden" name="controllerRequest" value="user_login">
                                  <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                                </form>
                              </div>
                              <div class="modal-footer">
                                <button class="btn btn-primary" data-mdb-target="#registerModal" data-mdb-toggle="modal">Register</button>
                                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>  
                        <div class="modal fade" id="registerModal" aria-hidden="true" aria-labelledby="registerModal" tabindex="-1">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="registerModalLabel">Register New User</h5>
                                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <form class="row g-3" action="user_manager/index.php" method="post">
                                  <div class="col-md-4">
                                    <div class="form-outline">
                                      <input type="text" class="form-control" name="inputFirstName" id= "firstName"  required />
                                      <label for="firstName" class="form-label">First name</label>
                                    </div>
                                  </div>
                                  <div class="col-md-4">
                                    <div class="form-outline">
                                      <input type="text" class="form-control" name="inputLastName" id= "lastName"  required />
                                      <label for="lastName" class="form-label">Last name</label>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-outline">
                                      <input type="email" id="inputEmail" name="inputEmail" class="form-control" required />
                                      <label class="form-label" for="inputEmail">Email</label>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-outline">
                                      <input type="password" id="inputPassword" name = "inputPassword" class="form-control" required />
                                      <label class="form-label" for="inputPassword">Password</label>
                                    </div>
                                  </div>
                                  <div class="col-12">
                                    <input type="hidden" name="controllerRequest" value="register_user">
                                    <button class="btn btn-primary" type="submit">Register</button>
                                  </div>
                                </form>
                              </div>
                              <div class="modal-footer">
                                <button class="btn btn-primary" data-mdb-target="#loginModal" data-mdb-toggle="modal">Login</button>
                                <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                  <?php }
                        elseif(utility::getUserIdFromSession() > 0 ){?>
                          <div>
                              <a class="nav-link text-white" href="user_manager/?controllerRequest=show_home_page"><i class="bi bi-gear text-white"></i>&nbsp;<?php echo $userName;?></a>
                          </div>
                          <div class="logoutButton">
                            <a class="btn btn-primary" href="user_manager/?controllerRequest=user_logout">Logout</a>
                          </div>
                          
                    <?php if (utility::getUserIdFromSession() == 2 ){?>
                          
                    <?php } ?>
                  <?php } ?>
                </div>
                <!-- Collapsible wrapper -->
              <!-- Container wrapper -->
            </nav>
        </header>
    <body style="background-image: url('img/carbonFiber.jfif');">
        <!-- Navbar -->

  