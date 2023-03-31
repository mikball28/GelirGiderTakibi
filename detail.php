<?php
include('includes/header.php');
include('includes/navbar.php');

require_once("baglan.php");
$ID = $_GET["ID"];
?>



<div class="col-xl-11 mx-auto mt-2  items-align-center">
  
  <div class="card o-hidden border-5 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-12">
        <div class="col-xl-4 mt-4 ml-4">
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

              <select class="form-select form-select-lg mt-3" name="GG" aria-label="Default select example">
                <option selected>Gelir & Gider</option>
                <option value="Gelir">Gelir</option>
                <option value="Gider">Gider</option>
              </select>
          </div>
          <div class="row ml-4 mt-5 mr-5 ">

          <div class="col-xl-4">
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <label for="" class="text-bold">Tarih</label>
                <input type="date" class="form-control" name="datee">
            </div>
            <div class="col-xl-4">
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <label for="" class="text-bold"> Bilgi</label>
                <input type="text" class="form-control" name="Bilgi">
            </div>
            <div class="col-xl-4">
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <label for="" class="text-bold"> Girdi</label>
                <input type="text" class="form-control" name="girdi">
            </div>

            
            

          </div>
          <button type="submit" name="ekle" class="btn btn-primary  mt-zx ml-5"><i
              class="fa fa-plus ml-2 mr-2"></i>Ekle</button>
          </form>
          <?php
          $ID=1;
          if ($_SERVER['REQUEST_METHOD'] == "POST") {
            
            if ($_POST['GG']=="Gelir") {
             $date = $_POST['datee'];
             $gelirBilg = $_POST['Bilgi'];
             $giderBilg = "-";
             $girdiGelir = $_POST['girdi'];
             $girdiGider = 0;
             $kar = $girdiGelir - $girdiGider;

            }
            if ($_POST['GG']=="Gider") {
              $date = $_POST['datee'];
              $gelirBilg = "-";
              $giderBilg = $_POST['Bilgi'];
              $girdiGelir = 0;
              $girdiGider = $_POST['girdi'];
              $kar = $girdiGelir - $girdiGider;

            }

            $db = new database();
            $query = $db->Update("INSERT INTO gelirgider SET
                                    datee=?,
                                    gelirinfo=?,
                                    giderinfo=?,
                                    gelir=?,
                                    gider=?,
                                    kar=? " , array($date, $gelirBilg, $giderBilg, $girdiGelir, $girdiGider, $kar));

          }
          ?>



          <?php $cnt = 3;
          if ($cnt == 1) { ?>
            <div class="alert alert-success ml-5 mr-5 mt-3 mb-4">
              <div class="alert-message text-success">Veriler Başarıyla Eklendi!</div>
            </div>
          <?php }
          if ($cnt == 2) { ?>
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

            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
              <thead class="bg-secondary text-light">
                <tr>

                  <th>Tarih</th>
                  <th>Gelir Bilgi</th>
                  <th>Gider Bilgi</th>
                  <th>GELİR</th>
                  <th>GİDER</th>
                  <th>KAR</th>
                  <th>AKSİYONLAR</th>


                </tr>
              </thead>
              <?php
              $db = new database();
            
            $myQuery = $db->getRows("SELECT * FROM gelirgider WHERE datee LIKE '%$ID%' ");
              
              foreach ($myQuery as $items) {
                ?>
                <tbody class="text-center">
                  <tr>
                    <td class="text-dark"><b><?php echo $items->datee; ?></b> </td>
                    <td>
                      <?php echo $items->gelirinfo; ?>
                    </td>
                    <td><?php echo $items->giderinfo; ?></td>
                    <td class="text-success">
                      <?php echo $items->gelir; ?> ₺
                    </td>
                    <td class="text-danger">
                      <?php echo $items->gider; ?> ₺
                    </td>
                    <td class="text-<?php if ($items->kar >= 0) {
                      echo "success";
                    }
                    if ($items->kar < 0) {
                      echo "danger";
                    } ?>">
                      <?php if ($items->kar >= 0) {
                        echo $items->kar;
                      }
                      if ($items->kar < 0) {
                        echo $items->kar;
                      } ?> ₺
                    </td>
                    <td>
                      


                    </td>

                  </tr>

                </tbody>
              <?php } ?>

            </table>

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









        </div>
      </div>
    </div>
  </div>

  









  <?php
  include('includes/scripts.php');
  include('includes/footer.php');
  ?>