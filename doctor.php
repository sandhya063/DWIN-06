<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dallas Family Clinic - Practitioner Details</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        /* Add your custom styles here */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 0;
            text-align: center;

        }
        header img {
            height: 120px; /* Set the desired height */
            width: auto;  /* Maintain the aspect ratio */
            vertical-align: middle; /* Aligns the image vertically */
        }

        footer {
            background-color: green;
            color: #fff;
            padding: 10px 0;
            text-align: center;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 20px;
        }

        .practitioner-details {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .practitioner-details h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .practitioner-table {
            width: 100%;
            border-collapse: collapse;
        }

        .practitioner-table th, .practitioner-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .practitioner-table th {
            background-color: #4CAF50;
            color: white;
            cursor: pointer; /* Add cursor pointer for sorting */
        }

        .practitioner-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .practitioner-table td.actions {
            text-align: center;
        }

        .practitioner-table a {
            color: #4CAF50;
            text-decoration: none;
            margin: 0 5px;
        }

        .practitioner-table a:hover {
            text-decoration: underline;
        }

        .search-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .search-container input[type=text] {
            padding: 10px;
            margin: 5px;
            width: 50%;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        /* Pagination styles */
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color .3s;
            border: 1px solid #ddd;
            margin: 0 4px;
        }

        .pagination a.active {
            background-color: #4CAF50;
            color: white;
        }

        .pagination a:hover:not(.active) {background-color: #ddd;}
    </style>
</head>
<body>
<header>
    <img src="images/logo.png" alt="Dallas Family Clinic Logo"> <!-- Add logo here -->
</header>
<div class="container">
    <div class="search-container">
        <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search for names..">
    </div>
    <div class="practitioner-details">
        <h2>Practitioner Details</h2>
        <table class="practitioner-table" id="practitionerTable">
            <thead>
            <tr>
                <th onclick="sortTable(0)">Practitioner ID</th>
                <th onclick="sortTable(1)">Name</th>
                <th onclick="sortTable(2)">Gender</th>
                <th onclick="sortTable(3)">Age</th>
                <th class="actions">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "miketorres";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT practitioner_id, name, gender, age FROM general_practicioner ORDER BY practitioner_id DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["practitioner_id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["gender"] . "</td>";
                    echo "<td>" . $row["age"] . "</td>";
                    echo '<td class="actions"><a href="editpractitioner.php?practitioner_id=' . $row["practitioner_id"] . '">Edit</a>';
                    echo '<a href="deletepractitioner.php?practitioner_id=' . $row["practitioner_id"] . '">Delete</a></td>';
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No results found</td></tr>";
            }
            $conn->close();
            ?>
            </tbody>
        </table>
        <!-- Pagination section -->
        <div class="pagination">
            <a href="#">&laquo;</a>
            <a href="#" class="active">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">&raquo;</a>
        </div>
    </div>
    <!-- Add Doctor Button -->
    <div style="text-align: center; margin-top: 20px;">
        <a href="add_practitioner.html" style="padding: 10px 20px; background-color: #4CAF50; color: white; text-decoration: none; border-radius: 5px;">Add Doctor</a>
    </div>
</div>

<footer>
    <p>&copy; <?php echo date("Y"); ?> Dallas Family Clinic. All rights reserved.</p>

</footer>
<script>
    // Function to search table by name
    function searchTable() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("practitionerTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++)
{
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
        } else {
            tr[i].style.display = "none";
        }
    }
}

}

// Function to sort table by column
function sortTable(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("practitionerTable");
    switching = true;
    // Set the sorting direction to ascending:
    dir = "asc";
    /* Make a loop that will continue until
    no switching has been done: */
    while (switching) {
        // Start by saying: no switching is done:
        switching = false;
        rows = table.rows;
        /* Loop through all table rows (except the
        first, which contains table headers): */
        for (i = 1; i < (rows.length - 1); i++) {
            // Start by saying there should be no switching:
            shouldSwitch = false;
            /* Get the two elements you want to compare,
            one from current row and one from the next: */
            x = rows[i].getElementsByTagName("TD")[n];
            y = rows[i + 1].getElementsByTagName("TD")[n];
            /* Check if the two rows should switch place,
            based on the direction, asc or desc: */
            if (dir === "asc") {
                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    // If so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                }
            } else if (dir === "desc") {
                if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                    // If so, mark as a switch and break the loop:
                    shouldSwitch = true;
                    break;
                }
            }
        }
        if (shouldSwitch) {
            /* If a switch has been marked, make the switch
            and mark that a switch has been done: */
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            // Each time a switch is done, increase this count by 1:
            switchcount++;
        } else {
            /* If no switching has been done AND the direction is "asc",
            set the direction to "desc" and run the while loop again. */
            if (switchcount === 0 && dir === "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
}
</script>
</body>
</html>
```
