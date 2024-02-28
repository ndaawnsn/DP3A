<?php
session_start();
error_reporting(E_ALL);
include('config.php');

$msg = '';
if (isset($_GET['add'])) {
  if (isset($_SESSION['user'])) {
    $productid = $_GET['add'];
    $user = $_SESSION['user'];
    $sql = "INSERT INTO cart(productid,user) VALUES(:productid,:user)";
    $query = $db->prepare($sql);
    $query->bindParam(':productid', $productid, PDO::PARAM_STR);
    $query->bindParam(':user', $user, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $db->lastInsertId();
    if ($lastInsertId) {
      $msg = '<div id="msg" class="alert alert-success"><strong>Product Added To Cart</strong></div>';
    } else {
      $msg = '<div id="msg" class="alert alert-danger"><strong>Unable To Add</strong></div>';
    }
  } else {
     $msg = '<div id="msg" class="alert alert-danger"><strong>Please Login</strong></div>';
  }
} else {
}
// FECTH PRODUCTS
$sql = "SELECT * from products WHERE category = 'Gaming'";
$query = $db->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TrendZ | Online Store for Latest Trends</title>
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="./css/carousel.css">
  <link rel="stylesheet" href="./css/footer.css">
  <script>
    if (typeof window.history.pushState == 'function') {
      window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF']; ?>');
    }
  </script>
</head>

<body>

  <section>
    <?php include('./inc/header.php'); ?>

    <?php include('./inc/carouselGaming.php') ?>

    <div class="container mt-5 my-section">
      <h3 class="py-4">Gaming</h3>
      <div class="msg"><?php echo $msg; ?></div>
      <div class="row">

        <?php

        if ($query->rowCount() > 0) {
          foreach ($results as $result) {        ?>
            <div class="col-lg-3 col-md-6 mb-4">
              <div class="card h-100 shadow" style="padding: 20px 0; height: 65vh;">
                  <a href="#"><img class="card-img-top"  src="./img/products/<?php echo $result->img; ?>" alt="<?php echo $result->title; ?>" title="<?php echo $result->title; ?>"></a>
                  <div class="card-body" style="display: flex; flex-direction:column-reverse;">
                    <a href="gaming.php?add=<?php echo $result->id; ?>" class="btn btn-info mt-2">Add To Cart</a>
                    <h5><?php echo CURRENCY ?> <?php echo $result->price; ?></h5>
                    <!-- <a href="desc1.php!add=<?php echo $result->img; ?>" class="btn btn-dark mt-2">Detail</a> -->
                    <h4 class="card-title">
                      <a href="#"><?php echo $result->title; ?></a>
                    </h4>
                  </div>
                </div>
            </div>
        <?php }
        } ?>
      </div>
    </div>

    <?php include('./inc/footer.php'); ?>
  </section>

  
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- MyScript -->
  <script src="./js/script.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      setTimeout(function() {
        $('#msg').slideUp("slow");
      }, 2000);
    });
  </script>
</body>

</html>