<!--

Copyright Mar 27, 2022 Kyle Fisk

-->
<?php require_once '../view/header.php';?><br>
<main class="container" style="height: 100vh;">
    <div class="card" style='background-color: #ADD8E6;'><br>
        <h1 class='text-center'>Find Friends</h1><br>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered border-dark">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Accept Friend Request</th>
                        <th scope="col">Deny Friend Request</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($friendRequests as $friendRequest) : ?>
                    <tr>
                        <th scope="row"><?php echo $friendRequest->getID();?></th>
                        <td><?php echo $friendRequest->getFirstName()." ".$friendRequest->getLastName();?></td>
                        <td><form action="friend_manager/index.php" method = "post"> <input type="hidden" name="controllerRequest" value="accept_friend_request"><input type="hidden" name="request_response" value='<?php echo $friendRequest->getID();?>'>
                            <button type="submit" class="btn btn-success">Accept Friend Request</button></form></td>
                        <td><form action="friend_manager/index.php" method = "post"> <input type="hidden" name="controllerRequest" value="deny_friend_request"><input type="hidden" name="request_response" value='<?php echo $friendRequest->getID();?>'>
                            <button type="submit" class="btn btn-danger">Deny Friend Request</button></form></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<?php require_once '../view/footer.php';?>