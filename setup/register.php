  <h1 align="center"><font color="#006666"><?php echo $mycompany; ?> Admin Registration</font></h1>
 <form onsubmit="return validate(this);" name="Register" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> 
	<input type="hidden" name="ACT" value="Regi">
        
	<table border="1" cellspacing="0" align="center" width="400" bgcolor="#AEECE7">
	<th style="border: thin #FFFFFF; background-color: #0000FF; color: #FF9900" colspan="2">Enter your Administrative Username and Password
	</th>
	<tr>
	<td class="x">&nbsp;</td><td class="x">&nbsp;</td>
	</tr>
	<tr align="center">
	<td style="border: thin #ffffff"><b>Your Full Name</b></td>
	<td style="border: thin #FFFFFF"><input type="text" name="admin_name"></td>
	</tr>
	<tr align="center">
	<td style="border: thin #ffffff"><b>Your Username</b></td>
	<td style="border: thin #FFFFFF"><input type="text" name="a_username"></td>
	</tr>
	<tr align="center">
	<td style="border: thin #FFFFFF"><b>Your Password</b></td>	
	<td style="border: thin #FFFFFF"><input type="password" name="a_password"></td>
	</tr>
	<tr align="center">
	<td style="border: thin #FFFFFF"><b>Your Email</b></td>
	<td style="border: thin #FFFFFF"><input type="text" name="a_email"></td>
	</tr>
    <tr align="center">
	<td style="border: thin #FFFFFF"><b>Your Phone</b></td>
	<td style="border: thin #FFFFFF"><input type="text" name="a_phone"></td>
	</tr>
	<tr>
	<td class="x">&nbsp;</td><td class="x">&nbsp;</td>
	</tr>
	<tr>
	<td style="border: thin #FFFFFF">&nbsp;</td><td style="border: thin #FFFFFF">&nbsp;</td>
	</tr>
	<tr>
	<td align="right" class="x"><input class="btn" type="reset" value=" Clear ">&nbsp; &nbsp;</td>
	<td class="x"><input class="btn" type="submit" value=" Register "></td>
	</tr>
	</table>
	<script language="JavaScript1.2">

								function validate(form)
								{
								if(form.admin_name.value=='')
								   {
								      alert('Please Enter your correct fullname');
								      return false;
								   }
								if(form.a_username.value=='')
								   {
								      alert('Please Enter your correct Username');
								      return false;
								   }
								if(form.a_password.value=='')
								   {
								      alert('Please Enter your correct Password');
								      return false;
								   }
								if (form.a_username.value.length >'20')
								   {
								      alert('Your Username seems to be too Long.');
								      return false;
								   }
								if (form.a_password.value.length >'20')
								   {
								      alert('Your Username seems to be too Long.');
								      return false;
								   }
                                   if(form.a_email.value=='')
								   {
								      alert('Please Enter your correct Email');
								      return false;
								   }
                                   if(form.a_phone.value=='')
								   {
								      alert('Please Enter your correct phone Number');
								      return false;
								   }
							 return true;
								}

					  </script>		
	</form>
