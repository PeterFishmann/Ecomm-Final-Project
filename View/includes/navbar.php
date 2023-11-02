<nav class="navbar navbar-dark bg-primary">
<a class="navbar-brand" href="/home/index">EzCarBuyer</a>


  <!--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    !-->
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
        <a class="nav-link" href="/order/index" style='color:white; text-decoration:none'>Orders</a>
        <?php
        if(isset($_SESSION['username'])){
          echo "<button class='btn btn-danger'><a href='/User/logout' style='color:white; text-decoration:none'>Logout</a></button>";
        }
        ?>
  </div>
</nav>