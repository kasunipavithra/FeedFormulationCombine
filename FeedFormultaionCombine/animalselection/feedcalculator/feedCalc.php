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
        <!--Script success message -->
    <link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" rel="stylesheet"> 

    <script language="javascript" type="text/javascript">
        
        
<!-- 
//Browser Support Code


function ajaxFunction(val){



   var ajaxRequest;  // The variable that makes Ajax possible!
   try{
   
      // Opera 8.0+, Firefox, Safari
      ajaxRequest = new XMLHttpRequest();
   }catch (e){
      
      // Internet Explorer Browsers
      try{
         ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
      }catch (e) {
         
         try{
            ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
         }catch (e){
         
            // Something went wrong
            alert("Your browser broke!");
            return false;
         }
      }
   }
   
   // Create a function that will receive data
   // sent from the server and will update
   // div section in the same page.
   
   
   ajaxRequest.onreadystatechange = function(){
      if(ajaxRequest.readyState == 4){
         var ajaxDisplay = document.getElementById('ajaxDiv');
         ajaxDisplay.innerHTML = ajaxRequest.responseText;
      }
   }
   
   for(var b=0; b<val; b++){
   document.getElementById("warn"+(b)).innerHTML= " ";
                    }
   
   var bouString =String(str);
   var bouArray = bouString.split("Q");
   
   //document.getElementById("demo2").innerHTML ="boustring:"+bouString;   
   
   var boxArray =[];
   var sum=0.0;
   
   
   for(var k =0; k<val; k++){
   var temp = parseFloat(document.getElementById('textbox'+(k)).value);
   var justtemp = document.getElementById('textbox'+(k)).value;
   if(justtemp==""){
      sum = sum+0; 
      boxArray.push(0);
   }else{
   sum = sum+temp;
   boxArray.push(temp);
                        }
   
   //justsum = justsum+justtemp;
   //document.getElementById("a").innerHTML = "temp is here:"+justtemp;
   
   
   
   }
   
   
   
   
   //document.getElementById("demo21").innerHTML ="sum is here:" +sum;
   //document.getElementById("demo2").innerHTML ="justsum is here:"+ justsum;
   
   
   //var res = "";
  // res = res + isNaN(sum);
    
    
   
    
   //document.getElementById("demo3").inne44rHTML ="r is here:" +r;
   if(sum==0){
   
   document.getElementById("ajaxDiv").style.display = "none";
   document.getElementById("warnX").style.display = "block";
   //document.getElementById("demo").innerHTML = "You must enter at least one value.";
  // document.getElementsByName("kaz").style.visibility="hidden";
   //document.getElementsByName("max").style.visibility="hidden";
   
   }else{
   document.getElementById("ajaxDiv").style.display = "block";
   document.getElementById("warnX").style.display = "none";
 ////document.getElementsByName("kaz").style.visibility="hidden";
   //document.getElementsByName("max").style.visibility="hidden";
   //document.getElementById("ajaxDiv").style.visibility = "visible";
   
   
   var boxseries = [];
   
   
   
   for(var j =0; j<val; j++){
       
   var i = bouArray[j];
   var LimitArray = i.split("Z");
   
   var upp = LimitArray[0]; 
   //document.write(upp);
   var warn = LimitArray[1];
   //document.write(warn);
   var warn_type = LimitArray[2];
   //document.write(warn_type);
   
  //document.getElementById("demo3").innerHTML ="upper:"+upp+"warn:"+warn; 
  
   
   var temp2 = (boxArray[j]/sum)*100;

   if(upp>=temp2){
    boxseries.push(temp2);  
  }else{
            if(warn_type==="C"){
                //boxseries.push(upp); 
                document.getElementById("warn"+(j)).style.visibility = "visible";
                //document.getElementById('warn'+(j)).innerHTML=" "+warn;
                
                var part =Math.round(parseFloat((upp/100)*sum));
                //document.getElementById("demo3").innerHTML=part;
                
                if(part<upp){
                document.getElementById("max"+(j)).style.visibility = "visible";
                document.getElementById('textbox'+(j)).innerHTML.replace(part);
                //document.getElementById("max"+(j)).innerHTML="upper boundary exeeded";
                ///document.getElementById("ajaxDiv").style.display = "none";
                
                return;
                }else
                
                {
                
                                        }
                
            }else{
                  if(warn_type==="N"){
                document.getElementById("warn"+(j)).style.visibility = "visible";     
                  document.getElementById('warn'+(j)).innerHTML=" "+warn;
                  boxseries.push(temp2);
                  }else{
                        boxseries.push(temp2);
                       }               
                                    
                 }  
       
        }
   
   }
   
   
   
   var box = boxseries.toString();
   
   
   
   var queryString = "?box=" + box ;
   
   
   
   ajaxRequest.open("GET", "getQty.php" + queryString, true);
   ajaxRequest.send(null);
   
                    }   
}
//-->




