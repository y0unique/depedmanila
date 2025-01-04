<!-- Add Schools Modal class="modal fade d-block" -->
<div class="modal fade" id="addSchoolModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary">
                <h5 class="modal-title text-gray-100" id="staticBackdropLabel">Add School</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body text-gray-900">
                <form id="addSchool" action="">

                    <div class="mb-3 row">
                        <label for="addSchoolField" class="col-md-2 form-label">School ID:</label>
                        <div class="col-md-4">
                            <input class="form-control" type="text" id="school_id" name="school_id">
                        </div>
                        
                        <label for="addSchoolField" class="col-md-2 form-label">School District:</label>
                        <div class="col-md-4">
                            <select class="form-control" id="school_district" name="school_district" required>
                                <option disabled selected hidden> <-- SELECT --> </option>
                                <?php
                                $romanNumerals = ["I", "II", "III", "IV", "V" , "VI"];
                                for ($i = 1; $i <= 6; $i++) {
                                    echo "<option value=\"" . $i . "\">" . $romanNumerals[$i - 1] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="addSchoolField" class="col-md-2 form-label">School Name:</label>
                        <div class="col-md-4">
                            <textarea class="form-control" type="text" id="school_name" name="school_name" rows="2"></textarea>
                        </div>

                        <label for="addSchoolField" class="col-md-2 form-label">School Principal:</label>
                        <div class="col-md-4">
                            <textarea class="form-control" type="text" id="school_principal" name="school_principal" rows="2"></textarea>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="addSchoolField" class="col-md-2 form-label">School Address:</label>
                        <div class="col-md-10">
                            <textarea class="form-control" type="text" id="school_address" name="school_address" rows="2"></textarea>
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
                                <option value="ELEMENTARY SCHOOLS"> Elementary School </option>
                                <option value="JUNIOR HIGH SCHOOLS"> High School </option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="addSchoolField" class="col-md-2 form-label">SHS Availability:</label>
                        <div class="col-md-4">
                            <select class="form-control" id="school_shsAvailability" name="school_shsAvailability" disabled>
                                <option value="no"> NO </option>
                                <option value="yes"> YES </option>
                            </select>
                        </div>

                        <label for="addSchoolField" class="col-md-2 form-label">SPED Availability:</label>
                        <div class="col-md-4">
                            <select class="form-control" id="school_spedAvailablity" name="school_spedAvailablity" required>    
                                <option value="no"> NO </option>
                                <option value="yes"> YES </option>
                            </select>
                        </div>
                    </div>

                    <input class="form-control" type="hidden" id="webID" value="<?php echo $_SESSION['webID'] ?>">
                    <input class="form-control" type="hidden" id="webUsername" value="<?php echo $_SESSION['webUsername'] ?>">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('school_id').addEventListener('input', function () {
        // Allow only numbers (0-9) and backspace
        this.value = this.value.replace(/[^0-9]/g, '').slice(0, 6);
    });
    document.getElementById('school_contact').addEventListener('input', function () {
        // Allow only numbers (0-9) backspace and dash and plus
        this.value = this.value.replace(/[^0-9\-\+]/g, '').slice(0, 13);
    });
    $(document).ready(function() {
        // Add an event listener to school_type dropdown
        $('#school_type').change(function() {
            var selectedType = $(this).val();

            // Enable or disable school_shsAvailability based on the selected school type
            if (selectedType === 'JUNIOR HIGH SCHOOLS') {
                $('#school_shsAvailability').prop('disabled', false);
            } else {
                // If not HighSchool, disable and reset the value
                $('#school_shsAvailability').prop('disabled', true);
                $('#school_shsAvailability').val('no');
            }
        });
    });
</script>

<!-- Edit Schools Modal class="modal fade d-block" -->
<div class="modal fade" id="editSchoolModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-gradient-info">
                <h5 class="modal-title text-gray-100" id="staticBackdropLabel">Edit School</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body text-gray-900">
                <form id="editSchool" action="">
                    <input class="form-control" type="hidden" name="_id" id="_id" value="">
                    <input class="form-control" type="hidden" name="trid" id="_trid" value="">

                    <div class="mb-3 row">
                        <label for="editSchoolField" class="col-md-2 form-label">School ID:</label>
                        <div class="col-md-4">
                            <input class="form-control" id="_school_id" name="school_id">
                        </div>

                        <label for="editSchoolField" class="col-md-2 form-label">School District:</label>
                        <div class="col-md-4">
                            <select class="form-control" id="_school_district" name="_school_district" required>
                                <option disabled selected hidden> <-- SELECT --> </option>
                                <?php
                                $romanNumerals = ["I", "II", "III", "IV", "V" , "VI"];
                                for ($i = 1; $i <= 6; $i++) {
                                    echo "<option value=\"" . $i . "\">" . $romanNumerals[$i - 1] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="editSchoolField" class="col-md-2 form-label">School Name:</label>
                        <div class="col-md-4">
                            <textarea class="form-control" type="text" id="_school_name" name="school_name"></textarea>
                        </div>
                        <label for="editSchoolField" class="col-md-2 form-label">School Principal:</label>
                        <div class="col-md-4">
                            <textarea class="form-control" type="text" id="_school_principal" name="school_principal"></textarea>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="editSchoolField" class="col-md-2 form-label">School Address:</label>
                        <div class="col-md-10">
                            <textarea class="form-control" type="text" id="_school_address" name="school_address"></textarea>
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
                        <label for="editSchoolField" class="col-md-2 form-label">School Link:</label>
                        <div class="col-md-4">
                            <input class="form-control" type="text" id="_school_link" name="school_link">
                        </div>

                        <label for="editSchoolField" class="col-md-2 form-label">School Type:</label>
                        <div class="col-md-4">
                            <select class="form-control" id="_school_type" name="school_type" required>
                                <option value="ELEMENTARY SCHOOLS"> Elementary School </option>
                                <option value="JUNIOR HIGH SCHOOLS"> High School </option>
                            </select>
                        </div>
                        
                    </div>

                    <div class="mb-3 row">
                        <label for="editSchoolField" class="col-md-2 form-label">SHS Availability:</label>
                        <div class="col-md-4">
                            <select class="form-control" id="_school_shsAvailability" name="school_shsAvailability" required>
                                <option value="no"> NO </option>
                                <option value="yes"> YES </option>
                            </select>
                        </div>

                        <label for="editSchoolField" class="col-md-2 form-label">SPED Availability:</label>
                        <div class="col-md-4">
                            <select class="form-control" id="_school_spedAvailablity" name="school_spedAvailablity" required>
                                <option value="no"> NO </option>
                                <option value="yes"> YES </option>
                            </select>
                        </div>
                    </div>

                    <input class="form-control" type="hidden" id="webID" value="<?php echo $_SESSION['webID'] ?>">
                    <input class="form-control" type="hidden" id="webUsername" value="<?php echo $_SESSION['webUsername'] ?>">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('_school_id').addEventListener('input', function () {
        // Allow only numbers (0-9) and backspace
        this.value = this.value.replace(/[^0-9]/g, '').slice(0, 6);
    });

    document.getElementById('_school_contact').addEventListener('input', function () {
        // Allow only numbers (0-9) backspace and dash and plus
        this.value = this.value.replace(/[^0-9\-\+]/g, '').slice(0, 13);
    });

    $(document).ready(function() {
        // Add an event listener to school_type dropdown
        $('#_school_type').change(function() {
            var selectedType = $(this).val();

            // Enable or disable school_shsAvailability based on the selected school type
            if (selectedType === 'JUNIOR HIGH SCHOOLS') {
                $('#_school_shsAvailability').prop('disabled', false);
            } else {
                // If not HighSchool, disable, reset the value, and trigger change event
                $('#_school_shsAvailability').prop('disabled', true);
                $('#_school_shsAvailability').val('no').trigger('change');
            }
        });

        // Trigger the change event on page load to handle the initial state
        $('#_school_type').trigger('change');
    });
</script>

<!-- Delete Schools Modal class="modal fade d-block" -->
<div class="modal fade" id="deleteSchoolsModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-gradient-danger">
                <h5 class="modal-title text-gray-100" id="staticBackdropLabel">Delete Schools</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body text-gray-900">
                <form id="deleteSchools">
                    <input class="form-control" type="hidden" name="id" id="_id_" value="">
                    <input class="form-control" type="hidden" name="trid" id="_trid_" value="">

                    <div class="mb-3 row">
                        <label for="deleteSchoolsField" class="col-md-12 form-label">School Id:</label>
                        <div class="col-md-12">
                            <input class="form-control" type="text" id="_school_id_" name="school_id" disabled>
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <label for="deleteSchoolsField" class="col-md-12 form-label">School Name:</label>
                        <div class="col-md-12">
                            <textarea class="form-control" type="text" id="_school_name_" name="school_name" rows="3" disabled></textarea>
                        </div>
                    </div>

                    <input class="form-control" type="hidden" id="webID" value="<?php echo $_SESSION['webID'] ?>">
                    <input class="form-control" type="hidden" id="webUsername" value="<?php echo $_SESSION['webUsername'] ?>">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                        <button type="submit" id="submit" class="btn btn-danger">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>