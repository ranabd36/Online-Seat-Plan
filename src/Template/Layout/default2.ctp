
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= "Seat Plan" ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('jquery.ui.datepicker.css') ?>
    <?= $this->Html->css('jquery-ui.css') ?>
    <?= $this->Html->script('jquery-1.7.2.min') ?>
    <?= $this->Html->script('jquery-ui.min') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>

    <?= $this->Flash->render() ?>
    <section class="container clearfix">
        <?= $this->fetch('content') ?>
    </section>
    <footer>
    </footer>
<script>
    $(function(){


        $( "#datepicker" ).datepicker({
            dateFormat : "yy-mm-dd"
        });


    });
</script>
</body>
</html>
