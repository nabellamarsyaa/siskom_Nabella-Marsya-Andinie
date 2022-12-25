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
            <h3>Add Category</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Category" class="input-control" required>
                    <input type="submit" name="submit" value="Submit" class="btn">          
                </form>
                <?php
                    if(isset($_POST['submit'])){

                        $nama   = $_POST['nama'];

                        $insert = mysqli_query($conn, "INSERT INTO tb_category VALUES (
                                            null,
                                            '".$nama."') ");
                        if($insert){
                        echo '<script>alert("Add Data Successfully")</script>';
                        echo '<script>window.location="data-kategori.php"</script>';
                        }else{
                        echo 'gagal '.mysqli_error($conn);
                        }

                    }
                ?>
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