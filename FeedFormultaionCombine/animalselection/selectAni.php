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

        $query = "SELECT indName FROM industry";

        mysqli_query($db, $query) or die('Error querying database.');


        $result = mysqli_query($db, $query);
        $industry = [];
        $inColumn = array();
        $i = 1;
        
        echo '<h1>Select Industry<h1>';
        
        while ($row = mysqli_fetch_array($result)) {
            $inColumn[$i] = $row['indName'];
            array_push($industry, $inColumn[$i]);
            $i++;
        }
        $c = count($industry);
        //echo $c;
        echo '<div id="menu">

        <ul class="parent-menu">';
        for ($j = 0; $j < $c; $j++) {
            echo '<li><a href="'.$industry[$j].'.php">' . $industry[$j] . '</a></li>';
        }
        echo ' </ul>
</div>';
        mysqli_free_result($result);
?>
                            </div>

                                </div>
                </center>
                
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


        
        
