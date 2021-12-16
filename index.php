<?php
require_once "core/base.php";
require_once "core/function.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="asset/bootstrap-4.5.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/feather-icons-web/feather.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <title>Contacts app</title>
    <style>
        img{
            width: 35px;
            height: 35px;
            border-radius: 50%;
            margin-right: 5px;
        }
    </style>
</head>
<body class="bg-dark">

    <div class="container">
        <div class="row my-5">
            <div class="col-12">
                <div class="row vh-100">
                    <div class="col-12 col-md-4">
                        <div class="card border-0 rounded shadow">
                            <div class="card-body">
                                <h4 class="text-primary">Add Contact</h4>
                                <hr>
                                <form action="create.php" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="<?php echo old("name");?>" required min="5" max="20">
                                        <?php if (getError("name")){ ?>
                                            <small class="form-text text-danger font-weight-bold"><?php echo getError("name")?></small>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone Number</label>
                                        <input type="number" name="phone" class="form-control" id="phone" placeholder="Phone" value="<?php echo old("phone");?>" required>
                                        <?php if (getError("phone")){ ?>
                                            <small class="form-text text-danger font-weight-bold"><?php echo getError("phone")?></small>
                                        <?php } ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="upload">Phone Number</label>
                                        <input type="file" name="upload[]" class="form-control p-1" id="upload" placeholder="Phone" value="<?php echo old("upload"); ?>" accept="image/jpeg,image/png" multiple required>
                                        <?php if (getError("upload")){ ?>
                                            <small class="form-text text-danger font-weight-bold"><?php echo getError("upload")?></small>
                                        <?php } ?>
                                    </div>
                                    <hr>
                                    <div class="text-right">
                                        <button class="btn btn-primary" name="add">Add</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="card border-0 rounded shadow">
                            <div class="card-body">
                                <h4 class="text-primary">Contact Lists</h4>
                                <hr>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Contacts</th>
                                            <th>Phone no</th>
                                            <th>Control</th>
                                            <th>Created At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    function users(){
                                        global $conn;
                                        $sql = "SELECT * FROM users";
                                        $query = mysqli_query($conn, $sql);
                                        $rows = [];
                                        while ($row = mysqli_fetch_assoc($query)){
                                            array_push($rows,$row);
                                        }
                                        return $rows;
                                    }
                                    ?>
                                    <?php foreach (users() as $u){ ?>
                                        <tr>
                                            <td class="align-middle"><?php echo $u['id'] ?></td>
                                            <td class="align-middle">
                                                <img src="<?php echo $u['photo_link']?>" alt="">
                                                <p class="d-inline"><?php echo $u['name']?></p>
                                            </td>
                                            <td class="align-middle"><?php echo $u['phone'] ?></td>
                                            <td class="align-middle text-nowrap">
                                                <a href="delete.php?id=<?php echo $u['id'];?>" class="btn btn-outline-danger"><i class="feather-trash-2"></i></a>
                                                <a href="edit.php?id=<?php echo $u['id'];?>" class="btn btn-outline-warning"><i class="feather-edit"></i></a>
                                            </td>
                                            <td class="align-middle">
                                                <?php echo $u['created_at']?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="asset/jquery-3.3.1.min.js"></script>
    <script src="asset/bootstrap-4.5.3-dist/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('.table').DataTable();
        } );
    </script>

</body>
</html>