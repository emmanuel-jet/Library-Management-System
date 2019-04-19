<div class="modal fade" id="updateLoc" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="col-md-12">
                <div class="card card-box-shadow">
                    <div class="card-header" data-background-color="custom-updatebook">
                        <h4 class="title">Edit Location</h4>
                    </div>
                    <div class="card-content">
                        <form id="form-edit-location">
                            {{ csrf_field() }} 
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group label-floating">
                                        <label>Location Name</label>
                                        <input name="id" id="id" type="hidden" class="form-control">
                                        <input name="name" id="name" id="location_name" type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <div class="clearfix"></div>

                        @include('layouts.errors')

                        <p class="error text-center alert alert-danger"></p>
                        <div class="modal-footer">
                            <button type="submit" id="loc_update_done" class="btn btn-primary">Update</button>
                            <button type="button" id="update_cancel" class="btn btn-dark " data-dismiss="modal">Discard</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>