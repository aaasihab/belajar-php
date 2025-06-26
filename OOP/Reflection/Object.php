<?php
require_once "Exception/LoginRequest.php";
require_once "Exception/ValidationException.php";
require_once "Reflection/ValidationUtil.php";

$loginRequest = new LoginRequest();
$loginRequest->username = null;
// $loginRequest->password = null;

// memanggil static function
ValidationUtil::validateReflection($loginRequest);