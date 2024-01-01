<!-- Add Files Modal -->
<div class="modal fade" id="addFilesModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-gray-900" id="staticBackdropLabel">Add Files</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="addFiles">

                    <div class="mb-3 row">
                        <label for="addFilesField" class="col-md-2 form-label">File Type:</label>
                        <div class="col-md-10">
                            <select class="form-control" id="file_type" name="file_type" required>
                                <option disabled selected hidden></option>
                                <option value="downloadable"> Downloadables </option>
                                <option value="transparency"> Transparencies </option>
                             </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="addFilesField" class="col-md-2 form-label">Title:</label>
                        <div class="col-md-10">
                            <textarea class="form-control" type="text" id="file_title" name="file_title" rows="2"></textarea>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="addFilesField" class="col-md-2 form-label">Link:</label>
                        <div class="col-md-10">
                            <textarea class="form-control" type="text" id="file_link" name="file_link" rows="2"></textarea>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="addFilesField" class="col-md-2 form-label">Publish Date:</label>
                        <div class="col-md-4">
                            <input class="form-control" type="date" id="file_publishDate" name="file_publishDate">
                        </div>
                        <label for="addFilesField" class="col-md-2 form-label">Closing Date:</label>
                        <div class="col-md-4">
                            <input class="form-control" type="date" id="file_closingDate" name="file_closingDate">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="addFilesField" class="col-md-2 form-label">Awarded To:</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" id="awarded_to" name="awarded_to">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="addFilesField" class="col-md-2 form-label">Reference Number:</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" id="reference_number" name="reference_number">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="addFilesField" class="col-md-2 form-label">Procurement Mode:</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" id="procurement_mode" name="procurement_mode">
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

<script>
    //disable file_publishDate, file_closingDate, awarded_to, reference_number, procurement_mode if file_type is downloadable
    $(document).ready(function() {
        $('#file_type').change(function() {
            if ($(this).val() == 'downloadable') {
                $('#file_publishDate').prop('disabled', true);
                $('#file_closingDate').prop('disabled', true);
                $('#awarded_to').prop('disabled', true);
                $('#reference_number').prop('disabled', true);
                $('#procurement_mode').prop('disabled', true);
            } else {
                $('#file_publishDate').prop('disabled', false);
                $('#file_closingDate').prop('disabled', false);
                $('#awarded_to').prop('disabled', false);
                $('#reference_number').prop('disabled', false);
                $('#procurement_mode').prop('disabled', false);
            }
        });
    });
</script>

<!-- Edit Files Modal -->
<div class="modal fade" id="editFilesModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-gray-900" id="staticBackdropLabel">Edit Files</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="editFiles">
                    <input class="form-control" type="hidden" name="id" id="_id" value="">
                    <input class="form-control" type="hidden" name="trid" id="_trid" value="">

                    <div class="mb-3 row">
                        <label for="addFilesField" class="col-md-2 form-label">File Type:</label>
                        <div class="col-md-10">
                            <select class="form-control" id="_file_type" name="file_type" required>
                                <option disabled selected hidden></option>
                                <option value="downloadable"> Downloadables </option>
                                <option value="transparency"> Transparencies </option>
                             </select>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="editFilesField" class="col-md-2 form-label">Title:</label>
                        <div class="col-md-10">
                            <textarea class="form-control" type="text" id="_file_title" name="file_title" rows="2"></textarea>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="editFilesField" class="col-md-2 form-label">Link:</label>
                        <div class="col-md-10">
                            <textarea class="form-control" type="text" id="_file_link" name="file_link" rows="2"></textarea>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="editFilesField" class="col-md-2 form-label">Publish Date:</label>
                        <div class="col-md-4">
                            <input class="form-control" type="date" id="_file_publishDate" name="file_publishDate">
                        </div>

                        <label for="editFilesField" class="col-md-2 form-label">Closing Date:</label>
                        <div class="col-md-4">
                            <input class="form-control" type="date" id="_file_closingDate" name="file_closingDate">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="editFilesField" class="col-md-2 form-label">Awarded To:</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" id="_awarded_to" name="awarded_to">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="editFilesField" class="col-md-2 form-label">Reference Number:</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" id="_reference_number" name="reference_number">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="editFilesField" class="col-md-2 form-label">Procurement Mode:</label>
                        <div class="col-md-10">
                            <input class="form-control" type="text" id="_procurement_mode" name="procurement_mode">
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

<script>
    //disable _file_publishDate, _file_closingDate, _awarded_to, _reference_number, _procurement_mode if _file_type is downloadable on load of editFilesModal
    $(document).ready(function() {
        $('#_file_type').change(function() {
            if ($(this).val() == 'downloadable') {
                $('#_file_publishDate').prop('disabled', true);
                $('#_file_closingDate').prop('disabled', true);
                $('#_awarded_to').prop('disabled', true);
                $('#_reference_number').prop('disabled', true);
                $('#_procurement_mode').prop('disabled', true);
            } else {
                $('#_file_publishDate').prop('disabled', false);
                $('#_file_closingDate').prop('disabled', false);
                $('#_awarded_to').prop('disabled', false);
                $('#_reference_number').prop('disabled', false);
                $('#_procurement_mode').prop('disabled', false);
            }
        });
    });
</script>