<?php use Cake\Routing\Router; ?>
<h2 class="page-header">Department</h2>
<div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li>
                    <a href="<?php echo Router::url('/', true); ?>departments/">List Departments</a>
                </li>
                <li class="active">
                    <a data-toggle="tab" href="<?php echo Router::url('/', true); ?>departments/add">Add Department</a>
                </li>

            </ul>
            <div class="tab-content" style="min-height:460px">
                <div class="row">
                    <div class="col-md-6">
                        <?= $this->Form->create($department) ?>
                        <div class="form-group">
                            <label>Name</label>
                            <input name="name" class="form-control" type="text" placeholder="Enter department name">
                        </div>

                        <button class="btn btn-primary" type="submit">Save</button>

                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>




