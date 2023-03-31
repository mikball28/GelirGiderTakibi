<?php
session_start();


  require_once("baglan.php");
  include('includes/header.php');
  include('includes/navbar.php');
  $db = new database();
  if (isset($_GET['delete'])) {
    $sil = $_GET['delete'];
    $delete = $db->Delete("DELETE FROM gelirgider WHERE ID=?", array($sil));
  }


  $db = new database();
  $page = empty($_GET["page"]) ? 1 : $_GET["page"];
  $limit = 32;
  $startlimit = ($page * $limit) - $limit;
  $totalRecord = $db->getColumn("SELECT count(*) FROM gelirgider ");
  $pageNumber = ceil($totalRecord / $limit);
  ?>



<div class="col-xl-11 mx-auto mt-2  items-align-center">


  <div class="row mt-5">
    <?php for ($i = 1; $i <= 3; $i++) {
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
      ?>
      <?php
      $db = new database();
      $toplamGelir = $db->getRow("SELECT SUM(gelir) AS gelir FROM gelirgider");
      $toplamGider = $db->getRow("SELECT SUM(gider) AS gider FROM gelirgider");
      $toplamKar = $db->getRow("SELECT SUM(kar) AS kar FROM gelirgider");
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
                      echo $toplamGelir->gelir;
                    }
                    if ($i == 2) {
                      echo $toplamGider->gider;
                    }
                    if ($i == 3) {
                      echo $toplamKar->kar;
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
          <div class="row ml-4 mt-4 mr-5 ">


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
          <button type="submit" name="ekle" class="btn btn-primary  mt-4 ml-5"><i
              class="fa fa-plus ml-2 mr-2"></i>Ekle</button>
          </form>
          <?php
          if ($_SERVER['REQUEST_METHOD'] == "POST") {
            if (empty($_POST["datee"]) && empty($_POST["Bilgi"]) && empty($_POST["girdi"])) {

              echo ('<div class="alert alert-danger ml-4 mt-4 mr-5">Bütün formlar zorunludur.Lütfen formları boş bırakmayınız!!</div>');

            } else {


              if ($_POST['GG'] == "Gelir") {
                $date = $_POST['datee'];
                $gelirBilg = $_POST['Bilgi'];
                $giderBilg = "-";
                $girdiGelir = $_POST['girdi'];
                $girdiGider = 0;
                $kar = $girdiGelir - $girdiGider;

              }
              if ($_POST['GG'] == "Gider") {
                $date = $_POST['datee'];
                $gelirBilg = "-";
                $giderBilg = $_POST['Bilgi'];
                $girdiGelir = 0;
                $girdiGider = $_POST['girdi'];
                $kar = $girdiGelir - $girdiGider;

              }

              $db = new database();
              $query = $db->Insert("INSERT INTO gelirgider SET
                                  datee=?,
                                  gelirinfo=?,
                                  giderinfo=?,
                                  gelir=?,
                                  gider=?,
                                  kar=?", array($date, $gelirBilg, $giderBilg, $girdiGelir, $girdiGider, $kar));
              echo ('<div class="alert alert-success ml-4 mt-4 mr-5">Veriler başarılı bir şekilde eklenmiştir !!</div>');




            }
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
              $myQuery = $db->getRows("SELECT * FROM gelirgider ORDER BY ID DESC");
              foreach ($myQuery as $items) {
                ?>
                <tbody class="text-center">
                  <tr>
                    <td class="text-dark"><b>
                        <?php echo $items->datee; ?>
                      </b> </td>
                    <td>
                      <?php echo $items->gelirinfo; ?>
                    </td>
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
                      <div class="btn-group">
                        <div class="mr-2">
                          <a href="?delete=<?= $items->ID; ?>"
                            onclick="return confrim('Silinme işlemi gerçekleştirilsin mi?')" name="Agiris"
                            class="btn btn-outline-danger  ">
                            <i class="bi bi-trash3 "></i><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                              fill="currentColor" class="bi bi-trash3 " viewBox="0 0 16 16">
                              <path
                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                            </svg></a>
                        </div>
                        <div class="div">
                          <a href="detail.php?ID=<?= $items->datee ?>" class="btn btn-outline-warning"> <i
                              class="bi bi-ticket-detailed"></i><svg xmlns="http://www.w3.org/2000/svg" width="16"
                              height="16" fill="currentColor" class="bi bi-ticket-detailed" viewBox="0 0 16 16">
                              <path
                                d="M4 5.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5Zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5ZM5 7a1 1 0 0 0 0 2h6a1 1 0 1 0 0-2H5Z" />
                              <path
                                d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6V4.5ZM1.5 4a.5.5 0 0 0-.5.5v1.05a2.5 2.5 0 0 1 0 4.9v1.05a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-1.05a2.5 2.5 0 0 1 0-4.9V4.5a.5.5 0 0 0-.5-.5h-13Z" />
                            </svg></a>
                        </div>


                      </div>


                    </td>

                  </tr>

                </tbody>
              <?php } ?>

            </table>

            <div class="row justify-content-center">
              <nav aria-label="Page navigation example">
                <ul class="pagination">
                  <?php
                  if ($page > 1) {
                    $newPage = $page - 1;
                    echo '<li class="page-item"><a class="page-link" href="http://localhost/TatliDünyasi/index.php?page=' . $newPage . '">Geri</a></li>';
                  } else {
                    echo '<li class="page-item"><a class="page-link disabled" href="javascript:void(0)">Geri</a></li>';
                  }
                  $record = 2;
                  for ($i = $page - $record; $i <= $page + $record; $i++) {
                    if ($i > 0 and $i <= $pageNumber) {
                      echo '<li class="page-item"><a class="page-link" href="http://localhost/TatliDünyasi/index.php?page=' . $i . '">' . $i . '</a></li>';
                    }
                  }

                  if ($page != $pageNumber) {
                    $newPage = $page + 1;
                    echo '<li class="page-item"><a class="page-link" href="http://localhost/TatliDünyasi/index.php?page=' . $newPage . '">İleri</a></li>';
                  } else {
                    echo '<li class="page-item"><a class="page-link disabled" href="javascript:void(0)">İleri</a></li>';
                  }

                  ?>

                </ul>
              </nav>
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
