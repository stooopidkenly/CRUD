<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;

class DatabaseCheck extends Controller
{
    public function index()
    {
        try {
            $db = Database::connect(); // Attempt to connect using the default group

            // If no exception is thrown, the connection was successful
            echo "Database connection successful!";

            // You can also perform a simple query to further verify
            // $query = $db->query("SELECT 1");
            // if ($query) {
            //     echo " and a query was executed successfully.";
            // }

        } catch (\Exception $e) {
            // If an exception is caught, the connection failed
            echo "Database connection failed: " . $e->getMessage();
        }
    }
}
