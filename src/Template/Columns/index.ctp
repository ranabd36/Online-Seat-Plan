<?php use Cake\Routing\Router;?>
<h2 class="page-header">Column</h2>
<div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a data-toggle="tab" href="<?php echo Router::url('/',true); ?>columns/">List Columns</a>
                </li>
                <li>
                    <a  href="<?php echo Router::url('/',true); ?>columns/add">Add Column</a>
                </li>

            </ul>
            <div class="tab-content">
                <table class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
                    <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('id') ?></th>
                        <th><?= $this->Paginator->sort('room_id') ?></th>
                        <th><?= $this->Paginator->sort('name',__('Column No')) ?></th>
                        <th><?= $this->Paginator->sort('capacity') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($columns as $column): ?>
                        <tr>
                            <td><?= $this->Number->format($column->id) ?></td>
                            <td><?= $column->has('room') ? $this->Html->link($column->room->name, ['controller' => 'Rooms', 'action' => 'view', $column->room->id]) : '' ?></td>
                            <td><?= $this->Number->format($column->name) ?></td>
                            <td><?= $this->Number->format($column->capacity) ?></td>
                            <td class="actions">
                                <?= $this->Html->link('<i"></i>', ['action' => 'edit', $column->id],['escape' => false,'class'=>'fa fa-edit fa-lg ']) ?>
                                <?= $this->Form->postLink('<i"></i>', ['action' => 'delete', $column->id],['escape' => false,'class'=>'fa fa-trash fa-lg ']) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="paginator">
                    <ul class="pagination">
                        <?= $this->Paginator->prev(__('previous')) ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next(__('next')) ?>
                    </ul>
                    <p><?= $this->Paginator->counter() ?></p>
                </div>
            </div>
        </div>

    </div>
</div>

