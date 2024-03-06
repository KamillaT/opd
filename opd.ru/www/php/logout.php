<?php
unset($_SESSION['username']);
header("Location: ../login_reg/registration.html");
die;
?>