<?php

class Sales extends Controller {
    private $saleModel;

    public function __construct() {
        $this->saleModel = $this->model('Sale');
    }

    public function pos() {
        $this->view('sales/pos');
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'customer_id' => trim($_POST['customer_id']),
                'total' => trim($_POST['total']),
                'discount' => trim($_POST['discount']),
                'payment_method' => trim($_POST['payment_method']),
                'products' => $_POST['products']
            ];

            // Add sale
            $sale_id = $this->saleModel->add($data);

            if ($sale_id) {
                // Add sale items
                foreach ($data['products'] as $product) {
                    $item_data = [
                        'sale_id' => $sale_id,
                        'product_id' => $product['id'],
                        'quantity' => $product['quantity'],
                        'sale_price' => $product['sale_price']
                    ];
                    $this->saleModel->addItem($item_data);
                }
                // flash('sale_message', 'Sale Added');
                // redirect('sales');
            } else {
                die('Something went wrong');
            }
        }
    }
}
