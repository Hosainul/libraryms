<?php require_once 'header.php' ?>

                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="javascript:avoid(0)">Manage Book</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInLeft">
<div class="col-sm-12">
    <h4 class="section-subtitle"><b>All Students</b></h4>
    <div class="panel">
        <div class="panel-content">
            <div class="table-responsive">
                <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Book Name</th>
                        <th>Book Image</th>
                        <th>Author name</th>
                        <th>Publication Name</th>
                        <th>Purchase Date</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Available Quantity</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $result = mysqli_query($con, "SELECT * FROM books");
                        while($row = mysqli_fetch_assoc($result)){
                    ?>
                        <tr>
                            <td><?= $row['book_name']?></td>
                            <td><img src="../images/books/<?= $row['book_image']?>" style="width:130px; height:150px;" alt=""></td>
                            <td><?= $row['book_author_name']?></td>
                            <td><?= $row['book_publication_name']?></td>
                            <td><?= date('d-M-Y', strtotime($row['book_purchase_date'])) ?></td>
                            <td><?= $row['book_price']?></td>
                            <td><?= $row['book_qty']?></td>
                            <td><?= $row['available_qty']?></td>
                            <td><a href="javascript:avoid(0)" class="btn btn-info" data-toggle="modal" data-target="#book-<?= $row['id']?>"><i class="fa fa-eye"></i></a></td>
                            <td><a href="" class="btn btn-warning" data-toggle="modal" data-target="#book-update-<?= $row['id']?>"><i class="fa fa-pencil"></i></a></td>
                            <td><a href="delete.php?bookdelete=<?= $row['id'] ?>" class="btn btn-danger"
                            onclick="confirm('Are you sure want to delete?')"><i class="fa fa-trash"></i></a></td>
                        </tr>
                    <?php
                        }
                    ?>
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        </div>
</div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<?php
        $result = mysqli_query($con, "SELECT * FROM books");
        while($row = mysqli_fetch_assoc($result)){
?>
<div class="modal fade" id="book-<?= $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="modal-primary-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header state modal-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-primary-label"><i class="fa fa-book"></i>book Details</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Book Name</th>
                        <td><?= $row['book_name']?></td>
                    </tr>
                    <tr>
                        <th>Book Image</th>
                        <td><img src="../images/books/<?= $row['book_image']?>" style="width:100px; height:100px;" alt=""></td>
                    </tr>
                    <tr>
                        <th>Author name</th>
                        <td><?= $row['book_author_name']?></td>
                    </tr>
                    <tr>
                        <th>Publication Name</th>
                        <td><?= $row['book_publication_name']?></td>
                    </tr>
                    <tr>
                        <th>Purchase Date</th>
                        <td><?= date('d-M-Y', strtotime($row['book_purchase_date'])) ?></td>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <td><?= $row['book_price']?></td>
                    </tr>
                    <tr>
                        <th>Quantity</th>
                        <td><?= $row['book_qty']?></td>
                    </tr>
                    <tr>
                        <th>Available Quantity</th>
                        <td><?= $row['available_qty']?></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php
}?>


<?php
        $result = mysqli_query($con, "SELECT * FROM books");
        while($row = mysqli_fetch_assoc($result)){

        $id = $row['id'];
        $book_info = mysqli_query($con, "SELECT * FROM `books` WHERE `id` = '$id' ");
        $book_info_row = mysqli_fetch_assoc($book_info);
        

?>
<div class="modal fade" id="book-update-<?= $row['id']?>" tabindex="-1" role="dialog" aria-labelledby="modal-primary-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header state modal-primary">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-primary-label"><i class="fa fa-book"></i>Update Bok</h4>
            </div>
            <div class="modal-body">
            <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-12">
    <form action="" method="POST">
            <div class="form-group">
                <label for="book_name">Book Name</label>
                    <input type="text" class="form-control" name="book_name" id="book_name" placeholder="Book Name" value="<?= $book_info_row['book_name'] ?>" required>
                    <input type="hidden" class="form-control" name="id" value="<?= $book_info_row['id'] ?>" required>
            </div>
            <div class="form-group">
                <label for="book_author_name">Book Author Name</label>
                    <input type="text" class="form-control" name="book_author_name" id="book_author_name" placeholder="Book Author Name" value="<?= $book_info_row['book_author_name'] ?>" required>
            </div>
            <div class="form-group">
                <label for="book_publication_name">Book Publication Name</label>
                    <input type="text" class="form-control" name="book_publication_name" id="book_publication_name" placeholder="Book Publication Name" value="<?= $book_info_row['book_publication_name'] ?>" required>
            </div>
            <div class="form-group">
                <label for="book_purchase_date">Book Purshase Date</label>
                    <input type="date" class="form-control" name="book_purchase_date" id="book_purchase_date" placeholder="Book Purshase Date" value="<?= $book_info_row['book_purchase_date'] ?>" required>
            </div>
            <div class="form-group">
                <label for="book_price">Book Price</label>
                    <input type="number" class="form-control" name="book_price" id="book_price" placeholder="Book Price" value="<?= $book_info_row['book_price'] ?>" required>
            </div>
            <div class="form-group">
                <label for="book_qty">Book Quantity</label>
                    <input type="number" class="form-control" name="book_qty" id="book_qty" placeholder="Book Quantity" value="<?= $book_info_row['book_qty'] ?>" required>
            </div>
            <div class="form-group">
                <label for="available_qty">Available Quantity</label>
                    <input type="number" class="form-control" name="available_qty" id="available_qty" placeholder="Available Quantity" value="<?= $book_info_row['available_qty'] ?>" required>
            </div>
            <div class="form-group">
                    <button type="submit" name="update_book" class="btn btn-primary"><i class="fa fa-save"></i>Update Book</button>
            </div>
    </form>
                    </div>
                </div>
            </div>
        </div>
</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php
}

if(isset($_POST['update_book'])){
    $id = $_POST['id'];
    $book_name = $_POST['book_name'];
    $book_author_name = $_POST['book_author_name'];
    $book_publication_name = $_POST['book_publication_name'];
    $book_purchase_date = $_POST['book_purchase_date'];
    $book_price = $_POST['book_price'];
    $book_qty = $_POST['book_qty'];
    $available_qty = $_POST['available_qty'];
    $librarian_username = $_SESSION['librarian_username'];

    $result = mysqli_query($con, "UPDATE `books` SET `book_name`='$book_name',`book_author_name`='$book_author_name',`book_publication_name`='$book_publication_name',`book_purchase_date`='$book_purchase_date',`book_price`='$book_price',`book_qty`='$book_qty',`available_qty`='$available_qty',`librarian_username`='$librarian_username' WHERE `id`='$id' ");

    if($result){
        ?>
            <script type="text/javascript">
                alert('Book Updated Successfully.');
            </script>
        <?php
                }else{
        ?>
            <script type="text/javascript">
                alert('Book Not Updated.');
            </script>
        <?php
            }

}

?>


<?php require_once 'footer.php' ?>