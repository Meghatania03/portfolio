<?php
session_start();


if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}


$conn = mysqli_connect("localhost:3307", "root", "", "portfolio_db");
if(!$conn){ die("Connection failed: ".mysqli_connect_error()); }

$messages = mysqli_query($conn, "SELECT * FROM messages ORDER BY created_at DESC");

if(isset($_POST['action'])){
    $table = $_POST['table'];
    $action = $_POST['action'];

    if($action == "Insert"){
        $columns = implode(",", array_keys($_POST['data']));
        $values_arr = array_map(function($v) use($conn){ return mysqli_real_escape_string($conn, $v); }, $_POST['data']);
        $values = implode("','", $values_arr);
        $sql = "INSERT INTO $table ($columns) VALUES ('$values')";
        mysqli_query($conn, $sql);
    }

    if($action == "Delete"){
        $id = intval($_POST['id']);
        $sql = "DELETE FROM $table WHERE id=$id";
        mysqli_query($conn, $sql);
    }

    if($action == "Update"){
        $id = intval($_POST['id']);
        $updates = [];
        foreach($_POST['data'] as $col => $val){
            $val = mysqli_real_escape_string($conn, $val);
            $updates[] = "$col='$val'";
        }
        $updates_str = implode(",", $updates);
        $sql = "UPDATE $table SET $updates_str WHERE id=$id";
        mysqli_query($conn, $sql);
    }
}

$skills = mysqli_query($conn, "SELECT * FROM skills");
$experiences = mysqli_query($conn, "SELECT * FROM experiences");
$education = mysqli_query($conn, "SELECT * FROM education");
$services = mysqli_query($conn, "SELECT * FROM services");
$projects = mysqli_query($conn, "SELECT * FROM projects");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<div class="container admin-section">
     <a href="index.php" class='btn'>Back to Home</a>
     <br><br>

    <h1>Admin Panel</h1>
    <p>Manage Skills, Experiences, Education, Services & Projects</p>

    <?php
   function display_section($data,$table_name,$columns){
    echo "<div class='table-container'>";
    echo "<h2>".ucfirst($table_name)."</h2>";
    echo "<table><tr>";
    foreach($columns as $col){ echo "<th>$col</th>"; }
    echo "<th>Action</th></tr>";

    while($row = mysqli_fetch_assoc($data)){
        echo "<tr>
              <form method='POST' class='inline'>";

        echo "<input type='hidden' name='table' value='$table_name'>";
        echo "<input type='hidden' name='id' value='".$row['id']."'>";

        foreach($columns as $col){
            if($col == 'id'){
                echo "<td>".$row[$col]."</td>"; // id not editable
            } else {
                // Editable inputs in each cell
                echo "<td><input type='text' name='data[$col]' value='".$row[$col]."' required></td>";
            }
        }

        // Action column: Update + Delete
        echo "<td>
                <button type='submit' name='action' value='Update'>Update</button>
              </form>

              <form method='POST' class='inline'>
                <input type='hidden' name='table' value='$table_name'>
                <input type='hidden' name='id' value='".$row['id']."'>
                <input type='hidden' name='action' value='Delete'>
                <button type='submit'>Delete</button>
              </form>
            </td>";

        echo "</tr>";
    }
    echo "</table>";

    // Insert form
    echo "<form method='POST' class='inline'>";
    echo "<input type='hidden' name='table' value='$table_name'>";
    echo "<input type='hidden' name='action' value='Insert'>";
    foreach($columns as $col){
        if($col != 'id'){ 
            echo "<input type='text' name='data[$col]' placeholder='$col' required>";
        }
    }
    echo "<button type='submit'>Add</button>";
    echo "</form></div>";
}

    display_section($skills,"skills",["id","skill_name","description"]);
    display_section($experiences,"experiences",["id","job_title","company","duration"]);
    display_section($education,"education",["id","degree","institution","year","cgpa"]);  
    display_section($services,"services",["id","title","icon","description"]);
    display_section($projects,"projects",["id","title","description","image","link"]);
    ?>

    <div class ="table-container">
    <h2>Messages</h2>
    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Received At</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($messages)) { ?>
        <tr>
            <td><?php echo htmlspecialchars($row['id']); ?></td>
            <td><?php echo htmlspecialchars($row['name']); ?></td>
            <td><?php echo htmlspecialchars($row['email']); ?></td>
            <td><?php echo htmlspecialchars($row['message']); ?></td>
            <td><?php echo htmlspecialchars($row['created_at']); ?></td>
            <td>
            <form method="POST" class="inline">
                <input type="hidden" name="table" value="messages">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <input type="hidden" name="action" value="Delete">
                <button type="submit">Delete</button>
            </form>
        </td>
        </tr>
        <?php } ?>
    </table>
    </div>



    <div class="logout-container">
    <form method="POST" action="logout.php">
        <button type="submit">Logout</button>
    </form>
</div>
</div>

<script>
    // Wait until DOM is loaded
    document.addEventListener('DOMContentLoaded', () => {
        // Save scroll position before submitting any form
        const forms = document.querySelectorAll('form');
        forms.forEach(form => {
            form.addEventListener('submit', () => {
                localStorage.setItem('scrollPos', window.scrollY);
            });
        });

        // Restore scroll position on page load
        const scrollPos = localStorage.getItem('scrollPos');
        if(scrollPos) {
            window.scrollTo(0, scrollPos);
            localStorage.removeItem('scrollPos'); // remove after restoring
        }
    });
</script>


</body>
</html>
