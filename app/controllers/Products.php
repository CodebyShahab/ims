<?php

class Products extends Controller {
    private $productModel;

    public function __construct() {
        $this->productModel = $this->model('Product');
    }

    public function index() {
        $products = $this->productModel->getAll();
        $data = [
            'products' => $products
        ];
        $this->view('products/index', $data);
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'name' => trim($_POST['name']),
                'sku' => trim($_POST['sku']),
                'description' => trim($_POST['description']),
                'category_id' => trim($_POST['category_id']),
                'brand_id' => trim($_POST['brand_id']),
                'default_sale_price' => trim($_POST['default_sale_price']),
                'unit' => trim($_POST['unit']),
                'low_stock_alert_level' => trim($_POST['low_stock_alert_level']),
                'location' => trim($_POST['location']),
                'name_err' => '',
                'sku_err' => ''
            ];

            // Validate data
            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter name';
            }
            if (empty($data['sku'])) {
                $data['sku_err'] = 'Please enter SKU';
            }

            // Make sure no errors
            if (empty($data['name_err']) && empty($data['sku_err'])) {
                // Validated
                if ($this->productModel->add($data)) {
                    // flash('product_message', 'Product Added');
                    // redirect('products');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('products/add', $data);
            }

        } else {
            $data = [
                'name' => '',
                'sku' => '',
                'description' => '',
                'category_id' => '',
                'brand_id' => '',
                'default_sale_price' => '',
                'unit' => '',
                'low_stock_alert_level' => '',
                'location' => '',
            ];

            $this->view('products/add', $data);
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $id,
                'name' => trim($_POST['name']),
                'sku' => trim($_POST['sku']),
                'description' => trim($_POST['description']),
                'category_id' => trim($_POST['category_id']),
                'brand_id' => trim($_POST['brand_id']),
                'default_sale_price' => trim($_POST['default_sale_price']),
                'unit' => trim($_POST['unit']),
                'low_stock_alert_level' => trim($_POST['low_stock_alert_level']),
                'location' => trim($_POST['location']),
                'name_err' => '',
                'sku_err' => ''
            ];

            // Validate data
            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter name';
            }
            if (empty($data['sku'])) {
                $data['sku_err'] = 'Please enter SKU';
            }

            // Make sure no errors
            if (empty($data['name_err']) && empty($data['sku_err'])) {
                // Validated
                if ($this->productModel->update($data)) {
                    // flash('product_message', 'Product Updated');
                    // redirect('products');
                } else {
                    die('Something went wrong');
                }
            } else {
                // Load view with errors
                $this->view('products/edit', $data);
            }

        } else {
            // Get existing product from model
            $product = $this->productModel->getProductById($id);

            $data = [
                'id' => $id,
                'name' => $product->name,
                'sku' => $product->sku,
                'description' => $product->description,
                'category_id' => $product->category_id,
                'brand_id' => $product->brand_id,
                'default_sale_price' => $product->default_sale_price,
                'unit' => $product->unit,
                'low_stock_alert_level' => $product->low_stock_alert_level,
                'location' => $product->location,
            ];

            $this->view('products/edit', $data);
        }
    }

    public function delete($id) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($this->productModel->delete($id)) {
                // flash('product_message', 'Product Removed');
                // redirect('products');
            } else {
                die('Something went wrong');
            }
        } else {
            // redirect('products');
        }
    }
}
