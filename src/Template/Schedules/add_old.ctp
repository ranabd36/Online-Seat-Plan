<?php
use Cake\Core\Configure;

?>

<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Schedules'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Rooms'), ['controller' => 'Rooms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Room'), ['controller' => 'Rooms', 'action' => 'add']) ?></li>
    </ul>
</nav>-->
<div class="row">
    <div class="schedules form medium-8 columns content">
        <?= $this->Form->create($schedule) ?>
        <fieldset>
            <legend><?= __('Add Schedule') ?></legend>
            <?php
            echo $this->Form->input('semester', ['id' => 'semester', 'options' => Configure::read('semester'), 'empty' => 'Please select']);
            echo $this->Form->input('exam_type', ['id' => 'exam_type', 'options' => Configure::read('exam_type'), 'empty' => 'Please select']);
            ?>
            <div class="input select required">
                <label for="slot">Slot</label>
                <select id="slot" name="slot" required="required">

                </select>
            </div>

            <label for="date">Date</label>
            <input id="datepicker" name="date" required="required" type="text">

            <?php
            //echo $this->Form->input('date', ['type' => 'date','id'=>"date"]);

            echo $this->Form->input('course_id', ['id' => 'course', 'options' => $courses, 'empty' => 'Please select', 'required' => 'required']);
            ?>
            <div class="input select required">
                <label for="section">Section</label>
                <select id="section" name="section_id" required="required">

                </select>
            </div>

            <?php
            echo $this->Form->input('room_id', ['id' => 'rooms', 'options' => $rooms, 'empty' => 'Please select', 'required' => 'required']);
            ?>
            <div class="input select required">
                <label for="column">Column</label>
                <select id="column" name="column_id" required="required">

                </select>
            </div>
            <p id="student" style="color: darkred"></p>
            <?php echo $this->Form->input('number_of_student', ['required' => 'required']);

            ?>


        </fieldset>
        <?= $this->Form->button(__('Save')) ?>
        <?= $this->Form->end() ?>
    </div>

    <div class="schedules form medium-4 columns content">
        <div class="course">
            <table id="course_detail">

            </table>

        </div>

        <div class="Room">
            <table id="room_detail">


            </table>

        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).on("change", '#course', function () {
        var course_id = $(this).val();


        $.ajax({
            type: "POST",
            data: {course_id: course_id},
            url: "<?php echo $this->request->webroot; ?>schedules/ajax/section",
            dataType: 'json',
            success: function (json) {

                var $el = $("#section");
                $el.empty(); // remove old options
                $el.append($("<option></option>")
                    .attr("value", '').text('Please Select'));
                $.each(json, function (value, key) {
                    $el.append("<option value='" + key['id'] + "'>" + key['name'] + "</option>");
                });


            }
        });

    });
    $(document).on("change", '#rooms', function () {
        var room_id = $(this).find('option:selected').val();


        $.ajax({
            type: "POST",
            data: {room_id: room_id},
            url: "<?php echo $this->request->webroot; ?>schedules/ajax/room",
            dataType: 'json',
            success: function (json) {

                var $el = $("#column");
                $el.empty(); // remove old options
                $el.append($("<option></option>")
                    .attr("value", '').text('Please Select'));
                $.each(json, function (value, key) {
                    $el.append($("<option></option>").attr("value", key['id']).text(key['name']));
                });


            }
        });
        var semester = $('#semester').find('option:selected').val();
        var exam_type = $('#exam_type').find('option:selected').val();
        var slot = $('#slot').find('option:selected').val();
        var date = $('#datepicker').val();

        $.ajax({
            type: "POST",
            data: {room_id: room_id,slot: slot, date: date,semester: semester, exam_type: exam_type},
            url: "<?php echo $this->request->webroot; ?>schedules/getRoomInfo",
            dataType: 'json',
            success: function (room) {


                var room_data = '<tr> <th colspan="3">ROOM ' + $(this).find('option:selected').text()
                    + '</th></tr>'
                    + '<tr><th>Column</th><th>Course</th><th>Number Of Student</th></tr>';

                for (var i = 0; i < Object.keys(room).length; i++) {
                    var course ="-";
                    if(room[i]['course']!=null)
                    {
                        course=room[i]['course'] + "<br>" + room[i]['code'] + "<br>" + room[i]['section'];
                    }

                    var student ="-";
                    if(room[i]['student']!=null)
                    {
                        student=room[i]['student'];
                    }

                    room_data += "<tr><td>" + room[i]['column'] + "</td><td>" + course +  "</td><td>" + student + "</td></tr>";
                }


                $('#room_detail').html(room_data);


            }
        });

    });

    $(document).on("change", '#exam_type', function () {
        var exam_type = $(this).val();


        $.ajax({
            type: "POST",
            data: {exam_type: exam_type},
            url: "<?php echo $this->request->webroot; ?>schedules/ajax/exam_type",
            dataType: 'json',
            success: function (json) {

                var $el = $("#slot");
                $el.empty(); // remove old options
                $el.append($("<option></option>")
                    .attr("value", '').text('Please Select'));
                $.each(json, function (value, key) {
                    $el.append($("<option></option>").attr("value", value).text(key));
                });


            }
        });

    });

    $(document).on("change", '#section', function () {
        var section_id = $(this).val();

        var semester = $('#semester').find('option:selected').val();
        var exam_type = $('#exam_type').find('option:selected').val();
        $.ajax({
            type: "POST",
            data: {section_id: section_id, exam_type: exam_type, semester: semester},
            url: "<?php echo $this->request->webroot; ?>schedules/getRemainStudent",
            dataType: 'json',
            success: function (json) {
                var status = "Incomplete";
                if (json[2] == 1) {
                    status = "Complete";
                }
                var table_row = '<tr><td colspan="2">' + $('#course').find('option:selected').text() + '</td> </tr>'
                    + '<tr><td>Section</td><td>' + $('#section').find('option:selected').text() + '</td></tr>'
                    + '<tr><td>Total Student</td><td>' + json[0] + '</td></tr>'
                    + '<tr><td>Seat Assign</td><td>' + json[1] + '</td></tr>'
                    + '<tr><td>Remaining</td><td>' + (json[0] - json[1]) + '</td></tr>'
                    + '<tr><td>Status</td><td>' + status + '</td></tr>';
                $('#course_detail').html(table_row);


            }
        });

        $(document).on("change", '#column', function () {
            var column_id = $(this).val();


            $.ajax({
                type: "POST",
                data: {column_id: column_id},
                url: "<?php echo $this->request->webroot; ?>schedules/ajax/column",
                dataType: 'json',
                success: function (json) {
                    $text="Max Number of student " + json;

                   $('#student').html($text);

                }
            });

        });

    });
</script>