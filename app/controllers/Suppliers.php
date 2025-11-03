<?php

class Suppliers extends Controller {
    private $supplierModel;

    public function __construct() {
        $this->supplierModel = $this->model('Supplier');
    }

    public function index() {
        $suppliers = $this->supplierModel->getAll();
        $data = [
            'suppliers' => $suppliers
        ];
        $this->view('suppliers/index', $data);
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'name' => trim($_POST['name']),
                'contact_details' => trim($_POST['contact_details'])
            ];

            // Add supplier
            if ($this->supplierModel->add($data)) {
                // flash('supplier_message', 'Supplier Added');
                // redirect('suppliers');
            } else {
                die('Something went wrong');
            }
        } else {
            $data = [
                'name' => '',
                'contact_details' => ''
            ];
            $this->view('suppliers/add', $data);
        }
    }
}
