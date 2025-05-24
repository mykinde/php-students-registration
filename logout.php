<?php
session_start();
session_unset();
session_destroy();
header("Location: students/login.php");
exit;
