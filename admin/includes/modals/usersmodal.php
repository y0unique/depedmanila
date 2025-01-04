<!-- Add Employee Modal -->
<div class="modal fade" id="addUserModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary">
                <h5 class="modal-title text-gray-100" id="staticBackdropLabel">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body text-gray-900">
                <form id="addUser" action="">
                    <div class="mb-3 row">
                        <label for="addUserField" class="col-md-3 form-label">Username:</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" id="user_username" name="user_username">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="addUserField" class="col-md-3 form-label">Email:</label>
                        <div class="col-md-9">
                            <input class="form-control" type="email" id="user_email" name="user_email">
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

                    <div class="mb-3 row">
                        <label for="addUserField" class="col-md-3 form-label">User Department:</label>
                        <div class="col-md-9">
                            <select class="form-control" id="user_department" name="user_department" required>
                                <option disabled selected hidden></option>
                                <option value="ICT"> ICT </option>
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

<!-- Edit Employee Modal -->
<div class="modal fade" id="editUserModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-gradient-info">
                <h5 class="modal-title text-gray-900" id="staticBackdropLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body text-gray-900">
                <form id="editEmployee" >
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
                                <option value="trainee"> Trainee </option>
                                <option value="admin"> Admin </option>
                                <option value="superadmin"> Super Admin </option>
                            </select>
                        </div>
                    </div>
                    
                    <?php }?>
                    <div class="mb-3 row">
                        <label for="editUserField" class="col-md-3 form-label">Password:</label>
                        <div class="col-md-6">
                            <input class="form-control" type="text" id="_user_password" name="user_password" readonly>
                        </div>
                        <div class="col">
                            <button id="resetPassword" type="button" class="btn btn-danger"><i class="fas fa-undo"></i></button>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="editUserField" class="col-md-3 form-label">Department:</label>
                        <div class="col-md-9">
                            <select class="form-control" id="_user_department" name="user_department" required>
                                <option disabled selected hidden></option>
                                <option value="ICT"> ICT </option>
                            </select>
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
    document.getElementById('resetPassword').addEventListener('click', function() {
        document.getElementById('_user_password').value = 'sdomanilaq1';
    });
</script>

<!-- Delete User Modal -->
<div class="modal fade" id="deleteUserModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header bg-gradient-danger">
                <h5 class="modal-title text-gray-100" id="staticBackdropLabel">Delete Isuances</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body text-gray-900">
                <form id="deleteUser">
                    <input class="form-control" type="hidden" name="id" id="_id_" value="">
                    <input class="form-control" type="hidden" name="trid" id="_trid_" value="">

                    <div class="mb-3 row">
                        <label for="deleteUserField" class="col-md-12 form-label">User ID:</label>
                        <div class="col-md-12">
                            <input class="form-control" type="text" id="_user_id_" name="user_id" disabled>
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <label for="deleteUserField" class="col-md-12 form-label">Username:</label>
                        <div class="col-md-12">
                            <textarea class="form-control" type="text" id="_user_username_" name="user_username" rows="2" disabled></textarea>
                        </div>
                    </div>

                    <input class="form-control" type="hidden" id="webID1" value="<?php echo $_SESSION['webID'] ?>">
                    <input class="form-control" type="hidden" id="webUsername1" value="<?php echo $_SESSION['webUsername'] ?>">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                        <button type="submit" id="submit" class="btn btn-danger">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>