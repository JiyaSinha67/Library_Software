<?php
$con = mysqli_connect("localhost", "root", "", "library");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $book_id = $_POST['book_id'];
    $issued_to = $_POST['issued_to'];
    mysqli_query($con, "INSERT INTO issued_books (book_id, issued_to) VALUES ($book_id, '$issued_to')");
    mysqli_query($con, "UPDATE books SET available = available - 1 WHERE book_id = $book_id");
    echo "Book issued!";
}
?>


<!DOCTYPE html>
<html>
<head>
  <title>Issue Book Form</title>
  <style>
      body {
            
           background: url('https://www.voicesofruralindia.org/wp-content/uploads/2020/11/ylswjsy7stw-2048x1201.jpg');
            margin: 0;
            padding: 0;
        }

            .container {
      width: 70%;
      margin: 60px auto;
      padding: 30px;
      background-color: rgba(255, 255, 255, 0.16); /* white with transparency */
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0,0,0,0.2);
    }

    table {
      border-collapse: collapse; /* Removes double borders */
      width: 60%;
      margin: 50px auto;
      font-family: Arial, sans-serif;
    }

    th, td {    
      border: 2px solid #333;
      padding: 10px;
      text-align: left;
    }

    th {
      background-color:rgb(183, 183, 183);
    }

    input[type="text"] {
  background-color: transparent; /* removes white */
  border: 1px solid #ccc;        /* optional border */
  color: #fff;                   /* text color (white) */
  padding: 8px;
  width: 100%;
  box-sizing: border-box;
  font-size: 16px;
}


    input[type="submit"] {
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #333;
      color: white;
      border: none;
      cursor: pointer;
      font-size: 16px;
    }

    input[type="submit"]:hover {
      background-color: #67696a;
    }
  </style>
</head>
<body>
<div  class="container">
<form method="POST">
  <table>
    <tr>
      <th>Book ID</th>
      <th>Issued To</th>
     
      
    </tr>
    <tr>
      <td><input type="text" name="book_id" required></td>
      <td><input type="text" name="issued_to" required></td>
    </tr>
    
   
  </table>

  <div style="text-align: center;">
   <input type="submit" value="Issue Book">
  </div>
</form>
</div>
</body>
</html>
