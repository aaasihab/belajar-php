<?php

// membuat exception sendiri
function ValidateLoginRequest(loginRequest $request)
{
    if (!isset($request->username)) {
        throw new ValidationException("Username is null");
    } else if (!isset($request->password)) {
        throw new ValidationException("Password is null");
    } else if (trim($request->username) == "") {
        throw new Exception("username is empty");
    } else if (trim($request->password) == "") {
        throw new Exception("Password is empty");
    }
}