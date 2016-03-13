<?php
use Cake\Core\Configure;
use Cake\Routing\Router;
?>
<h2 class="page-header">Schedule Assign</h2>
<div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li>
                    <a href="<?php echo Router::url('/', true); ?>schedules/">List Schedule</a>
                </li>
                <li class="active">
                    <a data-toggle="tab" href="<?php echo Router::url('/', true); ?>schedules/add">Add Schedule</a>
                </li>

            </ul>
            <div class="tab-content" style="min-height:460px">
                <div class="row">
                    <div class="col-md-6">
                        <?= $this->Form->create($schedule) ?>
                        <?php
                        echo $this->Form->input('semester', ['class'=>'form-group form-control','id' => 'semester', 'options' => Configure::read('semester'), 'empty' => 'Please select']);
                        echo $this->Form->input('exam_type', ['class'=>'form-group form-control','id' => 'exam_type', 'options' => Configure::read('exam_type'), 'empty' => 'Please select']);
                        ?>
                        <div class="form-group">
                            <label for="slot">Slot</label>
                            <select class="form-control" id="slot" name="slot" required="required">

                            </select>
                        </div>

                        <label for="date">Date</label>
                        <input class="form-control" id="datepicker" name="date" required="required" type="text">

                        <?php
                        //echo $this->Form->input('date', ['type' => 'date','id'=>"date"]);

                        echo $this->Form->input('course_id', ['class'=>'form-group form-control','id' => 'course', 'options' => $courses, 'empty' => 'Please select', 'required' => 'required']);
                        ?>
                        <div class="form-group">
                            <label for="section">Section</label>
                            <select class="form-control" id="section" name="section_id" required="required">

                            </select>
                        </div>

                        <?php
                        echo $this->Form->input('room_id', ['class'=>'form-group form-control','id' => 'rooms', 'options' => $rooms, 'empty' => 'Please select', 'required' => 'required']);
                        ?>
                        <div class="form-group">
                            <label for="column">Column</label>
                            <select class="form-control" id="column" name="column_id" required="required">

                            </select>
                        </div>
                        <p id="student" style="color: darkred"></p>
                        <?php echo $this->Form->input('number_of_student', ['class'=>'form-group form-control','required' => 'required']);

                        ?>
                        <button class="btn btn-primary" type="submit">Save</button>
                        <?= $this->Form->end() ?>


                    </div>
                    <div class="col-md-6">
                        <div class="course">
                            <table class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info" id="course_detail">

                            </table>

                        </div>

                        <div class="Room">
                            <table class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info" id="room_detail">


                            </table>

                        </div>
                    </div>


                </div>
            </div>
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