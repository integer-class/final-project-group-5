<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add User</title>
</head>
<body>

    <h2>Add User</h2>
    <form action="/admin/createUser" method="post">
        <label for="username">Username:</label><br>
        <input type="text" name="username" id="username" placeholder="Username" required><br><br>
        
        <label for="password">Password:</label><br>
        <input type="password" name="password" id="password" placeholder="Password" required><br><br>
        
        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email" placeholder="Email" required><br><br>
        
        <label for="role">Role:</label><br>
        <select name="role" id="role" required>
            <option value="admin">Admin</option>
            <option value="cashier">Cashier</option>
        </select><br><br>
        
        <label for="address">Address:</label><br>
        <textarea name="address" id="address" placeholder="Address" rows="4" cols="50" required></textarea><br><br>
        
        <label for="phone_number">Phone Number:</label><br>
        <input type="tel" name="phone_number" id="phone_number" placeholder="Phone Number" required><br><br>

        <input type="submit" name="submit" value="Submit">
    </form>

</body>
</html>
