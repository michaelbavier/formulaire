<?php
  try
  {
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=formulaire;charset=utf8', 'root', '');
  }
  catch(Exception $e)
  {
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : '.$e->getMessage());
  }

  $name = $firstname = $mail = $objet = $description = $status= "";
  $succes = 0;

  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["name"])) {
      $name_incomplet= "Name is required";
    }else {
      $name = test_input($_POST["name"]);
    }

    if (empty($_POST["firstname"])) {
      $firstname_incomplet= "Firstname is required";
    }else {
      $firstname = test_input($_POST["firstname"]);
    }

    if (empty($_POST["mail"])) {
      $mail_incomplet= "Mail is required";
    }else {
      $mail = test_input($_POST["mail"]);
    }

    if (empty($_POST["objet"])) {
      $objet_incomplet= "Objet is required";
    }else {
      $objet = test_input($_POST["objet"]);
    }

    if (empty($_POST["description"])) {

    $description_incomplet= "Description is required";
    }else {
      $description = test_input($_POST["description"]);
    }

    if (empty($_POST["status"])) {
      $status_incomplet= "Status is required";
    }else {
      $status = test_input($_POST["status"]);
    }
  }

  function test_input($data){
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    $sql = $data;
  }

  if(isset($_POST["submit"])){
    if (isset($_POST['status']) && isset($_POST['name']) && isset($_POST['firstname']) && isset($_POST['mail']) && isset($_POST['object']) && isset($_POST['description'])){

    $status=$_POST['status'];
    $name=$_POST['name'];
    $firstname=$_POST['firstname'];
    $mail=$_POST['mail'];
    $objet=$_POST['object'];
    $description=$_POST['description'];


    $sql = "INSERT INTO formulaire (status,name,firstname,mail,object,description) VALUES (:status,:name,:firstname,:mail,:objet,:description)";
    $sql = $bdd -> prepare($sql);
    $sql->bindParam(':status',    $status,PDO::PARAM_STR);
    $sql->bindParam(':name',      $name,PDO::PARAM_STR);
    $sql->bindParam(':firstname', $firstname,PDO::PARAM_STR);
    $sql->bindParam(':mail',      $mail,PDO::PARAM_STR);
    $sql->bindParam(':objet',    $objet,PDO::PARAM_STR);
    $sql->bindParam(':description', $description,PDO::PARAM_STR);

    $sql-> execute();

    $succes = 1;

    }
  }


   ?>
