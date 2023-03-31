
<?php
include('includes/header.php');
include('includes/navbar.php');

require_once("baglan.php");
?>



<div class="col-xl-11 mx-auto mt-2  items-align-center">


  <div class="card o-hidden border-5 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-12">
          <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="row ml-4 mt-5 mr-5 ">
              <div class="col-xl-3">
                <label for="" class="text-info mr-2">Ay</label>
                <select class="form-select form-select-lg mb-3" name="ay" aria-label="Default select example">
                  <option selected>Ay seçiniz</option>
                  <option value="01">Ocak</option>
                  <option value="02">Şubat</option>
                  <option value="03">Mart</option>
                  <option value="04">Nisan</option>
                  <option value="05">Mayıs</option>
                  <option value="06">Haziran</option>
                  <option value="07">Temmuz</option>
                  <option value="08">Ağustos</option>
                  <option value="09">Eylül</option>
                  <option value="10">Ekim</option>
                  <option value="11">Kasım</option>
                  <option value="12">Aralık</option>
                </select>

              </div>
            </div>

            <button type="submit" class="btn btn-info  ml-5 mb-3 mt-3">
              <i class="fas fa-search ml-2 mr-2"></i> Filtrele
            </button>
          </form>
          <div>
            <?php
            if ($_POST) {
              $dateilk = '2023-' . $_POST['ay'] . '-01';
              $dateson = '2023-' . $_POST['ay'] . '-31';

              ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row mt-5">
      <?php for ($i = 1; $i <= 3; $i++) {
        if ($i == 1) {
          $baslik = "Aylık Toplam Gelir";
          $color = "success";
        }
        if ($i == 2) {
          $baslik = "Aylık Toplam Gider";
          $color = "danger";
        }
        if ($i == 3) {
          $baslik = "Aylık Toplam Kar ";
          $color = "warning";
        }
        ?>

        <?php
        $db = new database();
        $atoplamGelir = $db->getRow("SELECT SUM(gelir) AS gelira FROM gelirgider  WHERE datee BETWEEN '$dateilk' AND '$dateson'");
        $atoplamGider = $db->getRow("SELECT SUM(gider) AS gidera FROM gelirgider  WHERE datee BETWEEN '$dateilk' AND '$dateson'");
        $atoplamKar = $db->getRow("SELECT SUM(kar) AS kara FROM gelirgider  WHERE datee BETWEEN '$dateilk' AND '$dateson'");
        $Notecount = $db->getColumn("SELECT count(*) FROM nott ");

        ?>
        <div class="col-xl-3 mx-auto mb-2 ">
          <div class="card border-left-<?php echo $color; ?> shadow h-100 py-1">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col-auto mr-4 ">

                  <i class='fas fa-wallet text-<?php echo $color; ?> ml-4' style='font-size:24px'></i>



                </div>
                <div class="col mr-2">
                  <div class="h5 mb-2 font-weight-bold text-gray-800">

                    <div class="text-<?php echo $color; ?>">
                      <?php if ($i == 1) {
                        echo $atoplamGelir->gelira;
                      }
                      if ($i == 2) {
                        echo $atoplamGider->gidera;
                      }
                      if ($i == 3) {
                        echo $atoplamKar->kara;
                      }
                      if ($i == 4) {
                        echo $Notecount;
                      } ?> ₺
                    </div>

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
      <div class="col-xl-3 mx-auto mb-2 ">
        <div class="card border-left-info shadow h-100 py-1">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col-auto mr-4 ">
                <i class="bi bi-pencil-square ml-4"></i><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                  fill="currentColor" class="bi bi-pencil-square text-info" viewBox="0 0 16 16">
                  <path
                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                  <path fill-rule="evenodd"
                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                </svg>
              </div>
              <div class="col mr-2">
                <div class="h5 mb-2 font-weight-bold text-gray-800">
                  <div class="text-info">
                    <?php echo $Notecount; ?>
                  </div>
                </div>
                <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                  NOTLAR
                </div>

              </div>

            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="card o-hidden border-5 shadow-lg my-5 ">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-12">
            <div class=" ml-5 mt-5 mr-5 text-danger text-center">

              <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class="text-light bg-<?php if($atoplamGelir->gelira>=$atoplamGider->gidera){
                  echo "success"; 
                }if($atoplamGelir->gelira<$atoplamGider->gidera){
                  echo "danger";
                } ?>">
                  <tr>

                    <th>Tarih</th>
                    <th>Gelir</th>
                    <th>Gider Bilgi</th>
                    <th>Gelir</th>
                    <th>Gider</th>
                    <th>Kar</th>
                    <th>Aksiyonlar</th>



                  </tr>
                </thead>
                <?php
                $db = new database();
                $htoplamGelir = $db->getRow("SELECT SUM(gelir) AS gelirh FROM gelirgider  WHERE datee BETWEEN '$dateilk' AND '$dateson'");
                $toplamGider = $db->getRow("SELECT SUM(gider) AS giderh FROM gelirgider  WHERE datee BETWEEN '$dateilk' AND '$dateson'");
                $toplamKar = $db->getRow("SELECT SUM(kar) AS karh FROM gelirgider  WHERE datee BETWEEN '$dateilk' AND '$dateson'");

                ?>
                <?php
                $db = new database();

                $Query = $db->getRows("SELECT * FROM gelirgider WHERE datee BETWEEN '$dateilk' AND '$dateson' ");

                foreach ($Query as $items) { ?>
                  <tbody>
                    <tr class="text-center">
                      <td>
                        <?php echo $items->datee; ?>
                      </td>
                      <td><?php echo $items->gelirinfo; ?></td>
                      <td>
                        <?php echo $items->giderinfo; ?>
                      </td>
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
                        <button type="submit" name="Agiris" class="btn btn-outline-success mt-1 mr-2 ">
                          <i class="bi bi-arrow-clockwise"></i><svg xmlns="http://www.w3.org/2000/svg" width="16"
                            height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z" />
                            <path
                              d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z" />
                          </svg></button>
                        <button type="submit" name="Agiris" class="btn btn-outline-danger mt-1 ">
                          <i class="bi bi-trash3"></i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                            fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                            <path
                              d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                          </svg></button>
                      <?php } ?>
                    </td>

                  </tr>

                </tbody>
              <?php } ?>

            </table>

            </table>
          </div>
        </div>
      </div>
    </div>
  </div>










  <?php
  include('includes/scripts.php');
  include('includes/footer.php');
  ?>