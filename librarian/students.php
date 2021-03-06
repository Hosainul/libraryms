<?php require_once 'header.php' ?>

<div class="content-header">
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
            <li><a href="javascript:avoid(0)">Students</a></li>
        </ul>
    </div>
</div>

<div class="row animated fadeInLeft">
<div class="col-sm-12">
    <div class="pull-left">
        <h4 class="section-subtitle"><b>All Students</b></h4>
    </div>
    <div class="pull-right">
        <a href="print_students.php" target="_blank" class="btn btn-print"><i class="fa fa-print">Print</i></a>
    </div>
    <div class="clearfix"></div>
        <div class="panel">
            <div class="panel-content">
                <div class="table-responsive">
                    <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Username</th>
                            <th>Roll</th>
                            <th>Reg. No</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $result = mysqli_query($con, "SELECT * FROM students");
                            while($row = mysqli_fetch_assoc($result)){
                        ?>
                            <tr>
                                <td><?= ucwords($row['username']) ?></td>
                                <td><?= $row['roll'] ?></td>
                                <td><?= $row['reg'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td><?= $row['phone'] ?></td>
                                <td>
                                    <?php 
                                        if($row['status'] == 1 ){
                                            echo '<span style="color: green">Active</span>';
                                        }else{
                                            echo '<span style="color: red">Inactive</span>';
                                        }
                                    ?>
                                </td>
                                <td>
                                <?php 
                                    if($row['status'] == 0){
                                ?>
                                       <a href="status_active.php?id=<?= $row['id'] ?>" class="btn btn-primary"><i class="fa fa-arrow-up"></i></a>
                                <?php
                                    }else{
                                ?>
                                        <a href="status_inactive.php?id=<?= $row['id'] ?>" class="btn btn-danger"><i class="fa fa-arrow-down"></i></a>
                                <?php
                                    }
                                ?>
                                </td>
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


<?php require_once 'footer.php' ?>