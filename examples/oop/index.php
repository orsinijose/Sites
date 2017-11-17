<?php 

class Animal {
    
    public function whichClass() {
        echo "I am an Animal!"."<br>"."Hi";
    }
    
    /*  Note that this method uses the $this keyword  so
     the calling object's class type (Tiger) will be
     recognized and the Tiger class version of the
     whichClass method will be called.
     */
    
    public function sayClassName() {
        $this->whichClass();
    }
    
    public function sayClassName2() {
        self::whichClass();
    }
}

class Tiger extends Animal {
    
    public function whichClass() {
        echo "I am a Tiger!"."<br>"."Hello ",__CLASS__;
    }
    
}

$tigerObj = new Tiger();
$tigerObj->sayClassName();
$tigerObj->sayClassName2();

?>