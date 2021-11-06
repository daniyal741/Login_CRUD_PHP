<?php

session_start();
include('connect.php');
if (isset($_SESSION['login'])) {

    if (isset($_GET)) {

        if (isset($_GET['edit'])) {

            $id = $_GET['id'];
            header("Location: insert.php?edit={$id}");
        }
        if (isset($_GET['delete'])) {

            $id = $_GET['id'];
            deleteCar($id);
        }
    }


    $res = getAllCars();
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
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
            <h1>Dashboard</h1>

            <div style="padding:2rem 0 0 0;display:flex;justify-content:space-between;">
                <h4>Cars Table</h4>
                <form action="insert.php" method="post">
                    <input type="submit" value="Add" class="btn btn-primary">
                </form>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Manufacturer</th>
                        <th scope="col">Model</th>
                        <th scope="col">Color</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $count = 1;
                    while ($row = mysqli_fetch_array($res)) { ?>
                        <form action="" method="get">
                            <tr>
                                <th scope="row"><?php echo $count; ?></th>
                                <td><?php echo $row['Manufacturer']; ?></td>
                                <td><?php echo $row['Model']; ?></td>
                                <td><?php echo $row['Color']; ?></td>
                                <input type="hidden" name="id" value="<?php echo $row['ID']; ?>">
                                <td>

                                    <input type="submit" name="edit" value="Edit" class="btn btn-warning">
                                    <input type="submit" name="delete" value="Delete" class="btn btn-danger">
                                </td>
                            </tr>
                        </form>

                    <?php $count++;
                    } ?>
                </tbody>
            </table>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    </body>

    </html>

<?php } else {

    header('location: login.php');
} ?>