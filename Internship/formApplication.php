
        <!-- Popup Form Modal -->
        <div class="modal fade" id="applicationModal" tabindex="-1" aria-labelledby="applicationModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="applicationModalLabel">Application Assignment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Form Content -->
                        <form id="applicationForm">
                            <div class="mb-3">
                                <label for="appli_name" class="form-label">Application Name</label>
                                <input type="hidden"  id="appli_id" name="appli_id" required>
                                <input type="text" class="form-control" id="appli_name" name="appli_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="appli_description" class="form-label">Application Description</label>
                                <textarea class="form-control" id="appli_description" name="appli_description" rows="3" required></textarea>
                            </div> 
                            
                            <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="submitFormBtn">Submit</button>
                    </div>
                            
                        </form>
                    </div>
                   
                </div>
            </div>
        </div>