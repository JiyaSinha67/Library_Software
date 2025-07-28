<?php
$con = mysqli_connect("localhost", "root", "", "library");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $issue_id = $_POST['issue_id'];
    $row = mysqli_fetch_assoc(mysqli_query($con, "SELECT book_id FROM issued_books WHERE issue_id = $issue_id"));
    $book_id = $row['book_id'];
    mysqli_query($con, "UPDATE issued_books SET return_date = NOW() WHERE issue_id = $issue_id");
    mysqli_query($con, "UPDATE books SET available = available + 1 WHERE book_id = $book_id");
    echo "Book returned!";
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Return Book</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background: url('https://www.voicesofruralindia.org/wp-content/uploads/2020/11/ylswjsy7stw-2048x1201.jpg');
      background-size: cover;
      font-family:  sans-serif;
    }

    .container {
      max-width: 500px;
      margin: 100px auto;
      padding: 40px;
      background: rgba(255, 255, 255, 0.1);
      backdrop-filter: blur(10px);
      border-radius: 12px;
      box-shadow: 0 0 20px rgba(0,0,0,0.4);
      color: #fff;
      text-align: center;
    }

    .container h2 {
      margin-bottom: 25px;
      font-size: 28px;
      font-weight: bold;
    }

    label {
      display: block;
      margin-bottom: 10px;
      font-size: 18px;
      text-align: left;
    }

    input[type="text"] {
      width: 100%;
      padding: 12px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 8px;
      background-color: transparent;
      color: #fff;
      font-size: 16px;
      outline: none;
    }

    input[type="text"]::placeholder {
      color: #ddd;
    }

    button {
      background-color: #222;
      color: white;
      padding: 12px 30px;
      font-size: 16px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      transition: 0.3s ease;
    }

    button:hover {
      background-color: #444;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Return Book</h2>
  <form action="return_book.php" method="POST">
    <label for="issue_id">Issued ID</label>
    <input type="text" id="issue_id" name="issue_id" placeholder="Enter Issued ID" required>
    <button type="submit">Return Book</button>
  </form>
</div>

</body>
</html>
