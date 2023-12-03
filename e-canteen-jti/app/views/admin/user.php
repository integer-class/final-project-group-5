<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Data</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .action-btns {
            display: flex;
            justify-content: space-between;
        }
        .action-btns button {
            margin-inline: 5px;
            width: 75%;
        }
        .action-btns form {
            width: 100%;
        }
    </style>
</head>
<body>
    <ul>
        <li><a href="/admin/home">Home</a></li>
        <li><a href="/admin/user">User</a></li>
        <li><a href="/admin/product">Product</a></li>
        <li><a href="#">Report</a></li>
    </ul>

    <h2>User Data</h2>
    <button onclick="window.location.href='/admin/createUser'">Add User</button>
    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Address</th>
                <th>Phone Number</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
                foreach ($user_data as $user) {
                    echo "<tr>";
                    echo "<td>".$user['user_id']."</td>";
                    echo "<td>".$user['username']."</td>";
                    echo "<td>".$user['email']."</td>";
                    echo "<td>".$user['role']."</td>";
                    echo "<td>".$user['address']."</td>";
                    echo "<td>".$user['phone_number']."</td>";
                    echo "<td class='action-btns'>";
                    echo "<button onclick=\"window.location.href='/admin/editUser?user_id=".$user['user_id']."'\">Edit</button>";
                    echo "<form method='post' action='/admin/deleteUser'>";
                    echo "<input type='hidden' name='user_id' value='".$user['user_id']."'>";
                    echo "<button type='submit'>Delete</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>

</body>
</html>
