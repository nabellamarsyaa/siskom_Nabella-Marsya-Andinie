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
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
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
            <h3>Add Product</h3>
            <div class="box">
                <form action="" method="POST" enctype="multipart/form-data">
                    <select class="input-control" name="Category" required>
                        <option value="">--Choose--</option>
                        <?php
                            $category = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                            while($r = mysqli_fetch_array($category)){
                        ?>
                        <option value="<?php echo $r['category_id'] ?>"><?php echo $r['category_name'] ?></option>
                        <?php } ?>
                    </select>

                    <input type="text" name="name" class="input-control" placeholder="Name Product" required>  
                    <input type="text" name="price" class="input-control" placeholder="Price" required> 
                    <input type="file" name="image" class="input-control" required>
                    <textarea class="input-control" name="description" placeholder="Description"></textarea><br>
                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>
                <?php
                    if(isset($_POST['submit'])){

                        // print_r($_FILES['image']);
                        // menampung inputan dari form
                        $category    = $_POST['category'];
                        $name        = $_POST['name'];
                        $price       = $_POST['price'];
                        $description = $_POST['description'];

                        // menampung data file yang diupload
                        $filename = $_FILES['image']['name'];
                        $tmp_name = $_FILES['image']['tmp_name'];

                        $type1 = explode('.', $filename);
                        $type2 = $type1[1];

                        $newname = 'product'.time().'.'.$type2;

                        // menampung data format file yang diizinkan
                        $type_diizinkan = array('jpg', 'jpeg', 'png');

                        // validasi format file
                        if(!in_array($type2, $type_diizinkan)){
                            // jika format file tidak diizinkan
                            echo '<script>alert("File formats are not allowed")</script>';

                        }else{
                            // jika format file diizinkan
                            // proses upload file dan insert ke database
                            move_uploaded_file($tmp_name, './product/'.$newname);

                            $insert = mysqli_query($conn, "INSERT INTO tb_product VALUES(
                                        null,
                                        '".$category."',
                                        '".$name."',
                                        '".$price."',
                                        '".$description."',
                                        '".$newname."',
                                        null
                                            ) ");

                            if($insert){
                                echo '<script>alert("Add Data Successfully")</script>';
                                echo '<script>window.location="data-produk.php"</script>';
                            }else{
                                echo 'add product failed'.mysqli_error($conn);
                            }

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
    <script>
        CKEDITOR.replace( 'description' );
    </script>
</body>
</html>