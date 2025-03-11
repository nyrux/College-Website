<?php
include "../../php/config.php";

$result = $conn->query("SELECT * FROM users WHERE status is null ORDER BY date DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Sign-Ups</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="admin-container">
    <h1>Sign-Ups</h1>
    <table id="signup-table">
        <thead>
            <tr>
                <th>S.N</th>
                <th>Username</th>
                <th>Email</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i=1;
             while ($user = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $i; ?>
                    <td><?php echo htmlspecialchars($user['username']); ?></td>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                    <td><?php echo htmlspecialchars($user['date']); ?></td>
                    <td>
                        <button class="accept-btn" onclick="update('<?php echo htmlspecialchars($user['id']); ?>','accepted')">Accept</button>
                        <button class="decline-btn" onclick="update('<?php echo htmlspecialchars($user['id']); ?>', 'declined')">Decline</button>
                    </td>
                </tr>
            <?php $i++; endwhile; ?>
        </tbody>
    </table>
</div>

<script>
    function update(id, status) {
        
        fetch("update_status.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ id: id, status: status })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(`${status}`);
            location.reload();
        } else {
            alert("Error updating status.");
        }
    });
    }

    
</script>

</body>
</html>
