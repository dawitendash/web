<?php
include 'connection.php';
if (isset($_GET['department_id'])) {
    $department_id = $_GET['department_id'];
    // Change the SQL query to use the correct data type for binding
    $sql = "SELECT * FROM placedstudent WHERE dptName = ?";
    $stmt = $conn->prepare($sql);
    // Check if the prepare() function succeeded
    if ($stmt === false) {
        echo json_encode(["error" => "Failed to prepare the SQL query: " . $conn->error]);
        exit();
    }
    $stmt->bind_param("s", $department_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $students = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $students[] = $row;
        }
    }
    echo json_encode($students);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Students by Department</title>
    <link href="student-style.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <h1>Students by Department</h1>
        <label for="stream">Select Department:</label>
        <select id="stream" onchange="fetchStudents()">
            <!-- Options will be populated here by PHP -->
            <?php
            $sql = "SELECT stream_name FROM stream WHERE 1";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='".$row['stream']."'>".$row['stream']."</option>";
                }
            }
            ?>
        </select>
        <select id="students-table">
            <!-- <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody id="students-table">
                 Student rows will be populated here by JavaScript 
            </tbody> -->
        </select>
    </div>
    <script>
        function fetchStudents() {
            const departmentId = document.getElementById('stream').value;
            const xhr = new XMLHttpRequest();
            xhr.open('GET', `stream.php?id=${departmentId}`, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4) {
                    console.log('Request finished with status: ' + xhr.status);
                    if (xhr.status == 200) {
                        console.log('Response: ' + xhr.responseText);
                        try {
                            const students = JSON.parse(xhr.responseText);
                            if (students.error) {
                                console.error(students.error);
                                return;
                            }
                            const studentsTable = document.getElementById('students-table');
                            studentsTable.innerHTML = ''; // Clear previous rows
                            students.forEach(student =>{
                                const option = document.createElement('tr');
                                const idCell = document.createElement('td');
                              const nameCell = document.createElement('td');
                                 idCell.textContent = student.IdNumber;
                                // nameCell.textContent = student.firstName, " ", student.lastName," ",student.gFName;
                                option.appendChild(idCell);
                                row.appendChild(nameCell);
                                studentsTable.appendChild(option);
                            });
                        } catch (e) {
                            console.error('Error parsing JSON response: ', e);
                        }
                    } else {
                        console.error('Error fetching data');
                    }
                }
            };
            console.log('Sending request to: ' + `index.php?department_id=${departmentId}`);
            xhr.send();
        }
        document.addEventListener('DOMContentLoaded', function() {
            fetchStudents(); // Fetch students for the default department on page load
        });
    </script>
</body>
</html>
