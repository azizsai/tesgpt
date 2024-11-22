<?php
include '../src/db.php';

$result = $conn->query("SELECT * FROM tasks");

?>
<!DOCTYPE html>
<html>
<head>
    <title>Task Manager</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Task Manager</h1>
    <form action="add_task.php" method="POST">
        <input type="text" name="task" placeholder="Enter Task" required class="form-control mb-3">
        <button type="submit" class="btn btn-primary">Add Task</button>
    </form>
    <ul class="list-group mt-3">
        <?php while ($row = $result->fetch_assoc()): ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <?= $row['task'] ?>
                <div>
                    <a href="complete_task.php?id=<?= $row['id'] ?>" class="btn btn-success btn-sm">Complete</a>
                    <a href="delete_task.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                </div>
            </li>
        <?php endwhile; ?>
    </ul>
</div>
</body>
</html>
