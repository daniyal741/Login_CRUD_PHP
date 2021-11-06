<?php
session_start();
include('connect.php');

if (isset($_SESSION['login'])) {



    $res = "";
    $info = "";
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = "Insert";
        if (isset($_POST['type'])) {

            if ($_POST['type'] == "Insert" && isset($_POST['manufacturer']) && isset($_POST['model']) && isset($_POST['color'])) {

                $man = $_POST['manufacturer'];
                $model = $_POST['model'];
                $color = $_POST['color'];
                setCar($man, $model, $color);
                $info = "Record Inserted Successfully";
            } else {

                $id = $_POST['id'];
                $man = $_POST['manufacturer'];
                $model = $_POST['model'];
                $color = $_POST['color'];
                updateCar($id, $man, $model, $color);
                $info =  "Record Updated Successfully";
            }
        }
    }
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {

        $title = "Edit";
        $id = $_GET['edit'];
        $res = getCar($id);
    }

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $title; ?></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Logo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
                        </li>
                        <li class="nav-item" class="log">
                            <a class="nav-link" href="login.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container" style="padding: 2rem 0rem;">
            <h1><?php echo $title . " Record"; ?></h1>
            <?php if ($info) { ?>
                <div class="alert alert-success" role="alert">
                    <?php echo $info; ?>
                </div>
            <?php }  ?>

            <form action="" method="post">
                <div class="mb-3">
                    <label for="manufacturer" class="form-label">Manufacturer</label>
                    <input value="<?php echo ($res === "" ? "" : $res['Manufacturer']); ?>" type="text" class="form-control" name="manufacturer" id="manufacturer" aria-describedby="manufacturer">
                </div>
                <div class="mb-3">
                    <label for="model" class="form-label">Model</label>
                    <input value="<?php echo ($res === "" ? "" : $res['Model']); ?>" type="text" class="form-control" name="model" id="model" aria-describedby="model">
                </div>
                <div class="mb-3">
                    <label for="color" class="form-label">Color</label>
                    <input value="<?php echo ($res === "" ? "" : $res['Color']); ?>" type="text" class="form-control" name="color" id="color" aria-describedby="Color">
                </div>
                <input type="hidden" name="id" value="<?php echo ($res === "" ? "" : $res['ID']); ?>">
                <input type="submit" name="type" class="btn btn-primary" value="<?php echo ($title === "Edit" ? "Update" : "Insert"); ?>">
            </form>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>

    </html>

<?php } else {

    header('location: login.php');
} ?>