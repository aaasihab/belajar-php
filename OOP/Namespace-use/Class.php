<?php
namespace Data\one {
    class Conflict {
        var $name;
    }
}

namespace Data\two {
    class Conflict {
        var $name;
        var $address;
    }
    function say_goodbye() {
        echo("\nGOOD BYE!\n");
    }
}