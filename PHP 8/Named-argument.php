<?php
// named argument -> bisa memasukkan argument atau parameter tanpa harus mengikuti posisinya
// namun harus disebutkan nama argument atau parameternya
class Person 
{
    public string $firstName;
    public string $lastName;
    public function __construct(string $firstName, string $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }
}
$person = new Person(lastName : "Sihab", firstName : "Ahmad");
echo "First name : $person->firstName" . PHP_EOL;
echo "Last name : $person->lastName" . PHP_EOL;
function sayHello(string $first, string $middle, string $last): void{
    echo "pertama : $first" . PHP_EOL;
    echo "kedua : $middle" . PHP_EOL;
    echo "ketiga : $last" . PHP_EOL;
}

echo "\n";
// without named argument
sayHello("one", "second", "third");
echo "\n";
// with named argument
sayHello(last: "third", first: "one", middle: "second");