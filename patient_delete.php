<?php

require_once "./include/patient_validate.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    echo "process request!!";

    echo "<pre>\$_POST = ";
    print_r($_POST);
    echo "</pre>";
    
} else {
    http_response_code(405);
}
?>