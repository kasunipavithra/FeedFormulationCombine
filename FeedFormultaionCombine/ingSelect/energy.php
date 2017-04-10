<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        
       <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" rel="stylesheet"> 

        <style>
            
            
        input+div{display:none;}
input:hover+div{display:inline;}
    
           


body{
background:#7F152E;
color:#FFF;
font-family: 'Yanone Kaffeesatz', sans-serif;
}  

            /*styles for header*/

#head{
	background-color:#800000;
	width:100%;
	
        
}
  
#head .header-inner{
	max-width:1200px;
	margin:0 auto;
         
}

#head nav{
	float:right;
	padding:25px 20px 0 0;	
}
#head .menu-icon{
	display:hidden;
	width:40px;
	height:40px;
	background:url(image/nav.png) center;
}    

#head a:hover #menu-icon{
	border-radius:4px 4px 0 0;
}

#head nav ul{ 
	list-style-type:none;
}

#head nav ul li{

	font-size: 150%;
	display: inline-block;
	float: left;
	padding:10px;
}
#head nav ul li a{ 
 
     color:#F5F5F5;
	 text-decoration: none; 
	
 }
#head nav ul li a:hover{
	color:#C3D7DF;
        text-decoration: none; 
        
}
#head .current{
	color:#C3D7DF;
}




.container{
    position:relative;
 
    	
	
        overflow:auto;
        height:available;
        width:60%;
        
        
        margin: auto;
    background-color:rgba(67, 56, 48, 0.8);
  
	
	border-radius: 25px;
	
                             
    
}

.button {
    background-color:crimson;
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: block;
    font-size: 16px;
    margin: 0% 40% 0% 60%;
    cursor: pointer;
    border-radius: 2px;
   float:right;
    
}
        </style>
        
    </head>
     
      
    <body> 
        
        <html>
    <head>
        <title>Smart Feed</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css"/>
         <link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" rel="stylesheet"> 


    </head>
    <body>
        <header class="container" id="head">
            <div class="header-inner">
                <nav>
                    <a href="#" id="menu-icon"></a>
                    <ul>
                        <li><a href="index.html" class="current">Home</a></li>
                        <li><a href="#">Animals</a></li>
                        <li><a href="#">Ingredients</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contacts</a></li>
                        
                    </ul>
                </nav>  
            </div>
            
        </header>
        
        
        
            <?php
                 
         $ageid= $_GET["ageid"];
         
         
        

         
 $db = mysqli_connect('localhost','root','','feedformulation3')
 or die('Error connecting to MySQL server.');   
         
$query = "SELECT ing_name FROM ingredient WHERE category='E'";
mysqli_query($db, $query) or die('Error querying database.');

$query1="SELECT CP FROM majorcontent WHERE ing_name IN (SELECT ing_name FROM ingredient WHERE category='E')";
mysqli_query($db, $query1) or die('Error querying database.');


$query2="SELECT tip FROM ingredient WHERE category='E'";
mysqli_query($db, $query2) or die('Error querying database.');



         
$result = mysqli_query($db, $query);

$result1 = mysqli_query($db, $query1);

$result2=mysqli_query($db, $query2);
 

 $ingredients=[];
 $content=[];
 $tips=[];
 
 
 $column=array();
 $i=1; 
 while($row=  mysqli_fetch_array($result)){
     
   $column[$i]=$row['ing_name'];
  array_push($ingredients, $column[$i]);
 //  echo($column[$i]);
     $i++;
      
 
 }
 $column1=array();
 $a=1; 
 while($row1= mysqli_fetch_array($result1)){
     
   $column1[$a]=$row1['CP'];
  array_push($content, $column1[$a]);
  //echo $column1[$a];
     $a++;
      
 
 }
 
 $column2=array();
 $x=1; 
 while($row2= mysqli_fetch_array($result2)){
     
   $column2[$x]=$row2['tip'];
  array_push($tips, $column2[$x]);
 // echo $column2[$x];
     $x++;
 }
 echo'<form action="protein.php?ageid='.$ageid.'" method="post">';
$c=count($ingredients);
 for($j=0;$j<$c; $j++){
       
   echo'<div class="panel1"><div class="container">
   
  <div class="panel panel-default">
    <div class="panel-heading"><input type="text" value="'.$ingredients[$j].'" style="border:none; background-color:whitesmoke; font-weight: bold;" readonly/><input type="checkbox" name="check_list[]" value="'.$ingredients[$j].'"> <div>'.$tips[$j].'</div></div>
    <div class="panel-body">      <div id="progressbar" style="background-color:#eee;border-radius:0px; padding:5px;">
  <div id=inner style="background-color:#990033;
   width:'.$content[$j].'%; 
   height:10px;
   border-radius: 0px;"></div>
</div></div>
  
  </div>
</div></panel1>';
     
   
    
}
echo'<input class="button" type="submit" name="submit" value="Submit">';
 
echo'</form>';

       
        ?>                      
    </body>
</html>

