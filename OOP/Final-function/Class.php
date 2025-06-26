<?php
// final function--> function tersebut tidak dapat dioverride lagi
class SocialMedia
{
    public string $name;
}
class Facebook extends SocialMedia
{
    final public function login(string $usrname, string $passowrd): bool
    {
        return true;
    }
}

// error
class FakeFacebook extends Facebook
{
    // public function login(string $usrname, string $passowrd): bool
    // {
    //     return true;
    // }
}
