<?php
// Handle adding products
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_name'])) {
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $description = $_POST['description'];

    $conn = new mysqli('localhost', 'username', 'password', 'rmmedicalwebdata');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("INSERT INTO products (name, price, stock, description) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssis", $product_name, $price, $stock, $description);

    if ($stmt->execute()) {
        echo "<script>alert('New product added successfully');</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
        }

        .dashboard-container {
            display: flex;
        }

        .sidebar {
            width: 250px;
            background-color: #4e73df;
            color: #ecf0f1;
            min-height: 100vh;
            position: fixed;
        }

        .sidebar .logo {
            text-align: center;
            padding: 20px;
            font-size: 1.5rem;
            font-weight: bold;
            color: #ecf0f1;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            padding: 15px;
            text-align: left;
        }

        .sidebar ul li a {
            color: #ecf0f1;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .sidebar ul li a:hover {
            background-color: #3e5c9a;
            border-radius: 5px;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #ffffff;
            padding: 15px;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
        }

        .header .profile {
            display: flex;
            align-items: center;
        }

        .header img {
            border-radius: 50%;
            width: 40px;
            height: 40px;
            margin-left: 10px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card h3 {
            font-size: 2rem;
            margin: 10px 0;
        }

        .card p {
            color: #7f8c8d;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
        }

        table th, table td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #f4f4f9;
        }

        table th {
            background-color: #4e73df;
            color: #ecf0f1;
        }

        button {
            background-color: #4e73df;
            color: #ecf0f1;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #3e5c9a;
        }

        /* Styling for the pie chart */
        .chart-container {
            width: 100%;
            height: 400px;
            margin-top: 40px;
        }

    </style>
</head>
<body>
    <div class="dashboard-container">
        <div class="sidebar">
            <div class="logo">
                <img src="RM_MEDICAL_AGENCIES(BR).png" alt="RM Medical Agencies Logo"
                     style="width: 220px; height: 110px;">
            </div>
            <ul>
                <li><a href="dashboard.html">Dashboard</a></li>
                <li><a href="products.html">Manage Products</a></li>
                <li><a href="manage-user.html">Manage Users</a></li>
                <li><a href="orders.html">Manage Orders</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>

        <div class="main-content">
            <div class="header">
                <h1>Admin Dashboard</h1>
                <div class="profile">
                    <span>MANISH AGRAWAL</span>
                    <img src="profile_pic.jpeg" alt="profile_pics" style="width: 40px; height: 40px; border-radius: 50%; margin-left: 10px;">
                </div>
            </div>

            <div class="cards">
                <div class="card">
                    <h3>2500</h3>
                    <p>Total Users</p>
                </div>
                <div class="card">
                    <h3>123.50</h3>
                    <p>Average Time</p>
                </div>
                <div class="card">
                    <h3>1805</h3>
                    <p>Active Products</p>
                </div>
                <div class="card">
                    <h3>54</h3>
                    <p>New Orders</p>
                </div>
            </div>

            <!-- Pie Chart Section -->
            <div class="chart-container">
                <canvas id="pieChart"></canvas>
            </div>

            <h2>Manage Products</h2>
            <table>
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Ambrodry-Ls</td>
                        <td>₹148.00</td>
                        <td>700</td>
                        <td>
                            <button>Edit</button>
                            <button>Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Pie Chart Configuration
        var ctx = document.getElementById('pieChart').getContext('2d');
        var pieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Ambrodry-Ls', 'Product B', 'Product C', 'Product D'],
                datasets: [{
                    label: 'Product Stock',
                    data: [700, 1500, 300, 100], // Stock data
                    backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e'], // Colors
                    borderColor: '#fff',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw + ' units';
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
s