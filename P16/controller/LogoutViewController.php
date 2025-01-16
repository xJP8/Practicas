<?php
    session_destroy();

    header('Location: index.php?controller=UserLogin');
?>