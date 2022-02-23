<?php
include 'connect.php';
if(isset($_POST["submit"])){
 $CNE=$_POST['CNE'];
 $Nom=$_POST['Nom'];
 $Prenom=$_POST['Prenom'];
 $Adresse=$_POST['Adresse'];
 $Ville=$_POST['Ville'];
 $email=$_POST['email'];
 $Photo=$_FILES['Photo']['name'];
 $tmp_name=$_FILES['Photo']['tmp_name'];
 $etat=$_POST['etat'];
 $insert="INSERT INTO eleves (CNE,Nom,Prenom,Adresse,Ville,email,Photo,etat) values ('$CNE','$Nom','$Prenom','$Adresse','$Ville','$email','$Photo','$etat')";
 $result=mysqli_query($conn,$insert);
 if($result){
   echo "Date inserted successfuly";
   move_uploaded_file($tmp_name,"./photos/$Photo");
 }else{
   echo "failed , try again";
 }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>ADD NEW USERS</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form method="post" enctype="multipart/form-data">
   <div class="container my-5">
    <div>
    <h2>ADD USER </h2>
</div>
  <label class="form-label">CNE</label>
  <input type="text" placeholder="CNE" name="CNE">
  </div>
  <div class="container my-5">
  <label class="form-label">NOM</label>
  <input type="text" placeholder="Name" name="Nom">
  </div>
  <div class="container my-5">
  <label class="form-label">Prenom</label>
  <input type="text" placeholder="Prenom" name="Prenom">
  </div>
  <div class="container my-5">
  <label class="form-label">Adresse</label>
  <input type="text" placeholder="Adresse" name="Adresse">
  </div>
  <div class="container my-5">
  <label class="form-label">Ville</label>
  <input type="text" placeholder="Ville" name="Ville">
  </div>
  <div class="container my-5">
  <label class="form-label">Email</label>
  <input type="text" placeholder="Email" name="email">
  </div>
  <div class="container my-5">
  <label class="form-label">Photo</label>
  <input type="file" name="Photo">
  </div>
  <div class="container my-5">
  <label class="form-label">Etat</label>
  <input type="text" placeholder="Etat" name="etat">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  <button class="btn btn-primary"> <a href="afficher.php " style="text:text-light"> Afficher Liste</a></button>

</form>
</body>

</html>
