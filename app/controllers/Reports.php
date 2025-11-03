<?php
class Reports extends Controller {
    public function __construct(){
        $this->reportModel = $this->model('Report');
    }

    public function stock(){
        $stock = $this->reportModel->getStockReport();
        $data = [
            'stock' => $stock
        ];
        $this->view('reports/stock', $data);
    }

    public function lowStock(){
        $lowStock = $this->reportModel->getLowStockReport();
        $data = [
            'lowStock' => $lowStock
        ];
        $this->view('reports/low_stock', $data);
    }

    public function sales(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $start_date = trim($_POST['start_date']);
            $end_date = trim($_POST['end_date']);
            $sales = $this->reportModel->getSalesReport($start_date, $end_date);
            $data = [
                'sales' => $sales,
                'start_date' => $start_date,
                'end_date' => $end_date
            ];
            $this->view('reports/sales', $data);
        } else {
            $data = [
                'sales' => [],
                'start_date' => '',
                'end_date' => ''
            ];
            $this->view('reports/sales', $data);
        }
    }

    public function purchases(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $start_date = trim($_POST['start_date']);
            $end_date = trim($_POST['end_date']);
            $purchases = $this->reportModel->getPurchaseReport($start_date, $end_date);
            $data = [
                'purchases' => $purchases,
                'start_date' => $start_date,
                'end_date' => $end_date
            ];
            $this->view('reports/purchases', $data);
        } else {
            $data = [
                'purchases' => [],
                'start_date' => '',
                'end_date' => ''
            ];
            $this->view('reports/purchases', $data);
        }
    }

    public function profitLoss(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $start_date = trim($_POST['start_date']);
            $end_date = trim($_POST['end_date']);
            $profitLoss = $this->reportModel->getProfitLossStatement($start_date, $end_date);
            $data = [
                'profitLoss' => $profitLoss,
                'start_date' => $start_date,
                'end_date' => $end_date
            ];
            $this->view('reports/profit_loss', $data);
        } else {
            $data = [
                'profitLoss' => [],
                'start_date' => '',
                'end_date' => ''
            ];
            $this->view('reports/profit_loss', $data);
        }
    }
}