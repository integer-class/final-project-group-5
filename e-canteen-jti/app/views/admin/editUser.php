<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
</head>
<body>

    <h2>Edit User</h2>
    <form action="/admin/editUser" method="post">

        <!-- Tambahkan hidden field untuk user_id -->
        <input type="hidden" name="user_id" value="<?php echo $userData['user_id']; ?>">


        <label for="username">Username:</label><br>
        <input type="text" name="username" id="username" placeholder="Username" required value="<?php echo $userData['username']; ?>"><br><br>
        
        <label for="password">Password:</label><br>
        <input type="password" name="password" id="password" placeholder="Password" required value="<?php echo $userData['password']; ?>"><br><br>
        
        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email" placeholder="Email" required value="<?php echo $userData['email']; ?>"><br><br>
        
        <label for="role">Role:</label><br>
        <select name="role" id="role" required>
            <option value="admin" <?php if ($userData['role'] === 'admin') echo 'selected'; ?>>Admin</option>
            <option value="cashier" <?php if ($userData['role'] === 'cashier') echo 'selected'; ?>>Cashier</option>
        </select><br><br>
        
        <label for="address">Address:</label><br>
        <textarea name="address" id="address" placeholder="Address" rows="4" cols="50" required><?php echo $userData['address']; ?></textarea><br><br>
        
        <label for="phone_number">Phone Number:</label><br>
        <input type="tel" name="phone_number" id="phone_number" placeholder="Phone Number" required value="<?php echo $userData['phone_number']; ?>"><br><br>

        <input type="submit" name="submit" value="Edit">
    </form>

</body>
</html>
