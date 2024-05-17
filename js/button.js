
  function validateForm() {
    var a = document.forms["Form"]["name"].value;
    var b = document.forms["Form"]["id"].value;
    /*var c = document.forms["Form"]["email"].value;*/
    var d = document.forms["Form"]["password"].value;

   if(a == '' || b=='' || c=='' || d==''){
    alert("Please Fill All Required Field");

   }
   
}
