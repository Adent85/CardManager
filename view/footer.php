<script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.11.0/mdb.min.js"></script>
<script src="js/main.js"></script>
</body>
    <footer class="navbar bg-dark text-white h-100" style="justify-content: center;">
          <!-- Copyright -->
          <p class="footerP">&copy; <?php echo date("Y");?> Copyright:</p>
            <?php if(utility::getUserIdFromSession() == 0 ){?>
                <a class="text-white" href="user_manager/?controllerRequest=show_home_page">Card Manager</a>
             <?php }
                   elseif(utility::getUserIdFromSession() > 0 ){?>
                        <a class="text-white" href="user_manager/?controllerRequest=user_home">Card Manager</a>
             <?php } ?>
          <!-- Copyright -->
    </footer> 
</html>
