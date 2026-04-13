    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Nav with Image Buttons</title>

        <link rel="stylesheet" href="tabledesign.css">
        <link rel="stylesheet" href="theme.css">

        <style>
        /* Nav bar container */
        .header {
            display: flex;
            justify-content: center;
            gap: 20px;
            background-color: rgba(255,255,255,0.1);
            padding: 10px;
        }

        /* Nav buttons */
        .header a {
            display: inline-block;
            padding: 8px 20px;
            background: url('backgroundbutton.jpg') no-repeat center/cover; /* starting image */
            color: #ff3b0f;              /* ember text color */
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background 0.3s; /* smooth hover */
            text-shadow: 1px 1px 0  #B2B2B2, -1px -1px 0  #B2B2B2, 1px -1px 0  #B2B2B2, -1px 1px 0 #B2B2B2; /* black outline */
        }

        /* Hover effect using new image */
        .header a:hover {
            background: url('hoverbutton.jpg') no-repeat center/cover; /* image on hover */
        }
        </style>
    </head>

    <body>
        <!-- Nav bar -->
        <nav class="header">
            <a href="home.php">Home</a>
            <a href="registered.php">Registered</a>
            <a href="#" onclick="openConfirmModal('home.php?logout=1', 'Are you sure you want to log out?')">Logout</a>
        </nav>

        <div id="deleteOverlay" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.7); z-index:1000; justify-content:center; align-items:center;">
    
            <div style="background:white; padding:30px; border-radius:10px; text-align:center; min-width:300px; box-shadow: 0 4px 15px rgba(0,0,0,0.5);">
                <h2 style="color:#333; margin-top:0;">Are you sure?</h2>
                <p id="modalText" style="color:#666;">This action cannot be undone.</p>



                <div style="margin-top:20px;">
                    <button onclick="closeDeleteModal()" style="padding:10px 20px; margin-right:10px; cursor:pointer; border-radius:5px; border:1px solid #ccc;">Cancel</button>
                    <a id="confirmDeleteLink" href="#" style="padding:10px 20px; background:#ff3b0f; color:white; text-decoration:none; border-radius:5px; font-weight:bold; display:inline-block;">Delete Now</a>
                </div>
            </div>
        </div>
        <script src="popup.js"></script>
    </body>
    </html>

    <?php
    $servername = "localhost";
    $username = "root";      // default for XAMPP
    $password = "";          // default for XAMPP
    $dbname = "logindb";        // your database name

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Select only the specific columns
    $sql = "SELECT userid, email, name, contact_number FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Email</th><th>Name</th><th>Contact Number</th><th>Action</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['userid']}</td>
                    <td>{$row['email']}</td>
                    <td>{$row['name']}</td>
                    <td>{$row['contact_number']}</td>
    <td>
        <a href='edit.php?userid={$row['userid']}'>Edit</a> | 
        <a href='#' onclick='openConfirmModal(\"delete.php?userid={$row['userid']}\", \"Are you sure you want to delete {$row['name']}?\")'>Delete</a>
    </td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "No data found.";
    }   

    $conn->close();
    ?>

