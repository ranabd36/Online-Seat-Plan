<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Schedule'), ['action' => 'edit', $schedule->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Schedule'), ['action' => 'delete', $schedule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $schedule->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Schedules'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Schedule'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rooms'), ['controller' => 'Rooms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Room'), ['controller' => 'Rooms', 'action' => 'add']) ?> </li>
    </ul>
</nav>-->
<div class="schedules view large-12 medium-12 columns content">
    <h3><?= h($schedule->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Course') ?></th>
            <td><?= $schedule->has('course') ? $this->Html->link($schedule->course->name, ['controller' => 'Courses', 'action' => 'view', $schedule->course->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Room') ?></th>
            <td><?= $schedule->has('room') ? $this->Html->link($schedule->room->name, ['controller' => 'Rooms', 'action' => 'view', $schedule->room->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Semester') ?></th>
            <td><?= h($schedule->semester) ?></td>
        </tr>
        <tr>
            <th><?= __('Exam Type') ?></th>
            <td><?= h($schedule->exam_type) ?></td>
        </tr>
        <tr>
            <th><?= __('Slot') ?></th>
            <td><?= h($schedule->slot) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($schedule->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Date') ?></th>
            <td><?= $schedule->date ?></td>
        </tr>
    </table>
</div>
