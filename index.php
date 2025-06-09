<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>To-Do List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>📝 My To-Do List</h1>

        <form action="add.php" method="POST">
            <input type="text" name="title" placeholder="Add a new task..." required>
            <button type="submit">Add</button>
        </form>

        <ul>
            <?php
            $result = $conn->query("SELECT * FROM tasks ORDER BY id DESC");
            while ($row = $result->fetch_assoc()):
            ?>
            <li class="<?= $row['is_completed'] ? 'completed' : '' ?>">
                <span><?= htmlspecialchars($row['title']) ?></span>
                <div class="actions">
                    <a href="complete.php?id=<?= $row['id'] ?>" title="Toggle Complete">✅</a>
                    <a href="edit.php?id=<?= $row['id'] ?>" title="Edit">✏️</a>
                    <a href="delete.php?id=<?= $row['id'] ?>" title="Delete">❌</a>
                </div>
            </li>
            <?php endwhile; ?>
        </ul>
    </div>
</body>
</html>
