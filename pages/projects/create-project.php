
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="/global.css">
<link rel="stylesheet" href="/pages/projects/create-project.css">
</head>

<body>


 <form method = "post" id = "details" action =  "receive-data-test.php">
  <h2 id = "closebtn">&times;</h2>
  <input type="text" id="pname" name="pname" placeholder = "Enter a project name" required/><br><br>
  <textarea id="pbrief" name="pbrief" rows="4" cols="50" placeholder = "Enter project brief" required/></textarea>
  <br><br>


  <h1>Select Team Members</h1>

<div class = "container">
    <input type="checkbox" class = "nameCheck" name = "names-list[]" value = "John Cena"> John Cena <br>
    <input type="checkbox" class = "nameCheck" name = "names-list[]" value = "Jean Sienna"> Jean Sienna <br>
    <input type="checkbox" class = "nameCheck" name = "names-list[]" value = "Jon Cena"> Jon Cena <br>
    <input type="checkbox" class = "nameCheck" name = "names-list[]" value = "Jone Cena"> Jone Cena <br>
    <input type="checkbox" class = "nameCheck" name = "names-list[]" value = "Jonas Cena"> Jonas Cena <br>
    <input type="checkbox" class = "nameCheck" name = "names-list[]" value = "Jonathan Cena"> Jonathan Cena <br>
    <input type="checkbox" class = "nameCheck" name = "names-list[]" value = "Jerry Cena"> Jerry Cena <br>
    <input type="checkbox" class = "nameCheck" name = "names-list[]" value = "Jimmy Cena"> Jimmy Cena <br>
</div>
<br><br>
  <input id="submitBtn" type="submit" value="Continue" class="">

</form>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

 $(document).ready(function (){
  $("#closebtn").click(function(){
    window.location.href = "/pages/?page=projects"
  })
 })


</script>
</body>
</html>
