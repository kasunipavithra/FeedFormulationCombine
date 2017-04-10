<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang=''>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="we.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="script.js"></script>
   <title>CSS MenuMaker</title>
    </head>
    <body>
        <?php
        $db = mysqli_connect('localhost','root','','feedformulation')
 or die('Error connecting to MySQL server.');   
         
$query = "SELECT aniName,ani_id FROM animal WHERE ind_id=3";

mysqli_query($db, $query) or die('Error querying database.');

         
$result = mysqli_query($db, $query);

 $animal=[];
$ani_id=[];

 $column=array();
 $column1=array();
 
 $i=1; 
 
 $typeTotal =[];
 while($row=  mysqli_fetch_array($result)){
     
   $column[$i]=$row['aniName'];
  $column1[$i]=$row['ani_id'];
   
  array_push($animal, $column[$i]);
  array_push($ani_id,$column1[$i]);
  //echo ($column1[$i]);
  //echo "<br>";
   $queryNew="SELECT typeName from animaltype where ani_id=$column1[$i]";
  mysqli_query($db, $queryNew) or die('Error querying database.');
  $resultNew = mysqli_query($db, $queryNew);
 $anitype=[];
 
 while($rowNew=  mysqli_fetch_array($resultNew)){
  $columnNew[$i]=$rowNew['typeName'];
 //echo $columnNew[$i];
 //echo '<br>';
  array_push($anitype, $columnNew[$i]);
  }
   $typeString = implode(",", $anitype);

//echo $typeString.'<br>';
array_push($typeTotal, $typeString);
  $i++;
   //$c=count($animal);
  //$cNew=count($anitype);
//echo $cNew.'<br>';
  $count1 = count($typeTotal);
//echo $count1;
 }
        echo '<nav id="menu">

        <ul class="parent-menu">';
for($j=0;$j<$count1; $j++){
        echo '    <li><a href="#">'.$animal[$j].'</a>

                <ul>';
         $s = $typeTotal[$j];
 $typeArray2 = explode(",",$s);   
 $count2 = count($typeArray2); 
for($k=0;$k<$count2; $k++){
    echo '    <li><a href="#">'.$typeArray2[$k].'</a></li>';

                  
}
echo '    </ul>

            </li>';

           
}
echo '  </ul>

    </nav>';
mysqli_free_result($result);
    
    mysqli_free_result($resultNew);
        ?>
    </body>
</html>
