<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (isset($_POST['submit'])) {
    $rate=$_POST['rate'];
    $visit=$_POST['visit'];
    $task=$_POST['task'];
    $comment=$_POST['comment'];
$sql="INSERT INTO feedback(rate,visit,task,comment) VALUES(:rate,:visit,:task,:comment)";
$query=$dbh->prepare($sql);
$query->bindParam(':rate',$rate,PDO::PARAM_STR);
$query->bindParam(':visit',$visit,PDO::PARAM_STR);
$query->bindParam(':task',$task,PDO::PARAM_STR);
$query->bindParam(':comment',$comment,PDO::PARAM_STR);
$query->execute();
$lastInsertId=$dbh->lastInsertId();
if ($lastInsertId) {
   echo "<script>alert('Something went wrong. Please try again');</script>";
}
else 
{

 echo '<script>alert("Thank You for your feedback");</script>';
}
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Feedback</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    
    <style type="text/css">
        body{
            background-image: url(1f.jpg);
            background-repeat: no-repeat;
            background-size: 1300px 1000px;
        }
        .wrapper
        {
            padding: 10px;
            margin: -10px auto;
            width: 900px;
            height: 800px;
            background-color: black;
            opacity: .7;
            color: grey;
        }
       
        .form-control
        {
            height: 70px;
            width: 60%;
        }
        
    </style>
    
</head>
<body>
<?php include('includes/header.php');?>




    <div class="wrapper">
 
<h3 align="center" style="color: blue;"><b>Feedback</b></h3>

<form style="" action="" method="post"><br>
    <label for="Name">Name</label>
    <input type="text" name="Name">&nbsp;&nbsp;
    <label for="Email ID">Email ID</label>
    <input type="text" name="Email ID" placeholder="username@gmail.com">    
</form>


    <form>
        <h4>How would you rate our site?</h4>
        <input type="radio" name="foo">1- Extremely Negative<br>
        <input type="radio" name="foo">2<br>
        <input type="radio" name="foo">3<br>
        <input type="radio" name="foo">4- Extremely Positive
    </form>

        <h4>Where you able to complete your task?</h4>
    <form>
        <input type="radio" name="foo">Yes<br>
        <input type="radio" name="foo">No
    </form>

    <form>
        <h4>Would you visit again?</h4>
        <input type="radio" name="foo">Yes<br>
        <input type="radio" name="foo">Maybe<br>
        <input type="radio" name="foo">No
    </form>

        <h4>If you have any suggesions or questions please comment below.</h4>
        <form style="" action="" method="post">
            <input class="form-control" type="text" name="comment" placeholder="write something"><br>
                
        <input class="btn-default" type="submit" name="submit" value="submit" style="width: 100px; height: 35px;">
    
</form>
    </div>

   




        <!-- CONTENT-WRAPPER SECTION END-->
 <?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</script>
</body>
</html>