//function to get different id to table elements
function nameInputs(val){
var number = val;

   
      var  inputTags = document.getElementsByTagName("input");
      var  inputTags2 = document.getElementsByName("kaz");

    for (var w = 0; w <val; w++) {
        //nodeItem = inputTags2.item(w);
        
       inputTags.item(w).id = "textbox" + (w);
       
        inputTags2.item(w).id = "warn" + (w);
        
    }
    
    ajaxFunction(number);
    }
    
    
</script>
 
<style>
    /*
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
*/
/* 
    Created on : Mar 30, 2017, 9:44:53 PM
    Author     : Kaz
*/

body{
background:#7F152E;
color:#FFF;
font-family: 'Yanone Kaffeesatz', sans-serif;
}  

table {
color: #333;

width: 640px;
border-collapse:
collapse; border-spacing: 0;
}

td, th {
border: 1px solid transparent; /* No more visible border */
height: 30px;
transition: all 0.3s; /* Simple transition for hover effect */
}

th {
background: #DFDFDF; /* Darken header a bit */
font-weight: bold;
}

td {
background: #FAFAFA;
text-align: center;
}

/* Cells in even rows (2,4,6...) are one color */
tr:nth-child(even) td { background: #F1F1F1; }

/* Cells in odd rows (1,3,5...) are another (excludes header cells) */
tr:nth-child(odd) td { background: #FEFEFE; }

tr td:hover { background: #666; color: #FFF; } /* Hover cell effect! */



/*styles for header*/

header{
	background-color:#800000;
	width:100%;
	
        
}
  
.header-inner{
	max-width:1200px;
	margin:0 auto;
         
}

nav{
	float:right;
	padding:25px 20px 0 0;	
}
.menu-icon{
	display:hidden;
	width:40px;
	height:40px;
	background:url(image/nav.png) center;
}    

a:hover #menu-icon{
	border-radius:4px 4px 0 0;
}

nav ul{ 
	list-style-type:none;
}

nav ul li{

	font-size: 150%;
	display: inline-block;
	float: left;
	padding:10px;
}
nav ul li a{ 
 
     color:#F5F5F5;
	 text-decoration: none; 
	
 }
nav ul li a:hover{
	color:#C3D7DF;
}
.current{
	color:#C3D7DF;
}

/*styles for panel1*/

#panel1{
  background-color:#800000;
    	
	min-height:400px;
        overflow:auto;
        height:available;
        width:80%;
        
        
    background-color:rgba(67, 56, 48, 0.8);
  
	font-size: 120%;
	border-radius: 25px;
	margin-top:10%;
        margin-bottom: 3%;
	padding: 5%;
                                                  
    
}

#panel1 h1{
    text-align:left;  
    color:#ffffff;
}

/* style input form*/

.parent{
                                            
}

.inner {
    display: block;  /* Remove bullet points; allow greater control of positioning */
    padding: 0;      /* Override defaults for lists */
    margin: 0;       /* Override defaults for lists */
  /*  width: 100%;      Get the row full width */
    border: 1px solid transparent; /* No more visible border */


}

.inner li {
    display: inline-block; /* Get all images to show in a row */
    width: 25%;            /* Show 4 logos per row */
    text-align: center;    /* Centre align the images */
    height: 2em;
}

.inner .warning{
    visibility:hidden;
       font-size: 90%;
       color:#ED1C24;
}

.inner .max{
        visibility:hidden;
        font-size: 90%;
       color:#f9c909;
}


@media (max-width: 960px) and (min-width: 501px) {
    .inner li { width: 50%; } /* Show 2 logos per row on medium devices (tablets, phones in landscape) */
}

@media (max-width: 500px) {
    .inner li { width: 100%; } /* On small screens, show one logo per row */
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

#ajaxDiv{
    
    display: none;
  background-color:#800000;
    	
	min-height:400px;
        overflow:auto;
        height:available;
        width:80%;
        
        
    background-color:rgba(67, 56, 48, 0.8);
  
	font-size: 80%;
	border-radius: 25px;
	/*margin-top:10%;*/
	padding: 5%;
        
        
    margin:auto;
   
    
}

#warnX{
           background-color:rgba(67, 56, 48, 0.8);
           
           display:none;
        width:60%;
        
        
        overflow: visible;
        height: available;
        border-radius: 2px;
        text-align: center;
   font-size: 110%;
   padding: 5px;
   height: 60px;
}

#demo{
  text-align: center;
  
}

