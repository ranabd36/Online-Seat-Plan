<?php use Cake\Routing\Router; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        <?= "Seat Plan" ?>:
        <?= $this->fetch('title') ?>
    </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo Router::url('/', true); ?>admin/bootstrap/css/bootstrap.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo Router::url('/', true); ?>admin/dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo Router::url('/', true); ?>admin/dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo Router::url('/', true); ?>admin/plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo Router::url('/', true); ?>admin/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet"
          href="<?php echo Router::url('/', true); ?>admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo Router::url('/', true); ?>admin/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet"
          href="<?php echo Router::url('/', true); ?>admin/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet"
          href="<?php echo Router::url('/', true); ?>admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo Router::url('/', true); ?>admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>S</b>P</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Seat</b>Plan</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->

    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <?php if ($this->request->session()->read('Auth.User.id')): ?>
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                        <span class="glyphicon glyphicon-user" style="background: #FFFFFF;padding: 12px;font-size: 25px;border-radius: 50px"></span>
                    </div>
                    <div class="pull-left info">
                        <p><?= ucfirst($this->request->session()->read('Auth.User.username')) ?></p>
                        <a href="<?php echo Router::url('/', true); ?>users/logout">
                            <i class="fa fa-circle text-red"></i>
                            Log Out
                        </a>
                    </div>
                </div>

                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="<?php echo Router::url('/', true); ?>dashboard/">
                            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo Router::url('/', true); ?>schedules/">
                            <i class="fa  fa-outdent"></i>
                            <span>Schedule Assign</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo Router::url('/', true); ?>departments/">
                            <i class="fa fa-th-large"></i>
                            <span>Department Add</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo Router::url('/', true); ?>courses/">
                            <i class="fa fa-leanpub"></i>
                            <span>Course Add</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo Router::url('/', true); ?>sections/">
                            <i class="fa fa-ge (alias)"></i>
                            <span>Section Assign</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo Router::url('/', true); ?>rooms/">
                            <i class="fa fa-puzzle-piece"></i>
                            <span>Room Setup</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo Router::url('/', true); ?>columns/">
                            <i class="fa  fa-qrcode"></i>
                            <span>Column Assign</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo Router::url('/', true); ?>users/">
                            <i class="fa  fa-users"></i>
                            <span>User Management</span>
                        </a>
                    </li>

                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
    <?php endif; ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content" style="margin-top: 35px">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2015 <a href="http://daffodilvarsity.edu.bd">Daffodil International University</a>.</strong>
        All rights reserved.
    </footer>


</div>
<!-- ./wrapper -->


<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.5 -->
<script src="<?php echo Router::url('/', true); ?>admin/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<!-- Sparkline -->
<script src="<?php echo Router::url('/', true); ?>admin/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?php echo Router::url('/', true); ?>admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?php echo Router::url('/', true); ?>admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo Router::url('/', true); ?>admin/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
<script src="<?php echo Router::url('/', true); ?>admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="<?php echo Router::url('/', true); ?>admin/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script
    src="<?php echo Router::url('/', true); ?>admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo Router::url('/', true); ?>admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo Router::url('/', true); ?>admin/plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo Router::url('/', true); ?>admin/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- AdminLTE for demo purposes -->
<script src="<?php echo Router::url('/', true); ?>admin/dist/js/demo.js"></script>
<script>
    $(function () {
        $("#datepicker").datepicker({
            dateFormat: "dd-mm-yy"
        });
    });
</script>

</body>
</html>