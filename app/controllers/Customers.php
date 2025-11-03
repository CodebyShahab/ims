<?php

class Customers extends Controller {
    private $customerModel;

    public function __construct() {
        $this->customerModel = $this->model('Customer');
    }

    public function index() {
        $customers = $this->customerModel->getAll();
        $data = [
            'customers' => $customers
        ];
        $this->view('customers/index', $data);
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'name' => trim($_POST['name']),
                'contact_details' => trim($_POST['contact_details'])
            ];

            // Add customer
            if ($this->customerModel->add($data)) {
                // flash('customer_message', 'Customer Added');
                // redirect('customers');
            } else {
                die('Something went wrong');
            }
        } else {
            $data = [
                'name' => '',
                'contact_details' => ''
            ];
            $this->view('customers/add', $data);
        }
    }
}
