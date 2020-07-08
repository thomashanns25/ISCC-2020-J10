<?php

function connect_to_database() 
{
    $severname="localhost";
    $username="root";
    $password="";
    $databasename="basetest01";

try
{
    $pdo= new PDO("mysql:host=$severname;dbname=$databasename",$username,$password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "<b>Vous êtes connecté</b>";
    return  $pdo;
}
catch(PDOException $e) 
{
    echo "<b>Vous n'êtes pas connecté</b>".$e->getMessage();
}
}

$pdo = connect_to_database();

$query=$pdo->query("SELECT * FROM produit")->fetchAll();

echo '<ul>';
foreach($query as $product)
{
    echo "<li>".$product['nom']."</li><br/>";
}
echo '</ul>';

?>