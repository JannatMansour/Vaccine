<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/FirstCreate.css">
    <title>Document</title>
    
</head>
<body>

<?php

session_start();
if (!isset($_SESSION['id'])) {
  header('location:Login.php');

}

if(isset($_POST["Logout"]))
{
  unset($_SESSION['id']);
  header('location:Login.php');
}
?>
<form action="" method="post" >
<button type="submit"  class="btn" name="Logout">
  <span >Log out </span>
    </button>

    </form>
    <section>
	<div ><h1>Doctor</h1></div>
 <div ><h1>Patient</h1></div>

<div ><h1>And Reservation</h1></div>   
        <div ><a href="../html/CreateAccountDoctor.php"><img src="../img/doctor1.jpg"  alt="" ></a></div>
        <div ><a href="../html/CreateAccountPatient.php"><img src="../img/Patient1.png"   alt="" ></a></div>
        <div ><a href="../html/reservations.php"><img src="../img/reservation1.png"  alt="" ></a></div>

    </section>
</body>
</html>