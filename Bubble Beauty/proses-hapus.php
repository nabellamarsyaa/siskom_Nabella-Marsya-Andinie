<?php

    include 'db.php';

    if(isset($_GET['idk'])){
        $delete = mysqli_query($conn, "DELETE FROM tb_category WHERE category_id = '".$_GET['idk']."' ");
        echo '<script>window.location="data-kategori.php"</script>';
    }
    
    if(isset($_GET['idp'])){
        $delete = mysqli_query($conn, "DELETE FROM tb_product WHERE product_id = '".$_GET['idp']."' ");
        echo '<script>window.location="data-produk.php"</script>';
    }

?>