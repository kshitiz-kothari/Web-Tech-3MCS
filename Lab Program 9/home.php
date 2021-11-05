<?php
   session_start();
   
   if(!isset($_SESSION['username'])){
   	header('location:index.php');
   }
   
   
   $con = mysqli_connect('localhost','root');
  
   	mysqli_select_db($con,'test');
   
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title></title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="style.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="
         https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
      <style type="text/css">
         .animateuse{
         animation: leelaanimate 0.5s infinite;
         }
         @keyframes leelaanimate{
         0% { color: red },
         10% { color: yellow },
         20%{ color: blue }
         40% {color: green },
         50% { color: pink }
         60% { color: orange },
         80% {  color: black },
         100% {  color: brown }
         }
      </style>
   </head>
   <body>

 

      <div>
       <!--   <h1 class="text-center text-white font-weight-bold text-uppercase bg-dark" >  Complete Quiz Website using PHP and MYSQL using Session</h1><br>
      <div class="container "><br> -->
      <div class="container "><br>
         <div class="container">
         
            <!-- <h1 class="text-center text-success text-uppercase animateuse" >  ThapaTechnical  Webdeveloper Quiz </h1>
            <br> -->
            <div class=" col-lg-12 text-center">
               <h3> <a href="#" class="text-uppercase text-warning"> <?php echo $_SESSION['username']; ?>,</a> Welcome to Quiz </h3>
            </div>
            <br>
            <div class="col-lg-8 d-block m-auto bg-light quizsetting ">
               <div class="card">
                  <p class="card-header text-center" > <?php echo $_SESSION['username']; ?>Answer the following questions<i class="fas fa-thumbs-up"></i>	 </p>
               </div>
               <br>
               <form method="POST" action="home.php">
        <?php
	
            $file = new SplFileObject("questions.txt");
            $counter=0;
            while(!$file->eof())
            {
                $counter++;
                echo $counter." ";
                echo $file->fgets()."<br/>";
                echo "<input type='text' name='ans$counter' id='' value=''/><br/>";
            }
            $file = null;
        ?>
        <input type="submit" value="SAVE" name="submit" class="btn btn-success d-block m-auto">
        </form>
        <br>
        <form action="checked.php">
        <input type="submit" value="Next" name="submit" class="btn btn-success d-block m-auto">
        </form>
        
  
     
   
                  
               <p id="letc"></p>
            </div>
            <br>
            <a href="logout.php" class="btn btn-primary d-block m-auto text-white" > Logout </a> <br>
         </div>
         <br>
        
      </div>


      <?php

      $startlimit  = 0;
      $q =" select q_id from answers";
      $query = mysqli_query($con,$q);
      $lastpage = mysqli_num_rows($query);

      $totalpage = ceil($lastpage / 2);
      ?>
      <div class="m-auto"><br>
         <ul class="pagination">
      <?php
      for($i=1; $i<=$totalpage; $i++){
         ?>
      
      <li class="float-left list-unstyled page-item" > <a href="home.php?page=<?php echo $i; ?>" class="page-link">  <?php  echo $i;  ?> </a> </li>
      
       <?php  
           }
        ?>
        </ul>
      </div>



   </body>
   <?php
    function display()
    {
        $fp = fopen('student_ans.txt', 'a');
        $i=1;
        // $file = fopen("student_ans.txt","a");
        // $filename="student_ans.txt";
        while($i!=$GLOBALS['counter']+1){
            $line="Answer $i - ".$_POST["ans$i"]."\n";
            // file_put_contents($filename, $line);
            fwrite($fp, $line);
            $i++;
        }
        // fclose($file);
        fclose($fp);
    }
    if(isset($_POST['submit']))
    {
    display();
    } 
    ?> 
</html>
