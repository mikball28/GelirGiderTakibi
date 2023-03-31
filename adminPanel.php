<?php
include('includes/header.php');
require_once("baglan.php");
?>


<!-- Begin Page Content -->

<div class="col-xl-11 mt-2 col-lg-5 col-md-8 ml-5 items-align-center">

    <div class="card o-hidden border-5 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-header bg-danger py-3 mt-4 mb-5 ">

                        <h6 class="m-0 font-weight-bold text-light"> <i
                                class="far fa-futbol items-align-center text-light ml-2 mr-2"
                                style="font-size:12px"></i>turnuvam.com </h6>

                    </div>
                    <div class="card shadow mb-5 ml-5 mt-5 mr-5  ">
                        <?php
                        include('includes/header.php');

                        if (isset($_SESSION["login"])) {

                            echo "Giriş Var";
                        }


                        ?>


                        <!-- Begin Page Content -->
                        <div class="container-fluid">

                            <!-- Page Heading -->
                            <div class="d-sm-flex align-items-center justify-content-between  mb-4">
                                <h1 class="mt-3 ml-2 h3 mb-0  text-gray-1000">ADMİN PANEL</h1>
                                <div class="ml-3 mt-3 mr-5">
                                    <a type="submit" class="btn btn-danger " href="index.php">Çıkış</a>
                                </div>

                            </div>


                            <!-- Content Row -->
                            <div class="row">

                                <!-- Earnings (Monthly) Card Example -->
                                <div class="col-xl-11 ml-5 col-md-6 mb-4">
                                    <div class="card border-left-info shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div
                                                        class="text-xs text-center font-weight-bold text-info text-uppercase mb-3">
                                                        haftalık score bilgileri giriş ekranı</div>
                                                    <div class="h7 mb-0 font-weight-bold text-gray-800">
                                                        <div class="mb-3 mt-5"><i class='fas fa-exclamation-triangle text-info' style='font-size:16px'></i>
                                                        <span class="badge badge-info ">Lütfen puan girişleri sıralı olacak şekilde MIKBALL · ARGALI22 · YASIN1926 · OMER941 sırasıyla giriniz!!!!</span>
                                                    </div>
                                                        
                                                            <div class="table-responsive mb-5">
                                                                <table class="table table-hover" id="dataTable" width="100%"
                                                                    cellspacing="0">
                                                                    <thead class=" text-dark">
                                                                        <tr class="text-center">
                                                                            <th>Takım Adı</th>
                                                                            <th>Hafta</th>
                                                                            <th>Oynanan</th>
                                                                            <th>Galibiyet</th>
                                                                            <th>Beraberlik</th>
                                                                            <th>Mağlubiyet</th>
                                                                            <th>Atılan G</th>
                                                                            <th>Yenilen G</th>
                                                                            <th>Averaj</th>
                                                                            <th>Puan</th>

                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                        <tr class="text-center text-dark ">
                                                                           
                                                                            <form action="adminPanel.php" method="POST">
                                                                                 <td class="ml-2 text-info">
                                                                                    <input type="text"
                                                                                        class="form-control text-center "
                                                                                        name="takimadi">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text"
                                                                                        class="form-control text-center "
                                                                                        name="hafta">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text"
                                                                                        class="form-control text-center"
                                                                                        name="oynanan">
                                                                                </td>

                                                                                <td> <input type="text"
                                                                                        class="form-control text-center "
                                                                                        name="galib">
                                                                                </td>
                                                                                <td> <input type="text"
                                                                                        class="form-control text-center "
                                                                                        name="beraber"> </td>
                                                                                <td> <input type="text"
                                                                                        class="form-control text-center "
                                                                                        name="maglub"></td>
                                                                                <td><input type="text"
                                                                                        class="form-control text-center "
                                                                                        name="atilanG"></td>
                                                                                <td> <input type="text"
                                                                                        class="form-control text-center "
                                                                                        name="yenilenG"> </td>
                                                                                <td> <input type="text"
                                                                                        class="form-control text-center "
                                                                                        name="averaj"></td>
                                                                                <td><b><input type="text"
                                                                                            class="form-control text-center "
                                                                                            name="puan"></b></td>
                                                                        </tr>


                                                                    </tbody>

                                                                </table>
                                                                <button type="submit"
                                                                    class="btn btn-info  ml-2 mr-5 col-md-2 "
                                                                    name="pgiris">Puan
                                                                    Giriş</button>
                                                                </form>
                                                               

                                                            </div>
                                                            <?php

                                                            if ($_POST) {
                                                                $takimadi = $_POST['takimadi'];
                                                                $hfta = $_POST['hafta'];
                                                                $oynanan = $_POST['oynanan'];
                                                                $galibiyet = $_POST['galib'];
                                                                $beraberlik = $_POST['beraber'];
                                                                $maglubi = $_POST['maglub'];
                                                                $atilang = $_POST['atilanG'];
                                                                $yenileng = $_POST['yenilenG'];
                                                                $avr = $_POST['averaj'];
                                                                $point = $_POST['puan'];

                                                                $db = new database();
                                                                $scoreAddQuery = $db->Insert("INSERT INTO scoretable SET
                                                                            memberTakimAdi=?,
                                                                            hafta=?,
                                                                            oynan=?,
                                                                            galibiyet=?,
                                                                            beraberlik=?,
                                                                            maglubiyet=?,
                                                                            atilangol=?,
                                                                            yenilengol=?,
                                                                            averaj=?,
                                                                            puan=?",
                                                                    array(
                                                                        $takimadi,
                                                                        $hfta,
                                                                        $oynanan,
                                                                        $galibiyet,
                                                                        $beraberlik,
                                                                        $maglubi,
                                                                        $atilang,
                                                                        $yenileng,
                                                                        $avr,
                                                                        $point
                                                                    )
                                                                );
                                                            } else {
                                                                
                                                            }


                                                            ?>
                                                           


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-11 ml-5 col-md-6 mb-4 mt-5">
                                    <div class="card border-left-warning shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div
                                                        class="text-xs text-center font-weight-bold text-warning text-uppercase mb-3">
                                                        mesaj yayımlama ekranı</div>
                                                    <div class="h7 mb-0 font-weight-bold text-gray-800">
                                                        <div class="card shadow mb-4 col-xl-11 mr-2 ml-2 mt-4 ">
                                                            <div class="card-header bg-warning py-3 mt-3">
                                                                <h6 class="m-0 font-weight-bold text-light">Önceki
                                                                    Gönderilen Mesajlar</h6>

                                                            </div>
                                                            <?php
                                                            for ($i = 1; $i <= 2; $i++) {
                                                                ?>
                                                                <hr class="mb-2 mt-2">
                                                                <p class="text-xl font-weight-bold ml-3 mr-4">Lorem ipsum
                                                                    dolor sit amet consectetur adipisicing elit.
                                                                    Minima eaque est iste, ex animi velit debitis doloremque
                                                                    atque a, rerum ullam incidunt commodi! Qui quae
                                                                    saepe tempora nisi adipisci necessitatibus.</p>

                                                                <p class="text-xs ml-3 mr-4 text-warning"><i
                                                                        class="fas fa-window-close  mr-2 "></i>
                                                                    MIKBALL · 28.02.2023
                                                                </p>
                                                            <?php } ?>
                                                        </div>
                                                        <textarea class="form-control mb-3 mt-3 ml-2 mr-5"
                                                            placeholder="Mesaj" id="floatingTextarea "
                                                            style="height: 150px"></textarea>
                                                        <button type="submit"
                                                            class="btn btn-warning  ml-2 mr-5 col-md-2 ">Yayımla
                                                        </button>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-11 ml-5 col-md-6 mb-4 mt-5">
                                    <div class="card border-left-info shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div
                                                        class="text-xs text-center font-weight-bold text-info text-uppercase mb-3">
                                                        takım bilgisi hakkında yayımlama ekranı</div>
                                                    <div class="h7 mb-0 font-weight-bold text-gray-800">
                                                        <table class="table table-hover mt-5" id="dataTable"
                                                            width="100%" cellspacing="0">
                                                            <thead>
                                                                <tr class="text-center bg-info text-light">
                                                                    <th><b>Takım</b></th>
                                                                    <th><b>Hakkında</b></th>

                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php for ($i = 1; $i <= 4; $i++) { ?>
                                                                    <tr class="text-center">
                                                                        <td><?php if ($i == 1) {
                                                                            echo "MIKBALL";
                                                                        } elseif ($i == 2) {
                                                                            echo "ARG28";
                                                                        } elseif ($i == 3) {
                                                                            echo "YASIN1926";
                                                                        } elseif ($i == 4) {
                                                                            echo "OMER941";
                                                                        } ?> </td>
                                                                        <form>
                                                                            <td>
                                                                                <input type="text"
                                                                                    class="form-control text-center "
                                                                                    id="kullaniciAdi">
                                                                            </td>
                                                                        </form>
                                                                    </tr>
                                                                <?php } ?>

                                                            </tbody>

                                                        </table>
                                                        <button type="submit"
                                                            class="btn btn-info  ml-2 mr-5 col-md-2 ">Yayımla</button>

                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                    <!-- Content Row -->


                </div>


            </div>



        </div>
    </div>
</div>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
</div>


</div>