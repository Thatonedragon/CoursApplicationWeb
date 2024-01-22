<?php
// Process Form Data
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Assuming your form data is sent as JSON
    $json = file_get_contents('php://input');
    $formData = json_decode($json, true);

    // Perform validation if needed

    // Connect to your database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tpmariadb";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the database
    $sql = "INSERT INTO your_table (user_name, number_of_places, pass_type, days, user_message) 
            VALUES (
                '" . $conn->real_escape_string($formData['user_name']) . "',
                '" . $conn->real_escape_string($formData['number_of_places']) . "',
                '" . $conn->real_escape_string($formData['pass_type']) . "',
                '" . $conn->real_escape_string(implode(",", $formData['days'])) . "',
                '" . $conn->real_escape_string($formData['user_message']) . "'
            )";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(array("message" => "Data inserted successfully"));
    } else {
        echo json_encode(array("error" => "Error: " . $sql . "<br>" . $conn->error));
    }

    // Close the connection
    $conn->close();
}
?>