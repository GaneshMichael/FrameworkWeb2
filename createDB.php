<?php

namespace TCG;

// Path to SQLite database file
use SQLite3;

$database_file = 'mydatabase.db';

try {
    // Open SQLite database file in read/write mode
    $db = new SQLite3($database_file);

    // Create users table
    $query_users = 'CREATE TABLE IF NOT EXISTS users (
                id INTEGER PRIMARY KEY,
                username TEXT,
                email TEXT
            )';
    $db->exec($query_users);

    // Create products table
    $query_products = 'CREATE TABLE IF NOT EXISTS products (
                id INTEGER PRIMARY KEY,
                name TEXT,
                price REAL
            )';
    $db->exec($query_products);

    // Create orders table
    $query_orders = 'CREATE TABLE IF NOT EXISTS orders (
                id INTEGER PRIMARY KEY,
                user_id INTEGER,
                product_id INTEGER,
                quantity INTEGER,
                FOREIGN KEY (user_id) REFERENCES users(id),
                FOREIGN KEY (product_id) REFERENCES products(id)
            )';
    $db->exec($query_orders);

    echo "Database and tables created successfully.\n";

    // Close the database connection
    $db->close();
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>
