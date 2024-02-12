<?php
session_start();

unset($_SESSION['user_name']); 
unset($_SESSION['logged_in']); 
unset($_SESSION['email_id']); 
unset($_SESSION['user_id']); 
unset($_SESSION['customer_type']); 
?>
<script src="plugins/jQuery/jquery.min.js"></script>
<script>
     $( document ).ready(function() {
         localStorage.setItem("CartItems",[]);
         window.location.href = "index.php";
     });
</script>

<?php 
header("Location: index.php"); 
exit;
?>