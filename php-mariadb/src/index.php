<?php
    require_once 'db_connect.php'; // Include the database connection

    // Fetch users with error handling
    $sql_query = "SELECT id, name, email, created_at FROM users LIMIT 5";
    try {
        $stmt = $pdo->query($sql_query);
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        $users = [];
    }
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <title>PHP with MySQL</title>
</head>
<body class="max-w-4xl mx-auto p-12">
    <h1 class="text-4xl font-bold text-clifford mb-6">PHP with MySQL</h1>

    <?php if (!empty($users)): ?>
        <table class="w-full text-sm text-left text-gray-900 shadow mt-12">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Created At
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr class="bg-white border-b border-gray-200">
                        <td class="px-6 py-3"><?php echo htmlspecialchars($user['id']); ?></td>
                        <td class="px-6 py-3"><?php echo htmlspecialchars($user['name']); ?></td>
                        <td class="px-6 py-3"><?php echo htmlspecialchars($user['email']); ?></td>
                        <td class="px-6 py-3"><?php echo htmlspecialchars($user['created_at']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="text-gray-700 text-lg">No users found.</p>
    <?php endif; ?>
</body>
</html>