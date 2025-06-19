<?php
// Site Settings
define(constant_name: 'SITE_NAME', value: 'SA Online Store');
define(constant_name: 'SITE_URL', value: 'http://localhost/ecommerce-platform');
define(constant_name: 'ADMIN_URL', value: SITE_URL . '/admin');

// File Paths
define(constant_name: 'ROOT_PATH', value: dirname(path: __DIR__));
define(constant_name: 'UPLOAD_PATH', value: ROOT_PATH . '/public/assets/images/uploads');

// South African Settings
define(constant_name: 'VAT_RATE', value: 15.00); // 15% VAT
define(constant_name: 'ZAR_FORMAT', value: 'R %s'); // Currency format

// Enable Error Reporting (Turn off in production)
ini_set(option: 'display_errors', value: 1);
ini_set(option: 'display_startup_errors', value: 1);
error_reporting(error_level: E_ALL);
?>