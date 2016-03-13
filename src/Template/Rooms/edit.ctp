<?php use Cake\Routing\Router; ?>
<h2 class="page-header">Room</h2>
<div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li>
                    <a href="<?php echo Router::url('/', true); ?>rooms/">List Rooms</a>
                </li>
                <li class="active">
                    <a data-toggle="tab" href="<?php echo Router::url('/', true); ?>rooms/edit<?= $room->id ?>">Edit Room</a>
                </li>
                <li >
                    <a href="<?php echo Router::url('/', true); ?>rooms/add">Add Room</a>
                </li>

            </ul>
            <div class="tab-content" style="min-height:460px">
                <div class="row">
                    <div class="col-md-6">
                        <?= $this->Form->create($room) ?>

                        <?php
                        echo $this->Form->input('name',['class'=>'form-group form-control']);
                        ?>
                        <button class="btn btn-primary" type="submit">Save</button>
                        <?= $this->Form->end() ?>


                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

