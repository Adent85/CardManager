<!--

Copyright Mar 25, 2022 Kyle Fisk

-->
<?php require_once '../view/header.php';?><br>
<main class="container" style="height: 100vh;">
    <div class="card" style='background-color: #ADD8E6;'><br>
        <h1 class='text-center'>Find Friends</h1><br>
        <div class="d-flex justify-content-center mb-2">
            <form action="friend_manager/index.php" method="post">
                <div class="form-outline mb-4">
                    <input type="text" id="search_name" name="search_name" class="form-control bg-white" required/>
                    <label class="form-label" for="search_name">Search for a Friend:</label>
                </div>
                <input type="hidden" name="controllerRequest" value="search_user_list">
                <button type="submit" class="btn btn-primary btn-block">Search</button>
            </form><br>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered border-dark">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Add Friend</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                    <tr>
                        <th scope="row"><?php echo $user->getID();?></th>
                        <td><?php echo $user->getFirstName()." ".$user->getLastName();?></td>
                        <td><form action="friend_manager/index.php" method = "post"> <input type="hidden" name="controllerRequest" value="request_friend"><input type="hidden" name="receiver_id" value='<?php echo $user->getID();?>'>
                            <button type="submit" class="btn btn-primary">Send Friend Request</button></form></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<?php require_once '../view/footer.php';?>