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

.wrapper {
white-space: nowrap
}

</style>
</head>
<body>
<?php
require_once './includes/RestHandlerClass.php';
$newObj = new RestHandler();
$newObj->initializeFromFormSubmission();
echo "<hr>";
$results = $newObj->makeGETCall();
if (!empty($results)) {
?>
<br>
<div>
Success! Amount of contents is <?php echo count($results);?>
<br>
REST URL is: <a href="<?php echo $newObj->getRestCall();?>" target="_blank"><?php echo $newObj->getRestCall();?></a>
</div>
<br><br>
<table>
        <th>Identifier</thead>
        <th>Inode</th>
        <th>Title</th>
        <th>Last Mod Date</th>
<?php
if (!empty($results)) {
    foreach ($results as $con) {
        echo "<tr>";
        echo "<td><a target='_blank' href='" .$newObj->getHostName() . "/api/content/id/" . $con->identifier . "'>" . $con->identifier . "</td>";
        echo "<td>" . $con->inode . "</td>";
        echo "<td>" . $con->title . "</td>";
        echo "<td>" . $con->modDate . "</td>";
        echo "</tr>";
    }
}
        
        ?>
</table>
<br><br>
Raw Output:
<?php

    echo "<pre>";
    echo htmlspecialchars(json_encode($results, JSON_PRETTY_PRINT));
    echo "</pre>";

} else {
    echo "No Results were pulled. Try again with a different search criteria.";
}
?>
<br><br>
</body>
</html>