#warnX img {
   float:left;    
   margin-left: 20px;
   margin-top: 5px;
}
   </style>         
            
     </head>
    
     
     <!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Smart Feed</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css"/>
         <link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz" rel="stylesheet"> 


    </head>
    <body>
        <header>
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
        
        <section class="banner">
            <div id="banner-inner">
                
                <center>
				
				
				
				
				<div id="panel1">
       
            
        <?php
     
       
      
        session_start();  
        
           
        
        //conneting with main data
        $ingBox = $_SESSION['ingBox']; 
                
        $ingredients = explode("Q", $ingBox);
        $ino= count($ingredients);
        
        
        
        $ageid = $_REQUEST['ageid'];
       
          
          $b = $_POST['check_list']; 
          
          
          
 if(empty($b)) 
{
//echo("You didn't select any ingredients.");

} 
else
{
$N = count($b);
//echo("You selected $N ingredients: ");
for($p=0; $p< $N; $p++)
{
    array_push($ingredients,$b[$p]);

}
}
$_SESSION['ingBox'] = $ingredients;
$ingredientNo = count($ingredients);

//end connecting with main data


         $typename;
         $agename;
                
        //$ingredients = array('Coconut poonac','Maize(grain)','Cassava root meal','Sweet potato(tuber)','Fishmeal(Tuna)');
        //$ingredientNo = count($ingredients);
        //$animalByAge =2;
        
        $animalByAge = $ageid;
        
        
        
        
        //getting nutrient req of animal 2

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "feedformulation3";

        $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        
        
        
        
        $sql = "SELECT* from agecategory where age_id='$animalByAge'";
        $resulta = $conn->query($sql);

        if ($resulta->num_rows > 0) {
            // output data of each row

            if ($row = $resulta->fetch_assoc()) {

                
                $agename= $row["age_cat"];
                $type = $row["type_id"];
                
                }
        } else {
            echo "0 results";
        }
        
        $sql = "SELECT* from animaltype where type_id='$type'";
        $resulta = $conn->query($sql);

        if ($resulta->num_rows > 0) {
            // output data of each row

            if ($row = $resulta->fetch_assoc()) {

                
                $typename= $row["typeName"];
                echo '<h1>'.$typename.'</h1>';
                }
        } else {
            echo "0 results";
        }
        echo '<h1>'.$agename.'</h1>';
        $sql1 = "SELECT* from majorreq where age_id='$animalByAge'";
        $result = $conn->query($sql1);

        if ($result->num_rows > 0) {
            // output data of each row

            if ($row = $result->fetch_assoc()) {

                $Energy = $row["Energy"];
                $_SESSION['Energy'] = $Energy;
                
                
                $Protein = $row["Protein"];
                $_SESSION['Protein'] = $Protein;

                //echo "Energy: " . $Energy . "</br>";

                //echo "Protein: " . $Protein . "</br>";
            }
        } else {
            echo "0 results";
        }
        //end getting req
        //getting minaral req

        $sql2 = "SELECT* from minaralreq where age_id='$animalByAge'";
        $result2 = $conn->query($sql2);

        if ($result2->num_rows > 0) {
            // output data of each row

            if ($row = $result2->fetch_assoc()) {

                $Ca = $row["Ca"];
                $_SESSION['Ca'] = $Ca;
                
                $P = $row["P"];
                $_SESSION['P'] = $P;
                
                $K = $row["K"];
                $_SESSION['K'] = $K;
                
                $Mg = $row["Mg"];
                $_SESSION['Mg'] = $Mg;
                
                $Na = $row["Na"];
                $_SESSION['Na'] = $Na;

                //echo "Ca: " . $Ca . "</br>";

                //echo "P: " . $P . "</br>";

                //echo "K: " . $K . "</br>";

                //echo "Na: " . $Na . "</br>";

                //echo "Mg: " . $Mg . "</br>";
            }
        } else {
            echo "0 results";
        }
        //end getting minaral req
        //getting amino req

        $sql3 = "SELECT* from aminoreq where age_id='$animalByAge'";
        $result3 = $conn->query($sql3);

        if ($result3->num_rows > 0) {
            // output data of each row

            if ($row = $result3->fetch_assoc()) {
               $Met = $row["Met"];
               $_SESSION['Met'] = $Met;
               
               $Lys = $row["Lys"];
               $_SESSION['Lys'] = $Lys;



                //echo "Met: " . $Met . "</br>";

                //echo "Lys: " . $Lys . "</br>";
            }
        } else {
            echo "0 results";
        }
        
 $conn->close();       
        //end getting amino req
//getting nutrient req of animal 2
 
 
 //getting nutrition details of given ingredients
 //for loop to bring each ingredient record from db
 
 //this array has all values of all ingredients
 $nutriString =[];
$bouString = [];
echo '<h1>Feed Formulator<h1><h2>Trail Error Method is Ready.</h2><p>Add quantities here.</p>';
echo '<form>'


          .'<ul class="parent">';

