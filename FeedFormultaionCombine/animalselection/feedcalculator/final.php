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
        
        session_start();
        
        
        $ageid = $_GET['qty'];
        
        $ings = $_GET['ings'];
        
        
 
        
        $array1=explode(',', $ings);
        $array2=explode(',', $box);
        $c1=count($array1);
       // echo $c1.'<br>';
        $c2=count($array2);
        //echo $c2;
        echo ' <form name="form" action="final.php" method="POST">
         Add Amount&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type = "number" name = "quantity" value = "" />
</form><br>';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $qty = $_POST["quantity"];
        //echo $qty;
       
        for($i=0;$i<$c1;$i++){
            $x=$array2[$i];
            
            echo '<li><input type = "text" name = "qty1" value = "'.$array1[$i].'" style="border:none"/><input type = "text" name = "qty2" value = "'.(($x*$qty)/100).' Kg" /></li><br>';
        }
        }
        
        ?>
    </body>
</html>
