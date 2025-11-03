<?php

class Sale {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function add($data) {
        $this->db->query('INSERT INTO sales (customer_id, total, discount, payment_method) VALUES(:customer_id, :total, :discount, :payment_method)');
        // Bind values
        $this->db->bind(':customer_id', $data['customer_id']);
        $this->db->bind(':total', $data['total']);
        $this->db->bind(':discount', $data['discount']);
        $this->db->bind(':payment_method', $data['payment_method']);

        // Execute
        if ($this->db->execute()) {
            return $this->db->lastInsertId();
        } else {
            return false;
        }
    }

    public function addItem($data) {
        $this->db->query('INSERT INTO sale_items (sale_id, product_id, quantity, sale_price) VALUES(:sale_id, :product_id, :quantity, :sale_price)');
        // Bind values
        $this->db->bind(':sale_id', $data['sale_id']);
        $this->db->bind(':product_id', $data['product_id']);
        $this->db->bind(':quantity', $data['quantity']);
        $this->db->bind(':sale_price', $data['sale_price']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
