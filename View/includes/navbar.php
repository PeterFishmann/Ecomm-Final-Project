<nav class="navbar navbar-dark bg-primary">
<a class="navbar-brand" href="/home/index">EzCarBuyer</a>
        <a class="nav-link" href="/home/index" style='color:white; text-decoration:none'>Home <span class="sr-only">(current)</span></a>
        <a class="nav-link" href="/car/index" style='color:white; text-decoration:none'>Cars</a>
        <?php
        if(isset($_SESSION['username'])){
        ?>
        <a class="nav-link" href="/user/index" style='color:white; text-decoration:none'>User Profile</a>
        <?php
        }else{
          ?>
        <div class="dropdown">
            <button type="button"
                class="btn btn-success dropdown-toggle"
                data-toggle="dropdown">
                Join us
            </button>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="/user/login">
                    login
                </a>
                <a class="dropdown-item" href="/user/register">
                    register
                </a>
            </div>
        </div>
          <?php
        }
        ?>
        <?php
        if(isset($_SESSION['username'])){
          echo '<a class="nav-link" href="/order/index" style="color:white; text-decoration:none">My orders</a>';
          echo "<button class='btn btn-danger'><a href='/User/logout' style='color:white; text-decoration:none'>Logout</a></button>";
          echo "<img src='../../Images/users/".$_SESSION['picture']."' width='50' height='50' class='rounded-circle'>";
        }
        ?>
  </div>
</nav>
<style>
  .dropdown-menu{
    text-align:center;
    left:-60%;
  }
</style>
