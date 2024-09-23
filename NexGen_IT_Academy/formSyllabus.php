<!-- Modal -->
<div class="modal fade" id="addsyllabusModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form name="frmAddStudent" id="addSyllabusTrack" enctype="multipart/form-data">
                <input type="hidden" name="hdnAction" value="addSyllabusTrack">
                <input type="hidden" name="app_id" id="app_id">
                <input type="hidden" name="traineeId" id="traineeId">
                <div class="modal-header">
                    <h4 class="modal-title" id="staticBackdropLabel">Change Status</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-3">
                    <div class="row">
                        
                      <div class="col-sm-12">
                           <div class="form-group pb-3">
                                <label for="syllabus_status" class="form-label"><b>Syllabus status</b></label>
                                <select class="form-control" id="syllabus_status" name="syllabus_status">
                                        <option value="">----Work Not Started----</option> 
                                        <option value="inprogress">In Progress</option> 
                                         <option value="Complete">Completed</option> 

                                    </select>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" id="submitSyllabusbtn" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
