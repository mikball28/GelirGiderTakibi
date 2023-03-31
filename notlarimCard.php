
<?php
include('includes/header.php');
include('includes/navbar.php');

require_once("baglan.php");
$db = new database();
if(isset($_GET['sil'])){
  $sil=$_GET['sil'];
  $delete=$db->Delete("DELETE FROM nott WHERE ID=?",array($sil));
}
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
        
        <div class="  py-2">
            <div class="text-xs text-center font-weight-bold text-warning text-uppercase mb-3 mt-3">
                NOTLARIM
            </div>
            <div class="row mt-3">
                <?php
                $db = new database;
                $getQuery = $db->getRows("SELECT * FROM nott ORDER BY AddDate DESC");
                foreach ($getQuery as $items) {
                    ?>

                    <div class="col-xl-4 mx-auto mb-3 ml-2 mr-2">
                        <div class="card border-left-warning shadow h-100 py-5">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto mr-3 ml-3 ">
                                        <i class="bi bi-journals"></i>
                                        <svg xmlns="http://www.w3.org/2000/svg text-danger" width="24" height="24"
                                            fill="currentColor" class="bi bi-journals text-warning" viewBox="0 0 16 16">
                                            <path
                                                d="M5 0h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2 2 2 0 0 1-2 2H3a2 2 0 0 1-2-2h1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1H1a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v9a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1H3a2 2 0 0 1 2-2z" />
                                            <path
                                                d="M1 6v-.5a.5.5 0 0 1 1 0V6h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V9h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 2.5v.5H.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1H2v-.5a.5.5 0 0 0-1 0z" />
                                        </svg>
                                    </div>
                                    
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-danger  text-uppercase ">
                                            Başlık - <span class="text-dark"><?php echo $items->baslik;?></span>
                                            
                                        </div>
                                        <hr>
                                        <div class="h7 mb-2 font-weight-bold text-gray-800">

                                            <div class="text-secondary font-weight-bold mb-5 ">
                                                
                                                <?php echo $items->note; ?>
                                                
                                            </div>
                                            <hr>

                                        </div>
                                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-4 mt-3">
                                            
                                        <div class="row justify-content-end"><?php echo $items->AddDate; ?></div>
                                        </div>
                                       

                                    </div>
                                    

                                </div>
                            </div>
                            <div class=" text-center">
                    <a href="?sil=<?= $items->ID; ?>" onclick="return confrim('Silinme işlemi gerçekleştirilsin mi?')" name="Agiris" class="btn btn-outline-danger mt-1 " >
                      <i class="bi bi-trash3 "></i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-trash3 " viewBox="0 0 16 16">
                        <path
                          d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                      </svg></a>
                    </div>
                        </div>
                        
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>











<?php
include('includes/scripts.php');
include('includes/footer.php');
?>