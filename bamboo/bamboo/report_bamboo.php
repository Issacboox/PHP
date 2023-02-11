<!DOCTYPE HTML>
<html>
<head>
	<title> รายละเอียด </title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?PHP
    include('connect_db.php') ;

    //$q_prod_id = "105" ;
    $q_prod_id =$_REQUEST["s_prod_id"]; 

  	 $sql=" select product.prod_id, prod_amount ,raw_material.raw_id, raw_cost, raw_amount, rule.amount * raw_amount sum "; 
    $sql=$sql." FROM product, raw_material, rule " ;
    $sql=$sql." where product.prod_id =  " ."'" .$q_prod_id ."'";
    $sql=$sql."  and raw_material.raw_id = rule.raw_id; "  ;
    echo "<center>".$sql."</center>"."<br>"  ;  
    $record = mysqli_query($conn,$sql) ;  
    $data = mysqli_fetch_assoc($record) ;
 ?>

<table border="1" align="center"> 
 <tr>
    <td bgcolor="#FFCC00" >ปริมาณวัสดุที่ใช้</td><td align="center"> &nbsp; <?PHP echo $data['sum']; ?> &nbsp; </td>
 </tr>
 <tr>
    <td bgcolor="#FFCC00" >มูลค่าที่ใช้ในการผลิต</td><td align="center"> &nbsp; <?PHP echo $data['raw_cost'] ; ?> &nbsp; </td>
 </tr>

</table>


<table align="center">
<tr><form id="form1" method="post" action='./accept_bamboo.php'>
    <tr><td colspan="2">
    <input type="submit" name="back" value="กลับ">  </td> 
    </td></tr> 
</table>

</body>
</html>