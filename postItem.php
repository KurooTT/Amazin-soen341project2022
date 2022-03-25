<!DOCTYPE html>
<html>
<head>
    <title>AMAZIN</title>
	<link rel="stylesheet" href="Application/css/post.css">
	<meta charset="UTF-8">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="Application/css/footer.css" />
    <link rel="stylesheet" href="Application/css/menu-bar.css" />
    <link rel="stylesheet" href="Application/css/index.css" />


</head>
<body>
  <!-- menu bar-->  
  <?php
        //include "navbar.php";
  ?>

<div class="header">
  <h2>Post item for sale</h2>
</div>




<form action="/action_page.php">

<div class="labelprod">
<label for="proddesc">Product Description:</label><br><br>

	<textarea id="proddesc" name="proddesc" rows="8" cols="30"></textarea><br><br>
	<label for="price">Price:</label><br><br>
	<input type="text" id="text"  name="price" ><br><br>

<label for="category">Product Type:</label><br><br>
  <select name="category" id="category">
    <option value="clothes">Clothes</option>
    <option value="elec">Electronics</option>
    <option value="jewl">Jewelry</option>
    <option value="tools">Tools</option>
  </select>
  <br><br>

 
<label for="output">Add Image:</label>
<input type="file" accept="image/*" onchange="loadFile(event)">
<img id="output" width="250" 
     height="200"/><br><br>

<input type="button" id="bt" value="Sell Item"><br><br>	 
</div>	 

<input type="button" id="bt" value="Sell Item"><br><br>	 

</form>


<script>
  var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
      URL.revokeObjectURL(output.src) 
    }
  };
</script>

<?php
    include "footer.php";
  ?>

</body>
</html>