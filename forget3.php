<?php session_start() ?>
<html>
<head>
<title> Forgot Password Recovery by Email</title>
</head>
<body>

<h2> Forgot Password Recovery by Email</h2>

<form method=”post” action=”forget4.php”>
Enter Email address : <input type=”text” name=”email”>
<br><br>
<input type="submit" name="submit" class="btn btn-primary btn-md" value="Submit" onclick="validate();"/>
</form>
<br>
</body>
</html>