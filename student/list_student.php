<!DOCTYPE HTML>
<html>
<head>
	<title> Student </title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<table border="1" align="center">
    <form id="form1" name="form1" method="post" action='./report_bamboo.php'>
    <tr bgcolor="ffcc00">
   		<th colspan="2" align="center"> information </th>
   	</tr>
    <tr>
    	<td> <label> &nbsp; Student name &nbsp; </label> </td>
    	<td>
    	<?PHP 
    	include "connect_db.php" ;
    	$sql_std = "select std_id, std_name from student order by std_id " ;
        $record_std = mysqli_query($conn,$sql_std) ; ?>
        <select name="s_prod_id">
	    <?PHP while($data_prod=mysqli_fetch_assoc($record_prod)) { 
	     //echo "<option value=\"".$data_prod['prod_id']."\" " ; 
		 //echo "> ".$data_prod['prod_id']." ".$data_prod['prod_desc']. "</option>";  
		} ?> 
    	</select>
		</td>
	</tr>
    </form>
</table>
</body>
</html>