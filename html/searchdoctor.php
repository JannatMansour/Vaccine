<!DOCTYPE html>
<html>
<head>
<title>Search ID Patient</title>
<link rel="stylesheet" href="../css/searchdoctor.css">
<script type="text/javascript" src="../js/button.js"></script>
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
$name=$_SESSION['FullName'];

$conn =mysqli_connect("localhost","root","","vaccine");
if($conn){
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST['idPatient'];
    $q="select * from loginpatient where $id=id";

    $result = mysqli_query($conn , $q);
    if(mysqli_num_rows($result) > 0)
    {
      if($row = $result->fetch_assoc()) {
                  
             
        $_SESSION['FirstNamePatient'] = $row['FullName'];
        $_SESSION['idPatient'] = $row['id'];

        header("Location: doctor.php");
       
      }
    }else{
             
      echo '<script>alert("Incorrect ID")</script>';
    }
  }
}
?>
<form action="" method="post" >
<button type="submit"  class="btn" name="Logout">
  <span >Log out </span>
    </button>

    </form>

<div class="container" style="display: flex;flex-direction: column;">


<div style="text-align: center;color:white;">

<h1><?php echo "welcome Dr.$name"; ?></h1>
</div>

<form action="" method="post" class="search-bar">
  
<input  name="idPatient" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
type="number" 
maxlength = "13" placeholder="Search ID Patient" required>
<span style="text-align: right;padding-right: 50px;width: 16%;">
<input type="submit" style="background: url(../img/searchicon2.png) no-repeat;text-indent: -999px; cursor: pointer;height: 60px;width: 100%;">

</span>
</form>


</div>
</body>

</html>