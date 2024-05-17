<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width,intial scale=1.0">
        <title>CreatAccount Patient</title>
        <link rel="stylesheet" href="../css/CreateAccountDocotor.css">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	
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
    $IdDoctor =$_POST['IdDoctor'];
    $NameDoctor =$_POST['NameDoctor'];
    $PasswordDoctor =$_POST['PasswordDoctor'];
    $NameSpecialization =$_POST['NameSpecialization'];
    $q="INSERT INTO `logindoctor` (`id`, `password`, `FullName`, `id_Specialization`) VALUES ('$IdDoctor', '$PasswordDoctor', '$NameDoctor', '$NameSpecialization');";
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
        <h1>Doctor</h1>
        <form method="post" name="Form">
		<input type="number"  name="IdDoctor" id="id" required oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
            type="number" 
            maxlength = "10"placeholder="Id">
            <input type="text" name="NameDoctor" id="name "placeholder="Name" required>
            
            <input type="password" name="PasswordDoctor" id="password" placeholder="Password" required>
			 <div class="select" style="width:100%">
			 <select  name="NameSpecialization" required >
                <?php
				
      
       if($conn){
		   
		    $q="select id,Specialization from specializations";
		    $result = mysqli_query($conn , $q);
           if(mysqli_num_rows($result) > 0)
           {
			  
			   	echo '<option value="">Select Specialization</option>';
           foreach($result as $row){
			  
			   ?>
			     <option value="<?=$row['id'];?>"><?=$row['Specialization']?></option>
				 <?php
             
				}
		   
		   }
				else{
					?>
					 <option value="No Record Found">No Record Found</option>
					 <?php
				}
            
	   }
              ?>
            </select>
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