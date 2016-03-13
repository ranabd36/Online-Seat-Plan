<?php use Cake\Routing\Router; ?>
<h2 class="page-header">User</h2>
<div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li>
                    <a href="<?php echo Router::url('/', true); ?>users/">Details User</a>
                </li>
                <li class="active">
                    <a data-toggle="tab" href="<?php echo Router::url('/', true); ?>users/add<?= $user->id ?>">Edit User</a>
                </li>
                <li>
                    <a href="<?php echo Router::url('/', true); ?>users/add">Add User</a>
                </li>

            </ul>
            <div class="tab-content" style="min-height:460px">
                <div class="row">
                    <div class="col-md-6">
                        <?= $this->Form->create($user) ?>

                        <?php
                        echo $this->Form->input('username',['class'=>'form-group form-control']);
                        echo $this->Form->input('password',['class'=>'form-group form-control']);
                        echo $this->Form->input('role',['class'=>'form-group form-control','options'=>['admin'=>'Admin','staff'=>'Staff']]);
                        ?>
                        <button class="btn btn-primary" type="submit">Save</button>
                        <?= $this->Form->end() ?>


                    </div>
                </div>
            </div>
        </div>

    </div>
</div>