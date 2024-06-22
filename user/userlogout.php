<!-----------USER LOGOUT ------------->

<?php
    session_start();
    session_destroy();
?>
<script>
    alert("logout successfully");
    window.location.href="index.php";      
</script>
        