for($j = 0; $j<$ingredientNo; $j++){
    
    
    $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        //this array has nutrients of one ingredient
        $nutriArray =[];
        $bouArray = [];
    
    
    
             // getting upper boundary warning and tip   
            // getting upper boundary warning and tip   
            $sql1 = "SELECT* from ingredient where ing_name='$ingredients[$j]'";
        $result1 = $conn->query($sql1);

        if ($result1->num_rows > 0) {
            // output data of each row

            if ($row = $result1->fetch_assoc()) {
               $upper = $row["upper_boundary"];
               array_push($bouArray,$upper);
          
              
              $warning = $row["warning"];
              array_push($bouArray,$warning);
              
              $warning_type = $row["warning_type"];
              array_push($bouArray,$warning_type);
               
               }
        } else {
            echo "0 results";
        }
        // end getting upper boundary warning and tip   
          
        
        
        
            //getting major content 
           $sql2 = "SELECT* from majorcontent where ing_name='$ingredients[$j]'";
        $result2 = $conn->query($sql2);

        if ($result2->num_rows > 0) {
            // output data of each row

            if ($row = $result2->fetch_assoc()) {
                
                
               $iEnergy = $row["ME"];
                array_push($nutriArray,$iEnergy);
                
                
                $iProtein = $row["CP"];
                array_push($nutriArray,$iProtein);
                 
               }
        } else {
            echo "0 results";
        }
        //endgetting major content 
             
        
        
        
        
            //getting minaral content    
             //getting major content 
           $sql3 = "SELECT* from minaralcontent where ing_name='$ingredients[$j]'";
        $result3 = $conn->query($sql3);

        if ($result3->num_rows > 0) {
            // output data of each row

            if ($row = $result3->fetch_assoc()) {
                
                
               $iCa = $row["Ca"];
                array_push($nutriArray,$iCa);
                
                $iP = $row["p"];
                array_push($nutriArray,$iP);
                
                $iK = $row["K"];
                array_push($nutriArray,$iK);
                
                $iMg = $row["Mg"];
                array_push($nutriArray,$iMg);
                
                $iNa = $row["Na"];
                array_push($nutriArray,$iNa);
 }
        } else {
            echo "0 results";
        }
        //end getting minaral content   
        
        
        
        
        
        
        //getting amino content
       $sql4 = "SELECT* from aminocontent where ing_name='$ingredients[$j]'";
        $result4 = $conn->query($sql4);

        if ($result4->num_rows > 0) {
            // output data of each row

            if ($row = $result4->fetch_assoc()) {
                
                
               $iMet = $row["Met"];
               array_push($nutriArray,$iMet);
               
               $iLys = $row["Lys"];
               array_push($nutriArray,$iLys);

 }
        } else {
            echo "0 results";
        }
       
        //end getting amino content         
            
        
        $conn->close();  
        
        
        
       
      // this string is made of all values of nutriarray(nutrients of one ingredient) 
       $nutriBox = implode(",", $nutriArray);
       $bouBox = implode("Z", $bouArray);
       
       
       
       array_push($nutriString,$nutriBox);
       array_push($bouString,$bouBox); 
        
        //end getting nutrition details of given ingredients
        
         //getting quantity input
        
        
echo '<ul class="inner">'
            . '<li class="label">'
            . $ingredients[$j] . ':'
            . '</li>'
            . '<li class="inputbox">'
            . '<input type="number" min="0" step="any"  value=""/></li>'
        . '<li class="warning"><p name="kaz" ></p></li>'
            . '<li><p id="max'.$j.'" class="max" name="max" ></p></li>'
        
        .'</ul>';
}

// this is the total string that holds all values of all ingredients
$nutriLong = implode("/", $nutriString);
$bouLong = implode("Q", $bouString);

    echo '<script>';
    echo 'var str = ' . json_encode($bouLong) . ';';
    echo '</script>';

$_SESSION['nutriLong'] = $nutriLong;
$_SESSION['bouLong'] = $bouLong;

 
        
        echo '</ul><input type="button" class="button" onclick = "nameInputs('.$ingredientNo.')";  value="go" />'
        . '</form>';
        
//end getting quantity input
        ?>

</div>
        </center> 
				
				
				
				
				
				
				

                </div> 
                   </section>
        
        
        <div id='ajaxDiv'></div><br>
    <center><div id="warnX"> 
                           <img src="../../image/warning.png" alt=""/><p id="demo">Please enter at least one value.</p></div></center>


<!--<p id="demo21"></p>
<p id="demo2"></p>
<p id="demo3"></p>


<h2>sum</h2><p id="a">aaaaaaaaaa</p>-->

 
    </body>
</html>
