<!-- donors.php -->
<?php
$host = 'localhost';
$dbname = 'blood_donation';
$username = 'root';
$password = '';


$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['bloodgroup'])) {
    
    $bloodgroup = mysqli_real_escape_string($conn, $_POST['bloodgroup']);

    
    $sql = "SELECT * FROM donors WHERE bloodgroup = '$bloodgroup' LIMIT 30";
    $result = mysqli_query($conn, $sql);

    
    $donors = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    
    mysqli_free_result($result);
} 

else {
    echo "No blood group selected.";
    exit();
}


mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Donors</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            text-align: center;
        }
        h1 {
            color: #d9534f;
            margin-bottom: 20px;
        }
        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #d9534f;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .no-data {
            color: #777;
        }
    </style>
</head>
<body>
    <h1>Available Donors for Blood Group: <?= htmlspecialchars($bloodgroup) ?></h1>

    <table>
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Date of Birth</th>
                <th>Department</th>
                <th>Mobile</th>
                <th>Blood Group</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($donors)): ?>
                <tr>
                    <td colspan="5" class="no-data">No donors found for this blood group.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($donors as $donor): ?>
                    <tr>
                        <td><?= htmlspecialchars($donor['fullName']) ?></td>
                        <td><?= htmlspecialchars($donor['dob']) ?></td>
                        <td><?= htmlspecialchars($donor['department']) ?></td>
                        <td><?= htmlspecialchars($donor['mobile']) ?></td>
                        <td><?= htmlspecialchars($donor['bloodgroup']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
