<?php

// helpers.php or at the top of your web.php
function view($template, $data = [])
{
    extract($data); // Extracts data into variables for use in the view
    $filePath = __DIR__ . "/../pages/{$template}.php";
    $filePath2 = __DIR__ . "/../DPPAM-website/{$template}.php";

    $included = false;

    if (file_exists($filePath)) {
        include $filePath;
        $included = true;
    }

    if (file_exists($filePath2)) {
        include $filePath2;
        $included = true;
    }

    if (!$included) {
        die("Error: Template '{$template}' not found at '{$filePath}' or '{$filePath2}'.");
    }
}


function redirect($url)
{
    header("Location: $url");
    exit; // Ensure the script stops execution after the redirect
}



