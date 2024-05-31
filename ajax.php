<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body><?php
$conn = new mysqli("localhost","root","","student");

if (isset($_GET['department_id'])) {
    $department_id = $_GET['department_id'];

    // Change the SQL query to use the correct data type for binding
    $sql = "SELECT * FROM new_student WHERE d_id = ?";
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
    <title>Students by Departments</title>
    <link href="student-style.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <h1>Students by Department</h1>
        <label for="departments">Select Department:</label>
        <select id="departments" onchange="fetchStudents()">
            <!-- Options will be populated here by PHP -->
            <?php
            $conn = new mysqli("localhost","root","","student");
            $sql = "SELECT dname FROM dep where 1";
            $result = $conn->query($sql);
            if ($result->num_rows > 0){
                while($row = $result->fetch_assoc()) {
                    echo "<option value='".$row['dname']."'>".$row['dname']."</option>";
                }
            }
            ?>
             
        </select>
        <table>
            <thead>
                <tr>
                    <th>fname</th>
                    <th>lname</th>
                    <th>u_id</th>
                    <th>gba</th>
                    <th>batch</th>
                    <th>department</th>
                </tr>
            </thead>
            <tbody id="students-table">
                <!-- Student rows will be populated here by JavaScript -->
            </tbody>
        </table>
    </div>
    <script>
        function fetchStudents() {
            const departmentId = document.getElementById('departments').value;
            const xhr = new XMLHttpRequest();
            xhr.open('GET', `ajax.php?department_id=${departmentId}`, true);
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
                                const row = document.createElement('tr');
                                const fnameCell = document.createElement('td');
                                const lnameCell = document.createElement('td');
                                const idCell = document.createElement('td');
                                const gbaCell = document.createElement('td');
                                const batchCell = document.createElement('td');
                                const depatmentCell = document.createElement('td');
                                idCell.textContent = student.IdNumber;
                                // nameCell.textContent = student.firstName, " ", student.lastName," ",student.gFName;
                                 row.appendChild(fnameCell);
                                 row.appendChild(lnameCell);
                                 row.appendChild(idCell);
                                 row.appendChild( gbaCell);
                                 row.appendChild(batchCell);
                                 row.appendChild(depatmentCell);
                                 studentsTable.appendChild(row);
                            });
                        } catch (e) {
                            console.error('Error parsing JSON response: ', e);
                        }
                    } else {
                        console.error('Error fetching data');
                    }
                }
            };
            console.log('Sending request to: ' + `ajax.php?department_id=${departmentId}`);
            xhr.send();
        }

        document.addEventListener('DOMContentLoaded', function() {
            fetchStudents(); // Fetch students for the default department on page load
        });
    </script>
</body>
</html>

    
</body>
</html>