<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Section'), ['action' => 'edit', $section->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Section'), ['action' => 'delete', $section->id], ['confirm' => __('Are you sure you want to delete # {0}?', $section->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Sections'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Section'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?> </li>
    </ul>
</nav>-->
<div class="sections view large-12 medium-12 columns content">
    <h3><?= h($section->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Course') ?></th>
            <td><?= $section->has('course') ? $this->Html->link($section->course->name, ['controller' => 'Courses', 'action' => 'view', $section->course->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($section->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Teacher Initial') ?></th>
            <td><?= h($section->teacher_initial) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($section->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Total Student') ?></th>
            <td><?= $this->Number->format($section->total_student) ?></td>
        </tr>
        <tr>
            <th><?= __('Is Complete') ?></th>
            <td><?= $this->Number->format($section->is_complete) ?></td>
        </tr>
    </table>
</div>
