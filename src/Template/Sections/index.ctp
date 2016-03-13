<?php use Cake\Routing\Router; ?>
<h2 class="page-header">Section</h2>
<div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a data-toggle="tab" href="<?php echo Router::url('/', true); ?>sections/">List Sections</a>
                </li>
                <li>
                    <a href="<?php echo Router::url('/', true); ?>sections/add">Add Section</a>
                </li>

            </ul>
            <div class="tab-content">
                <table class="table table-bordered table-striped dataTable" role="grid"
                       aria-describedby="example1_info">
                    <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('id') ?></th>
                        <th><?= $this->Paginator->sort('course_id') ?></th>
                        <th><?= $this->Paginator->sort('name',__('Section')) ?></th>
                        <th><?= $this->Paginator->sort('teacher_initial') ?></th>
                        <th><?= $this->Paginator->sort('total_student') ?></th>
                        <th><?= $this->Paginator->sort('is_complete') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($sections as $section): ?>
                        <tr>
                            <td><?= $this->Number->format($section->id) ?></td>
                            <td><?= $section->has('course') ? $this->Html->link($section->course->name, ['controller' => 'Courses', 'action' => 'view', $section->course->id]) : '' ?></td>
                            <td><?= h($section->name) ?></td>
                            <td><?= h($section->teacher_initial) ?></td>
                            <td><?= $this->Number->format($section->total_student) ?></td>
                            <td><?php if($section->is_complete==1){ echo "Yes";}else{echo "No";} ?></td>
                            <td class="actions">
                                <?= $this->Html->link('<i"></i>', ['action' => 'edit', $section->id],['escape' => false,'class'=>'fa fa-edit fa-lg ']) ?>
                                <?= $this->Form->postLink('<i"></i>', ['action' => 'delete', $section->id],['escape' => false,'class'=>'fa fa-trash fa-lg ']) ?>
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
