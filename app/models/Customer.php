<?php

class Customer {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAll() {
        $this->db->query("SELECT * FROM customers");
        return $this->db->resultSet();
    }

    public function add($data) {
        $this->db->query('INSERT INTO customers (name, contact_details) VALUES(:name, :contact_details)');
        // Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':contact_details', $data['contact_details']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
