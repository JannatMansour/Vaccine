<?php

$dp="vaccine";
$host="localhost";
$id=$_POST['id'];
$password=$_POST['password'];

$conn =mysqli_connect($host,"root","",$dp);
$data = array();
if($conn)
{

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $q="select * from loginpatient where id='$id' and password='$password'";
    $result = mysqli_query($conn , $q);
    if(mysqli_num_rows($result) > 0)
    {
		 if($row = $result->fetch_assoc()) {
           
		 $data[] = $row;
        }
		$myJSON = json_encode($data);

       echo $myJSON;
    }
}

}

?>