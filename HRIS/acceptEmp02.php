<!DOCTYPE HTML>
<html>
<head>
	<title> ทดสอบ01 </title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<table border="1" align="center">
    <form id="form1" name="form1" method="post" action='./example04.php'>
    <tr bgcolor="ffcc00">
   		<th colspan="2" align="center"> ป้อนรหัสพนักงาน </th>
   	</tr>
    <tr>
    	<td> <label> &nbsp; รหัสพนักงาน &nbsp; </label> </td>
    	<td>
    	<?PHP 
    	include "connect_db.php" ;
    	$sql_emp= "select emp_id , emp_name, emp_lname from employee order by emp_id " ;
        $record_emp   = mysqli_query($conn,$sql_emp) ; ?>
        <select name="s_emp_id">
	    <?PHP while($data_emp=mysqli_fetch_assoc($record_emp)) { 
	     echo "<option value=\"".$data_emp['emp_id']."\" " ; 
		 echo "> ".$data_emp['emp_id']." ".$data_emp['emp_name'].		 " ".$data_emp['emp_lname']." </option>";  
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