<?php 

    include_once('process.php');

    $insertdata = new DB_con();

    if (isset($_POST['insert'])) {
        $name_w = $_POST['name_w'];
        $name_d = $_POST['name_d'];
        $location_f = $_POST['location_f'];
        $location_l = $_POST['location_l'];

        $sql = $insertdata->insert($name_w, $name_d, $location_f, $location_l);
        if ($sql) {
            echo "<script>alert('Inserted Product Successfully!');</script>";
            echo "<script>window.location.href='worktodriver.php'</script>";
        } else {
            echo "Something went wrong! Please try again". mysqli_connect_error();
            // echo "<script>window.location.href='testpush.php'</script>";
        }
    }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <section>
        <div class="container h-100">
            <div class="d-flex justify-content-center align-items-center h-100 p-1 p-sm-5">
                <div class="row w-100 p-lg-5">

                    <div class="col-md-12 d-flex align-items-center flex-column text-center">
                        <div class="add rounded-circle p-5"><i class="fas fa-plus"></i></i></div>
                        <h1 class="md-4 mb-5 ">มอบหมายงาน</h1>
                    </div>

                    <div class="col-md-12 d-flex justify-content-center flex-column">
                        <form class="w-100" action="" method="post">
                            <div class="mb-3">
                                <label for="name_w" class="form-label">ชื่องาน</label>
                                <input type="text" class="form-control" name="name_w" required>
                            </div>
                            <div class="mb-3">
                                <label for="name_d" class="form-label">ชื่อคนขับ</label>
                                <input type="text" class="form-control" name="name_d" required>
                            </div>
                            <div class="mb-3">
                                <label for="location_f" class="form-label">สถานที่รับ</label>
                                <input type="text" class="form-control" name="location_f" required>
                            </div>
                            <div class="mb-3">
                                <label for="location_l">สถานที่ส่ง</label>
                                <input type="text" class="form-control" name="location_l" required>
                            </div>
                            <button type="submit" name="insert" class="btn btn-primary w-100">SAVE</button>
                        </form>
                        <a href="worktodriver.php" class="w-100 text-center mt-3 mb-3">Table Products</a>
                    </div>

                </div>
            </div>
        </div>
    </section>
   

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>