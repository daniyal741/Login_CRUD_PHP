<?php

include('connect.php');
$show = "";
if (isset($_POST['name'])) {

    $res = setUser($_POST['name'], $_POST['email'], $_POST['password']);

    if ($res) {

        $show = "Registered Successfully.";
        //header("Location: login.php");
    } else {

        $show = "";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
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
            <h1>Register</h1>
            <?php if ($show) { ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $show; ?>
                </div>
            <?php }  ?>

            <form action="" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Username</label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <span>Already Have An Account? </span><a href="./login.php">Login here</a><br><br>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>