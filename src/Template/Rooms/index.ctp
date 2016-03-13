<?php use Cake\Routing\Router; ?>
<h2 class="page-header">Room Setup</h2>
<div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a data-toggle="tab" href="<?php echo Router::url('/', true); ?>rooms/">List Rooms</a>
                </li>
                <li>
                    <a href="<?php echo Router::url('/', true); ?>rooms/add">Add Room</a>
                </li>

            </ul>
            <div class="tab-content">
                <table class="table table-bordered table-striped dataTable" role="grid"
                       aria-describedby="example1_info">
                    <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('id') ?></th>
                        <th><?= $this->Paginator->sort('name') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($rooms as $room): ?>
                        <tr>
                            <td><?= $this->Number->format($room->id) ?></td>
                            <td><?= h($room->name) ?></td>
                            <td class="actions">
                                <?= $this->Html->link('<i"></i>', ['action' => 'edit', $room->id], ['escape' => false, 'class' => 'fa fa-edit fa-lg ']) ?>
                                <?= $this->Form->postLink('<i"></i>', ['action' => 'delete', $room->id], ['escape' => false, 'class' => 'fa fa-trash fa-lg ']) ?>
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

