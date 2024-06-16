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
    <title>Dallas Family Clinic - Patient Details</title>
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

        .patient-details {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .patient-details h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .patient-table {
            width: 100%;
            border-collapse: collapse;
        }

        .patient-table th, .patient-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .patient-table th {
            background-color: #4CAF50;
            color: white;
            cursor: pointer; /* Add cursor pointer for sorting */
        }

        .patient-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .patient-table td.actions {
            text-align: center;
        }

        .patient-table a {
            color: #4CAF50;
            text-decoration: none;
            margin: 0 5px;
        }

        .patient-table a:hover {
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

        .filter-select {
            padding: 10px;
            margin: 5px;
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
    <img src="image/logo.png" alt="Dallas Family Clinic Logo"> <!-- Add logo here -->
    <h1>Dallas Family Clinic</h1>
</header>
<div class="container">
    <div class="search-container">
        <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search for names..">
        <select class="filter-select" id="genderFilter" onchange="filterTable()">
            <option value="">Filter by Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
    </div>
    <div class="patient-details">
        <h2>Patient Details</h2>
        <table class="patient-table" id="patientTable">
            <thead>
            <tr>
                <th onclick="sortTable(0)">Patient ID</th> <!-- Add onclick event for sorting -->
                <th onclick="sortTable(1)">Name</th>
                <th onclick="sortTable(2)">Phone Number</th>
                <th onclick="sortTable(3)">Health Number</th>
                <th onclick="sortTable(4)">Postal Code</th>
                <th onclick="sortTable(5)">Country</th>
                <th onclick="sortTable(6)">Address</th>
                <th onclick="sortTable(7)">Gender</th>
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

            $sql = "SELECT patient_id, first_name, last_name, phone_number, health_number, postal_code, country, address, gender FROM patient ORDER BY patient_id DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["patient_id"] . "</td>";
                    echo "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>";
                    echo "<td>" . $row["phone_number"] . "</td>";
                    echo "<td>" . $row["health_number"] . "</td>";
                    echo "<td>" . $row["postal_code"] . "</td>";
                    echo "<td>" . $row["country"] . "</td>";
                    echo "<td>" . $row["address"] . "</td>";
                    echo "<td>" . $row["gender"] . "</td>";
                    echo '<td class="actions"><a href="updatepatient.php?patient_id=' . $row["patient_id"] . '">Update</a>';
                    echo '<a href="deletepatient.php?patient_id=' . $row["patient_id"] . '">Delete</a></td>';
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9'>No results found</td></tr>";
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
        table = document.getElementById("patientTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
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

    // Function to filter table by gender
    function filterTable() {
        var input, filter, table, tr, td, i;
        input = document.getElementById("genderFilter");
        filter = input.value.toUpperCase();
        table = document.getElementById("patientTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[7];
            if (td) {
                if (filter === "" || td.innerHTML.toUpperCase().indexOf(filter) > -1) {
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
        table = document.getElementById("patientTable");
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
