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
        <link rel="stylesheet" href="../style.css">
        <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
        <script src="script.js"></script>
<link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" rel="stylesheet"> 

        <title>CSS MenuMaker</title>
    </head>
    <body>
     
        <header>
            <div id="header-inner">
                <nav>
                    <a href="#" id="menu-icon"></a>
                    <ul>
                        <li><a href="ingredients.html" class="current">Home</a></li>
                        <li><a href="#">Animals</a></li>
                        <li><a href="#">Ingredients</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contacts</a></li>
                        
                    </ul>
                    
                </nav>  
            </div>
            
        </header>
        
        <section class="banner">
            <div id="banner-inner">
                
                <center>
				<div class="mainpanel">
                                    <div class="canvas">
                <?php
        

        $db = mysqli_connect('localhost', 'root', '', 'feedformulation3')
                or die('Error connecting to MySQL server.');

        $query = "SELECT aniName,ani_id FROM animal WHERE ind_id=1";

        mysqli_query($db, $query) or die('Error querying database.');


        $result = mysqli_query($db, $query);

        $animal = [];
        $ani_id = [];

        $column = array();
        $column1 = array();

        $i = 1;

        $typeTotal = [];
        $typeidTotal = [];
        
        echo '<h1>Select Animal Type</h1>';
        
        while ($row = mysqli_fetch_array($result)) {

            $column[$i] = $row['aniName'];
            $column1[$i] = $row['ani_id'];

            array_push($animal, $column[$i]);
            array_push($ani_id, $column1[$i]);
            //echo ($column1[$i]);
            //echo "<br>";
            $queryNew = "SELECT typeName,type_id from animaltype where ani_id=$column1[$i]";
            mysqli_query($db, $queryNew) or die('Error querying database.');
            $resultNew = mysqli_query($db, $queryNew);
            $anitype = [];
            $anitypeid = [];
            while ($rowNew = mysqli_fetch_array($resultNew)) {
                $columnNew[$i] = $rowNew['typeName'];
                $columnNewid[$i] = $rowNew['type_id'];
                //echo $columnNewid[$i];
                //echo '<br>';
                //echo $columnNew[$i];
                //echo '<br>';
                array_push($anitype, $columnNew[$i]);
                array_push($anitypeid, $columnNewid[$i]);
            }
            $typeString = implode(",", $anitype);
            $typeidInt = implode(',', $anitypeid);
            //echo $typeidInt.'<br>';
//echo $typeString.'<br>';
            array_push($typeTotal, $typeString);
            array_push($typeidTotal, $typeidInt);
            $i++;
            //echo  $typeidTotal[$i];
            //$c=count($animal);
            //$cNew=count($anitype);
//echo $cNew.'<br>';

            $count1 = count($typeTotal);
            //   $countid = count($typeidTotal);
            // echo $countid;
//echo $count1;
        }
        echo '<div id="menu">

        <ul class="parent-menu">';
        for ($j = 0; $j < $count1; $j++) {
            echo '    <li><a href="#">' . $animal[$j] . '</a>

                <ul>';
            $s = $typeTotal[$j];
            $s1 = $typeidTotal[$j];
            $typeArray2 = explode(",", $s);
            $typeidArray2 = explode(",", $s1);
            $count2 = count($typeArray2);
            for ($k = 0; $k < $count2; $k++) {

             $typeid = $typeidArray2[$k];
             $type = $typeArray2;

               
                
                
                echo '    <li><a href="ageCategory.php?id='.$typeid.'">' . $typeArray2[$k] . '</a></li>';
                
                
            }

            echo ' </ul>

            </li>';
        }
        echo '  </ul>

    </div>';


        mysqli_free_result($result);

        mysqli_free_result($resultNew);
        ?>
        
</div></div></center>
                </div> 
                   </section>
        
        <section class="one-fourth" id="energy">
            <h3>News Item1</h3>
        </section>
 
         <section class="one-fourth" id="protein">
            <h3>News Item1</h3>
        </section>
 
         <section class="one-fourth" id="minerals">
            <h3>News Item1</h3>
        </section> 
 
         <section class="one-fourth" id="pre-mixes">
            <h3>News Item1</h3>
        </section>
 
       
    </body>
</html>
