<?php
$con = mysqli_connect("localhost", "root", "", "library");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $password = mysqli_real_escape_string($con, $_POST['password']); // No hash

    // Check if username or email already exists
    $check = mysqli_query($con, "SELECT * FROM users WHERE username = '$username' OR email = '$email'");
    if (mysqli_num_rows($check) > 0) {
        $message = "Username or email already exists.";
    } else {
        mysqli_query($con, "INSERT INTO users (username, email, phone, password) VALUES ('$username', '$email', '$phone', '$password')");
        $message = "Sign up successful! <a href='login.php'>Login now</a>";
    }
}
?>

<style>

  .top-message {
  position: fixed;
  top: 10px;
  left: 50%;
  transform: translateX(-50%);
  background-color: rgba(0,0,0,0.6);
  color: white;
  font-weight: bold;
  padding: 12px 24px;
  border-radius: 8px;
  z-index: 1000;
  font-size: 18px;
  text-align: center;
  backdrop-filter: blur(5px);
}

.top-message a {
  color: #ffd700;
  text-decoration: underline;
}


  body, html {
    height: 100%;
    background-image: url('https://i0.wp.com/www.rovan.in/wp-content/uploads/2024/02/library-management-system.webp?w=640&ssl=1');
    background-size: cover;
    background-position: center;
    display: flex;
    justify-content: center;
    align-items: center;
  }

.wrapper{
    display: flex;
     background: rgba(0, 0, 0, 0.2);
      border-radius: 12px;
      box-shadow: 0 0 30px rgba(0, 0, 0, 0.3);
      overflow: hidden;
      backdrop-filter: blur(5px);
}

 .container-left{
    width: 400px;   
    background-image:url('https://www.skoolbeep.com/blog/wp-content/uploads/2020/12/WHAT-IS-THE-PURPOSE-OF-A-LIBRARY-MANAGEMENT-SYSTEM-min.png');
    background-size:cover;
    background-position: center;
   
 }
  .container {
    width: 350px;  
    padding: 30px; 
    background: rgba(77, 136, 224, 0.1);
    color:white;
    display: flex;
    flex-direction: column;
    justify-content: center;
  }

   h2 {
      text-align: center;
      margin-bottom: 20px;
    }

  .container input[type="text"],
  .container input[type="email"],
  .container input[type="password"] {
    width: 100%;
    padding: 8px;
    margin: 6px 0;
    border: none;
    border-radius: 5px;
  }

  
.container input[type="submit"] {
    display: block;
    width: 50%;
    margin: 10px auto;
    padding: 8px;
    background: #673ab7;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  .container input[type="submit"]:hover {
    background: #5e35b1;
  }

  .password-wrapper {
  position: relative;
  width: 100%;
}

.password-wrapper input {
  width: 100%;
  padding-right: 40px; /* make space for the eye button */
  padding: 8px;
  border: none;
  border-radius: 5px;
}

.eye-btn {
  position: absolute;
  top: 50%;
  right: 10px;
  transform: translateY(-50%);
  background: transparent;
  border: none;
  cursor: pointer;
  font-size: 18px;
}

</style>

<?php if (!empty($message)) { ?>
  <div class="top-message"><?php echo $message; ?></div>
<?php } ?>


<div class="wrapper">
  

<div class="container-left"></div>

<div class="container">
  <h2>Sign Up</h2>  
  <form method="POST">
    Username:
    <input type="text" name="username" required><br>
    Email:
    <input type="email" name="email" required><br>
    Phone:
    <input type="text" name="phone" required><br>
    Password:
<div class="password-wrapper">
  <input type="password" name="password" id="password" required>
  <button type="button" class="eye-btn" onclick="togglePassword()">👁</button>
</div>
<br>
    <input type="submit" value="Sign Up">
  </form>
   <a href="login.php">Login</a>
</div>
</div>


<script>
function togglePassword() {
    var passField = document.getElementById("password");
    if (passField.type === "password") {
        passField.type = "text";
    } else {
        passField.type = "password";
    }
}
</script>
