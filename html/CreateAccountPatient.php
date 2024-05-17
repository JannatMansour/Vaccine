<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width,intial scale=1.0">
        <title>Creat Account Patient</title>
        <link rel="stylesheet" href="../css/CreatAccountPatient.css">
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
    $IdPatient =$_POST['IdPatient'];
    $NamePatient =$_POST['NamePatient'];
    $PasswordPatient =$_POST['PasswordPatient'];
    $gender =$_POST['gender'];
    $q="INSERT INTO `loginpatient` (`id`, `password`, `FullName`, `gender`) VALUES ('$IdPatient', '$PasswordPatient', '$NamePatient', '$gender');";
     if(mysqli_query($conn , $q)){
        echo '<script>alert("Successfully entered")
        location.href = "http://localhost/VaccinationsSystem/html/FirstCreate.php";
        </script>';
        
      }else{
        echo '<script>alert("Error in the data entered")</script>';
      }

   
  }
}
?>
    <div class="form">
        <h1>Patient</h1>
        <form method="post" name="Form">
		<input type="number"  name="IdPatient" id="id" required oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
            type="number" 
            maxlength = "10"placeholder="Id">
            <input type="text" name="NamePatient" id="name "placeholder="Name" required>
            
            <input type="password" name="PasswordPatient" id="password" placeholder="Password" required>
			<div style="display:flex; flex-direction: row">
			
                <input type="radio" id="contactChoice3"
       name="gender" value="male" required>
      <label for="contactChoice3" >male </label>
	  
	    <input type="radio" id="contactChoice3"
       name="gender" value="female" required>
      <label for="contactChoice3">female</label>
	  </div>
               <input type="submit" style=" color: #9EC8DF;
               font-weight: bold; border-bottom: none;
    border-top: none;
    border-left: none;
    border-right: none;cursor: pointer;" value="Create" class="right-btn">
        </form>
        
        
        
      
          </div>
   
</div>
    
</body>