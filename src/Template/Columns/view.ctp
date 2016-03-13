<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Column'), ['action' => 'edit', $column->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Column'), ['action' => 'delete', $column->id], ['confirm' => __('Are you sure you want to delete # {0}?', $column->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Columns'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Column'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Rooms'), ['controller' => 'Rooms', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Room'), ['controller' => 'Rooms', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="columns view large-9 medium-8 columns content">
    <h3><?= h($column->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Room') ?></th>
            <td><?= $column->has('room') ? $this->Html->link($column->room->name, ['controller' => 'Rooms', 'action' => 'view', $column->room->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($column->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Capacity') ?></th>
            <td><?= $this->Number->format($column->capacity) ?></td>
        </tr>
        <tr>
            <th><?= __('Is Complete') ?></th>
            <td><?= $this->Number->format($column->is_complete) ?></td>
        </tr>
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= $this->Number->format($column->name) ?></td>
        </tr>
    </table>
</div>
