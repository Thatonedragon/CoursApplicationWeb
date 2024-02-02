<?php
session_start();
// Check if "id" is set in the session
if (isset($_SESSION["id"])) {
    echo json_encode($_SESSION);
} else {
    echo json_encode(["error" => "ID not set in the session"]);
}
?>