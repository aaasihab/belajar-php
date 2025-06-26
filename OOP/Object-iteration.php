<?php
// object iteration -> untuk menampilkan semua data pada object(menggunakan interface bawan php)
// dengan implements IteratorAggregate dan return ArrayIterator serta function getIterator()
class Data implements IteratorAggregate
{
    public string $first = "First";
    protected string $second = "Second";
    private string $third = "Third";
    public function getIterator()
    {
        // jika property tidak ingin ditampilkan tidak usah ditulis dalam array
        $array =[
            // "First" => $this->first,
            "Second" => $this->second,
            "Third" => $this->third
        ];
    
        return new ArrayIterator($array);
    }
}

$data = new Data();
foreach ($data as $property => $value){
    echo "$property : $value" . PHP_EOL;
}