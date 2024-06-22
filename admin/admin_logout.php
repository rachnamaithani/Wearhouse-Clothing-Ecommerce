<!---------Admin Logout------------>
<?php
    session_start();

    session_destroy();
?>
<script>
    alert("logout successfully");
    window.location.href="admin_login.php";      
</script>
        