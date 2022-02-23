<!DOCTYPE html>
<html>
<head>
	<title>Edit User</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<form method="post" enctype="multipart/form-data">
  <div class="container my-5">

  <div>
    <h2>EDIT USER</h2>
    <?php
$conn = mysqli_connect('localhost', 'root', '', 'ensat');

if(isset($_GET['Edit'])){
  $edit_ID=$_GET['Edit'];
  $sql="SELECT  * FROM eleves WHERE ID_eleve='$edit_ID' ";
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_array($result);
       $ID_eleve=$row['ID_eleve'];
       $CNE=$row['CNE'];
       $Nom=$row['Nom'];
       $Prenom=$row['Prenom'];
       $Adresse=$row['Adresse'];
       $Ville=$row['Ville'];
       $email=$row['email'];
       $Photo=$row['Photo'];
       $etat=$row['etat'];
}
?>
</div>
  <label class="form-label">CNE</label>
  <input type="text" placeholder="CNE" value="<?php echo $CNE ; ?>" name="CNE">
  </div>
  <div class="container my-5">
  <label class="form-label">NOM</label>
  <input type="text" placeholder="Name" value="<?php echo $Nom ; ?>" name="Nom">
  </div>
  <div class="container my-5">
  <label class="form-label">Prenom</label>
  <input type="text" placeholder="Prenom" value="<?php echo $Prenom ; ?>"  name="Prenom">
  </div>
  <div class="container my-5">
  <label class="form-label">Adresse</label>
  <input type="text" placeholder="Adresse" value="<?php echo $Adresse ; ?>" name="Adresse">
  </div>
  <div class="container my-5">
  <label class="form-label">Ville</label>
  <input type="text" placeholder="Ville" value="<?php echo $Ville ; ?>" name="Ville">
  </div>
  <div class="container my-5">
  <label class="form-label">Email</label>
  <input type="text" placeholder="Email" value="<?php echo $email ; ?>" name="email">
  </div>
  <div class="container my-5">
  <label class="form-label">Photo</label>
  <input type="file" name="Photo" >
  </div>
  <div class="container my-5">
  <label class="form-label">Etat</label>
  <input type="text" placeholder="Etat" value="<?php echo $etat ; ?>" name="etat">
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
  <?php
$conn = mysqli_connect('localhost', 'root', '', 'ensat');
if(isset($_POST['submit'])){
 $eCNE=$_POST['CNE'];
 $eNom=$_POST['Nom'];
 $ePrenom=$_POST['Prenom'];
 $eAdresse=$_POST['Adresse'];
 $eVille=$_POST['Ville'];
 $eemail=$_POST['email'];
 $ePhoto=$_FILES['Photo']['name'];
 $etmp_name=$_FILES['Photo']['tmp_name'];
 $eetat=$_POST['etat'];
 $update="UPDATE eleves SET CNE='$eCNE', Nom='$eNom' ,Prenom='$ePrenom', Adresse='$eAdresse', Ville='$eVille', email='$eemail' ,Photo='$ePhoto',etat='$eetat' WHERE ID_eleve='$edit_ID'";
 $result=mysqli_query($conn,$update);
 if($result===true){
   echo " <p style='color:green'>Data inserted updated </p>";
   move_uploaded_file($etmp_name,"./photos/$ePhoto");
 }else{
   echo "failed , try again";
 }
}
?>
  <button class="btn btn-primary"> <a href="afficher.php" class="text-light"> Afficher Liste</a> </button> </body>

</form>

</html>
