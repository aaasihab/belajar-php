<?php

// validation function overriding private
// class child boleh menggunakan nama function yang sama dengan class parent jika functionnya private
class Manager
{
    private function test(): void
    {

    }
}

class VicePresident extends Manager
{
    
    public function test(string $name): string
    {
        return "VP";
    }

}

