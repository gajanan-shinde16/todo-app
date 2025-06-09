<?php
include 'db.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = $conn->real_escape_string($_POST['title']);
    //$conn->query("UPDATE tasks SET title='$title' WHERE id=$id");
    $conn->query("UPDATE tasks SET title='$title', is_completed=0 WHERE id=$id");
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM tasks WHERE id=$id");
$task = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
</head>
<body>
    <h1>Edit Task</h1>
    <form method="POST" action="edit.php">
        <input type="hidden" name="id" value="<?= $task['id'] ?>">
        <input type="text" name="title" value="<?= htmlspecialchars($task['title']) ?>">
        <button type="submit" name="update">Update</button>
    </form>
</body>
</html>
