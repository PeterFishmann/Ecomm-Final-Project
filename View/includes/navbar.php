<nav class="navbar navbar-dark bg-primary">
<a class="navbar-brand" href="/home/index">EzCarBuyer</a>
<?php
if(isset($_SESSION['username'])){
echo "<a href='/User/logout' style='color:white; text-decoration:none'>Logout</a>";
}
?>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/home/index">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/car/index">Cars</a>
      </li>
      <li class="nav-item">
        <?php
        if(isset($_SESSION['username'])){
        ?>
        <a class="nav-link" href="/user/index">Users</a>
        <?php
        }else{
          ?>
        <a class="nav-link" href="/user/login">login</a>
        <a class="nav-link" href="/user/register">register</a>
          <?php
        }
        ?>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/order/index">Orders</a>
      </li>
      <!--<li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>!-->
    </ul>
    <form class="form-inline my-2 my-lg-0" method="post">
      <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
      <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Search" name="Search">
    </form>
  </div>
</nav>