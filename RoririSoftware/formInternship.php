<!-- Modal -->
<div class="modal fade" id="addClientModal" tabindex="-1" aria-labelledby="addClientModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"> <!-- Added modal-dialog and modal-lg for large modal -->
        <div class="modal-content"> <!-- Added modal-content -->
            <div class="modal-header">
                <h5 class="modal-title" id="addClientModalLabel">Add Client</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form Starts Here -->
                <div class="row">
                    <div class="col-xl-12 mx-auto">
                        <div class="card">
                           
                            <div class="card-body p-4">
                                <form class="row g-3 needs-validation" id="candidatesForm" novalidate>
                                    <div class="col-md-6">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="hidden" name="hdnAction" value="addCandidate">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name"  required>
                                        <div class="invalid-feedback">
                                        Please enter a valid Name
                                        </div>
                                    </div>

                                    <div class="col-md-6">
										<label for="course" class="form-label">Course Name</label>
										<select id="course" name="course" class="form-select" required>
											<option value="" selected>Choose Course</option>
											<option>PHP</option>
											<option>React</option>
											<option>Python</option>
										</select>
                                        <div class="invalid-feedback">
                                            Please enter a valid Course Name.
                                        </div>
									</div>
                                    <div class="col-md-6">
                                        <label for="fees" class="form-label">Fees</label>
                                        <input type="number" class="form-control" name="fees" id="fees" placeholder="Phone" required>
                                        <div class="invalid-feedback">
                                            Please enter a valid Fees.
                                        </div>

                                    <div class="col-md-6">
                                        <label for="durationNo" class="form-label">Duration Number</label>
                                        <input type="text" class="form-control" name="durationNo" id="durationNo" placeholder="Duration No" required>
                                        <div class="invalid-feedback">
                                            Please enter a valid Duration number.
                                        </div>
                                    </div>

                                    <div class="col-md-6">
										<label for="duration" class="form-label">Duration</label>
										<select id="duration" name="duration" class="form-select" required>
											<option value="" selected>Choose year</option>
											<option value="Day">Day</option>
											<option value="Week">Week</option>
											<option value="Month">Month</option>
                                            <option value="Year">Year</option>
										</select>
                                        <div class="invalid-feedback">
                                            Please enter a valid Duration.
                                        </div>
									</div>

                                    <div class="col-md-6">
                                        <label for="joiningData" class="form-label">joining Date</label>
                                        <input type="date" class="form-control" name="joiningData" id="joiningData" placeholder="Joining Date" required>
                                        <div class="invalid-feedback">
                                            Please select date.
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                    <label class="form-label">Gender</label>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="male" name="gender" required>
                                                <label class="form-check-label" for="male">Male</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="female" name="gender" required>
                                                <label class="form-check-label" for="female">Female</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="dob" class="form-label">DOB</label>
                                        <input type="date" class="form-control" name="dob" id="dob" placeholder="Date of Birth" required>
                                        <div class="invalid-feedback">
                                            Please select date.
                                        </div>
                                    </div>
                                   
                                    <div class="col-md-6">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" required>
                                        <div class="invalid-feedback">
                                            Please enter a valid phone number.
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid email.
                                        </div>
                                    </div>



                                    <div class="col-md-12">
                                        <label for="address" class="form-label">Address</label>
                                        <textarea class="form-control" name="address" id="address" placeholder="Address ..." rows="3" required></textarea>
                                        <div class="invalid-feedback">
                                            Please enter a valid address.
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="dob" class="form-label">DOB</label>
                                        <input type="date" class="form-control" name="dob" id="dob" placeholder="Date of Birth" required>
                                        <div class="invalid-feedback">
                                            Please select date.
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="image" class="form-label">Image</label>
                                        <input class="form-control"  type="file" name="image" id="image">
                                        <div class="invalid-feedback">
                                            Please select Image.
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="username" class="form-label">User Name</label>
                                        <input type="password" class="form-control" name="username" id="username" placeholder="Username" required>
                                        <div class="invalid-feedback">
                                            Please choose a Username.
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                        <div class="invalid-feedback">
                                            Please choose a password.
                                        </div>
                                    </div>
                                    
                                         
                                    
                                 
                                    <div class="col-md-12">
                                        <div class="d-md-flex d-grid align-items-center gap-3">
                                            <button type="submit" id="saveCandidate" class="btn btn-primary px-4">Submit</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!--end Modal Fade-->

<!-- edit madule -->

<div class="modal fade" id="editcandidateModal" tabindex="-1" aria-labelledby="addClientModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"> <!-- Added modal-dialog and modal-lg for large modal -->
        <div class="modal-content"> <!-- Added modal-content -->
            <div class="modal-header">
                <h5 class="modal-title" id="addClientModalLabel">Edit Candidate</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form Starts Here -->
                <div class="row">
                    <div class="col-xl-12 mx-auto">
                        <div class="card">
                           
                            <div class="card-body p-4">
                                <form class="row g-3 needs-validation" id="editCandidatesForm" novalidate>

                                   <div class="col-md-6">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="nameEdit" id="nameEdit" placeholder="Enter Name"  required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phoneEdit" class="form-label">Phone</label>
                                        <input type="text" class="form-control" id="phoneEdit" placeholder="phoneEdit" required>
                                        <div class="invalid-feedback">
                                            Please enter a valid phone number.
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="emailEdit" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="emailEdit" id="emailEdit" placeholder="Email" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid email.
                                        </div>
                                    </div>
                                     <div class="col-md-6">
                                        <label for="usernameEdit" class="form-label">User Name</label>
                                        <input type="password" class="form-control" name="usernameEdit" id="usernameEdit" placeholder="Username" required>
                                        <div class="invalid-feedback">
                                            Please choose a Username.
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="passwordEdit" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="passwordEdit" id="passwordEdit" placeholder="Password" required>
                                        <div class="invalid-feedback">
                                            Please choose a password.
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                    <label class="form-label">Gender</label>
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="maleEdit" name="genderEdit" required>
                                                <label class="form-check-label" for="maleEdit">Male</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="femaleEdit" name="genderEdit" required>
                                                <label class="form-check-label" for="femaleEdit">Female</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="dobEdit" class="form-label">DOB</label>
                                        <input type="date" class="form-control" name="dobEdit" id="dobEdit" placeholder="Date of Birth" required>
                                        <div class="invalid-feedback">
                                            Please select date.
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <label for="addressEdit" class="form-label">Address</label>
                                        <textarea class="form-control" name="addressEdit" id="addressEdit" placeholder="Address ..." rows="3" required></textarea>
                                        <div class="invalid-feedback">
                                            Please enter a valid address.
                                        </div>
                                    </div>
                                    
                                  
                                    <div class="col-md-12">
                                        <div class="d-md-flex d-grid align-items-center gap-3">
                                            <button type="submit" id="editSaveCandidate" class="btn btn-primary px-4">Submit</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- //view page  -->


