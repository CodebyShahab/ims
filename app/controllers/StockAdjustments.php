<?php

class StockAdjustments extends Controller {
    private $stockAdjustmentModel;

    public function __construct() {
        $this->stockAdjustmentModel = $this->model('StockAdjustment');
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'product_id' => trim($_POST['product_id']),
                'quantity' => trim($_POST['quantity']),
                'reason' => trim($_POST['reason'])
            ];

            // Add stock adjustment
            if ($this->stockAdjustmentModel->add($data)) {
                // flash('stock_adjustment_message', 'Stock Adjustment Added');
                // redirect('stock_adjustments');
            } else {
                die('Something went wrong');
            }
        } else {
            $data = [
                'product_id' => '',
                'quantity' => '',
                'reason' => ''
            ];
            $this->view('stock_adjustments/add', $data);
        }
    }
}
