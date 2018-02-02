<?php
session_start();
session_unset();
session_destroy();
header("Location:FrontPage.php?message=Goodbye! See you later.");