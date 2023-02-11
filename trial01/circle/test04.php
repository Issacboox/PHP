<!DOCTYPE HTML>
<html>
<head>
	<title> Cals2 </title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?PHP
  if(isset($_POST["btncompute"]))
  { 
    $R_radius =$_REQUEST["R_radius"]; 
    if ($R_radius == "")	$R_radius = 0 ;


    $check = $R_radius ;
    if ($check > 0 )
    {

    $area = 2 * 3.14 * $R_radius ;
    $circle = $R_radius * $R_radius*3.14 ;
    echo " <table border=\"1\"> " ;
    echo "<tr><td> " ; 
    echo " Radius : </td>" ;
    echo "<td> &nbsp; ".$R_radius ;
    echo " &nbsp; </td><tr>" ; 

    echo "<tr><td> " ; 
    echo " เส้นรอบวง : </td>" ;
    echo "<td> &nbsp; ".$circle ;
    echo " &nbsp; </td><tr>" ; 

    echo "<tr><td> " ; 
    echo "area : </td>" ;
    echo "<td> &nbsp; ".$area ;
    echo " &nbsp; </td><tr>" ; 

    echo "<form id=\"form1\" method=\"post\" action='./test03.php'>";
    echo "<tr><td colspan=\"2\">" ; 
    echo "<input type=\"submit\" name=\"back\" value=\"กลับ\">  </td> ";
    echo "</td></tr>" ; 

    echo "</table>" ;     
    }
  	else 
  	{
        echo "<table border=\"1\"> " ;
        echo "<form id=\"form1\" method=\"post\" action='./test03.php'>";
        echo "<tr><td colspan=\"2\">" ; 
        echo " &nbsp; กรุณาป้อนค่าที่คำนวณได้ &nbsp; ";
        echo "</td></tr>" ; 
        echo "<tr><td colspan=\"2\" align=\"center\" > " ; 
        echo "<input type=\"submit\" name=\"back\" value=\"กลับ\">  </td> ";
        echo "</td></tr>" ; 
        echo "</table>" ;        
    } // end if $check>0
 } // end if isset($_POST["btncompute"])
 ?>
</table>
</body>
</html>