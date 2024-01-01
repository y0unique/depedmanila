<!-- Add Schools Modal class="modal fade d-block" -->
<div class="modal fade" id="addSchoolModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-gray-900" id="staticBackdropLabel">Add School</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body text-gray-900">
                <form id="addSchool" action="">

                    <div class="mb-3 row">
                        <label for="addSchoolField" class="col-md-2 form-label">School ID:</label>
                        <div class="col-md-4">
                            <input class="form-control" type="number" id="school_id" name="school_id">
                        </div>

                        
                        <label for="addSchoolField" class="col-md-2 form-label">School Name:</label>
                        <div class="col-md-4">
                            <input class="form-control" type="text" id="school_name" name="school_name">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="addSchoolField" class="col-md-2 form-label">School District:</label>
                        <div class="col-md-4">
                            <input class="form-control" type="number" id="school_district" name="school_district">
                        </div>

                        <label for="addSchoolField" class="col-md-2 form-label">School Principal:</label>
                        <div class="col-md-4">
                            <input class="form-control" type="text" id="school_principal" name="school_principal">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="addSchoolField" class="col-md-2 form-label">School Address:</label>
                        <div class="col-md-10">
                        <textarea class="form-control" type="text" id="school_address" name="school_address" rows="1"></textarea>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="addSchoolField" class="col-md-2 form-label">School Contact:</label>
                        <div class="col-md-4">
                            <input class="form-control" type="text" id="school_contact" name="school_contact">
                        </div>

                        <label for="addSchoolField" class="col-md-2 form-label">School Email:</label>
                        <div class="col-md-4">
                            <input class="form-control" type="text" id="school_email" name="school_email">
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <label for="addSchoolField" class="col-md-2 form-label">School Link:</label>
                        <div class="col-md-4">
                            <input class="form-control" type="text" id="school_link" name="school_link">
                        </div>

                        <label for="addSchoolField" class="col-md-2 form-label">School Type:</label>
                        <div class="col-md-4">
                            <select class="form-control" id="school_type" name="school_type" required>
                                <option disabled selected hidden></option>
                                <option value="Elementary"> Elementary School </option>
                                <option value="HighSchool"> High School </option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="addSchoolField" class="col-md-2 form-label">SHS Availability:</label>
                        <div class="col-md-4">
                            <select class="form-control" id="school_shsAvailability" name="school_shsAvailability" required>
                                <option disabled selected hidden></option>
                                <option value="yes"> YES </option>
                                <option value="no"> NO </option>
                            </select>
                        </div>

                        <label for="addSchoolField" class="col-md-2 form-label">SPED Availability:</label>
                        <div class="col-md-4">
                            <select class="form-control" id="school_spedAvailablity" name="school_spedAvailablity" required>
                                <option disabled selected hidden></option>
                                <option value="yes"> YES </option>
                                <option value="no"> NO </option>
                            </select>
                        </div>
                    </div>

                    <input class="form-control" type="hidden" id="" value="<?php echo "id"//echo $_SESSION[''] ?>">
                    <input class="form-control" type="hidden" id="" value="<?php echo "id"//echo $_SESSION[''] ?>">
                </form>
            </div>

            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Schools Modal class="modal fade d-block" -->
<div class="modal fade" id="editSchoolsModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-gray-900" id="staticBackdropLabel">Edit School</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body text-gray-900">
                <form id="editSchools">
                    <input class="form-control" type="hidden" name="id" id="_id" value="">
                    <input class="form-control" type="hidden" name="trid" id="_trid" value="">

                    <div class="mb-3 row">
                        <label for="editSchoolField" class="col-md-2 form-label">ID:</label>
                        <div class="col-md-4">
                            <input class="form-control" type="text" id="_schooltbl_id" name="schooltbl_id" readonly></input>
                        </div>
                        <label for="editSchoolField" class="col-md-2 form-label">School ID:</label>
                        <div class="col-md-4">
                            <input class="form-control" type="number" id="_school_id" name="school_id">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="editSchoolField" class="col-md-2 form-label">School Name:</label>
                        <div class="col-md-4">
                            <input class="form-control" type="text" id="_school_name" name="school_name">
                        </div>

                        <label for="editSchoolField" class="col-md-2 form-label">School District:</label>
                        <div class="col-md-4">
                            <input class="form-control" type="number" id="_school_district" name="school_district">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="editSchoolField" class="col-md-2 form-label">School Principal:</label>
                        <div class="col-md-4">
                            <input class="form-control" type="text" id="_school_principal" name="school_principal">
                        </div>

                        <label for="editSchoolField" class="col-md-2 form-label">School Address:</label>
                        <div class="col-md-4">
                            <input class="form-control" type="text" id="_school_address" name="school_address"></input>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="editSchoolField" class="col-md-2 form-label">School Contact:</label>
                        <div class="col-md-4">
                            <input class="form-control" type="text" id="_school_contact" name="school_contact">
                        </div>

                        <label for="editSchoolField" class="col-md-2 form-label">School Email:</label>
                        <div class="col-md-4">
                            <input class="form-control" type="text" id="_school_email" name="school_email">
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <label for="editSchoolField" class="col-md-2 form-label">School Type:</label>
                        <div class="col-md-4">
                            <select class="form-control" id="_school_type" name="school_type" required>
                                <option disabled selected hidden></option>
                                <option value="Elementary"> Elementary School </option>
                                <option value="HighSchool"> High School </option>
                            </select>
                        </div>
                        
                        <label for="editSchoolField" class="col-md-2 form-label">School Link:</label>
                        <div class="col-md-4">
                            <input class="form-control" type="text" id="_school_link" name="school_link">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="editSchoolField" class="col-md-2 form-label">SHS Availability:</label>
                        <div class="col-md-4">
                            <select class="form-control" id="_school_shsAvailability" name="school_shsAvailability" required>
                                <option disabled selected hidden></option>
                                <option value="yes"> YES </option>
                                <option value="no"> NO </option>
                            </select>
                        </div>

                        <label for="editSchoolField" class="col-md-2 form-label">SPED Availability:</label>
                        <div class="col-md-4">
                            <select class="form-control" id="_school_spedAvailablity" name="school_spedAvailablity" required>
                                <option disabled selected hidden></option>
                                <option value="yes"> YES </option>
                                <option value="no"> NO </option>
                            </select>
                        </div>
                    </div>

                    <input class="form-control" type="hidden" id="" value="<?php echo "id"//echo $_SESSION[''] ?>">
                    <input class="form-control" type="hidden" id="" value="<?php echo "id"//echo $_SESSION[''] ?>">
                </form>
            </div>

            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>