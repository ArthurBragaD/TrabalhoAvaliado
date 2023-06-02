<?php
    session_unset();
    session_destroy();
    header("LOCATION: login.php?logout=1");
?>