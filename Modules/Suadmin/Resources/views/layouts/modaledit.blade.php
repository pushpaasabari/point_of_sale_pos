<div class="modal fade" id="studentedit" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Student Edit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- <p>One fine body&hellip;</p> --}}
                <form name="studentEditForm" id="studentEditForm" action="{{url('student_post')}}" method="post"
                    enctype="multipart/form-data" onsubmit="return validateeditForm()">
                    {{ csrf_field() }}
                    <div class="form-group offset-2 col-8">
                        <label>Name:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="hidden" name="stud_id" id="stud_id" class="form-control">
                            <input type="text" name="student_name_edit" id="student_name_edit" class="form-control"
                                required>
                        </div>
                    </div>
                    <div class="form-group offset-2 col-8">
                        <label>Subject:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-server"></i></span>
                            </div>
                            <input type="text" name="subject_edit" id="subject_edit" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group offset-2 col-8">
                        <label>Mark:</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-bar-chart"></i></span>
                            </div>
                            <input type="number" name="mark_edit" id="mark_edit" class="form-control" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>

            </div>
            </form>
        </div>
    </div>
</div>