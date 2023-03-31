<?php 
include('includes/header.php');
include('includes/navbar.php');

require_once("baglan.php"); 
?>

<div class="card o-hidden border-5 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-12">
          <div class="row ml-4 mt-5 mr-5 ">

          <div class="col-xl-4">
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <label for="" class="text-bold">Tarih</label>
                <input type="date" class="form-control" name="datee">
                <label for="" class="text-bold">Tarih</label>
                <input type="text" class="form-control" name="gelirBilgi">
                <label for="" class="text-bold">Tarih</label>
                <input type="text" class="form-control" name="giderBilgi">
                <label for="" class="text-bold">Tarih</label>
                <input type="text" class="form-control" name="gelir">
                <label for="" class="text-bold">Tarih</label>
                <input type="text" class="form-control" name="gider">
                <button type="submit" name="ekle" class="btn btn-primary  mt-4 ml-5"><i
                    class="fa fa-plus ml-2 mr-2"></i>Ekle</button>
              </form>
              <?php
              if ($_POST) {
                $date = $_POST['datee'];
                $gelirBilg = $_POST['gelirBilgi'];
                $giderBilg = $_POST['giderBilgi'];
                $gelir = $_POST['gelir'];
                $gider = $_POST['gider'];
                $kar = $_POST['gelir'] - $_POST['gider'];

                $db = new database();
                $query = $db->Insert("INSERT INTO gelirgider SET
                                    datee=?,
                                    gelirinfo=?,
                                    giderinfo=?,
                                    gelir=?,
                                    gider=?,
                                    kar=?", array($date, $gelirBilg, $giderBilg, $gelir, $gider, $kar));

              }

              ?>

            </div>

          </div>

    



        </div>
      </div>
    </div>
    <?php
  include('includes/scripts.php');
  include('includes/footer.php');
  ?>