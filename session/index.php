<?
session_start();
unset($_GET['error']);
if(isset($_SESSION["email"])){
  header("Location:/session/auth.php");
}elseif(isset($_POST["email"]) && isset($_POST["pass"]) && $_POST["pass"]!="" && $_POST["pass"]=="1"){
    $user_email=$_POST["email"];
    $user_pass=$_POST["pass"];
    $_SESSION["email"]=$user_email;
    $_SESSION["pass"]=$user_pass;
    header("Location:/cookie/auth.php");
  }elseif($_POST["pass"] != $user_pass || $_POST["login"] != $user_email){
            $errorText = "Логин или пароль введены неверно";
        }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<form action="/cookie/index.php" method="POST">
  <div class="form-group">
    <label for="email" name="email" required>Электронная почта</label>
    <input type="text" placeholder="email" name="email" class="form-control" width>
  </div>
  <div class="form-group">
    <label for="pass" required>Пароль</label>
    <input type="password" class="form-control" class="form-control" name="pass" placeholder="Password">
	<?
            echo($errorText);
        ?>
  </div>
  <button type="submit" class="btn btn-primary">Авторизоваться</button>
</form>
	
	 <style>
   .form-control {
	   width: 200px;
	   margin: 10px;
   } 
  </style>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>