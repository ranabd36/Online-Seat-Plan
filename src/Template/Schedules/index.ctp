<?php use Cake\Routing\Router;?>
<h2 class="page-header">Schedule Assign</h2>
<div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a data-toggle="tab" href="<?php echo Router::url('/',true); ?>schedules/">List Schedules</a>
                </li>
                <li>
                    <a  href="<?php echo Router::url('/',true); ?>schedules/add">Add Schedule</a>
                </li>

            </ul>
            <div class="tab-content">
                <table class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                    <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('id') ?></th>
                        <th><?= $this->Paginator->sort('course_id') ?></th>
                        <th><?= $this->Paginator->sort('section_id') ?></th>
                        <th><?= $this->Paginator->sort('room_id') ?></th>
                        <th><?= $this->Paginator->sort('semester') ?></th>
                        <th><?= $this->Paginator->sort('exam_type') ?></th>
                        <th><?= $this->Paginator->sort('date') ?></th>
                        <th><?= $this->Paginator->sort('slot') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($schedules as $schedule): ?>
                        <tr>
                            <td><?= $this->Number->format($schedule->id) ?></td>
                            <td><?= $schedule->course->name ?></td>
                            <td><?= $schedule->section->name ?></td>
                            <td><?= $schedule->has('room') ? $this->Html->link($schedule->room->name, ['controller' => 'Rooms', 'action' => 'view', $schedule->room->id]) : '' ?></td>
                            <td><?= h($schedule->semester) ?></td>
                            <td><?= h($schedule->exam_type) ?></td>
                            <td><?= $schedule->date ?></td>
                            <td><?= h($schedule->slot) ?></td>
                            <td class="actions">
                                <?= $this->Html->link('<i"></i>', ['action' => 'edit', $schedule->id],['escape' => false,'class'=>'fa fa-edit fa-lg ']) ?>
                                <?= $this->Form->postLink('<i"></i>', ['action' => 'delete', $schedule->id],['escape' => false,'class'=>'fa fa-trash fa-lg ']) ?>
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
