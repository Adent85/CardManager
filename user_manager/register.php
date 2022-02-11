<!--

Copyright Jan 28, 2022 Kyle Fisk

-->
<?php require_once '../view/header.php';?><br>
<main>
    <div class="container d-flex justify-content-center">
        <h1>Register</h1>
    </div>
        <div class="container d-flex justify-content-center">
            <form id="register_form" action="user_manager/index.php" method="post">
                <p id = error><?php echo $error_message?></p>

                <div class="left">
                <label>First Name:</label>
                </div>
                <div class="right">
                    <input type="text" name="first_name">
                </div>
                <br>
                <div class="left">
                <label>Last Name:</label>
                </div>
                <div class="right">
                    <input type="text" name="last_name">
                </div>
                <br>
                <div class="left">
                <label>Email:</label>
                </div>
                <div class="right">
                <input type="text" name="email">
                </div>
                <br>
                <div class="left">
                <label>Password:</label>
                </div>
                <div class="right">
                <input type="password" name="password">
                </div>
                <br>
                <input type="hidden" name="controllerRequest" value="register">
                <label>&nbsp;</label>
                <input type="submit" value="Register"><br>
            </form>
        </div>
</main>
<?php require_once '../view/footer.php';?>
