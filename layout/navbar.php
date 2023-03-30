<?php
require_once 'vendor/autoload.php';

use App\Session;

$session = new Session;

?>
<div class="container-fluid bg-dark d-flex justify-content-end p-3">
  <span class="text-light fw-bold">SONY</span>
</div>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><svg aria-hidden="true" focusable="false" class="shared-nav-ps-logo" width="50px" height="50px" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 50 50">
        <g>
          <g>
            <path d="M5.8,32.1C4.3,33.1,4.8,35,8,35.9c3.3,1.1,6.9,1.4,10.4,0.8c0.2,0,0.4-0.1,0.5-0.1v-3.4l-3.4,1.1
      c-1.3,0.4-2.6,0.5-3.9,0.2c-1-0.3-0.8-0.9,0.4-1.4l6.9-2.4V27l-9.6,3.3C8.1,30.7,6.9,31.3,5.8,32.1z M29,17.1v9.7
      c4.1,2,7.3,0,7.3-5.2c0-5.3-1.9-7.7-7.4-9.6C26,11,23,10.1,20,9.5v28.9l7,2.1V16.2c0-1.1,0-1.9,0.8-1.6C28.9,14.9,29,16,29,17.1z
      M42,29.8c-2.9-1-6-1.4-9-1.1c-1.6,0.1-3.1,0.5-4.5,1l-0.3,0.1v3.9l6.5-2.4c1.3-0.4,2.6-0.5,3.9-0.2c1,0.3,0.8,0.9-0.4,1.4
      l-10,3.7V40L42,34.9c1-0.4,1.9-0.9,2.7-1.7C45.4,32.2,45.1,30.8,42,29.8z" fill="#0070d1"></path>
          </g>
        </g>
      </svg></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-4">
        <li class="nav-item navButton rounded-3">
          <a class="nav-link active px-3 py-2" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item navButton rounded-3">
          <a class="nav-link px-3 py-2" href="wishList.php">Wish List</a>
        </li>
      </ul>
      <ul class="d-flex justify-content-end m-0 list-unstyled gap-3">
        <li class="nav-item">
          <?php if (!empty($_SESSION)) {
            echo '<a href="wishListForm.php"><button type="button" class="btn btn-dark">Add new wish</button></a>';
          } ?>
        </li>
        <li class="nav-item">
          <?php
          echo '<a class="nav-link text-bg-dark px-3 py-2 rounded-3" ';
          if (!empty($_SESSION)) {
            echo "href='../logout.php'>Logout</a>";
          } else {
            echo "href='../login.php'>Login</a>";
          }
          ?>
        </li>
        <li>
          <?php
          if (!empty($_SESSION)) {?>

             <a class="nav-link text-bg-dark px-3 py-2 rounded-3" href="../synchronizeData.php">Synchronize</a>

          <?php } ?>
        </li>
      </ul>
    </div>
  </div>
</nav>