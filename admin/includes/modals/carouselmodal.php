<!-- Add Carousel Modal -->
<div class="modal fade" id="addCarouselModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-gray-900" id="staticBackdropLabel">Add Carousel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="addCarousel">

                    <div class="mb-3 row">
                        <label for="addCarouselField" class="col-md-3 form-label">Name:</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" id="image_name" name="image_name">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="addCarouselField" class="col-md-3 form-label">Title:</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" id="image_title" name="image_title">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="addCarouselField" class="col-md-3 form-label">Description:</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" id="image_description" name="image_description">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="addCarouselField" class="col-md-3 form-label">Type:</label>
                        <div class="col-md-9">
                            <select class="form-control" id="image_type" name="image_type" required>
                                <option disabled selected hidden> -- Select Type --</option>
                                <option value="carousel"> Carousel </option>
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

<!-- Edit Carousel Modal -->
<div class="modal fade" id="editCarouselModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-gray-900" id="staticBackdropLabel">Edit Carousel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form action="editCarousel">
                    <input class="form-control" type="hidden" name="id" id="_id" value="">
                    <input class="form-control" type="hidden" name="trid" id="_trid" value="">

                    <div class="mb-3 row">
                        <label for="editCarouselField" class="col-md-3 form-label">Name:</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" id="_image_name" name="image_name">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="editCarouselField" class="col-md-3 form-label">Title:</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" id="_image_title" name="image_title">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="editCarouselField" class="col-md-3 form-label">Description:</label>
                        <div class="col-md-9">
                            <input class="form-control" type="text" id="_image_description" name="image_description">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="editCarouselField" class="col-md-3 form-label">Type:</label>
                        <div class="col-md-9">
                            <select class="form-control" id="_image_type" name="image_type" required>
                                <option disabled selected hidden> -- Select Type --</option>
                                <option value="carousel"> Carousel </option>
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

