<?php use Cake\Routing\Router;?>
<h2 class="page-header">Course</h2>
<div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a data-toggle="tab" href="<?php echo Router::url('/',true); ?>courses/">List Courses</a>
                </li>
                <li>
                    <a  href="<?php echo Router::url('/',true); ?>courses/add">Add Course</a>
                </li>

            </ul>
            <div class="tab-content">
                <table class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                    <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('department_id') ?></th>
                        <th><?= $this->Paginator->sort('name') ?></th>
                        <th><?= $this->Paginator->sort('code') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($courses as $course): ?>
                        <tr>
                            <td><?= $course->department->name; ?></td>
                            <td><?= h($course->name) ?></td>
                            <td><?= h($course->code) ?></td>
                            <td class="actions">
                                <?= $this->Html->link('<i"></i>', ['action' => 'edit', $course->id],['escape' => false,'class'=>'fa fa-edit fa-lg ']) ?>
                                <?= $this->Form->postLink('<i"></i>', ['action' => 'delete', $course->id],['escape' => false,'class'=>'fa fa-trash fa-lg ']) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="paginator">
                    <ul class="pagination">
                        <?= $this->Paginator->prev('< ' . __('previous')) ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next(__('next') . ' >') ?>
                    </ul>
                    <p><?= $this->Paginator->counter() ?></p>
                </div>
            </div>
        </div>

    </div>
</div>

