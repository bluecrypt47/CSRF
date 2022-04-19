<?php require 'handle.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

    <link rel="stylesheet" href="styles.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <a class="btn btn-lg  " href="index.php"><b>Home</b></a>
    <?php
    if (isset($_GET['accountId'])) {
        $id = $_GET['accountId'];

        $sql = "SELECT * FROM accounts WHERE id = $id";
        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        $row = mysqli_fetch_assoc($result);
    }
    ?>
    <div style="margin-left: 500px;">
        <h2>Edit Account</h2>
        <form method="POST" class="form">
            <label>Username: <input type="text" value="<?php echo $row['username']; ?>" name="username"></label><br />
            <label>Email: <input type="text" value="<?php echo $row['email']; ?>" name="email"></label><br />
            <label>Password: <input type="text" value="<?php echo $row['password']; ?>" name="password"></label><br />
            <label>Role: <select name="role">
                    <?php if ($row['role'] == 0) { ?>
                        <option value="0">User</option>
                        <option value="1">Admin</option>
                    <?php } else { ?>
                        <option value="1">Admin</option>
                        <option value="0">User</option>
                    <?php } ?>
                </select></label> <br />
            <input type="submit" value="Edit" name="editUser" class="btn btn-primary">
            <?php
            if (isset($_POST['editUser'])) {
                $id = $_GET['accountId'];
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $role = $_POST['role'];

                $sql = "UPDATE `accounts` SET username='$username', email='$email', password='$password', role='$role' WHERE id='$id'";

                if ($conn->query($sql) === TRUE) {
                    echo '<script language="javascript">alert("Record edited successfully!"); window.location="index.php";</script>';
                } else {
                    echo '<script language="javascript">alert(Error editing record: " . $conn->error;); window.location="EditAccount.php";</script>';
                }
                $conn->close();
            }
            ?>
        </form>
    </div>



</body>

</html>