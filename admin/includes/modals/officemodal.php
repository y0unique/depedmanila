<!-- Add Employee Modal -->
<div class="modal fade" id="addOfficeModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-gray-900" id="staticBackdropLabel">Add Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="addEmployee">

                    <div class="mb-3 row">
                        <label for="addOfficeField" class="col-md-3 form-label">Name:</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" id="employee_name" name="employee_name">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="addOfficeField" class="col-md-3 form-label">Office:</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" id="employee_office" name="employee_office">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="addOfficeField" class="col-md-3 form-label">Position:</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" id="employee_position" name="employee_position">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="addOfficeField" class="col-md-3 form-label">Department:</label>
                        <div class="col-md-9">
                            <select class="form-control" id="employee_post" name="employee_post" required>
                                <option disabled selected hidden> -- Select Office --</option>
                                <option value="chief"> OSDS </option>
                                <option value="CID"> CID </option>
                                <option value="SGOD"> SGOD </option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="addOfficeField" class="col-md-3 form-label">Email:</label>
                        <div class="col-md-9">
                            <input class="form-control" type="email" id="employee_email" name="employee_email">
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

<!-- Edit Employee Modal -->
<div class="modal fade" id="editOfficeModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-gray-900" id="staticBackdropLabel">Edit Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="editEmployee">
                    <input class="form-control" type="hidden" name="id" id="_id" value="">
                    <input class="form-control" type="hidden" name="trid" id="_trid" value="">

                    <div class="mb-3 row">
                        <label for="editOfficeField" class="col-md-3 form-label">Name:</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" id="_employee_name" name="employee_name">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="editOfficeField" class="col-md-3 form-label">Office:</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" id="_employee_office" name="employee_office">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="editOfficeField" class="col-md-3 form-label">Position:</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" id="_employee_position" name="employee_position">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="editOfficeField" class="col-md-3 form-label">Department:</label>
                        <div class="col-md-9">
                            <select class="form-control" id="_employee_post" name="employee_post" required>
                                <option disabled selected hidden> -- Select Office --</option>
                                <option value="chief"> OSDS </option>
                                <option value="CID"> CID </option>
                                <option value="SGOD"> SGOD </option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="editOfficeField" class="col-md-3 form-label">Email:</label>
                        <div class="col-md-9">
                            <input class="form-control" type="email" id="_employee_email" name="employee_email">
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

