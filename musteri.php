<?php
include('includes/header.php');
include('includes/navbar.php');

require_once("baglan.php");
?>



<div class="col-xl-11 mx-auto mt-2  items-align-center">
  <div class="row mt-5">
    <?php for ($i = 1; $i <= 4; $i++) {
      if ($i == 1) {
        $baslik = "Toplam Gelir";
        $color = "success";
      }
      if ($i == 2) {
        $baslik = "Toplam Gider";
        $color = "danger";
      }
      if ($i == 3) {
        $baslik = "Toplam Kar ";
        $color = "warning";
      }
      if ($i == 4) {
        $baslik = "Empty";
        $color = "info";
      } ?>
      <div class="col-xl-3 mx-auto mb-2 ">
        <div class="shadow h-100 py-1">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col-auto mr-4 ">
                <i class='fas fa-wallet text-<?php echo $color; ?> ml-4' style='font-size:24px'></i>
              </div>
              <div class="col mr-2">
                <div class="h5 mb-2 font-weight-bold text-gray-800">

                  <div class="text-<?php echo $color; ?>">5000 ₺</div>

                </div>
                <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                  <?php echo $baslik; ?>
                </div>

              </div>

            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
  <div class="card o-hidden border-5 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-12">
          <form action="index.php" method="POST">
          <div class="row ml-4 mt-5 mr-5 ">
            <div class="col-xl-4">
              <label for="" class="text-bold">Tarih</label>
              <input type="date" class="form-control" name="datee">
            </div>
            <div class="col-xl-4">
              <label for="" class="text-bold">Gelir Bilgi</label>
              <input type="text" class="form-control" name="gelirBilg">
            </div>
            <div class="col-xl-4">
              <label for="" class="text-bold">Gider Bilgi</label>
              <input type="text" class="form-control" name="giderBilg">
            </div>
            <div class="col-xl-4 mt-3">
              <label for="" class="text-bold">Gelir</label>
              <input type="text" class="form-control" name="gelir">
            </div>
            <div class="col-xl-4 mt-3">
              <label for="" class="text-bold">Gider</label>
              <input type="text" class="form-control" name="gider">
            </div>
          </div>
          <button type="submit" name="ekle" class="btn btn-primary  mt-4 ml-5"><i class="fa fa-plus ml-2 mr-2"></i>Ekle</button>
          </form>
          
          
          <?php
          if($_POST){
            $datee = $_POST['datee'];
            $gelirBilg=$_POST['gelirBilg'];
            $giderBilg=$_POST['giderBilg'];
            $gelir=$_POST['gelir'];
            $gider=$_POST['gider'];
            $kar = $_POST['gelir'] - $_POST['gider'];
            $db=new database();
            $AddQuery = $db->Insert("INSERT INTO gelirgider SET
                                    datee=?,
                                    gelirinfo=?,
                                    giderinfo=?,
                                    gelir=?,
                                    gider=?,
                                    kar=?", array($datee, $gelirBilg, $giderBilg, $gelir, $gider, $kar));
          
          } else {
            echo "post no";}
          ?>
          

          <?php $cnt = 3; if($cnt==1){?>
          <div class="alert alert-success ml-5 mr-5 mt-3 mb-4">
            <div class="alert-message text-success">Veriler Başarıyla Eklendi!</div>
          </div>
          <?php }
          if($cnt==2){ ?>
          <div class="alert alert-danger ml-5 mr-5 mt-3 mb-4">
            <div class="alert-message text-danger">Lütfen Formdan boş kutucuk bırakmayınız?</div>
          </div>
          <?php } ?>

          <div class=" ml-5 mt-5 mr-5 text-danger text-center">

          </div>
           

        </div>
      </div>
    </div>
  </div>

  <div class="card o-hidden border-5 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-12">
          <div class=" ml-5 mt-5 mr-5 text-danger text-center">

            

            <nav aria-label="Page navigation example" class="mt-3">
              <ul class="pagination justify-content-end">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Önceki</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item">
                  <a class="page-link" href="#">Sonraki</a>
                </li>
              </ul>
            </nav>

          </div>







          <div class="alert alert-success ml-5 mr-5 mt-3 mb-4">
            <div class="alert-message text-success">Veriler Başarıyla Eklendi!</div>
          </div>

        </div>
      </div>
    </div>
  </div>









  <?php
  include('includes/scripts.php');
  include('includes/footer.php');
  ?>