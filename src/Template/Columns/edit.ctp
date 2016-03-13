<?php use Cake\Routing\Router; ?>
<h2 class="page-header">Column</h2>
<div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li>
                    <a href="<?php echo Router::url('/', true); ?>columns/">List Columns</a>
                </li>
                <li class="active">
                    <a data-toggle="tab" href="<?php echo Router::url('/', true); ?>columns/edit<?= $column->id ?>">Edit Column</a>
                </li>

                <li>
                    <a href="<?php echo Router::url('/', true); ?>columns/add">Add Column</a>
                </li>

            </ul>
            <div class="tab-content" style="min-height:460px">
                <div class="row">
                    <div class="col-md-6">
                        <?= $this->Form->create($column) ?>

                        <?php
                        echo $this->Form->input('room_id', ['class'=>'form-group form-control','options' => $rooms]);
                        echo $this->Form->input('name',['class'=>'form-group form-control','label'=>"Number Of Column"]);
                        echo $this->Form->input('capacity',['class'=>'form-group form-control']);
                        ?>
                        <button class="btn btn-primary" type="submit">Save</button>
                        <?= $this->Form->end() ?>


                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
