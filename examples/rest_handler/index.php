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
<form action="get_results.php" name="contentRetriever" id="contentRetriever" method="post">
<fieldset>
<legend>Content Retriever - Get Contents From dotCMS</legend>
<p>What operations would you like to do?</p>
<label><input type="radio" id="get_type" name="get_type" value="query">Query</label>
<br>
<label><input type="radio" id="get_type" name="get_type" value="id">Identifier</label>
<br>
<label><input type="radio" id="get_type" name="get_type" value="inode">Inode</label>
<br>
<br>
<label>Where would you like to get these contents from? (e.g., https://demo.dotcms.com)
<br>
<input type="text" id="hostname" name="hostname" value="" size="50"></label>
<br>
<br>
<label>How many contents you would like to add/retrieve?
<input type="text" id="limit" name="limit" value="" size="10"></label>
<br>
<br>
<p>If you're pulling contents, what format you would like to get contents?</p>
<label><input type="radio" id="type" name="type" value="xml">xml</label>
<br>
<label><input type="radio" id="type" name="type" value="json">json</label>
<br><br>
<p>Place your Lucene Query if you're pulling contents from dotCMS
<br>
If Id/Inode has been selected, place your Identifier/inode here</p>
<label><textarea id="query" name="query" cols="90"></textarea></label>
<br><br>
<p>Place your Authentication details (format is emailaddress:password)</p>
<label><input type="text" id="auth" name="auth" value="" size="40"></label>
<br><br>
<input type="submit" value="submit">
</fieldset>
</form>
<hr>
<form action="post_results.php" name="contentPopulator" id="contentPopulator" method="post">
<fieldset>
<legend>Content Populator - Save contents for dotCMS</legend>
<label>How many Contents would you like to add?
<input type="text" id="count" name="count" value="" size="10"></label>
<br><br>
<p>Place your Authentication details (format is emailaddress:password)</p>
<label><input type="text" id="auth" name="auth" value="" size="50"></label>
<br><br>
<input type="submit" value="submit">
</fieldset>


</form>
</body>
</html>

