<?php 
    // $dsn = "mysql:host=localhost;dbname=crud";
    // $user = "root";
    // $password = "";

    // DB connection
    // try {
    //     $conn = new PDO($dsn, $user, $password);
    // } catch (PDOException $e) {
    //     echo "Connection failed: " . $e->getMessage();
    // }


    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "crud";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
    echo "Connection failed: ";
        die("Connection failed: " . $conn->connect_error);
    }

    echo "Connected successfully <br/>";

    // Perform your database operations here

    // Close the connection
    // $conn->close();


    // Fetch data from database
    try {
        $query = "SELECT * FROM user_table";
        $result = $conn->query($query);

        if($result){
            while ($row = $result->fetch_assoc()) {
                echo "<h1>" . $row['user'] . "</h1>";
            };
        
            // Free the result set
            $result->free_result();
        }
    
        if ($result == false) {
            throw new mysqli_sql_exception("Error in SQL query: " . $conn->error);
        }
    
        // Process the result set, if needed
    } catch (mysqli_sql_exception $e) {
        echo "Got error: " . $e->getMessage();
    }

    // POST request
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if the form is submitted using POST method

        $username = $_POST["user"];
        // echo $username; die();

        // try {
        //     // $stmt = $conn->prepare("INSERT INTO user_table VALUES $username");
        //     // $stmt->bindParam(':user', $username);
        //     // $stmt->execute();

        //     // $stmt = $conn->prepare("INSERT INTO user_table VALUES user");
        //     // $stmt->bindParam(':user', $username);
        //     // $stmt->execute();

        //     $stmt = $conn->prepare("INSERT INTO user_table user VALUES $username");
        //     $stmt->bind_param("s", $username);

        //     // Execute the statement
        //     $stmt->execute();

        //     echo "User data successfully inserted into the database.";
        // } catch (PDOException $e) {
        //     echo "Error: " . $e->getMessage();
        // }

    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Crud App</title>
    </head>
    <body>
         <h1 style="text-align:center">Welcome to the crud app. <h1>
    </body>
        <form method="post" action="">
            <div style="text-align: center">
                    <input type="text" name="user" />
                    <input type="submit">
            </div>
        </form>
</html>