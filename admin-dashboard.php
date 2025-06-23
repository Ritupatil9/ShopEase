<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <style>
        /* Global Styles */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f6f9;
            color: #333;
        }

        h1 {
            font-size: 32px;
            font-weight: 700;
            margin-top: 20px;
            color: #004d7a;
            text-align: center;
        }

        .container {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            justify-content: flex-start;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            padding: 20px;
            position: fixed;
            height: 100%;
            top: 0;
            left: 0;
            color: white;
            font-family: 'Montserrat', sans-serif;
        }

        .sidebar h2 {
            text-align: center;
            color: #ecf0f1;
        }

        .sidebar ul {
            list-style: none;
            padding-left: 0;
        }

        .sidebar ul li {
            padding: 15px;
            margin: 5px 0;
            background-color: #34495e;
            border-radius: 5px;
            cursor: pointer;
        }

        .sidebar ul li:hover {
            background-color: #1abc9c;
        }

        /* Content */
        .content {
            margin-left: 250px;
            padding: 20px;
            flex-grow: 1;
        }

        /* Table Styling */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th,
        td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #004d7a;
            color: white;
            font-weight: 600;
        }

        tr:hover {
            background-color: #ecf0f1;
        }

        /* Card Styles */
        .card-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            flex: 1;
            margin-right: 20px;
            text-align: center;
        }

        .card:last-child {
            margin-right: 0;
        }

        .card h3 {
            font-size: 24px;
            font-weight: 600;
            color: #2980b9;
        }

        .card p {
            font-size: 16px;
            color: #555;
        }

        .card .icon {
            font-size: 40px;
            color: #2980b9;
            margin-bottom: 10px;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination button {
            background-color: #2980b9;
            color: white;
            border: none;
            padding: 10px 20px;
            margin: 0 5px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }

        .pagination button:hover {
            background-color: #3498db;
        }

        .pagination button:disabled {
            background-color: #bdc3c7;
            cursor: not-allowed;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2>Admin Panel</h2>
            <ul>
                <li>Dashboard</li>
                <li>Orders</li>
                <li>Products</li>
                <li>Customers</li>
                <li>Reports</li>
                <li>Settings</li>
            </ul>
        </div>

        <!-- Content -->
        <div class="content">
            <h1>Admin Dashboard - Orders</h1>

            <!-- Date Filter -->
            <div class="card" style="margin-bottom: 20px;">
                <div style="display: flex; gap: 20px; align-items: flex-end;">
                    <div style="flex: 1;">
                        <label style="display: block; margin-bottom: 5px; color: #555;">From Date:</label>
                        <input type="date" id="fromDate" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 5px;">
                    </div>
                    <div style="flex: 1;">
                        <label style="display: block; margin-bottom: 5px; color: #555;">To Date:</label>
                        <input type="date" id="toDate" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 5px;">
                    </div>
                    <div>
                        <button onclick="filterOrders()" style="background-color: #2980b9; color: white; border: none; padding: 8px 20px; border-radius: 5px; cursor: pointer; margin-right: 10px;">Apply Filter</button>
                        <button onclick="resetFilter()" style="background-color: #95a5a6; color: white; border: none; padding: 8px 20px; border-radius: 5px; cursor: pointer;">Reset</button>
                    </div>
                </div>
            </div>

            <!-- Cards for Summary Info -->
            <div class="card-container">
                <div class="card">
                    <div class="icon">💵</div>
                    <h3>Total Sales</h3>
                    <p>₹<span id="totalSales">0</span></p>
                </div>
                <div class="card">
                    <div class="icon">📦</div>
                    <h3>Total Orders</h3>
                    <p><span id="totalOrders">0</span></p>
                </div>
                <div class="card">
                    <div class="icon">👥</div>
                    <h3>Active Customers</h3>
                    <p><span id="activeCustomers">0</span></p>
                </div>
            </div>

            <!-- Orders Table -->
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Payment ID</th>
                        <th>Amount</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody id="ordersTableBody">
                </tbody>
            </table>
        </div>
    </div>

    <script>
    let allOrders = []; // Store all orders

    // Fetch orders from server
    function fetchOrders() {
        fetch('http://localhost:3000/get-orders')
            .then(response => response.json())
            .then(data => {
                allOrders = data.orders;
                updateDashboard(allOrders);
            })
            .catch(error => {
                console.error('Error fetching orders:', error);
                alert('Error loading orders. Please check if the server is running.');
            });
    }

    // Filter orders by date
    function filterOrders() {
        const fromDate = document.getElementById('fromDate').value;
        const toDate = document.getElementById('toDate').value;

        if (!fromDate || !toDate) {
            alert('Please select both from and to dates');
            return;
        }

        const filteredOrders = allOrders.filter(order => {
            const orderDate = order.created_at_date;
            return orderDate >= fromDate && orderDate <= toDate;
        });

        updateDashboard(filteredOrders);
    }

    // Reset filter
    function resetFilter() {
        document.getElementById('fromDate').value = '';
        document.getElementById('toDate').value = '';
        updateDashboard(allOrders);
    }

    // Update dashboard with orders data
    function updateDashboard(orders) {
        // Update statistics
        const totalSales = orders.reduce((sum, order) => sum + parseFloat(order.amount), 0);
        document.getElementById('totalSales').textContent = totalSales.toFixed(2);
        document.getElementById('totalOrders').textContent = orders.length;
        document.getElementById('activeCustomers').textContent = new Set(orders.map(order => order.user_id)).size;

        // Update orders table
        const tableBody = document.getElementById('ordersTableBody');
        tableBody.innerHTML = orders.map(order => `
            <tr>
                <td>${order.order_id}</td>
                <td>${order.payment_id}</td>
                <td>₹${parseFloat(order.amount).toFixed(2)}</td>
                <td>${order.created_at_date}</td>
            </tr>
        `).join('');
    }

    // Initial load
    fetchOrders();
    </script>
</body>

</html>
