<!-- Add Social Media Modal -->
<div class="modal fade" id="addScoialMediaModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-gray-900" id="staticBackdropLabel">Add Social Media</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="addSocialMedia">

                    <div class="mb-3 row">
                        <label for="addSocialMediaField" class="col-md-3 form-label">Type:</label>
                        <div class="col-md-9">
                            <select class="form-control" id="socialMedia_type" name="socialMedia_type" required>
                                <option disabled selected hidden> -- Select Type --</option>
                                <option value="facebook"> Facebook </option>
                                <option value="youtube"> Youtube </option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="addSocialMediaField" class="col-md-3 form-label">Type Link:</label>
                        <div class="col-md-9">
                            <textarea class="form-control" type="text" id="socialMedia_link" name="socialMedia_link" rows="2"> </textarea>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="addSocialMediaField" class="col-md-3 form-label">Post Title:</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" id="socialMedia_title" name="socialMedia_title">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="addSocialMediaField" class="col-md-3 form-label">Post Link:</label>
                        <div class="col-md-9">
                            <textarea class="form-control" type="text" id="socialMedia_post" name="socialMedia_post" rows="2"> </textarea>
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

<!-- Edit SocialMedia Modal -->
<div class="modal fade" id="editScoialMediaModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-gray-900" id="staticBackdropLabel">Edit Social Media</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="editSocialMedia">
                    <input class="form-control" type="hidden" name="id" id="_id" value="">
                    <input class="form-control" type="hidden" name="trid" id="_trid" value="">

                    <div class="mb-3 row">
                        <label for="editSocialMediaField" class="col-md-3 form-label">Type:</label>
                        <div class="col-md-9">
                            <select class="form-control" id="_socialMedia_type" name="socialMedia_type" required>
                                <option disabled selected hidden> -- Select Type --</option>
                                <option value="facebook"> Facebook </option>
                                <option value="youtube"> Youtube </option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="editSocialMediaField" class="col-md-3 form-label">Type Link:</label>
                        <div class="col-md-9">
                            <textarea class="form-control" type="text" id="_socialMedia_link" name="socialMedia_link" rows="2"> </textarea>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="editSocialMediaField" class="col-md-3 form-label">Post Title:</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" id="_socialMedia_title" name="socialMedia_title">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="editSocialMediaField" class="col-md-3 form-label">Post Link:</label>
                        <div class="col-md-9">
                            <textarea class="form-control" type="text" id="_socialMedia_post" name="socialMedia_post" rows="2"> </textarea>
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

