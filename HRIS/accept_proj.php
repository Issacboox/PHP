<!DOCTYPE HTML>
<html>
<head>
	<title> รับข้อมูลโครงการ </title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<table border="1" align="center">
    <form id="form1" name="form1" method="post" action='./show_proj.php'>
    <tr bgcolor="ffcc00">
   		<th colspan="2" align="center"> ป้อนรหัสโครงการ </th>
   	</tr>
    <tr>
    	<td> <label> &nbsp; รหัสโครงการ &nbsp; </label> </td>
    	<td>
    	<?PHP 
    	include "connect_db.php" ;
    	$sql_emp= "select proj_id , proj_name from project order by proj_id " ;
        $record_emp   = mysqli_query($conn,$sql_emp) ; ?>
        <select name="s_proj_id">
	    <?PHP while($data_emp=mysqli_fetch_assoc($record_emp)) { 
	     echo "<option value=\"".$data_emp['proj_id']."\" " ; 
		 echo "> ".$data_emp['proj_id']." ".$data_emp['proj_name']."</option>";  
		} ?> 
    	</select>
		</td>
	</tr>
	<tr>
    	<td> <input type="submit" name="btncompute" value="ค้นหา">  </td>
    	<td> <input type="reset"  name="btnreset" value="ล้าง">  </td>
	</tr>
    </form>
</table>
</body>
</html>