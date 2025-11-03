<?php

class Purchases extends Controller {
    private $purchaseModel;

    public function __construct() {
        $this.purchaseModel = $this->model('Purchase');
    }

    public function index() {
        $purchases = $this->purchaseModel->getAll();
        $data = [
            'purchases' => $purchases
        ];
        $this->view('purchases/index', $data);
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'supplier_id' => trim($_POST['supplier_id']),
                'status' => 'Pending',
                'products' => $_POST['products']
            ];

            // Add purchase
            $purchase_id = $this->purchaseModel->add($data);

            if ($purchase_id) {
                // Add purchase items
                foreach ($data['products'] as $product) {
                    $item_data = [
                        'purchase_id' => $purchase_id,
                        'product_id' => $product['id'],
                        'quantity' => $product['quantity'],
                        'cost_price' => $product['cost_price']
                    ];
                    $this->purchaseModel->addItem($item_data);
                }
                // flash('purchase_message', 'Purchase Added');
                // redirect('purchases');
            } else {
                die('Something went wrong');
            }
        } else {
            $data = [
                'supplier_id' => '',
                'products' => []
            ];
            $this->view('purchases/add', $data);
        }
    }
}
