<?php

// nullsafe operator -> pengecekan null dengan tanda ?

class Address
{
    public ?string $country;
}

class User
{
    public ?Address $address;
}

function getCountry(?User $user): ?string
{
    // pengecekan manual
    // if ($user != null)
    //     if ($user->address != null)
    //         return $user->address->country;
    // return null

    // pengecekan menggunakan nullsafe operator
    return $user?->address?->country;
}

// jika null
echo getCountry(null);

// jika tidak null
$user = new User();
$user->address = new Address();
$user->address->country = "Indonesia";


echo getCountry($user);