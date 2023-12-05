<!DOCTYPE html>
<html lang="en">
<body>
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <form method="post">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <h5 class="nav-link">Filter Options</h5>
                        </li>
                        <li class="nav-item">
                        <label><b>Make/Model</b></label>
                        <input class="form-control" type="search" name="search" placeholder="Enter make/model" value="<?php if(isset($_POST['filter'])){echo $_POST['search'];}else{echo "";}?>">
                        </li>
                        <li class="nav-item">
                            <label><b>Distance (KM)</b></label><br>
                            <label>Min</label>
                            <input type="number" min="0" max="499999" value="<?php if(isset($_POST['filter'])){echo $_POST['min'];}else{echo "0";}?>" name="min" step=10000><br>
                            <label>Max</label>
                            <input type="number" min="0" max="500000" value="<?php if(isset($_POST['filter'])){echo $_POST['max'];}else{echo "200000";}?>" name="max" step=10000>
                        </li>
                        <li class="nav-item">
                            <label for="model"><b>Color</b></label>
                            <label></label>
                            <input type="text" name="color1" placeholder="Interior color" value="<?php if(isset($_POST['filter'])){echo $_POST['color1'];}else{echo "";}?>">
                            <input type="text" name="color2" placeholder="exterior color" value="<?php if(isset($_POST['filter'])){echo $_POST['color2'];}else{echo "";}?>">
                        </li>
                        <li class="nav-item">
                            <label for="year"><b>Year</b></label><br>
                            <input type="number" name="minYEAR" min="1950" value="<?php if(isset($_POST['filter'])){echo $_POST['minYEAR'];}else{echo "2000";}?>" max="<?php echo (date("Y")-1);?>">
                            <input type="number" name="maxYEAR" min="1951" value="<?php if(isset($_POST['filter'])){echo $_POST['maxYEAR'];}else{echo date("Y");}?>" max="<?php echo date("Y");?>">
                        </li><br>
                        <li class="nav-item">
                            <label for="year"><b>Condition</b></label><br>
                            <label>New</label>
                            <input type="radio" name="US" value="New">
                            <label>Used</label>
                            <input type="radio" name="US" value="Used">
                        </li><br>
                        <li class="nav-item">
                            <input id="apply-filter" type="submit" class="btn btn-primary" name="filter" value="Apply Filter">
                        </li>
                        </form>
                    </ul>
                </div>
            </nav>
</body>
</html>
