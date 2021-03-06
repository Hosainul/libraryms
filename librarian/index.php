<?php require_once 'header.php' ?>

                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<div class="row animated fadeInLeft">
<div class="row">
        <?php
        $books = mysqli_query($con, "SELECT * FROM `books` ");
        $total_books = mysqli_num_rows($books);
        $book_qty = mysqli_query($con, "SELECT SUM(`book_qty`) as total FROM `books` ");
        $books_qty = mysqli_fetch_assoc($book_qty);
        $a_qty = mysqli_query($con, "SELECT SUM(`available_qty`) as total FROM `books` ");
        $as_qty = mysqli_fetch_assoc($a_qty);
        
        // $librarian_info = mysqli_fetch_assoc($data);
        ?>
                <!--BOX Style 1-->
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                <a href="manage_book.php">
                    <div class="panel-content">
                        <h1 class="title color-darker-2"> <i class="fa fa-user"></i> <?= $total_books .'('. $books_qty['total'] .'/' . $as_qty['total'] .')' ?> </h1>
                        <h4 class="subtitle color-darker-1">Total books</h4>
                    </div>
                </a>
            </div>
        </div>

        <?php
        $students = mysqli_query($con, "SELECT * FROM `students` ");
        $total_students = mysqli_num_rows($students);
        
        // $librarian_info = mysqli_fetch_assoc($data);
        ?>
                <!--BOX Style 1-->
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                <a href="students.php">
                    <div class="panel-content">
                        <h1 class="title color-darker-2"> <i class="fa fa-user"></i> <?= $total_students; ?> </h1>
                        <h4 class="subtitle color-darker-1">Total Students</h4>
                    </div>
                </a>
            </div>
        </div>

        <?php
        $librarian = mysqli_query($con, "SELECT * FROM `librarian` ");
        $total_librarian = mysqli_num_rows($librarian);
        
        // $librarian_info = mysqli_fetch_assoc($data);
        ?>
                <!--BOX Style 1-->
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                <a href="#">
                    <div class="panel-content">
                        <h1 class="title color-darker-2"> <i class="fa fa-user"></i> <?= $total_librarian; ?> </h1>
                        <h4 class="subtitle color-darker-1">Total Librarian</h4>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->


<?php require_once 'footer.php' ?>