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

    <div class="container">

            <div class="text-d">
                <h1 class="text-center font-weight-bold">ส่งมอบงาน</h1>
            </div>

        <div class="btnA text-center">
            <a href="insertProduct.php" class="btn btn1 btn-lg">เพิ่มสินค้า</a>
        </div>  

        <div class="btnA text-muted">
                <p>PRODUCT TABLE</p>
        </div>

        <table id="mytable" class="table">
            <thead  class="text-white">
                <th scope="col" >ชื่องาน</th>
                <th scope="col">คนขับ</th>
                <th scope="col">สถานที่รับ</th>
                <th scope="col">สถานที่ส่ง</th>
                <th scope="col">Edit</th>
                <th scope="col">Send</th>
            </thead>

            <tbody>
                <?php 

                    include_once('process.php');
                    $fetchdata = new DB_con();
                    $sql = $fetchdata->fetchdata();
                    while($row = mysqli_fetch_array($sql)) {

                ?>

                    <tr>
                        <td><?php echo $row['name_w']; ?></td>
                        <td><?php echo $row['name_d']; ?></td>
                        <td><?php echo $row['location_f']; ?></td>
                        <td><?php echo $row['location_l']; ?></td>
                        <td><a href="updateP.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a></td>
                        <td><a href="test4.php" class="btn btn-danger">ส่ง</a></td>
                    </tr>

                <?php 

                    }
                ?>
            </tbody>
        </table>
    </div>
        
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>