<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>CarGoGo</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <style>
        .bg-yellow {
            background-color: yellow;
            cursor: pointer;
        }
    </style>
</head>
<!-- body -->
<body class="main-layout">
<!-- loader  -->
<div class="loader_bg">
    <div class="loader"><img src="images/loading.gif" alt="#" /></div>
</div>
<!-- end loader -->
<!-- header -->
<header> <?php include 'header.html'?></header>
<!-- end header -->
<!-- banner -->
<section class="banner_main">
    <div class="container">
        <div class="row d_flex">
            <div class="col-md-12">
                <div class="text-bg">
                    <h1>CarGoGo</h1>
                    <strong>Autókölcsönző</strong>
                    <span>Előre megyünk, nem hátra</span>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since theLorem Ipsum is simply dummy text of the printing
                        <head></head>
                    </p>
                    <a href="#">További információk</a>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
<!-- end banner -->
<!-- bestCar -->
<div id="contact" class="bestCar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col-md-6 offset-md-6">
                        <form class="main_form">
                            <div class="titlepage">
                                <h2>Találja meg a tökéletes autót</h2>
                                <div class="input-group">
                                    <input type="text" class="form-control" style="width: 85%" name="valueToSearch" id="" placeholder="Search...">
                                    <div class="col-sm-12">
                                        <button class="find_btn">Keresés</button>
                                    </div>
                                    <?php
                                    $connection = "";
                                    $sql = "";
                                    $result = "";
                                    require 'db_config.php';

                                    if (isset($_GET['valueToSearch'])) {
                                        $valueToSearch = $_GET['valueToSearch'];
                                        $query = "SELECT * FROM brands b JOIN cars c ON b.brand_id = c.brand_id WHERE brand LIKE '%$valueToSearch%' OR model LIKE '%$valueToSearch%'";
                                        $result = $connection->query($query);
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $car_id = $row['car_id'];
                                                echo "<a href='view_car.php?car_id=$car_id'>" . $row["brand"]. " " . $row["model"]."</a><br>";
                                            }
                                        } else {
                                            echo "Nincs találat.";
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<h1 class="text-center mt-5">Top 10 Legértékelt Autók</h1>
<div class="container mt-3">
    <div class="row justify-content-center">
        <?php
        $connection = "";
        $sql = "";
        $result = "";
        require 'db_config.php';

        if ($connection->connect_error) {
            die("Hiba a kapcsolódás során: " . $connection->connect_error);
        }

        $sql = "SELECT * FROM car_ratings ORDER BY rating DESC LIMIT 10";
        $result = $connection->query($sql);

        if ($result && $result->num_rows > 0) {
            $carCount = 0;
            while ($row = $result->fetch_assoc()) {
                $car_id = $row['car_id'];
                $sql2 = "SELECT * FROM brands b JOIN cars c ON b.brand_id = c.brand_id WHERE c.car_id = {$row['car_id']}";
                $result2 = mysqli_query($connection, $sql2);

                if ($result2 && $result2->num_rows > 0) {
                    $data = mysqli_fetch_assoc($result2);
                    echo '<div class="col-md-2 mb-4">';
                    echo "<a href='view_car.php?car_id=$car_id'>";
                    echo '<div class="card bg-yellow">';
                    echo "<div class='card-body'>";
                    echo "<img src='images/cars/{$data["pic_name"]}'>";
                    echo "<h2>{$data['brand']}</h2>";
                    echo "<p>Modell: {$data['model']}</p>";
                    echo "<p>Gyártási év: {$data['prod_year']}</p>";
                    echo "<p>Értékelés: {$row['rating']}</p>";
                    echo "</div>";
                    echo "</div>";
                    echo '</a>';
                    echo '</div>';

                    $carCount++;
                    if ($carCount >= 5) {
                        echo '</div><div class="row">';
                        $carCount = 0;
                    }
                }
            }
        } else {
            echo "Nincs találat.";
        }
        echo '<div class="col-md-2"></div>';
        $connection->close();
        ?>
    </div>
</div>
<script>
    var carCards = document.querySelectorAll('.car-card');

    carCards.forEach(function(card) {
        card.addEventListener('click', function() {
            var carId = card.getAttribute('data-carid');
            window.location.href = 'view_car.php?id=' + carId;
        });
    });
</script>
<!--  footer -->
<footer><?php include 'footer.html';?></footer>
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery-3.0.0.min.js"></script>
<script src="js/plugin.js"></script>
<!-- sidebar -->
<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/custom.js"></script>
<script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
</body>
</html>

