
<script type="text/javascript">
    /////========================================//////////////

    $('#academic_id').on('change',function(e){
        showClassInfo()
    })

    $('#level_id').on('change',function(e){
        showClassInfo()
    })
    $('#shift_id').on('change',function(e){
        showClassInfo()
    })
    $('#time_id').on('change',function(e){
        showClassInfo()
    })
    $('#batch_id').on('change',function(e){
        showClassInfo()
    })
    $('#group_id').on('change',function(e){
        showClassInfo()
    })


    /////////////////////////////////////////////////////////////////slect class///////


    ////////////////////////////////////

    $("#form-view-class #program_id").on('change',function(e){

        var program_id =$(this).val();
        var level = $('#level_id');
        $(level).empty();
        $.get("{{url('/manage/course/showLevel')}}",{program_id:program_id},function(data){
            $.each(data,function(i,l){
                $(level).append($("<option/>",{
                    value : l.level_id,
                    text  : l.level,

                }));
            });
            showClassInfo()

        });
    });




    //////////////////////////============================select classPopup//////////////////

    $('#show-class-info').on('click',function(e){
        showClassInfo();

        e.preventDefault();
        $('#academic-choose').modal('show');
    });


    //////////////////////////////////////////////// addClass in table
    function showClassInfo(){
        var data = $('#form-view-class').serialize();
        $.get("{{ url('/manage/course/classInfo')}}",data,function(data){
            $('#add-class-info').empty().append(data);
            $('td#hidden').addClass('hidden');
            $('th#hidden').addClass('hidden');

            MergeCommonRows($('#table-class-info'))


        })

    }

    /////////////////////




    ////////////////////////////////////////////////////call class///////////


    function MergeCommonRows(table){

        var firstColumnBrakes =[];
        $.each(table.find('th'),function(i){
            var previous = null,cellToExtend =null ,rowspan = 1;
            table.find("td:nth-child("+ i +")").each(function(index ,e){
                var jthis= $(this),content = jthis.text();
                if (previous == content && content!== "" && $.inArray(index, firstColumnBrakes) === -1) {
                    jthis.addClass('hidden');
                    cellToExtend.attr("rowspan", (rowspan=rowspan+1));


                }
                else{
                    if (i == 1) firstColumnBrakes.push(index);
                    rowspan=1;
                    previous = content;
                    cellToExtend=jthis;


                }

            });
        });
        $('td.hidden').remove();
    }
</script>