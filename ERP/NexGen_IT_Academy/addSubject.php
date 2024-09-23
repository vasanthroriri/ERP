<!-- Modal -->
<div class="modal fade" id="addSubjectModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name="frmAddStudent" id="addSubject" enctype="multipart/form-data">
                <input type="hidden" name="hdnAction" value="addSubject">
                <div class="modal-header">
                    <h4 class="modal-title" id="staticBackdropLabel">Add Subject</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-3">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group pb-3">
                                <label for="sub_name" class="form-label"><b>Subject Name</b></label>
                                <input type="text" class="form-control" placeholder="Enter Subject Name" name="sub_name" id="sub_name" required >
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group pb-3">
                                <label for="sub_duration" class="form-label"><b>Subject Duration</b></label>
                                <input type="text" class="form-control" placeholder="Enter Subject Duration" name="sub_duration" id="sub_duration" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
