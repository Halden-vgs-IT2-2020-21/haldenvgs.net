
<?php session_start();
   if (!isset($_SESSION['Brukernavn']) || empty($_SESSION['Brukernavn'])) {
      echo "<script>alert('Vennligst logg inn')</script>";
      echo "<script>window.location = 'http://localhost/Russebudsjett/Logg_inn.html'</script>";
      exit();
   }

?>
  <?php
    ini_set('display_errors', '0');
include '../../connection.php';

    $id=$_POST["Id"];
    $sum=$_POST["Sum"];
    $item=$_POST["Item"];
    $Brukernavn=$_SESSION["Brukernavn"];


    $SQL=mysqli_query($tilkobling, "DELETE FROM `haldenvg_it`.`budsjett` WHERE `id`='$id'");
     mysqli_query($tilkobling, "INSERT INTO `historikk` (`Brukernavn`,`Sum`,`Tid`,`Navn`,`Type`) VALUES ('$Brukernavn','$sum',NOW(),'$item','15')");
     if (!$SQL) {
     echo "<script>alert ('Kunne ikke slette')</script>";
     die();
    echo "<script>window.history.back();</script>";
     }
     else {
  echo "<script>window.history.back();</script>";
  }
  ?>
