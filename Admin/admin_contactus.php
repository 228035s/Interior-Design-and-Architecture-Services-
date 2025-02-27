<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="style1.css">
    <title>Admin Panel - Home</title>
</head>
<body>

    <!-- Header section -->
    <header class="header">
    <a href="index.php" class="logo"><img src="../logo.jpeg" alt="Logo"></a>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="admin_users.php">Users</a></li>
                <li><a href="admin_contactus.php">Contact Us</a></li>
                <li><a href="admin_consults.php">Consults</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main content section -->
    <main class="container mt-5">
        <h2 class="text-center">List of all the Contacts</h2>
        <?php 
include '../_connection.php';

if (isset($_POST['delete'])) {
    $name = $_POST['firstname'];
    $query = "DELETE FROM contact_us WHERE firstname = '$name'";
    $conn->query($query);
}

$sql = "SELECT * FROM contact_us";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo '  
    <br> 
    <h3>USERS</h3>
    <table>
        <tr>
            <th>Contact ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Message</th>
        </tr>';

    while ($row = $result->fetch_assoc()) {
        echo '
        <tr>
            <td>' . $row["conact_id"] . '</td>  <!-- Updated to conact_id -->
            <td>' . $row["firstname"] . '</td>
            <td>' . $row["lastname"] . '</td>
            <td>' . $row["email"] . '</td>
            <td>' . $row["message"] . '</td>
            <td>
                <form action="admin_contactus.php" method="post">
                    <input type="hidden" name="firstname" value="' . $row["firstname"] . '">
                    
                    <input type="submit" name="delete" value="Delete" class="delete-btn">
                </form>
            </td>
        </tr>';
    }
    
    echo '</table>';
} else {
    echo "No messages yet.";
}
?>


    </main>

    <!-- Footer section -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <p>At Arya Interior, we specialize in transforming spaces into refined, functional works of art. With a keen eye for detail and a passion for innovative design, we blend aesthetics and practicality to create interiors that truly reflect your vision.</p>
                </div>
                <div class="col-md-3">
                    <h2>Our Location</h2>
                    <div class="list">
                        <a href="#">Navi-Mumbai</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <h2>Follow Us</h2>
                    <div class="list">
                        <a href="#">Facebook</a>
                        <a href="#">Instagram</a>
                    </div>
                </div>
                
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.min.js"></script>
</body>
</html>
