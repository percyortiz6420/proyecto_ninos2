<?php
include_once 'user_session.php';
$userSession = new UserSession();
$userSession->closseSession();

header("location: ../sistema.php");
?>