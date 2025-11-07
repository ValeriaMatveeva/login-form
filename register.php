<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Register</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">

        <?php 
         
         include("php/config.php");
         if(isset($_POST['submit'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $age = $_POST['age'];
            $password = $_POST['password'];

         //verifying the unique email

         $verify_query = mysqli_query($con,"SELECT Email FROM users WHERE Email='$email'");

         if(mysqli_num_rows($verify_query) !=0 ){
            echo "<div class='message'>
                      <p>Этот адрес электронной почты используется. Попробуйте другой адрес!</p>
                  </div> <br>";
            echo "<a href='javascript:self.history.back()'><button class='btn'>Вернуться</button>";
         }
         else{

            mysqli_query($con,"INSERT INTO users(Username,Email,Age,Password) VALUES('$username','$email','$age','$password')") or die("Erroe Occured");

            echo "<div class='message'>
                      <p>Регистрация прошла успешно!</p>
                  </div> <br>";
            echo "<a href='index.php'><button class='btn'>Войти сейчас</button>";
         

         }

         }else{
         
        ?>

            <header>Регистрация</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Имя</label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Почта</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="age">Возраст</label>
                    <input type="number" name="age" id="age" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="password">Пароль</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                
                    <input type="submit" class="btn" name="submit" value="Зарегистрироваться" required>
                </div>
                <div class="links">
                    Уже имеете аккаунт? <a href="index.php">Войти</a>
                </div>
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>