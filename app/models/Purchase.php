<?php

class Purchase {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAll() {
        $this->db->query("SELECT * FROM purchases");
        return $this->db->resultSet();
    }

    public function add($data) {
        $this->db->query('INSERT INTO purchases (supplier_id, status) VALUES(:supplier_id, :status)');
        // Bind values
        $this->db->bind(':supplier_id', $data['supplier_id']);
        $this->db->bind(':status', $data['status']);

        // Execute
        if ($this->db->execute()) {
            return $this->db->lastInsertId();
        } else {
            return false;
        }
    }

    public function addItem($data) {
        $this->db->query('INSERT INTO purchase_items (purchase_id, product_id, quantity, cost_price) VALUES(:purchase_id, :product_id, :quantity, :cost_price)');
        // Bind values
        $this->db->bind(':purchase_id', $data['purchase_id']);
        $this->db->bind(':product_id', $data['product_id']);
        $this->db->bind(':quantity', $data['quantity']);
        $this->db->bind(':cost_price', $data['cost_price']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
