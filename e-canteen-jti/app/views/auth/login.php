<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <header>
        <h1>Login Page</h1><br>
    </header>

    <main>
    <form action="/login" method="POST">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" size="20"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" size="20"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" name="Login" value="Proses"></td>
            </tr>
        </table>
    </form>
    </main>

    <footer>
        <p>&copy; 2023 - E-Canteen JTI</p>
    </footer>

</body>
</html>