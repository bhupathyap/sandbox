<?php

	$content = "
	
	
	<h2 style='background:#eee;padding:30px 0px;margin-bottom:0px'>Registration Form</h2><form name = \"register\" action = \"registeraction.php\"><table border=\"0\"><tr>
<td>Username:</td>
<td><input type = \"text\" name = \"username\"/></td>
</tr>
<tr>
<td>Full Name:</td>
<td><input type = \"text\" name = \"alias\"/></td>
</tr>
<tr>
<td>
Password:</td> <td><input type = \"password\" name = \"password\"/></td>
</tr>
<tr>
<td>
College/Organization:</td><td><input type = \"text\" name = \"college\"></td>
</tr>
<tr>
<td>
Phone Number:</td><td><input type = \"text\" name = \"phone\"></td>
</tr>
<tr>
<td>
Email:</td><td><input type = \"text\" name = \"email\"></td>
</tr>
<tr> <td><input type = \"submit\" value = \"submit\"></td></tr>

</table> <br/></form><br><br><br>Please do not leave any field blank cuz you will have to come back to fill them";
	require_once("theme/clueless/theme.php");

?>
