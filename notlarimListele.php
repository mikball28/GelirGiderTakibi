
<?php
include('includes/header.php');
include('includes/navbar.php');

require_once("baglan.php");
?>



<div class="col-xl-11 mx-auto mt-2  items-align-center">
    <div class="col-xl-11 ml-5 col-md-6 mb-4 mt-5">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs text-center font-weight-bold text-warning text-uppercase mb-3">
                            NOT EKLEME</div>
                        <div class="h7 mb-0 font-weight-bold text-gray-800">

                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                <label for="" class="text-bold ml-2">Başlık</label>
                                <input type="text" class="form-control ml-2" name="baslik">
                                <textarea class="form-control mb-3 mt-3 ml-2 mr-5" name="note" placeholder="Not"
                                    id="floatingTextarea " style="height: 150px"></textarea>
                                <button type="submit" class="btn btn-warning  ml-2 mr-5 col-md-2 "><i
                                        class="bi bi-journal-plus"></i><svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-journal-plus"
                                        viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M8 5.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 .5-.5z" />
                                        <path
                                            d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                                        <path
                                            d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                                    </svg><span class="ml-1">Not Ekle</span>
                                </button>
                            </form>
                            <?php
                            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                                $baslik = $_POST["baslik"];
                                $note = $_POST["note"];

                                $db = new database();
                                $query = $db->Insert("INSERT INTO nott SET
                                    baslik=?,
                                    note=?", array($baslik, $note));

                            }




                            ?>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>


   




    <div class="col-xl-11 ml-5 col-md-6 mb-4 mt-5">
    <div class="row justify-content-center mb-3">
        <a class="btn btn-outline-danger" href="notlarimCard.php" role="button">Kart Görünüm</a>
        
        </div>
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs text-center font-weight-bold text-warning text-uppercase mb-3">
                            NOTLARIM</div>
                        <div class="h7 mb-0 font-weight-bold text-gray-800">
                            <div class="card shadow mb-4 col-xl-11 mr-2 ml-2 mt-4 ">
                                <div class="card-header bg-warning py-3 mt-3">
                                    <h6 class="m-0 font-weight-bold text-light">Notlarım</h6>

                                </div>
                                <?php
                                $db = new database;
                                $getQuery = $db->getRows("SELECT * FROM nott ORDER BY AddDate DESC");
                                foreach ($getQuery as $items) {
                                    ?>
                                    <hr class="mb-2 mt-2">
                                    <p class="text-xs font-weight-bold mb-1 ml-3 mr-4 text-danger font-weight-bold">Başlık ·
                                        <span class="text-danger"><?php echo $items->baslik; ?></span>
                                    </p>
                                    <p class="text-xl font-weight-bold ml-3 mr-4">
                                        <?php echo $items->note; ?>
                                    </p>

                                    <p class="text-xs ml-3 mr-4 text-danger">
                                        <?php echo $items->AddDate; ?> </p>
                                <?php } ?>
                            </div>


                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>






</div>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>