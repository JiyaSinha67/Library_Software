<?php
$con = mysqli_connect("localhost", "root", "", "library");
$result = mysqli_query($con, "SELECT * FROM books");
?>

<!DOCTYPE html>
<html>
<head>
  <style>
    body {
        background: url('https://www.voicesofruralindia.org/wp-content/uploads/2020/11/ylswjsy7stw-2048x1201.jpg');
      background-size: cover;
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
    }

    .table-container {
      display: flex;
      justify-content: center; /* centers horizontally */
      align-items: center;     /* centers vertically */
      min-height: 100vh;       /* full screen height */
    }

    table {
      border-collapse: collapse;
      width: 80%;
      background-color: rgba(139, 136, 136, 0.85); /* transparent white */
      box-shadow: 0 0 10px rgba(0,0,0,0.3);
    }

    th, td {
      border: 1px solid #333;
      padding: 12px;
      text-align: center;
    }

    th {
      background-color: #444;
      color: white;
    }

    td {
      color: #222;
    }
  </style>
</head>
<body>

<div class="table-container">
  <table>
    <tr>
      <th>ID</th>
      <th>Title</th>
      <th>Author</th>
      <th>Available</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
      <tr>
        <td><?= $row['book_id'] ?></td>
        <td><?= $row['title'] ?></td>
        <td><?= $row['author'] ?></td>
        <td><?= $row['available'] ?></td>
      </tr>
    <?php } ?>
  </table>
</div>

</body>
</html>


