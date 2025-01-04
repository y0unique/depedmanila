<div class="modal fade" id="accountInfoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary">
                <h5 class="modal-title  text-gray-100" id="exampleModalLabel">Hello <?php echo $_SESSION['webUsername'];?></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 class="modal-title text-gray-900 mb-3" id="exampleModalLabel">Account Information</h5>
                <form action="" id="accountInfo">

                    <div class="mb-3 row">
                        <label for="UserField" class="col-md-3 form-label">Username:</label>
                        <div class="col-md-9">
                            <input class="form-control form-control-account" value="<?php echo $_SESSION['webUsername'];?>" readonly>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="UserField" class="col-md-3 form-label">Email:</label>
                        <div class="col-md-9">
                            <input class="form-control form-control-account" value="<?php echo $_SESSION['webEmail'];?>" readonly>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="UserField" class="col-md-3 form-label">User Type:</label>
                        <div class="col-md-9">
                            <input class="form-control form-control-account" value="<?php echo $_SESSION['webType'];?>" readonly>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="UserField" class="col-md-3 form-label">Password:</label>
                        <div class="col">
                            <input class="form-control form-control-account" type="password" value="<?php echo $_SESSION['webPassword'];?>" readonly>
                        </div>
                    </div>


                    <div class="mb-3 row">
                        <label for="UserField" class="col-md-3 form-label">Department:</label>
                        <div class="col-md-9">
                            <input class="form-control form-control-account" value="<?php echo $_SESSION['webDepartment'];?>" readonly>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="UserField" class="col-md-3 form-label">Status:</label>
                        <div class="col-md-9">
                            <input class="form-control form-control-account" value="<?php echo $_SESSION['webStatus'];?>" readonly>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button id="changeInfo" class="btn btn-info" type="button">Edit</button>
                        <button class="btn btn-danger" type="button" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="accountEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary">
                <h5 class="modal-title  text-gray-100" id="exampleModalLabel">Hello <?php echo $_SESSION['webUsername'];?></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <h5 class="modal-title text-gray-900 mb-3" id="exampleModalLabel">Account Information</h5>
                <form id="accountEdit">
                    <input class="form-control" type="hidden" name="id1" id="id1" value="">
                    <input class="form-control" type="hidden" name="trid1" id="trid1" value="">

                    
                    <div class="mb-3 row">
                        <label for="UserField" class="col-md-3 form-label">ID:</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" id="userid" name="userid" readonly>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="UserField" class="col-md-3 form-label">Username:</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" id="username" name="username" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="UserField" class="col-md-3 form-label">Email:</label>
                        <div class="col-md-9">
                            <input class="form-control" type="email" id="useremail" name="useremail" required>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="UserField" class="col-md-3 form-label">Current Password:</label>
                                
                        <div class="input-group col">
                            <input class="form-control form-control-user" type="password" id="currpassword" name="currpassword" required>
                            <div class="input-group-append">
                                <button type="button" id="show_password" class="btn btn-outline-secondary btn-user btn-block">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="UserField" class="col-md-3 form-label">New Password:</label>

                        <div class="input-group col">
                            <input class="form-control" type="password" id="newuserpassword" name="newuserpassword" required>
                            <div class="input-group-append">
                                <button type="button" id="show_password1" class="btn btn-outline-secondary btn-user btn-block">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="UserField" class="col-md-3 form-label">Retype New Password:</label>
                        <div class="input-group col">
                            <input class="form-control" type="password" id="reuserpassword" name="reuserpassword" required>
                            <div class="input-group-append">
                                <button type="button" id="show_password2" class="btn btn-outline-secondary btn-user btn-block">
                                    <i class="fa fa-eye"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" id="submit" >Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"  >Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
.form-control-account[readonly] {
    background-color: #fff;
    color: #495057;
    cursor: not-allowed; 
}
.form-control-account[readonly]:focus {
    -webkit-user-select: none; 
    -moz-user-select: none; 
    -ms-user-select: none; 
    user-select: none;
    outline: none; 
}
</style>

<script>
    $(document).ready(function() {
        $('#show_password').click(function() {
            var passwordField = $('#currpassword');
            var fieldType = passwordField.attr('type');
            
            // Toggle password visibility
            if (fieldType === 'password') {
                passwordField.attr('type', 'text');
                $(this).html('<i class="fa fa-eye-slash"></i>');
            } else {
                passwordField.attr('type', 'password');
                $(this).html('<i class="fa fa-eye"></i>');
            }
        });
        $('#show_password1').click(function() {
            var passwordField = $('#newuserpassword');
            var fieldType = passwordField.attr('type');
            
            // Toggle password visibility
            if (fieldType === 'password') {
                passwordField.attr('type', 'text');
                $(this).html('<i class="fa fa-eye-slash"></i>');
            } else {
                passwordField.attr('type', 'password');
                $(this).html('<i class="fa fa-eye"></i>');
            }
        });
        $('#show_password2').click(function() {
            var passwordField = $('#reuserpassword');
            var fieldType = passwordField.attr('type');
            
            // Toggle password visibility
            if (fieldType === 'password') {
                passwordField.attr('type', 'text');
                $(this).html('<i class="fa fa-eye-slash"></i>');
            } else {
                passwordField.attr('type', 'password');
                $(this).html('<i class="fa fa-eye"></i>');
            }
        });
    });
    $(document).ready(function() {
        $('#changeInfo').on('click', function(event) {
            var id = <?php echo $_SESSION['webID']; ?>;
            $('#accountInfoModal').modal('hide');
            $('#accountEditModal').modal('show');
            fetchUserData(id);
        });

        function fetchUserData(userId) {
            $.ajax({
                url: 'includes/fetchdata/accountfetch.php',
                type: 'POST',
                dataType: 'json',
                data: { user_id: userId },
                success: function(response) {
                    if(response.error) {
                        console.error(response.error);
                        return;
                    }
                    $('#userid').val(response.user_id);
                    $('#username').val(response.user_username);
                    $('#useremail').val(response.user_email);
                    $('#accountEditModal').modal('show');
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
    });

    //update current user
    $(document).on('submit', '#accountEdit', function(e) {
        e.preventDefault();
        var user_id = $('#userid').val();
        var user_username= $('#username').val();
        var user_email= $('#useremail').val();
        var currpassword= $('#currpassword').val();
        var newuserpassword= $('#newuserpassword').val();
        var reuserpassword= $('#reuserpassword').val();

        var id = $('#id1').val();
        var trid = $('#trid1').val();
        if (user_id != '' && user_username != '' && user_email != '' && currpassword != '' && newuserpassword != '' && reuserpassword != '') {
            
        $.ajax({
            url: "includes/codes/accountcode.php",
            type: "post",
            data: {
                id:id,
                user_id:user_id,
                user_username:user_username,
                user_email:user_email,
                currpassword:currpassword,
                newuserpassword:newuserpassword,
                reuserpassword:reuserpassword,
                updateaccountuser: true
            },

            success: function(data) {
                var json = JSON.parse(data);
                var updateAccount = json.updateAccount;
                if (updateAccount == 'true') {
                    
                    alertify.set('notifier','position', 'top-right');
                    alertify.success(json.message);
                    alertify.warning('You will be logged out');
                    setTimeout(function(){ location.href = "database/logoutcode.php" }, 500);

                    

                    
                    $("#editUserModal").modal("hide"); 

                } else if(updateAccount == 'false'){
                    alertify.set('notifier','position', 'top-right');
            	    alertify.warning(json.message);
                }else{
                    alert('Error communicating with the database');
                }
            }
        });
        } else {
            alert('Fill all the required fields');
        }
    });
</script>