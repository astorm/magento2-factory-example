<?php
namespace Pulsestorm\FactoryTest\Model;
class Test {
    public function __construct($one, $two, $three) {
        echo "Arguments to Pulsestorm\FactoryTest\Model\Test:","\n";
        echo "- one: ", $one,"\n";
        echo "- two: ", $two,"\n";;
        echo "- three: ", $three,"\n";;
    }
}
