<?php include 'request.php' ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css">
  <title></title>
</head>
<body>


    <?php if ($succes==1){echo 'Votre message a bien ete envoyer';}else { ?>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

        <!-- Status -->

        <span class="errora" ><?php if(isset($status_incomplet)) { echo $status_incomplet ; } ; ?></span>
          <span class="error">Monsieur <input type="radio" name="status" value="monsieur">
          Madame   <input type="radio" name="status" value="madame">
          Mlle     <input type="radio" name="status" value="mlle"></span>

          <!-- Document -->

          Name: <input type="text" name="name" value="<?php  if(isset($name_incomplet)) { echo $name_incomplet ; } ;?>">
          Firstname: <input type="text" name="firstname" value="<?php  if(isset($firstname_incomplet)) { echo $firstname_incomplet ; } ;?>">
          Mail: <input type="text" name="mail" value="<?php if(isset($mail_incomplet)) { echo $mail_incomplet ; } ;?>">
          Objet: <input type="text" name="object" value="<?php if(isset($objet_incomplet)) { echo $objet_incomplet ; } ;?>">
          Description:<input style="width:600px;height:80px;" name="description" rows="8" cols="80" value="<?php if(isset($description_incomplet)) { echo $description_incomplet ;} ;?>">

          <!-- Submit -->

          <input type="submit" name="submit" value="submit">
        </form>

  <?php  } ?>





</body>
</html>
