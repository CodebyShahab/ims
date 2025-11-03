<?php require APPROOT . '/views/header.php'; ?>

<h1><?php echo $data['title']; ?></h1>

<div class="dashboard-metrics">
    <div class="metric">
        <h2>Total Products</h2>
        <p><?php echo $data['total_products']; ?></p>
    </div>
    <div class="metric">
        <h2>Total Stock Value (Cost)</h2>
        <p><?php echo $data['total_stock_value_cost']; ?></p>
    </div>
    <div class="metric">
        <h2>Total Stock Value (Sale)</h2>
        <p><?php echo $data['total_stock_value_sale']; ?></p>
    </div>
    <div class="metric">
        <h2>Low Stock Items</h2>
        <p><?php echo $data['low_stock_items']; ?></p>
    </div>
    <div class="metric">
        <h2>Today's Sales</h2>
        <p><?php echo $data['todays_sales']; ?></p>
    </div>
</div>

<div class="dashboard-quick-links">
    <a href="#">New POS Sale</a>
    <a href="#">New Product</a>
    <a href="#">New Purchase</a>
</div>

<div class="dashboard-charts">
    <div class="chart">
        <h3>Last 30 Days Sales</h3>
        <!-- Placeholder for graph -->
    </div>
    <div class="chart">
        <h3>Top-Selling Products</h3>
        <!-- Placeholder for chart -->
    </div>
    <div class="chart">
        <h3>Stock Levels</h3>
        <!-- Placeholder for pie chart -->
    </div>
</div>

<?php require APPROOT . '/views/footer.php'; ?>