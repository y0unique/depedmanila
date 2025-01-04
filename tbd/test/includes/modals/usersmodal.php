<!-- Add Employee Modal -->
<div class="modal fade" id="addUserModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-gray-900" id="staticBackdropLabel">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="addUser">

                    <div class="mb-3 row">
                        <label for="addUserField" class="col-md-3 form-label">Username:</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" id="user_username" name="user_username">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="addUserField" class="col-md-3 form-label">Email:</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" id="user_email" name="user_email">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="addUserField" class="col-md-3 form-label">User Type:</label>
                        <div class="col-md-9">
                            <select class="form-control" id="user_type" name="user_type" required>
                                <option disabled selected hidden></option>
                                <option value="trainee"> Trainee </option>
                                <option value="admin"> Admin </option>
                                <option value="super admin"> Super Admin </option>
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

<!-- Edit Employee Modal -->
<div class="modal fade" id="editUserModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-gray-900" id="staticBackdropLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="editEmployee">
                    <input class="form-control" type="hidden" name="id" id="_id" value="">
                    <input class="form-control" type="hidden" name="trid" id="_trid" value="">
                    <div class="mb-3 row">
                        <label for="editUserField" class="col-md-3 form-label">ID:</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" id="_user_id" name="user_id" readonly>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="editUserField" class="col-md-3 form-label">Username:</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" id="_user_username" name="user_username">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="editUserField" class="col-md-3 form-label">Email:</label>
                        <div class="col-md-9">
                            <input class="form-control" type="email" id="_user_email" name="user_email">
                        </div>
                    </div>
                    
                    <?php
                    if($_SESSION['webType']== "superadmin"){?>
                    <div class="mb-3 row">
                        <label for="addUserField" class="col-md-3 form-label">User Type:</label>
                        <div class="col-md-9">
                            <select class="form-control" id="_user_type" name="user_type" required>
                                <option disabled selected hidden></option>
                                <option value="trainee"> Trainee </option>
                                <option value="employee"> Employee </option>
                                <option value="admin"> Admin </option>
                                <option value="superadmin"> Super Admin </option>
                            </select>
                        </div>
                    </div>
                    
                    <?php }?>
                    <div class="mb-3 row">
                        <label for="editUserField" class="col-md-3 form-label">Password:</label>
                        <div class="col-md-9">
                            <input class="form-control" type="password" id="_user_password" name="user_password" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="editUserField" class="col-md-3 form-label">Status:</label>
                        <div class="col-md-9">
                            <select class="form-control" id="_user_status" name="user_status" required>
                                <option disabled selected hidden></option>
                                <option value="active"> Active </option>
                                <option value="inactive"> Deactivate </option>
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

