<!DOCTYPE HTML>
<html>
<head>
	<title> การจัดการข้อมูลพนักงาน </title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
            <br>
            <H3> <center> แสดงข้อมูลพนักงาน  </center> </H3>  
            <br>
<?PHP
    include('connect_db.php') ;
  	$sql=" Select  emp_id , emp_name, emp_lname , job , chg_hour  "; 
    $sql=$sql." from employee ";
    $sql=$sql." order by emp_id ";
    //echo "<center>".$sql."</center>"."<br>" ;
    $record = mysqli_query($conn,$sql) ;  

 ?>
<table border="1" align="center">
<tr bgcolor="ffcc00">
    <td align="center"> &nbsp; รหัสพนักงาน &nbsp;</td>
    <td align="center"> &nbsp; ชื่อ-สกุล  &nbsp; </td>
    <td align="center"> &nbsp; หน้าที่  &nbsp; </td>
    <td align="center"> &nbsp; ค่าตอบแทนรายชั่วโมง &nbsp; </td>
    <td align="center"> &nbsp; แก้ไข &nbsp; </td>
</tr>
<?PHP   
    
 while( $data = mysqli_fetch_assoc($record) ) {   ?>
 <tr>
    <td align="center"> 
	   <?php echo $data['emp_id'] ; ?>
    </td>
    <td align="left"> &nbsp; <?PHP echo $data['emp_name']; ?> 
                      &nbsp; <?PHP echo $data['emp_lname']; ?> &nbsp;
    </td>
    <td align="center"> &nbsp; <?PHP echo $data['job']; ?> &nbsp; 
    </td>    
    <td align="center"> <?PHP echo $data['chg_hour']; ?> 
    </td>
    <td align="center"> &nbsp; <img src="./images/edit.gif"> &nbsp;
    </td>    
  </tr>
  <?PHP } ?>
</table>
</body>
</html>