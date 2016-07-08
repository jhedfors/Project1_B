<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Pokes - Login/Registration</title>
  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="/assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="/assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
   <div class="errors">
     <?php echo validation_errors() ?>
   </div>
   <div class="row">
     <div class="col s6">
       <h4>Register</h4>
       <form class="" action="/users/register" method="post">
         <label for="name">Name:</label><input type="text" name="name" value="">
         <label for="alias">Alias:</label><input type="text" name="alias" value="">
         <label for="email">Email:</label><input type="email" name="email" value="">
         <label for="password">Password:</label><input type="password" name="password" value="">
         <p>
           *Password should be at least 8 characters
         </p>
         <label for="confirm_pw">Confirm PW:</label><input type="password" name="confirm_pw" value="">
         <label for="confirm_pw">Date of Birth:</label><input type="date" name="dob" value="">
         <input type="submit" value="Register">
       </form>
     </div>
     <div class="col s6">
       <h4>Login</h4>
       <form class="" action="/users/login" method="post">
         <label for="username">Email:</label><input type="text" name="email" value="">
         <label for="password">Password:</label><input type="password" name="password" value="">
         <input type="submit"value="Login">
       </form>
     </div>
   </div>
  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="/assets/js/materialize.js"></script>
  <script src="/assets/js/init.js"></script>
  </body>
</html>
