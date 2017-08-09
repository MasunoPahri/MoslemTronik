<?php
session_start();
unset($_SESSION['role']);
session_destroy();
echo "<script>window.location.href = 'http://localhost/mtronik/'</script>";
?>