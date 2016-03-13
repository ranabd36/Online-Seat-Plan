<?php use Cake\Routing\Router; ?>
<div class="row">
    <div class="col-md-6">
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?= $number_of_dept; ?></h3>
                <p>DEPARTMENTS</p>
            </div>
            <div class="icon">
                <i class="ion ion-cloud"></i>
            </div>
            <a class="small-box-footer" href="<?php echo Router::url('/', true); ?>departments/">
                More info
                <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-md-6">
        <div class="small-box bg-green">
            <div class="inner">
                <h3><?= $number_of_course; ?></h3>
                <p>COURSES</p>
            </div>
            <div class="icon">
                <i class="ion ion-folder"></i>
            </div>
            <a class="small-box-footer" href="<?php echo Router::url('/', true); ?>courses/">
                More info
                <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-md-6">
        <div class="small-box bg-red">
            <div class="inner">
                <h3><?= $number_of_room; ?></h3>
                <p>ROOMS</p>
            </div>
            <div class="icon">
                <i class="ion ion-cube"></i>
            </div>
            <a class="small-box-footer" href="<?php echo Router::url('/', true); ?>rooms/">
                More info
                <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-md-6">
        <div class="small-box bg-blue">
            <div class="inner">
                <h3><?= $number_of_user; ?></h3>
                <p>USERS</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a class="small-box-footer" href="<?php echo Router::url('/', true); ?>users/">
                More info
                <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>