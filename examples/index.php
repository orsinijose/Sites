<html>
<head>
<link rel="stylesheet" type="text/css" href="../includes/styles.css">
</head>
<body>
<h1>Welcome to PHP Examples</h1>
<?php 
require '../includes/MenuGeneratorClass.php';
$newObj = new MenuGeneratorClass();
$newObj -> MenuGenerator(__DIR__);
?>
</body>
</html>
