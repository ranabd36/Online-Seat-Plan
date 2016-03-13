<?php use Cake\Routing\Router;?>
<h2 class="page-header">Department</h2>
<div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a data-toggle="tab" href="<?php echo Router::url('/',true); ?>departments/">List Departments</a>
                </li>
                <li>
                    <a  href="<?php echo Router::url('/',true); ?>departments/add">Add Department</a>
                </li>

            </ul>
            <div class="tab-content">
                <table class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                    <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('id')?></th>
                        <th><?= $this->Paginator->sort('name')?></th>
                        <th class="actions"><?= __('Actions')?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($departments as $department): ?>
                    <tr>
                        <td><?= $this->Number->format($department->id) ?></td>
                        <td><?= h($department->name) ?></td>
                        <td class="actions">
                            <?= $this->Html->link('<i"></i>', ['action' => 'edit', $department->id,],['escape' => false,'class'=>'fa fa-edit fa-lg ']) ?>
                            <?= $this->Form->postLink('<i"></i>', ['action' => 'delete', $department->id],['escape' => false,'class'=>'fa fa-trash fa-lg '])?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <div id="example1_paginate" class="dataTables_paginate paging_simple_numbers">
                    <ul class="pagination">
                        <?= $this->Paginator->prev(__('Previous')) ?>
                        <?= $this->Paginator->numbers()?>
                        <?= $this->Paginator->next(__('Next')) ?>
                    </ul>
                    <p ><?= $this->Paginator->counter() ?></p>
                </div>
            </div>
        </div>

    </div>
</div>
