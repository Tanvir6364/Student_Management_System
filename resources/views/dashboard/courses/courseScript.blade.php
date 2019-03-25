<script>
    showClassInfo();
    //===========================Date Picker=====================


    //========================================================
    $("#form-create-class #program_id").on('change', function (e) {

        var program_id = $(this).val();
        var level = $('#level_id');
        $(level).empty();
        $.get("{{url('/manage/course/showLevel')}}", {program_id: program_id}, function (data) {
            $.each(data, function (i, l) {
                $(level).append($("<option/>", {
                    value: l.level_id,
                    text: l.level,

                }));
            });
            showClassInfo();
        });
        $(this).trigger('reset');
    });




    $('#academic_id').on('change', function (e) {
        showClassInfo()
    });

    $('#level_id').on('change', function (e) {
        showClassInfo()
    });
    $('#shift_id').on('change', function (e) {
        showClassInfo()
    });
    $('#time_id').on('change', function (e) {
        showClassInfo()
    });
    $('#batch_id').on('change', function (e) {
        showClassInfo()
    });
    $('#group_id').on('change', function (e) {
        showClassInfo()
    });

    //=================== Level=====================================================

    //=============
    $('#form-level-create').on('submit', function (e) {
        e.preventDefault();
        var data = $(this).serialize();
        var url = $(this).attr('action');
        $.post(url, data, function (data) {

            $('#level_id').append($("<option/>", {
                value: data.level_id,
                text: data.level

            }));
            $('#programs_id').val("");

            $('#new_level').val("");
            $('#description').val("");

        });
        $(this).trigger('reset');

    });


    $('#add-more-level').on('click', function () {

        var programs = $('#program_id option');
        var program = $('#form-level-create').find('#programs_id');
        $(program).empty();
        $.each(programs, function (i, pro) {
            $(program).append($("<option/>", {
                value: $(pro).val(),
                text: $(pro).text(),

            }));
        });
        $('#level-show').modal('show');

    });

    //================================academic=========
    $('#add-more-academic').on('click', function () {
        $('#academic-year-show').modal();
    });

    $('.btn-save-academic').on('click', function () {
        var academic = $('#new_academic').val();
        $.post("{{ url('/manage/course/insertAcademic') }}", {academic: academic}, function (data) {
            $('#academic_id').append($("<option/>", {
                value: data.academic_id,
                text: data.academic
            }));
            $('#new_academic').val("");
        });
        $(this).trigger('reset');
    });
    //===================================Program=================
    $('#add-more-program').on('click', function () {
        $('#program-show').modal();
    });


    $('.btn-save-program').on('click', function () {
        var program = $('#new_program').val();
        var description = $('#new_description').val();
        $.post("{{ url('/manage/course/insertProgram') }}", {
            program: program,
            description: description
        }, function (data) {
            $('#program_id').append($("<option/>", {
                value: data.program_id,
                text: data.program
            }));
            $('#new_program').val("");
            $('#new_description').val("");
        });
        $(this).trigger('reset');
    });
    //===========================================Shift=============
    $('#add-more-shift').on('click', function () {
        $('#shift-show').modal();
    });
    //////////

    $('.btn-save-shift').on('click', function () {
        var shift = $('#new_shift').val();
        $.post("{{url('/manage/course/insertShift')}}", {shift: shift}, function (data) {
            $('#shift_id').append($("<option/>", {
                value: data.shift_id,
                text: data.shift
            }));
            $('#new_shift').val("");
        });
        $(this).trigger('reset');
    });


    //===================================Time=====================
    $('#add-more-time').on('click', function (e) {

        $('#time-show').modal('show');
    });
    //=======
    $('#form-time-create').on('submit', function (e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.post("{{ url('/manage/course/insertTime') }}", data, function (data) {
            $('#time_id').append($("<option/>", {
                value: data.time_id,
                text: data.time
            }));
            $('#new_time').val("");
        });
        $(this).trigger('reset');
    });
    //===================================Batch=============
    $('#add-more-batch').on('click', function (e) {

        $('#batch-show').modal('show');
    });
    $('#form-batch-create').on('submit', function (e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.post("{{ url('/manage/course/insertBatch') }}", data, function (data) {

            $('#batch_id').append($("<option/>", {
                value: data.batch_id,
                text: data.batch

            }));
        });
        $(this).trigger('reset');
    });
    //================================Group==========================
    $('#add-more-group').on('click', function (e) {

        $('#group-show').modal('show');
    });

    $('#form-group-create').on('submit', function (e) {
        e.preventDefault();
        var data = $(this).serialize();
        $.post("{{ url('/manage/course/insertGroup') }}", data, function (data) {

            $('#group_id').append($("<option/>", {
                value: data.group_id,
                text: data.group

            }));
        });

        $(this).trigger('reset');

    });
    //===================================Add Class================
    /*$('#form-create-class').on('submit', function (e) {
        e.preventDefault();
        var data = $(this).serialize();

       /!* var url = $(this).attr('action');*!/
        $.post("{{url('/manage/course/createMyclass')}}", data, function (data) {
                showClassInfo($(data.academic_id));
            });
            $(this).trigger('reset');

        });*/
    $('#form-create-class').on('submit', function (e) {
        e.preventDefault();
        var data = $(this).serialize();

        var url = $(this).attr('action');
        $.post(url, data, function (data) {
            showClassInfo(data.academic_id);
        });
        $(this).trigger('reset');

    });

    function showClassInfo() {
        var data = $('#form-create-class').serialize();
        //var data= $('#academic_id').val();
        $.get("{{url('/manage/course/classInfo') }}", data, function (data) {
            $('#add-class-info').empty().append(data);
            MergeCommonRows($('#table-class-info'));
        })

    }

    //========================================Call Class==================================
    function MergeCommonRows(table) {

        var firstColumnBrakes = [];
        $.each(table.find('th'), function (i) {
            var previous = null, cellToExtend = null, rowspan = 1;
            table.find("td:nth-child(" + i + ")").each(function (index, e) {
                var jthis = $(this), content = jthis.text();
                if (previous == content && content !== "" && $.inArray(index, firstColumnBrakes) === -1) {
                    jthis.addClass('hidden');
                    cellToExtend.attr("rowspan", (rowspan = rowspan + 1));
                }
                else {
                    if (i == 1) firstColumnBrakes.push(index);
                    rowspan = 1;
                    previous = content;
                    cellToExtend = jthis;
                }
            });
        });
        $('td.hidden').remove();
    }

    //=================================Delete Class===========================
    $(document).on('click', '.del-class', function (e) {
        class_id = $(this).val();
        $.post("{{ url('/manage/course/deleteClass') }}", {class_id: class_id}, function (data) {
            showClassInfo($('#academic_id').val());

        });
    });
    //=================================Edit Class=====================
    $(document).on('click', '#class-edit', function (data) {
        var class_id = $(this).data('id');
        $.get("{{url('/manage/course/editClass')}}", {class_id: class_id}, function (data) {
            $('#academic_id').val(data.academic_id);
            $('#level_id').val(data.level_id);
            $('#time_id').val(data.time_id);
            $('#shift_id').val(data.shift_id);
            $('#batch_id').val(data.batch_id);
            $('#group_id').val(data.group_id);
            $('#start_date').val(data.start_date);
            $('#end_date').val(data.end_date);
            $('#class_id').val(data.class_id);
        });
    });
    //===================================Update Class=================================
    $('.update-class').on('click', function (e) {
        e.preventDefault();
        var data = $('#form-create-class').serialize(data);
        $.post("{{url('/manage/course/updateClass')}}", data, function (data) {
            showClassInfo(data.academic_id);
        });
    });

</script>