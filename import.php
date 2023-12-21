<?php
include 'db.php';

if (isset($_POST["Import"])) {
    $filename = $_FILES["file"]["tmp_name"];

    if ($_FILES["file"]["size"] > 0) {
        $file = fopen($filename, "r");
        while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE) {
            // Escape values to prevent SQL injection
            $escapedValues = array_map(function ($value) use ($conn) {
                return mysqli_real_escape_string($conn, $value);
            }, $emapData);

            // Construct the SQL query with escaped values
            $sql = "INSERT INTO subject (`branch`, `brnp`, `customer_name`, `nature_of_advance`, `cl`, `bcl`, 
               `lmtamp`, `outstanding`, `eligible_sec`, `interest_sus`, `required_provision`, `base_for_provision`) 
                VALUES ('$escapedValues[0]','$escapedValues[1]', '$escapedValues[2]', '$escapedValues[3]', '$escapedValues[4]', '$escapedValues[5]', '$escapedValues[6]',
                    '$escapedValues[7]', '$escapedValues[8]', '$escapedValues[9]', '$escapedValues[10]', '$escapedValues[11]')";

            // Execute the query and handle errors
            $result = mysqli_query($conn, $sql);
            if (!$result) {
                echo "<script type=\"text/javascript\">
                        alert(\"Error: " . mysqli_error($conn) . "\");
                        window.location = \"index.php\"
                    </script>";
                die();
            }
        }
        fclose($file);

        // Success message
        echo "<script type=\"text/javascript\">
                alert(\"CSV File has been successfully Imported.\");
                window.location = \"index.php\"
            </script>";

        // Close the database connection
        mysqli_close($conn);
    }
}
?>
