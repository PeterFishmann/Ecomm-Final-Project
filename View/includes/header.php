
<nav class="navbar navbar-expand-lg bg-light navbar-dark bg-dark" >
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand mb-0 h1" href="/home/index">EzCarBuyer</a>
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/car/index">Car Catalog</a>
        </li>        
        <li class="nav-item">
        </li>
          <?php
          if(isset($_SESSION['username'])){
          ?>
        <li class="nav-item">
          <a class="nav-link"><img style="height:24px;width:24px;border-radius:50%;object-fit:cover" src="../../Images/users/<?= $_SESSION['picture']?>"></a>
          </li>
          <li class="nav-item">
          <a class="nav-link disable">Welcome <?= $_SESSION['username']?></a>
          </li>
          <li class="nav-item">
          <a class="nav-link active" href="/user/index">My profile</a>
          </li>
          <?php
          if($_SESSION['right'] == "Admin"){
            ?>
          <div class="dropdown">
            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Users
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="/user/buyers">Buyers</a>
              <a class="dropdown-item" href="/user/sellers">Sellers</a>
              <a class="dropdown-item" href="/user/AllUsers/<?= $_SESSION['id']?>">All Users</a>
            </div>
          </div>
          <?php
          }elseif($_SESSION['right'] == "Seller"){
          ?>
          <li class="nav-item">
          <a class="nav-link active" href="">My cars</a>
          </li>
          <li class="nav-item">
          <a class="nav-link active" href="">My profit</a>
          </li>
          <li class="nav-item">
          <a class="nav-link active" href="">View comments</a>
          </li>
          <li class="nav-item">
          <a class="nav-link active" href="">View reviews</a>
          </li>
          <?php
          }else{
          ?>
          <li class="nav-item">
          <a class="nav-link active" href="">My orders</a>
          </li>
          <li class="nav-item">
          <a class="nav-link active" href="">My reviews</a>
          </li>
          <li class="nav-item">
          <a class="nav-link active" href="">My comments</a>
          </li>
          <?php
          }
          }else{
      ?>
        <a class="btn btn-success m-2" href="/user/Login">Sign in</a>
        <a class="btn btn-info m-2" href="/user/register">Sign up</a>
        <?php
      }
      if(isset($_SESSION['username'])){
      ?>
          <li class="nav-item">
          <a class="btn btn-danger m-2" href="/user/logout">Logout</a>
          </li>
      <?php
      }
        ?>
      </ul>
    </div>
  </div>
</nav>