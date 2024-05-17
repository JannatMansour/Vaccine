<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width,intial scale=1.0">
        <title>Login User</title>
        <link rel="stylesheet" href="../css/Login.css">
        <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
    </head>
    <body>
      <?php

session_start();

if (isset($_SESSION['id'])) {
  echo $_SESSION['id'];
  $checkId = $_SESSION['id'];
  $numlength = strlen((string)$checkId);
  if($numlength==6){
    header('location:FirstCreate.php');
  }else if($numlength==9){

      header('location:searchdoctor.php');
  }

}


       $conn =mysqli_connect("localhost","root","","vaccine");
      
       if($conn)
       {
       
           if ($_SERVER["REQUEST_METHOD"] == "POST"){


            $id = $_POST['id'];
            $password = $_POST['password'];
            

           $q="select * from logindoctor where $id=id and $password=password";
         
           $result = mysqli_query($conn , $q);
           if(mysqli_num_rows($result) > 0)
           {
            if($row = $result->fetch_assoc()) {
                  
             
              $_SESSION['FullName'] = $row['FullName'];
              $_SESSION['id'] = $row['id'];

              header("Location: searchdoctor.php");
             
            }
          
           }else{
            $q="select * from loginadmin where $id=id and $password=password";
         
            $result = mysqli_query($conn , $q);
            if(mysqli_num_rows($result) > 0)
    {

        while($row = $result->fetch_assoc()) {
           
          $_SESSION['FullName'] = $row['FullName'];
          $_SESSION['id'] = $row['id'];
          header("Location: FirstCreate.php");
        
        }
     
      }
            else{
             
              echo '<script>alert("Incorrect  ID or Passwords")</script>';
            }
           }
       }
       
      }
      
      ?>
    

    <form class="form" method="post" action="">
        <h1>LOGIN HERE</h1>

        <input name="id"
        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
        type = "number"
        maxlength = "13"
        placeholder="Enter id Here" required>

        <input name="password"
        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
        type = "password"
        maxlength = "13"
        placeholder="Enter password Here" required>

        <button type="submit" class="btn"><span style=" color: #9EC8DF;
    font-weight: bold;">Sign In</span></button>
       
       

          </div>

</form>
    
</body>

