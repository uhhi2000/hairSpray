<?php
//Hämtar databas
session_start();

   $dbsettings = parse_ini_file('../database.ini');
   $servername = $dbsettings['address'];
   $username = $dbsettings['username'];
   $password = $dbsettings['password'];
   $dbname = $dbsettings['dbname'];
// Vi loggar in i databasen
$connect = new mysqli($servername, $username, $password, $dbname);
// Testa om det funkar
if ($connect->connect_error) {
   die("FEL: " . $connect->connect_error);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
</head>
<body>
   <h1>Välkommen admin!</h1>
</body>



<?php

session_start();
echo 'Hej '.$_SESSION['username'];
echo '<br><a href="admin.php?action=logout">Logga ut</a>';


//Hämtar lista för nyhetsbrev
$query = "SELECT * FROM Person";
$select_Person = mysqli_query($connect,$query);

while($row = mysqli_fetch_assoc($select_Person )) {
  echo $post_ID = $row['ID'];
  echo $post_Name = $row['Name'];
  echo $post_Email = $row['Email'];
  echo "<br/>";

}

 function subtraktStock($id){
    "UPDATE tbl_product SET Antal = Antal - 1 WHERE ID = $id";
};
?>

<?php

echo "<br/><br/>";
$query = "SELECT * FROM tbl_product WHERE Antal";
$select_stock = mysqli_query($connect, $query);

  while ($row = mysqli_fetch_assoc($select_stock)){
    echo '<br/>' .$row['Antal'];
    echo '<button id="btnUp">+</button>';
    echo '<button id="btnDown">-</button>';
}

subtraktStock(1);

?>

</html>


