<div class="row">
    <div class="col-md-12">
        <div class="box-body">
            <div class="row">
                <div class="col-xs-3">
                    <?= $this->Form->input('semester', ['class' => 'form-control', 'options' => Cake\Core\Configure::read('semester'), 'empty' => 'Select one']) ?>
                </div>
                <div class="col-xs-3">
                    <?= $this->Form->input('exam-type', ['class' => 'form-control', 'empty' => 'Select one', 'options' => Cake\Core\Configure::read('exam_type')]) ?>
                </div>
                <div class="col-xs-3">
                    <?= $this->Form->input('department_id', ['id'=>'dept','class' => 'form-control', 'empty' => 'Select one']) ?>
                </div>
                <div class="col-xs-3">
                    <div class="form-group">
                        <label for="Course">Course</label>
                        <select class="form-control" id="course" name="course_id" required="required">

                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).on("change", '#dept', function () {
        var dept_id = $(this).val();


        $.ajax({
            type: "POST",
            data: {dept_id: dept_id},
            url: "<?php echo $this->request->webroot; ?>dashboard/get_course/",
            dataType: 'json',
            success: function (json) {

                var $el = $("#course");
                $el.empty(); // remove old options
                $el.append($("<option></option>")
                    .attr("value", '').text('Please Select'));
                $.each(json, function (value, key) {
                    $el.append("<option value='" + key['id'] + "'>" + key['name'] + "</option>");
                });


            }
        });

    });


</script>