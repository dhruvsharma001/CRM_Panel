<html>
<body>
<?php
include('header.php');
?>
<?php
include('sidebar.php');
?>
<form>
<table>
	<tr>
		<th><label>Employee Form</label></th>
	</tr>
	<tr>
	<td><label>Login:</label></td>
	<td><input type="text" name="name" id="name" placeholder="Mark"/></td>
	</tr><br>
	<tr>
	<td><label>Email:</label></td>
	<td><input type="text" name="email" id="email" placeholder="markD@cinergix.com"/></td>
	</tr><br>
	<td><label>Password:</label>
	<td><input type="password" name="pwd" id="pwd" placeholder="*************"/></td>
	</tr><br>
	<tr>
	<td><label>Confirm:</label>
	<td><input type="password" name="confirm" id="confirm" placeholder="*************"/></td>
	<td></td>
	<td><button>Sign Up</button>
	</tr><br>
	<tr>
	<td><input type="checkbox" name="rem" id="rem">Remember Me</input type></td>
	</tr>
</table>
</form>
<?php
include('footer.php');
?>
</body>
</html>