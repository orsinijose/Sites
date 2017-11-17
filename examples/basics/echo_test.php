<!DOCTYPE html>
<html>
<body>

<?php

function returnEscapedDoubleQuotes(){
    return "\"";
}

echo "<h2>PHP is Fun!</h2>";
echo "Hello world!<br>";
echo "I'm about to learn " .  returnEscapedDoubleQuotes() . "PHP" . returnEscapedDoubleQuotes() . "!<br>";
echo "This ", "string ", "was ", "made ", "with multiple parameters.";
echo "<br><br>";
$val = 3;
$val2 = "test";

echo $val , " $test";
?>

</body>
</html>