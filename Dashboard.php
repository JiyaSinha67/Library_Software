<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Library Dashboard</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Include Chart.js -->
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: url('https://thumbs.dreamstime.com/b/graduation-cap-stacked-books-representing-academic-achievement-gold-tassel-rests-atop-stack-colorful-symbolizing-365375573.jpg?w=992') no-repeat center center fixed;
      background-size: cover;
      color: #333;
    }

    .header {
      background-color: #2c3e50;
      color: white;
      padding: 15px 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .header h1 {
      margin: 0;
      font-size: 24px;
      display: flex;
      align-items: center;
    }

    .header h1 img {
      width: 30px;
      margin-right: 10px;
    }

    .logout {
      color: #ff4d4d;
      text-decoration: none;
      font-weight: bold;
    }

    .logout:hover {
      text-decoration: underline;
    }

    .container {
      display: flex;
    }

    .sidebar {
      width: 220px;
      background: rgba(44, 62, 80, 0.95);
      height: calc(100vh - 60px);
      padding-top: 30px;
      box-shadow: 2px 0 10px rgba(0, 0, 0, 0.3);
    }

    .sidebar a {
      display: flex;
      align-items: center;
      padding: 15px 20px;
      color: white;
      text-decoration: none;
      font-size: 18px;
      transition: 0.3s;
    }

    .sidebar a:hover {
      background-color: rgba(255, 255, 255, 0.1);
    }

    .sidebar img {
      width: 24px;
      margin-right: 12px;
    }

    .stats {
      display: flex;
      gap: 15px;
      flex-wrap: wrap;
      padding: 15px;
      color: white;
    }

    .card {
      background: rgba(255, 255, 255, 0.1);
      padding: 20px 30px;
      border-radius: 12px;
      text-align: center;
      backdrop-filter: blur(5px);
      min-width: 180px;
      color: white;
    }

    .card h2 {
      margin: 10px 0 5px;
      font-size: 30px;
    }

    .chart-section {
      margin: 30px;
      width: 80%;
      max-width: 700px;
      background: rgba(190, 189, 189, 0.5);
      padding: 20px;
      border-radius: 12px;
      color: white;
    }

    canvas {
      background: rgba(211, 209, 209, 0.05);
      border-radius: 10px;
      width: 100%;
      height: 300px;
    }

  </style>
</head>
<body>

  <div class="header">
    <h1><img src="https://img.icons8.com/color/48/book-shelf.png"/> Library Dashboard</h1>
    <a href="logout.php" class="logout">Logout</a>
  </div>

  <div class="container">
    <div class="sidebar">
      <a href="book.php"><img src="https://img.icons8.com/fluency/48/book-shelf.png"/> Add Book</a>
      <a href="view.php"><img src="https://img.icons8.com/fluency/48/open-book.png"/> View Books</a>
      <a href="issued_books.php"><img src="https://img.icons8.com/fluency/48/upload.png"/> Issue Book</a>
      <a href="return_book.php"><img src="https://img.icons8.com/fluency/48/download.png"/> Return Book</a>
      <a href="about_Us.html"><img src="https://media.istockphoto.com/id/1331044109/vector/us-we.jpg?s=1024x1024&w=is&k=20&c=WBFmyOjnsz-Llyc2vy3qR-CXpA2ZowBW19NTw-lfUFo="/>  About US </a>
      <a href="contact_us.html"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQDw-zjEsA_jawqsn86Uka9sOt68jZ_xdESQ&s"/> Contact US </a>
    </div>

    <div class="content">
      <section class="stats">
        <div class="card">
          <h2>120</h2>
          <p>Total Books</p>
        </div>
        <div class="card">
          <h2>7</h2>
          <p>Issued</p>
        </div>
        <div class="card">
          <h2>4</h2>
          <p>Returned</p>
        </div>
        <div class="card">
          <h2>120</h2>
          <p>Available</p>
        </div>
      </section>

      <div class="chart-section">
        <canvas id="libraryChart"></canvas>
      </div>
    </div>
  </div>

  <!-- Chart Script -->
  <script>
    const ctx = document.getElementById('libraryChart').getContext('2d');

    const gradient = ctx.createLinearGradient(0, 0, 0, 400);
    gradient.addColorStop(0, 'rgba(92, 91, 91, 1)');
    gradient.addColorStop(1, 'rgba(143, 141, 141, 0.3)');

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Total', 'Issued', 'Returned', 'Available'],
        datasets: [{
          label: 'Library Stats',
          data: [120, 48, 60, 72],
          backgroundColor: gradient,
          borderRadius: 10,
          borderSkipped: false,
          barThickness: 40
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false
          },
          tooltip: {
            backgroundColor: 'rgba(0,0,0,0.7)',
            titleColor: '#fff',
            bodyColor: '#fff',
          }
        },
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              color: '#fff',
              stepSize: 20
            },
            grid: {
              color: 'rgba(255,255,255,0.1)'
            }
          },
          x: {
            ticks: {
              color: '#fff',
              font: {
                weight: 'bold'
              }
            },
            grid: {
              display: false
            }
          }
        }
      }
    });
  </script>

</body>
</html>
  
