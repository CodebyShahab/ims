<?php

class StockAdjustment {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function add($data) {
        $this->db->query('INSERT INTO stock_adjustments (product_id, quantity, reason) VALUES(:product_id, :quantity, :reason)');
        // Bind values
        $this->db->bind(':product_id', $data['product_id']);
        $this->db->bind(':quantity', $data['quantity']);
        $this->db->bind(':reason', $data['reason']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
