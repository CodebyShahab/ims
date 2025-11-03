<?php

class Product {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAll() {
        $this->db->query("SELECT * FROM products");
        return $this->db->resultSet();
    }

    public function add($data) {
        $this->db->query('INSERT INTO products (name, sku, description, category_id, brand_id, default_sale_price, unit, low_stock_alert_level, location) VALUES(:name, :sku, :description, :category_id, :brand_id, :default_sale_price, :unit, :low_stock_alert_level, :location)');
        // Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':sku', $data['sku']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':category_id', $data['category_id']);
        $this->db->bind(':brand_id', $data['brand_id']);
        $this->db->bind(':default_sale_price', $data['default_sale_price']);
        $this->db->bind(':unit', $data['unit']);
        $this->db->bind(':low_stock_alert_level', $data['low_stock_alert_level']);
        $this->db->bind(':location', $data['location']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function findProductBySKU($sku) {
        $this->db->query('SELECT * FROM products WHERE sku = :sku');
        $this->db->bind(':sku', $sku);

        $row = $this->db->single();

        // Check row
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function update($data) {
        $this->db->query('UPDATE products SET name = :name, sku = :sku, description = :description, category_id = :category_id, brand_id = :brand_id, default_sale_price = :default_sale_price, unit = :unit, low_stock_alert_level = :low_stock_alert_level, location = :location WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':sku', $data['sku']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':category_id', $data['category_id']);
        $this->db->bind(':brand_id', $data['brand_id']);
        $this->db->bind(':default_sale_price', $data['default_sale_price']);
        $this->db->bind(':unit', $data['unit']);
        $this->db->bind(':low_stock_alert_level', $data['low_stock_alert_level']);
        $this->db->bind(':location', $data['location']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getProductById($id) {
        $this->db->query('SELECT * FROM products WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function delete($id) {
        $this->db->query('DELETE FROM products WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $id);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
