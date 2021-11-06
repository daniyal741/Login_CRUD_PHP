<?php
session_start();
if (isset($_SESSION['login'])) {

    session_unset();
    session_destroy();
}
include('connect.php');
$show = "";
if (isset($_POST['name'])) {

    $res = getUser($_POST['name'], $_POST['password']);

    if ($res) {

        $_SESSION["login"] = $res['Username'];

        header("Location: dashboard.php");
    } else {

        $show = " Invalid Username or Password. Please Try Again...";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<style>
    .main {

        display: flex;
        width: 80%;
        margin: auto;
        justify-content: center;
        align-items: center;
    }

    .container {

        padding: 4rem 0;
        width: 60%;

    }
</style>

<body>

    <div class="main">

        <div class="container">
            <h1>Login</h1>
            <?php if ($show) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $show; ?>
                </div>
            <?php }  ?>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Username</label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <span>Does Not Have An Account? </span><a href="./register.php">SignUp here</a><br><br>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>