<html>
<head>
<link rel="stylesheet" type="text/css" href="./includes/styles.css">
</head>
<body>
<h1>Welcome to PHP Development, Jose</h1>
<h3>Go to the Following Links</h3>
<?php 
require './includes/MenuGeneratorClass.php';
$newObj = new MenuGeneratorClass();
$newObj -> MenuGenerator(__DIR__);
?>
</body>
</html>
