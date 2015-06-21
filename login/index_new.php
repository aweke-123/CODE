<html>
<head>
<script type="text/javascript">
function validateForm()
{
var a=document.forms["reg"]["email"].value;
var b=document.forms["reg"]["password"].value;
var c=document.forms["reg"]["confirm_password"].value;

if ((a==null || a=="") && (b==null || b=="") && (c==null || c==""))
  {
  alert("All Field must be filled out");
  return false;
  }
if (a==null || a=="")
  {
  alert("Email must be filled out");
  return false;
  }
if (b==null || b=="")
  {
  alert("Password must be filled out");
  return false;
  }
if (c==null || c=="")
  {
  alert("Confirm Password must be filled out");
  return false;
  }
}
</script>
</head>
<form name="reg" action="code_exec.php" onsubmit="return validateForm()" method="post">
<table width="274" border="0" align="center" cellpadding="2" cellspacing="0">
  <!-- <tr>
    <td colspan="2">
		<div align="center">
		  <?php 
		$remarks=$_GET['remarks'];
		if ($remarks==null and $remarks=="")
		{
		echo 'Register Here';
		}
		if ($remarks=='success')
		{
		echo 'Registration Success';
		}
		?>	
	    </div></td>
  </tr>  -->
  <tr>
    <td width="95"><div align="right">Email:</div></td>
    <td width="171"><input type="text" name="email" /></td>
  </tr>
  <tr>
    <td><div align="right">Password:</div></td>
    <td><input type="text" name="password" /></td>
  </tr>
  <tr>
    <td><div align="right">Confirm Password:</div></td>
    <td><input type="text" name="confirm_password" /></td>
  </tr>
  <tr>
    <td><div align="right"></div></td>
    <td><input name="sign_up" type="submit" value="Submit" /></td>
  </tr>
</table>
</form>
</html>