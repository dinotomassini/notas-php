<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Prueba Login</title>
</head>

<body>
  <?php // echo phpinfo(); 
  ?>
  <h1> PRUEBA DELOGIN </h1>
  <p> Las credenciales de prueba son: </p>
  <ul>
    <li>Usuario: dino</li>
    <li>Password: dinodino</li>
    <li>Usuario: emma</li>
    <li>Password: emmaemma</li>
  </ul>

  <form action="/src/controllers/login.controller.php" method="post">
    <label for="user">Usuario: </label>
    <input type="text" name="user" id="user" autofocus required>
    <label for="pass">Password: </label>
    <input type="password" name="pass" id="pass" required>
    <button type="submit">Ingresar</button>
  </form>

</body>

</html>
