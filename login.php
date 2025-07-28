<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "library");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = $_POST['password'];

    $result = mysqli_query($con, "SELECT * FROM users WHERE username = '$username'");
    if ($row = mysqli_fetch_assoc($result)) {
     if ($password === $row['password'])
 {
            $_SESSION['username'] = $row['username'];
            $message = "Login successful! <a href='dashboard.php'>Go to Dashboard</a>";
        } else {
            $message = "Invalid password.";
        }
    } else {
        $message = "No such user found.";
    }
}
?>
<style>
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
     background: rgba(0, 0, 0, 0.31);
      border-radius: 12px;
      box-shadow: 0 0 30px rgba(0, 0, 0, 0.3);
      overflow: hidden;
      backdrop-filter: blur(5px);
}

 .container-left{
    width: 350px;   
    background-image: url('https://www.skoolbeep.com/blog/wp-content/uploads/2020/12/WHAT-IS-THE-PURPOSE-OF-A-LIBRARY-MANAGEMENT-SYSTEM-min.png');
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
  top: 60%;
  right: 10px;
  transform: translateY(-50%);
  background: transparent;
  border: none;
  cursor: pointer;
  font-size: 18px;
}

.top-message {
  position: fixed;
  top: 10px;
  left: 50%;
  transform: translateX(-50%);
  background-color: rgba(0,0,0,0.6);
  color: white;
  font-weight: bold;
  padding: 10px 20px;
  border-radius: 8px;
  z-index: 1000;
  font-size: 18px;
  text-align: center;
}

.top-message a {
  color: #ffd700;
  text-decoration: underline;
}


</style>

<?php if (!empty($message)) { ?>
  <div class="top-message"><?php echo $message; ?></div>

    <?php echo $message; ?>
  </div>
<?php } ?>
<div class="wrapper">
  

<div class="container-left"></div>

<div class="container">

<h2>Login</h2>
<form method="POST">
    Username: <input type="text" name="username" required><br><br>
    <div class="password-wrapper">
    Password: <input type="password" name="password" id="password" required>
  <button type="button" class="eye-btn" onclick="togglePassword()">👁</button>
</div>

    <input type="submit" value="Login">
</form>



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
