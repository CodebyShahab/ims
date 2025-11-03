<?php

class Dashboard extends Controller {
    public function __construct() {
        // Future models will be loaded here
    }

    public function index() {
        $data = [
            'title' => 'Dashboard',
            'total_products' => 0, // Placeholder
            'total_stock_value_cost' => 0, // Placeholder
            'total_stock_value_sale' => 0, // Placeholder
            'low_stock_items' => 0, // Placeholder
            'todays_sales' => 0 // Placeholder
        ];
        $this->view('dashboard/index', $data);
    }
}
