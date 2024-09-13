
  






<?php include ('dash.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="./sign.css">
</head>
<body>

<section>
<center>
<h1>Sign Up Page</h1>   
<div class="form">
   
<form action="cons.php"method="POST">
        <label for="email"  >Email :</label><br>
        <input type="text" placeholder="write Your Own email" id="email" name="email">
        <br>
        <br>
        <label for="password">Password :</label><br>
         <input type="password" placeholder="Give Password" id="password" name="password">
         <br>
         <br>

         <center><button type="submit"> Sign UP</button></center>
    </form>
</div>
</center>
</section>
<?php include ('foot.php');?>
</body>
</html> 

