<?php
include 'connect.php' ;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <mata name="viewport" content="width=device-width,intial-scale=1.0">
    <title>Liste Etudiants</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body >
    <div class="container">
    <div>
<h1>LISTE ETUDIANS </h1>
</div>
        <button class="btn btn-primary my-5"> <a href="addusers.php" class="text-light"> Add etudiants</a> </button>
        <button class="btn btn-danger"> <a href="logout.php" class="text-light"> logout</a> </button>

<?php
if(isset($_GET['del'])){
  echo  $del_id=$_GET['del'] ;
  $delete="DELETE FROM eleves WHERE ID_eleve='$del_id'";
  $result= $result=mysqli_query($conn,$delete);
  if($result){
      echo " <h5 style='color:green'> delete eleve successfuly ! </h5> "  ;
  }else{
      echo "failed try again !";
  }

}
?>
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">id</th>
      <th scope="col">CNE</th>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Adress</th>
      <th scope="col">Ville</th>
      <th scope="col">Email</th>
      <th scope="col">Photo</th>
      <th scope="col">Etat</th>
      <th scope="col">Delete</th>
      <th scope="col">Edit</th>




    </tr>
  </thead>
  <tbody>
      <?php
   $sql="SELECT  * FROM eleves";
   $result=mysqli_query($conn,$sql);
       while($row=mysqli_fetch_array($result)){
       $ID_eleve=$row['ID_eleve'];
       $CNE=$row['CNE'];
       $Nom=$row['Nom'];
       $Prenom=$row['Prenom'];
       $Adresse=$row['Adresse'];
       $Ville=$row['Ville'];
       $email=$row['email'];
       $Photo=$row['Photo'];
       $etat=$row['etat'];
       ?>
    <tr>
    <td> <?php echo $ID_eleve ; ?></th>
    <td> <?php echo $CNE ; ?></td>
    <td> <?php echo $Nom ; ?></td>
    <td> <?php echo $Prenom ; ?></td>
    <td> <?php echo $Adresse ; ?></td>
    <td> <?php echo $Ville ; ?></td>
    <td> <?php echo $email ; ?></td>
    <td> <img src="./photos/<?php echo $Photo ; ?>" height=140px width="130px"></td>
    <td> <?php echo $etat ; ?></td>
    <td><a class="btn btn-danger" href="afficher.php?del=<?php echo $ID_eleve ; ?>">DELETE</td>
    <td><a class="btn btn-danger" href="Edit.php?Edit=<?php echo $ID_eleve ; ?>">EDIT</td>

    </tr>

  <?php }?>

  </tbody>
</table>
    <div>
</body>
</html>
