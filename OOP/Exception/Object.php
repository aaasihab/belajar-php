<?php
require_once "LoginRequest.php";
require_once "Validation.php";
require_once "ValidationException.php";

$loginRequest = new LoginRequest();
$loginRequest->username = "";
$loginRequest->password = "";

// multiple try catch
// try {
//     ValidateLoginRequest($loginRequest);
// } catch (ValidationException $exception) {
//     echo "Validation error : {$exception->getMessage()}" . PHP_EOL;
// } catch (Exception $exception) {
//     echo "Error : {$exception->getMessage()}" . PHP_EOL;
// }

// jika ingin pesan errornya sama
try {
    ValidateLoginRequest($loginRequest);
} catch (ValidationException | Exception $exception) {
    echo "Error : {$exception->getMessage()}" . PHP_EOL;
}
