<?php use Cake\Routing\Router; ?>
<h2 class="page-header">Section</h2>
<div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li>
                    <a href="<?php echo Router::url('/', true); ?>Sections/">List Sections</a>
                </li>
                <li class="active">
                    <a data-toggle="tab" href="<?php echo Router::url('/', true); ?>Sections/edit<?= $section->id ?>">Edit Section</a>
                </li>
                <li>
                    <a href="<?php echo Router::url('/', true); ?>Sections/add">Add Section</a>
                </li>

            </ul>
            <div class="tab-content" style="min-height:460px">
                <div class="row">
                    <div class="col-md-6">
                        <?= $this->Form->create($section) ?>

                        <?php
                        echo $this->Form->input('course_id', ['class'=>'form-group form-control','options' => $courses]);
                        echo $this->Form->input('name',['label'=>'Section','class'=>'form-group form-control']);
                        echo $this->Form->input('teacher_initial',['class'=>'form-group form-control']);
                        echo $this->Form->input('total_student',['class'=>'form-group form-control']);
                        ?>
                        <button class="btn btn-primary" type="submit">Save</button>
                        <?= $this->Form->end() ?>


                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
