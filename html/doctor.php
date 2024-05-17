<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet"type="text/css" href="../css/doctor.css">
    <script type="text/javascript" src="../js/button.js"></script>
  
</head>
<body>

 <?php
 session_start();

if (!isset($_SESSION['id'])) {
  header('location:Login.php');
}

  $conn =mysqli_connect("localhost","root","","vaccine");
if($conn){
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_SESSION['idPatient'];
    $TypeVaccination = $_POST['TypeVaccination'];
    $NumberVaccination = $_POST['NumberVaccination'];
    $dateVaccination =$_POST['dateVaccination'];
    $High =$_POST['High'];
    $Weight =$_POST['Weight'];
    $Age =$_POST['Age'];
    $q="INSERT INTO `vaccine` (`type`, `number`, `date`, `id_patient`) VALUES ('$TypeVaccination', '$NumberVaccination', '$dateVaccination', '$id')";
    $q2="INSERT INTO `linechart` (`Weight`, `Age`, `High`, `id_patient`) VALUES ('$Weight', '$Age', '$High', '$id');";
    if(mysqli_query($conn , $q)){
      if(mysqli_query($conn , $q2)){
        echo '<script>alert("Successfully entered")
        location.href = "http://localhost/VaccinationsSystem/html/searchdoctor.php";
        </script>';
        
      }else{
        echo '<script>alert("Error in the data entered")</script>';
      }
      
    }else{
      echo '<script>alert("Error in the data entered")</script>';
    }

   
  }
}

    
?>
<div class="Data"><h1 class="ID " >ID: <?php echo $_SESSION['idPatient'];?></h1>
<h1 class="Name" >Name : <?php echo $_SESSION['FirstNamePatient'];?></h1>
</div>
<div class="mane">
<form action="" method="post">



<h2 class="number"> Vaccination</h2>
<input class="Vaccination" type="number" name="NumberVaccination" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "3" required>
<label class="Numberlabel-Vaccination">Number Of Vaccination</label>
<input class="Type-Vaccination" type="text" name="TypeVaccination" required>
<label class="Typelabel-Vaccination">Type of Vaccination</label>

<h2 class="number"> Date</h2>
<input class="Vaccination" type="date" name="dateVaccination" min="<?php echo date("Y-m-d")?>"; required>


<div id="wieght">
    <h2 class="number">Weight</h2>
    <input class="Wieght"  name="Weight"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
    type="number" 
    maxlength = "3" required><br>
    <label class="firstlabel"></label>

    
</div>


<div id="Age">
    <h2 class="number">Age</h2>
    <input class="Age"  name="Age"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
    type="number" 
    maxlength = "3" required><br>
    <label class="firstlabel"></label>
</div>


<div id="High">
    <h2 class="number">High</h2>
    <input class="High"  name="High"  oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
    type="number" 
    maxlength = "3" required><br>
    <label class="firstlabel"></label>
</div>



<button type="submit" >submit</button>
</form>
</div>

</body>

</html>