<?php
    session_start();
    include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bubble Beauty</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
    <!--header-->
    <header>
        <div class="container">
            <h1><a href="dashboard.php">Bubble Beauty</a></h1>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="profil.php">Profile</a></li>
                <li><a href="data-kategori.php">Category</a></li>
                <li><a href="data-produk.php">Product</a></li>
                <li><a href="logout.php">Log out</a></li>
            </ul>
        </div>
    </header>

    <!--content-->
    <div class="section">
        <div class="container">
            <h3>Category</h3>
            <div class="box">
                <p><a href="add-kategori.php">Add Category</a></p>
                <table border="1" cellspacing="0" class="table">
                    <thead>
                        <tr>
                            <th width="60px">No</th>
                            <th>Category</th>
                            <th width="150px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            $category = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                            while($row = mysqli_fetch_array($category)){
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['category_name'] ?></td>
                            <td>
                                <a href="edit-kategori.php?id=<?php echo $row['category_id'] ?>">Edit</a> || <a href="proses-hapus.php?idk=<?php echo $row['category_id'] ?>" onclick="return confirm('Are you sure to delete?')">Delete</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--footer-->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2022 - Bubble Beauty.</small>
        </div>
    </footer>
</body>
</html>