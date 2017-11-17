<?php

class MenuGeneratorClass {
    
    function MenuGenerator($path) {
        // Sort in ascending order - this is default
        $a = scandir($path);
        
        if(!empty($a)){
            echo "<ul class='a'>";
            foreach ($a as $val){
                if($val != 'index.php' && $val != '.DS_Store' ){
                    echo "<li><a href='". $val ."'>" . $val . '</a></li><br>';
                }  
            }
            echo '</ul>';
        }
    }
    
}

?>