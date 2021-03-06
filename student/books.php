<?php require_once 'header.php' ?>
<div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                            <li><a href="#">Books</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<div class="row animated fadeInLeft">
<div class="col-sm-12">
    <div class="panel">
        <div class="panel-content">
            <form method="POST" action="">
                <div class="row pt-md">
                    <div class="form-group col-sm-9 col-lg-10">
                            <span class="input-with-icon">
                        <input type="text" name="result" class="form-control" id="lefticon" placeholder="Search" required>
                        <i class="fa fa-search"></i>
                    </span>
                    </div>
                    <div class="form-group col-sm-3  col-lg-2 ">
                        <button type="submit" name="search_books" class="btn btn-primary btn-block">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php 
    if(isset($_POST['search_books'])){
        $result = $_POST['result'];
        ?>
        <div class="panel">
            <div class="panel-content">
                <div class="row">
                <?php 
                    $result = mysqli_query($con, "SELECT * FROM `books` WHERE `book_name` LIKE '%$result%'");
                    $temp = mysqli_num_rows($result);
                    if($temp > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            ?>
                            <div class="col-sm-3 col-md-2">
                                <img src="../images/books/<?= $row['book_image'] ?>" style="width:100px; height: 130px;" alt="">
                                <p><?= $row['book_name'] ?></p>
                                <span>Available:<b> <?= $row['available_qty'] ?></b></span>
                            </div>
                            <?php
                                }
                            ?>
                    <?php
                    }else{
                       ?>
                    <h3 style="margin-left: 30px;">Book Not Found...</h3>
                    <?php
                    }
                  ?>
                </div>
            </div>
        </div>
    <?php
    }else{ ?>

    <div class="panel">
        <div class="panel-content">
            <div class="row">
            <?php 
                $result = mysqli_query($con, "SELECT * FROM `books`");
                while($row = mysqli_fetch_assoc($result)){
                ?>
                <div class="col-sm-3 col-md-2">
                    <img src="../images/books/<?= $row['book_image'] ?>" style="width:100px; height: 130px;" alt="">
                    <p><?= $row['book_name'] ?></p>
                    <span>Available:<b> <?= $row['available_qty'] ?></b></span>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>

    <?php } ?>

</div>
<?php require_once 'footer.php' ?>