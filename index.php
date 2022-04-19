<?php session_start(); ?>
<?php require 'handle.php'; ?>
<?php
// setcookie('username', 'test', ['httponly' => true, 'secure' => true]);
setcookie('username', 'test');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

    <link rel="stylesheet" href="styles.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
        table {
            width: 60%;
            border-collapse: collapse;
            margin: 100px auto;
        }

        th,
        td {
            height: 50px;
            vertical-align: center;
            border: 1px solid black;
        }
    </style>

</head>

<body>
    <?php
    if (isset($_COOKIE['username'])) {
        echo $_COOKIE['username'];
    }

    if (isset($_SESSION['email']) && $_SESSION['email']) {
        echo '<h1 align="center">Welcome ' . $_SESSION['email'] . "!</h1>";
        echo '<a href="logout.php" class="btn" >Logout</a> <br \>';
    } else {
        echo '<h1 align="center">You are not login!</h1>';
        // echo '<a href="login.php" class="btn">Login</a>';
    }
    ?>

    <!-- Register -->
    <div style="margin-left: 300px; width: 800px;">
        <form method="post" action="index.php" class="form">

            <h2>Add Account</h2>

            <input type="email" name="email" placeholder="Email" value="" required />

            <input type="password" name="password" placeholder="Password" value="" required />

            <input type="text" name="username" placeholder="username" value="" required style="width: 300px;">

            <input type="submit" name="register" value="Register" />

        </form>
        <br>
        <table>
            <thead>
                <th>No.</th>
                <th>Username</th>
                <th>Password</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </thead>
            <tbody align="center">
                <?php
                $sql = "SELECT * FROM accounts ";

                $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                $i = 1;
                while ($row = mysqli_fetch_array($result)) { ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row["username"]; ?></td>
                        <td><?php echo $row["password"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <?php if ($row["role"] == 1) { ?>
                            <td>Admin</td>
                        <?php } else { ?>
                            <td>User</td>
                        <?php } ?>
                        <td><a class="btn btn-primary" href="EditAccount.php?accountId=<?php echo $row['id'] ?>">Edit</a>
                        </td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>


    </div>

</body>

</html>