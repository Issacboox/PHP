<!DOCTYPE HTML>
<html>
<head>
	<title> Cal 2 </title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?PHP
  if(isset($_POST["btncompute"]))
  { 
    $r_radius =$_REQUEST["r_radius"]; 
    if ($r_radius == "")	$r_radius = 0 ;


    $check = $r_radius ;
    if ($check > 0 )
    {

    $area = $r_radius * 3.14 * 2 ;
    echo " <table border=\"1\"> " ;
    echo "<tr><td> " ; 
    echo " r_radius : </td>" ;
    echo "<td> &nbsp; ".$r_radius ;
    echo " &nbsp; </td><tr>" ; 

    echo "<form id=\"form1\" method=\"post\" action='./test01.php'>";
    echo "<tr><td colspan=\"2\">" ; 
    echo "<input type=\"submit\" name=\"back\" value=\"กลับ\">  </td> ";
    echo "</td></tr>" ; 

    echo "</table>" ;     
    }
  	else 
  	{
        echo "<table border=\"1\"> " ;
        echo "<form id=\"form1\" method=\"post\" action='./test01.php'>";
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