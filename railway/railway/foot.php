<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .divv
    {

        height: 200px;
        background-color: violet;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        
    }
    .img img{
        height: 100px;
       
    }
   .li a
    {
        text-decoration: none;
        font-weight: bold;
        color: black;
        
    }
    .li{
        list-style: none;
    }
</style>
<body>

    <div class="divv">
        <div class="img"><img src="./img/logo.png" alt=""></div>
    <li class="li">
          <a href="./customer.php">Passenger</a>
            <a href="./train.php">Train</a>
            <a href="./station.php">Station</a>
            <a href="./ticket.php">Ticket</a>
            <a href="./home.php">Home</a>
            <a href="./view.php">View</a>
            <a href="./search.php">Search</a>
          </li>
        
          <marquee behavior="" direction="">
          <p>&copy; <?php echo date("Y"); ?> IMRAN NAZIR UDOY. All rights reserved. <span class="copyright">&#169;</span></p>
          </marquee>

    </div>
</body>
</html>