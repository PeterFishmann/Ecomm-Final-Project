
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
          <li class="nav-item">
            <a class="nav-link active" href="/user/listing">My cars</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="/order/index">My orders</a>
          </li>
          <div class="dropdown">
            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Comments
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="/comment/viewComments">View mine</a>
              <a class="dropdown-item" href="/comment/ReadAll">View All</a>
            </div>
          </div>
          <div class="dropdown">
            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Users
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="/user/AllUsers">All Users</a>
            </div>
          </div>
          <div class="dropdown">
            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Reviews
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="/review/index">Index</a>
              <a class="dropdown-item" href="/review/ReadAll">View All</a>
            </div>
          </div>
          <?php
          }elseif($_SESSION['right'] == "Seller"){
          ?>
          <li class="nav-item">
            <a class="nav-link active" href="/user/listing">My cars</a>
          </li>
          <div class="dropdown">
            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Comments
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="/comment/viewComments">Read</a>
            </div>
          </div>
          <li class="nav-item">
            <a class="nav-link active" href="/review/index">Reviews</a>
          </li>
          <?php
          }else{
          ?>
          <li class="nav-item">
          <a class="nav-link active" href="/order/index">My orders</a>
          </li>
          <li class="nav-item">
          <a class="nav-link active" href="/review/index">My reviews</a>
          </li>
          <li class="nav-item">
          <a class="nav-link active" href="/comment/viewComments">My comments</a>
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