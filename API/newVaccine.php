<?php

$dp="vaccine";
$host="localhost";
$id=$_POST['id'];

$conn =mysqli_connect($host,"root","",$dp);
 $data = array();
 $Current_date=date("Y-m-d");
if($conn)
{

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $q="select type,number,date from vaccine where $id=id_patient";
	
    $result = mysqli_query($conn , $q);

    if(mysqli_num_rows($result) > 0)
    {
		 while($row = $result->fetch_assoc()) {
           
		   if($row['date']>=$Current_date)
		 $data[] = $row;
        }
		$myJSON = json_encode($data);

       echo $myJSON;
    }
}

}

?>