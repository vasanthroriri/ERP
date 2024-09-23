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
                            <div class="card-header px-4 py-3">
                                <h5 class="mb-0">Bootstrap Validation</h5>
                            </div>
                            <div class="card-body p-4">
                                <form class="row g-3 needs-validation" id="candidatesForm" novalidate>
                                    <div class="col-md-6">
                                        <label for="bsValidation1" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="bsValidation1" placeholder="First Name" value="John" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="bsValidation2" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="bsValidation2" placeholder="Last Name" value="Doe" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bsValidation3" class="form-label">Phone</label>
                                        <input type="text" class="form-control" id="bsValidation3" placeholder="Phone" required>
                                        <div class="invalid-feedback">
                                            Please enter a valid phone number.
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bsValidation4" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="bsValidation4" placeholder="Email" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid email.
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bsValidation5" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="bsValidation5" placeholder="Password" required>
                                        <div class="invalid-feedback">
                                            Please choose a password.
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="bsValidation6" name="radio-stacked" required>
                                                <label class="form-check-label" for="bsValidation6">Male</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="bsValidation7" name="radio-stacked" required>
                                                <label class="form-check-label" for="bsValidation7">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bsValidation8" class="form-label">DOB</label>
                                        <input type="date" class="form-control" id="bsValidation8" placeholder="Date of Birth" required>
                                        <div class="invalid-feedback">
                                            Please select date.
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bsValidation9" class="form-label">Country</label>
                                        <select id="bsValidation9" class="form-select" required>
                                            <option selected disabled value>...</option>
                                            <option>One</option>
                                            <option>Two</option>
                                            <option>Three</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid country.
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="bsValidation10" class="form-label">City</label>
                                        <input type="text" class="form-control" id="bsValidation10" placeholder="City" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid city.
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="bsValidation11" class="form-label">State</label>
                                        <select id="bsValidation11" class="form-select" required>
                                            <option selected disabled value>Choose...</option>
                                            <option>One</option>
                                            <option>Two</option>
                                            <option>Three</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid state.
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="bsValidation12" class="form-label">Zip</label>
                                        <input type="text" class="form-control" id="bsValidation12" placeholder="Zip" required>
                                        <div class="invalid-feedback">
                                            Please enter a valid zip code.
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="bsValidation13" class="form-label">Address</label>
                                        <textarea class="form-control" id="bsValidation13" placeholder="Address ..." rows="3" required></textarea>
                                        <div class="invalid-feedback">
                                            Please enter a valid address.
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="bsValidation14" required>
                                            <label class="form-check-label" for="bsValidation14">Agree to terms and conditions</label>
                                            <div class="invalid-feedback">
                                                You must agree before submitting.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="d-md-flex d-grid align-items-center gap-3">
                                            <button type="submit" id="saveCandidate" class="btn btn-primary px-4">Submit</button>
                                            <button type="reset" class="btn btn-light px-4">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div><!--end Modal Fade-->

<!-- edit madule -->
<div class="modal fade" id="editcandidateModal" tabindex="-1" aria-labelledby="addClientModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg"> <!-- Added modal-dialog and modal-lg for large modal -->
        <div class="modal-content"> <!-- Added modal-content -->
            <div class="modal-body">
                <!-- Form Starts Here -->
                <div class="row">
                    <div class="col-xl-12 mx-auto">
                        <div class="card">
                            <div class="card-header px-4 py-3">
                                <h5 class="mb-0">Edit Candidate</h5>
                            </div>
                            <div class="card-body p-4">
                                <form class="row g-3 needs-validation" id="editCandidatesForm" novalidate>
                                    <div class="col-md-6">
                                        <label for="editFirstName" class="form-label">First Name</label>
                                        <input type="text" class="form-control" name="editFirstName" id="editFirstName" placeholder="First Name" value="John" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="editLastName" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" name="editLastName" id="editLastName" placeholder="Last Name" value="Doe" required>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="editPhone" class="form-label">Phone</label>
                                        <input type="text" class="form-control" name="editPhone" id="editPhone" placeholder="Phone" required>
                                        <div class="invalid-feedback">
                                            Please enter a valid phone number.
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="editEmail" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="editEmail" id="editEmail" placeholder="Email" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid email.
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="editPassword" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="editPassword" id="editPassword" placeholder="Password" required>
                                        <div class="invalid-feedback">
                                            Please choose a password.
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="genderMale" name="gender" required>
                                                <label class="form-check-label" for="bsValidation6">Male</label>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" id="genderFemale" name="gender" required>
                                                <label class="form-check-label" for="bsValidation7">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="dob" class="form-label">DOB</label>
                                        <input type="date" class="form-control" name="dob" id="dob" placeholder="Date of Birth" required>
                                        <div class="invalid-feedback">
                                            Please select date.
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="country" class="form-label">Country</label>
                                        <select id="country" name="country" class="form-select" required>
                                            <option selected disabled value>...</option>
                                            <option>One</option>
                                            <option>Two</option>
                                            <option>Three</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid country.
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="editCity" class="form-label">City</label>
                                        <input type="text" class="form-control" id="editCity" placeholder="City" required>
                                        <div class="invalid-feedback">
                                            Please provide a valid city.
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="editState" class="form-label">State</label>
                                        <select id="editState" name="editState" class="form-select" required>
                                            <option selected disabled value>Choose...</option>
                                            <option>One</option>
                                            <option>Two</option>
                                            <option>Three</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a valid state.
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="editPincode" class="form-label">Pincode</label>
                                        <input type="text" class="form-control" name="editPincode" id="editPincode" placeholder="Pincode" required>
                                        <div class="invalid-feedback">
                                            Please enter a valid zip code.
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="editAddress" class="form-label">Address</label>
                                        <textarea class="form-control" id="editAddress" placeholder="Address ..." rows="3" required></textarea>
                                        <div class="invalid-feedback">
                                            Please enter a valid address.
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="agreeCheck" id="agreeCheck" required>
                                            <label class="form-check-label" for="agreeCheck">Agree to terms and conditions</label>
                                            <div class="invalid-feedback">
                                                You must agree before submitting.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="d-md-flex d-grid align-items-center gap-3">
                                            <button type="submit" id="editSaveCandidate" class="btn btn-primary px-4">Submit</button>
                                            <button type="reset" class="btn btn-light px-4">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div><!--end Modal Fade-->