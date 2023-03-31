

<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-light topbar  mb-4 mt-1 static-top shadow-lg">
      <form class="d-none d-sm-inline-block form-inline  ml-md-5 mt-2 my-2 my-md-0 mw-100 navbar-search mshadow-lg">
        <!-- Nav Item - User Information -->
        <div class="nav-item dropdown no-arrow">
          <div class=" d-none d-lg-inline text-gray-1000 "></i>
            <p class="ml-1 mt-3 text-xl font-weight-bold text-danger text-uppercase">
              tatli dünyasi
            </p>
          </div>
        </div>
      </form>
      <div class="collapse navbar-collapse ml-5" id="navbarNav">
        <ul class="navbar-nav  mr-3">
          <nav class="nav">
            <a class="nav-link active mr-2" href="index.php"><i class="fa fa-home mr-1"></i>Panel</a>
            <a class="nav-link active  mr-2" href="HaftalikGGider.php"><i class='far fa-calendar-alt mr-1'></i>Haftalık
              Gelir Gider</a>
            <a class="nav-link active  mr-1" href="AylikGGider.php"><i class='fas fa-calendar-plus mr-1'></i></i>Aylık
              Gelir Gider</a>
            <a class="nav-link active  mr-2" href="notlarimCard.php"><i class="bi bi-pencil-square"></i><svg
                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path
                  d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                <path fill-rule="evenodd"
                  d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
              </svg><span class="ml-1">Notlarım</span></a>


          </nav>
        </ul>
      </div>

      <div class="ribbon text-dark mr-3">

      </div>


      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto mr-3 text-dark">
        <!-- Nav Item - Messages -->
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="bi bi-journals"></i>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-journals"
              viewBox="0 0 16 16">
              <path
                d="M5 0h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2 2 2 0 0 1-2 2H3a2 2 0 0 1-2-2h1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1H1a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v9a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1H3a2 2 0 0 1 2-2z" />
              <path
                d="M1 6v-.5a.5.5 0 0 1 1 0V6h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V9h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 2.5v.5H.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1H2v-.5a.5.5 0 0 0-1 0z" />
            </svg>
            <!-- Counter - Messages -->
            <?php
            require_once("baglan.php");
            $db = new database;
            $count = $db->getColumn("SELECT count(*) FROM nott ");

            ?>
            <span class="badge badge-danger badge-counter">+<?php echo $count; ?></span>
          </a>
          <!-- Dropdown - Messages -->
          <div class="dropdown-list dropdown-menu dropdown-menu-right shadow-lg animated--grow-in"
            aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">
              NOTLAR
            </h6>
            <?php
            require_once("baglan.php");
            $db = new database;
            $Query = $db->getRows("SELECT * FROM nott ORDER BY AddDate DESC LIMIT 3");
            foreach ($Query as $items) {


              ?>

              <a class="dropdown-item d-flex align-items-center" href="notlarimCard.php">
                <div class="font-weight-bold">
                  <div class="small text-primary font-weight-bold"><?php echo $items->baslik; ?></div>

                  <div class="ml-2">
                    <?php echo $items->note; ?>
                  </div>
                  <div class="small text-primary"><i class="bi bi-clock-history"></i><svg
                      xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor"
                      class="bi bi-clock-history" viewBox="0 0 16 16">
                      <path
                        d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z" />
                      <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z" />
                      <path
                        d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z" />
                    </svg><span class="ml-1">
                      <?php echo $items->AddDate; ?>
                    </span></div>
                </div>
              </a>

            <?php } ?>


            <a class="dropdown-item text-center " href="#"><i
                class="fas fa-envelope fa-fw text-xl text-primary"></i></a>
          </div>
        </li>





      </ul>
      <div class="btn-group">
        <a href="logout.php" class="mr-5 "><i class="bi bi-box-arrow-right bg-danger"></i><svg xmlns="http://www.w3.org/2000/svg "
            width="20" height="20" fill="currentColor" class="bi bi-box-arrow-right text-danger" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
              d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
            <path fill-rule="evenodd"
              d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
          </svg></a>
      </div>


    </nav>
    <!-- End of Topbar -->


    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>