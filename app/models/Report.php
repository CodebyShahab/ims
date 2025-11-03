<?php
class Report {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getStockReport(){
        $this->db->query("SELECT name, sku, current_stock, average_cost_price FROM products");
        return $this->db->resultSet();
    }

    public function getLowStockReport(){
        $this->db->query("SELECT name, sku, current_stock, low_stock_alert_level FROM products WHERE current_stock <= low_stock_alert_level");
        return $this->db->resultSet();
    }

    public function getSalesReport($start_date, $end_date){
        $this->db->query("SELECT * FROM sales WHERE created_at BETWEEN :start_date AND :end_date");
        $this->db->bind(':start_date', $start_date);
        $this->db->bind(':end_date', $end_date);
        return $this->db->resultSet();
    }

    public function getPurchaseReport($start_date, $end_date){
        $this->db->query("SELECT * FROM purchases WHERE created_at BETWEEN :start_date AND :end_date");
        $this->db->bind(':start_date', $start_date);
        $this->db->bind(':end_date', $end_date);
        return $this->db->resultSet();
    }

    public function getProfitLossStatement($start_date, $end_date){
        $this->db->query("
            SELECT
                p.name,
                SUM(si.quantity) as total_quantity_sold,
                SUM(si.quantity * si.sale_price) as total_revenue,
                SUM(si.quantity * p.average_cost_price) as total_cost,
                SUM(si.quantity * si.sale_price) - SUM(si.quantity * p.average_cost_price) as profit
            FROM sale_items si
            JOIN products p ON si.product_id = p.id
            JOIN sales s ON si.sale_id = s.id
            WHERE s.created_at BETWEEN :start_date AND :end_date
            GROUP BY p.name
        ");
        $this->db->bind(':start_date', $start_date);
        $this->db->bind(':end_date', $end_date);
        return $this->db->resultSet();
    }
}