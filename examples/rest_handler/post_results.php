<html>
<head>
<style>
table {
	border-collapse: collapse;
	width: 100%;
}

th, td {
	text-align: left;
	padding: 8px;
}

tr:nth-child(even) {
	background-color: #f2f2f2
}

th {
	background-color: #4CAF50;
	color: white;
}
</style>
</head>
<body>
<?php
require_once 'RestHandlerClass.php';
$newObj = new RestHandler();
$newObj->initializeFromFormSubmission();
if ($newObj->getPostOperation()) {
    $newObj->makePOSTCall();
} else {
    echo "print getPostOperation " . $newObj->getPostOperation();
}
echo "<hr>";
if ($newObj->getGetOperation()) {
    $results = $newObj->makeGETCall();
    
    if (count($results > 0)) {
        ?>
<table>
		<th>Identifier</thead>
		<th>Inode</th>
		<th>Title</th>
		<th>Last Mod Date</th>
<?php
        if(!empty($results)){
            foreach ($results as $con) {
                echo "<tr>";
                echo "<td>" . $con->identifier . "</td>";
                echo "<td>" . $con->inode . "</td>";
                echo "<td>" . $con->title . "</td>";
                echo "<td>" . $con->modDate . "</td>";
                echo "</tr>";
            }
        }
        
        ?>
</table>
<?php
    }
} else {
    echo "print getGetOperation " . $newObj->getGetOperation();
}
?>
</body>
</html>

