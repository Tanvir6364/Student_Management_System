
<div class="modal fade" id="level-show" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" >Add A New Level</h5>
            </div>
            {{--<form action="{{url('/manage/course/insertLevel')}}" method="POST" id="form-level-create" >--}}
                {!! Form::open(['url'=>'/manage/course/insertLevel','method'=>'POST','id'=>'form-level-create']) !!}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <select  class="form-control" name="program_id" id="programs_id" ></select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="level" id="new_level" placeholder="level">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="description" id="description" placeholder="description">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-save-level">Save </button>
                </div>
                {!! Form::close() !!}
            {{--</form>--}}
        </div>
    </div>
</div>
