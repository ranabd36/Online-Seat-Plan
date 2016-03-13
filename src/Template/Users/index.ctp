<?php use Cake\Routing\Router; ?>
<h2 class="page-header">User</h2>
<div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a data-toggle="tab" href="<?php echo Router::url('/', true); ?>users/">Details User</a>
                </li>
                <li>
                    <a href="<?php echo Router::url('/', true); ?>users/add">Add User</a>
                </li>

            </ul>
            <div class="tab-content" style="min-height:460px">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                            <tr>
                                <th><?= __('Id') ?></th>
                                <td><?= $this->Number->format($user->id) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Username') ?></th>
                                <td><?= h($user->username) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Password') ?></th>
                                <td><?= h($user->password) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Role') ?></th>
                                <td><?= h($user->role) ?></td>
                            </tr>
                            <tr>
                                <th><?= __('Created') ?></th>
                                <td><?= h($user->created) ?></tr>
                            </tr>
                            <tr>
                                <th><?= __('Modified') ?></th>
                                <td><?= h($user->modified) ?></tr>
                            </tr>
                        </table>
                        <a class="btn btn-warning" href="<?php echo Router::url('/',true); ?>users/edit/<?= $user->id ?>">
                            <i class="fa fa-edit"></i>
                            Edit
                        </a>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

