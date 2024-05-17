
<?php
$my_array=array();
$conn =mysqli_connect("localhost","root","","vaccine");
 if(isset($_POST['Specialization_id'])){
	$Specialization=$_POST['Specialization_id'];
	
 if($conn){
		   
		    $q="select FullName,id from logindoctor where id_Specialization='$Specialization'";
		    $result = mysqli_query($conn , $q);
           if(mysqli_num_rows($result) > 0)
           {
			     
			   while ($row = $result->fetch_assoc()) {
			$my_array=$row['id'];
			 
			  
			   echo '<option value='.$row['id'].'>'.$row['FullName'].'</option>';
				
             
				}
				
				
		   
		   }
				else{
					
					echo '<option value="1">No Record Found</option>';
					 
				}
		   
		 }
		
			  
		
  }
 

?>