<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservations</title>
    <link rel="stylesheet"type="text/css" href="../css/reservations.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script>
	

	function FetchState(id){
   $('#NameDoctor').html('');
   
    $.ajax({
      type:'post',
      url: 'FullNameDoctor.php',
      data : { Specialization_id : id},
      success : function(data){
		  
            $('#NameDoctor').html(data);
      }
	  
    })
  }
	

	</script>
</head>
<body>
<?php
   $conn =mysqli_connect("localhost","root","","vaccine");
 session_start();
if (!isset($_SESSION['id'])) {
  header('location:Login.php');

}
 
if($conn){
  if ($_SERVER["REQUEST_METHOD"] == "POST"){
	  
	    $IdPatient =$_POST['IdPatient'];
	$IdDoctor =$_POST['NameDoctor'];
    $dateRes =$_POST['dateReservation'];
	  
	 
     $dateReservation = str_replace( array('T'), ' ', $dateRes);

$title='dr';

    $q="INSERT INTO `reservations` (`id_doctor`, `id_patient`, `data_reservations`) VALUES ('$IdDoctor', '$IdPatient', '$dateReservation');";
	
	  $q2="select FullName from logindoctor where id='$IdDoctor'";
		    $result = mysqli_query($conn , $q2);
           if(mysqli_num_rows($result) > 0)
           {
			     
			   if ($row = $result->fetch_assoc()) {
				   
					$title=$row['FullName'];
				}
		   }
     if(mysqli_query($conn , $q)){
		 
	


$body=$dateReservation;
define('API_ACCESS_KEY','AAAASDgUrco:APA91bGlpKsUThJhA32jbQSqB6W_X38313btxI_jmB-Q6TGV8QJxvv5JWFiah8-afesRwKyfBki8qxdILusnpjR3IO6eXCplGyHEO8n6-vBD4rfPuLJRcFDY9lXPn7TIy8OKW3HNNPcb');
 $fcmUrl = 'https://fcm.googleapis.com/fcm/send';

     $notification = [
	 
            'title' =>$title,
            'body' => $body,
            'icon' =>'myIcon', 
            'sound' => 'mySound',
     
        ];
        

        $fcmNotification = [
            //'registration_ids' => $tokenList, //multple token array
           'to' => "/topics/" .$IdPatient,
            'data' => $notification,
        ];

        $headers = [
            'Authorization: key=' . API_ACCESS_KEY,
            'Content-Type: application/json'
        ];
  
  
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$fcmUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fcmNotification));
        $result = curl_exec($ch);
        curl_close($ch);


        echo $result;

     
		 
		 
		 
		 
        echo '<script>alert("Successfully entered")
        location.href = "http://localhost/VaccinationsSystem/html/FirstCreate.php";
        </script>';
        
      }else{
        echo '<script>alert("Error in the data entered")</script>';
      }

   }
  
}

?>
    <div class="contaner">
<form class="center" method="post">
    <div class="splitTwoRow">
        <h2>Specialization</h2>
        <div class="select" style="width:41%">
            <select onchange="FetchState(this.value)" name="Specialization" required >
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
          
    </div>
   
    <div class="splitTwoRow">
        <h2>Doctor</h2>
        <div class="select" style="width:41%">
            <select  name="NameDoctor" id="NameDoctor" required>
            <option option value="">Select a Doctor</option>
            </select>
          </div>
    </div>

    <div class="splitTwoRow">
        <h2 >Patient ID</h2>
        <input type="number" name="IdPatient" style="height:50px;width: 40%;" placeholder="id patient"  required >
    </div>

    <div class="splitTwoRow">
        <h2>Date</h2>
        <input  type="datetime-local" step="1" name="dateReservation" style="height:50px;width: 40%;" required >
     
    </div>
	<script>
  var today = new Date().toISOString().slice(0, 16);

document.getElementsByName("dateReservation")[0].min = today;
</script>
    <div class="splitTwoRow">
        <button type="submit" >Save</button>
     
    </div>
  


</form>

    </div>
</body>

</html>
