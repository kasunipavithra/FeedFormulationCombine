<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <!--Script success message -->
        <style>
            .bargraph {
                list-style: none;
                padding-top: 5px;
                width:80%;
            }
            ul.bargraph li {
    height: 20px;
    color: white;
    text-align: left;
    
    font-size: 80%;
    line-height: 20px;
    padding: 0px 5px;
    margin-bottom: 2px;
    }
    
    ul.bargraph li.reddeep {
background: #ED1C24;

}
 



 
ul.bargraph li.orange {
background: #F99C1C;

}
 
ul.bargraph li.yellow {
background: #F4D41E;

}
 
ul.bargraph li.green {
background: #97B546;

}
 
ul.bargraph li.greenbright {
background: #36B669;

}
 
ul.bargraph li.greenblue {
background: #42BDA5;

}
 
ul.bargraph li.blue {
background: #00AEEF;

}
 
            
        </style>



    </head>
    <body>
        <?php
        session_start();
//getting quantities of each elements        
        $nutriLong = $_SESSION['nutriLong'];
        $bouLong = $_SESSION['bouLong'];

        $Energy = $_SESSION['Energy'];
        $Protein = $_SESSION['Protein'];
        $Ca = $_SESSION['Ca'];
        $P = $_SESSION['P'];
        $K = $_SESSION['K'];
        $Mg = $_SESSION['Mg'];
        $Na = $_SESSION['Na'];
        $Met = $_SESSION['Met'];
        $Lys = $_SESSION['Lys'];

        $box = $_GET['box'];//keep quantities
        
  

//exploding quantities
        $qtyArray = explode(',', $box);

        $no = count($qtyArray);
        
        
     for ($s = 0; $s < $no; $s++){
         
         //echo $qtyArray[$s].'<br>';
     }
//end getting quantities to array
//make precentage array







//variables to hold total amount of nutrients

        $tEnergy = 0;
        $tProtien = 0;
        $tCa = 0;
        $tP = 0;
        $tK = 0;
        $tMg = 0;
        $tNa = 0;
        $tMet = 0;
        $tLys = 0;

//get nutrition list of each ingredient
//split longstring
        $ingArray = explode("/", $nutriLong);
        $noA = count($ingArray);

        
        
        
        for ($s = 0; $s < $noA; $s++) {

            $temp = $ingArray[$s];
            $nutrientArray = explode(",", $temp);
            $noN = count($nutrientArray);
            
            $part = $qtyArray[$s];


            $tEnergy = $tEnergy + (($nutrientArray[0] / 100) * $part);
            $tProtien = $tProtien + (($nutrientArray[1] / 100) * $part);
            $tCa = $tCa + (($nutrientArray[2] / 100) * $part);
            $tP = $tP + (($nutrientArray[3] / 100) * $part);
            $tK = $tK + (($nutrientArray[4] / 100) * $part);
            $tMg = $tMg + (($nutrientArray[5] / 100) * $part);
            $tNa = $tNa + (($nutrientArray[6] / 100) * $part);
            $tMet = $tMet + (($nutrientArray[7] / 100) * $part);
            $tLys = $tLys + (($nutrientArray[8] / 100) * $part);
        }

        /*$tEnergy = round($tEnergy,2);
        $tProtien = round($tProtien,2);
        $tCa = round($tCa,2);
        $tP = round($tP,2);
        $tK = round($tK,2);
        $tMg = round($tMg,2);
        $tNa = round($tNa,2);
        $tMet = round($tMet,2);
        $tLys = round($tLys,2);*/
        
        $EnPrecent = round(($tEnergy/$Energy)*100,2);
        $EnProtein = round(($tProtien/$Protein)*100,2);
        $EnCa = round(($tCa/$Ca)*100,2);
        $EnP = round(($tP/$P)*100,2);
        $EnK = round(($tK/$K)*100,2);
        $EnMg = round(($tMg/$Mg)*100,2);
        $EnNa = round(($tNa/$Na)*100,2);
        $EnMet = round(($tMet/$Met)*100,2);
        $EnLys = round(($tLys/$Lys)*100,2);
        
        echo '<h1>Review</h1>';
        echo '<ul class="bargraph">';
        
        echo '<h2>Required Energy:' . $Energy . '</h2><li class="reddeep" style ="width:100%" ></li><br>';
        echo '<h2>Total Energy:' . $EnPrecent . '%<h2><li class="greenbright" style ="width:'.$EnPrecent.'%" ></li><br><br>';


        echo '<h2>Required Protein:' . $Protein . '%</h2><li class="reddeep" style ="width:'.$Protein.'%" ></li><br>';
        echo '<h2>Total Protein:' . $EnProtein . '%<h2></h2><li class="greenbright" style ="width:'.$tProtien.'%" ></li><br><br>';

        echo '<h2>Required Ca:' . $Ca . '%</h2><li class="reddeep" style ="width:'.$Ca.'%" ></li><br>';
        echo '<h2>Total Ca:' . $EnCa . '%<h2><li class="greenbright" style ="width:'.$tCa.'%" ></li><br><br>';


        echo '<h2>Required P:' . $P . '%</h2><li class="reddeep" style ="width:'.$P.'%" ></li><br>';
        echo '<h2>Total P:' . $EnP . '%<h2><li class="greenbright" style ="width:'.$tP.'%" ></li><br></br>';

        echo '<h2>Required K:' . $K . '%</h2><li class="reddeep" style ="width:'.$K.'%" ></li><br>';
        echo '<h2>Total K:' . $EnK . '%<h2><li class="greenbright" style ="width:'.$tK.'%" ></li><br><br>';

        echo '<h2>Required Mg:' . $Mg . '%</h2><li class="reddeep" style ="width:'.$Mg.'%" ></li><br>';
        echo '<h2>Total Mg:' . $EnMg . '%<h2><li class="greenbright" style ="width:'.$tMg.'%" ></li><br><br>';

        echo '<h2>Required Na:' . $Na . '%</h2><li class="reddeep" style ="width:'.$Na.'%" ></li><br>';
        echo '<h2>Total Na:' . $EnNa . '%<h2><li class="greenbright" style ="width:'.$tNa.'%" ></li><br><br>';

        echo '<h2>Required Met:' . $Met . '%</h2><li class="reddeep" style ="width:'.$Met.'%" ></li><br>';
        echo '<h2>Total Met:' . $EnMet . '%<h2><li class="greenbright" style ="width:'.$tMet.'%" ></li><br><br>';

        echo '<h2>Required Lys:' . $Lys . '%</h2><li class="reddeep" style ="width:'.$Met.'%" ></li><br>';
        echo '<h2>Total Lys:' . $EnLys . '%<h2><li class="greenbright" style ="width:'.$tLys.'%" ></li><br><br>';
        
 echo '<a href="final.php?qty='.$box.'">Manual Submission</a>';
 
 
 
echo '</ul>';    


if($Energy<$tEnergy && $Protein<$tProtien && $Ca<$tCa && $P<$tP && $K<$tK && $Mg<$tMg && $Na<$tNa && $Met<$tMet && $Lys < $tLys ){
    echo "Your Formula is ready";
    echo '<a href="final.php?qty='.$box.'">View</a>';
    
}





        ?>
    </body>
</html>

