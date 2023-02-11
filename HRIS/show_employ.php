<!DOCTYPE HTML>
<html>
<head>
	<title> การจัดการข้อมูลพนักงาน</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?PHP
    include('connect_db.php') ;

    //$q_emp_id = "105" ;
    $q_emp_id =$_REQUEST["s_emp_id"]; 


  	$sql=" Select w.emp_id ,emp_name , emp_lname , chg_hour, job, sum(work_hours) sumhr  , sum(work_hours) * chg_hour  salary "; 
    $sql=$sql." from employee e, working w  " ;
    $sql=$sql." where w.emp_id = ".$q_emp_id   ;
    $sql=$sql." and e.emp_id = w.emp_id "  ;
    $sql=$sql." group by w.emp_id , emp_name , emp_lname , chg_hour , job";  
    //echo "<center>".$sql."</center>"."<br>"  ;  
    $record = mysqli_query($conn,$sql) ;  
    $data = mysqli_fetch_assoc($record) ;
 ?>
<table border="1" align="center"> 
 <tr>
    <td bgcolor="#FFCC00" >รหัสพนักงาน</td><td align="center"> &nbsp; <?PHP echo $data['emp_id']; ?> &nbsp; </td>
 </tr>
 <tr>
    <td bgcolor="#FFCC00" >ชื่อ-สกุล</td><td align="center"> &nbsp; <?PHP echo $data['emp_name'] ; ?> &nbsp; </td>
 </tr>
 <tr>
    <td bgcolor="#FFCC00" >ค่าตอบแทนรายชั่วโมง</td><td align="center"> &nbsp; <?PHP echo $data['chg_hour']; ?> &nbsp; </td>
 </tr>
 <tr>
    <td bgcolor="#FFCC00" >หน้าที่</td><td align="center"> &nbsp; <?PHP echo $data['job']; ?> &nbsp; </td>
 </tr>
 <tr>
    <td bgcolor="#FFCC00" >ชั่วโมงทำงานรวม</td><td align="center"> &nbsp; <?PHP echo $data['sumhr']; ?> &nbsp; </td>
 </tr>
 <tr>
    <td bgcolor="#FFCC00" >ค่าตอบแทน</td><td align="center"> &nbsp; <?PHP echo $data['salary']; ?> &nbsp; </td>
 </tr>

</table>


<table align="center">
<tr><form id="form1" method="post" action='./accept_proj.php'>
    <tr><td colspan="2">
    <input type="submit" name="back" value="กลับ">  </td> 
    </td></tr> 
</table>

</body>
</html>