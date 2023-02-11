<!DOCTYPE HTML>
<html>
<head>
	<title> การจัดการข้อมูลพนักงาน </title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?PHP
    include('connect_db.php') ;

    //$q_emp_id = "105" ;
    $q_emp_id =$_REQUEST["s_emp_id"]; 
    $sql2=" Select emp_id  , emp_name , emp_lname , job " ;
    $sql2=$sql2." from employee " ;
    $sql2=$sql2." Where emp_id = ".$q_emp_id   ;
    //echo "<center>".$sql2."</center>"."<br>"  ;
    $record2 = mysqli_query($conn,$sql2) ;  
    $data2 = mysqli_fetch_assoc($record2) ;
?>
    <table border="0" align="center">
    <tr> 
        <td align="center"> <?PHP echo $data2['emp_name']." ".$data2['emp_lname'] ; ?> &nbsp;  </td>
    </tr>
    <tr> 
        <td align="center"> <?PHP echo " หน้าที่ : ".$data2['job'] ; ?> &nbsp;  </td>
    </tr>
    </table>
    <br>

<?PHP
  	$sql=" Select emp_id  , date_work , p.proj_id , work_hours , proj_name "; 
    $sql=$sql." from working w , project p " ;
    $sql=$sql." Where emp_id = ".$q_emp_id   ;
    $sql=$sql." and p.proj_id = w.proj_id "  ;
    $sql=$sql." order by date_work , proj_id "  ;
    // echo "<center>".$sql."</center>"."<br>"  ;
    $record = mysqli_query($conn,$sql) ;  

 ?>
<table border="1" align="center">
<tr bgcolor="ffcc00">
    <td align="center"> &nbsp; วันที่ทำงาน &nbsp;</td>
    <td align="center"> &nbsp; รหัสโครงการ  &nbsp; </td>
    <td align="center"> &nbsp; ชื่อโครงการ &nbsp; </td>
    <td align="center"> &nbsp; จำนวนชั่วโมงการทำงาน &nbsp; </td>
</tr>
<?PHP   
 $sum_work_hours = 0 ;
 while( $data = mysqli_fetch_assoc($record) ) {   ?>
 <tr>
    <td align="center"> &nbsp; <?PHP echo $data['date_work']; ?> &nbsp;
    </td>
    <td align="center"> &nbsp; <?PHP echo $data['proj_id']; ?> &nbsp;
    </td> 
    <td align="center"> &nbsp; <?PHP echo $data['proj_name']; ?> &nbsp;
    </td>
    <td align="right"> <?PHP echo $data['work_hours'] ; ?> &nbsp; 
    </td>   
  </tr>
    <?PHP 
    $sum_work_hours = $sum_work_hours + $data['work_hours'] ;
} ?>
<tr>
    <td align="center" colspan="3"> 
       <?php echo "ชั่วโมงทำงานรวม" ; ?>
    </td>
    <td align="right"> 
        <?PHP echo number_format($sum_work_hours,2,'.',',' ); ?> &nbsp; 
    </td>   
  </tr>
</table>

<table align="center">
<tr><form id="form1" method="post" action='./acceptEmp.php'>
    <tr><td colspan="2">
    <input type="submit" name="back" value="กลับ">  </td> 
    </td></tr> 
</table>

</body>
</html>