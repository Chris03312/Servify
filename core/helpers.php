<?php

// helpers.php or at the top of your web.php
function view($template, $data = []) {
    extract($data); // Extracts data into variables for use in the view
    $filePath = __DIR__ . "/../pages/{$template}.php";
    if (file_exists($filePath)) {
        include $filePath;
    } else {
        die("Error: Template '{$template}' not found at '{$filePath}'.");
    }
}

function redirect($url) {
    header("Location: $url");
    exit; // Ensure the script stops execution after the redirect
}



