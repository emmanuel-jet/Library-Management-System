<div class="modal fade" id="UpdateMember" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="col-md-12">
                <div class="card card-box-shadow">
                    <div class="card-header" data-background-color="orange">
                        <h4 class="title">Update Member Information</h4>
                    </div>
                    <div class="card-content"> 
                        <form id="form-update_member">
                                        {{ csrf_field() }}
                                        <input type="hidden" id="member_id">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Member Name</label>
                                                    <input type="text" name="member_name" id="member_name" class="form-control" required>
                                                </div>
                                            </div>  

																						<div class="col-md-6">
																							<div class="form-group">
																									<label class="control-label">Matric Number</label>
																									<input type="text" name="member_mat_no" id="member_mat_no" class="form-control">
																							</div>
																						</div>   
                                        </div>    
																				<div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Faculty</label>
                                                    <input type="phone" name="member_fac" id="member_fac" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Department</label>
                                                    <input type="text" name="member_dept" id="member_dept" class="form-control">
                                                </div>
                                            </div> 
                                        </div>  
                                          <div class="row">
																						<div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">E-Mail Address</label>
                                                    <input type="email" name="member_email" id="member_email" class="form-control" required>
                                                </div>
                                            </div> 
																				

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Mobile Number</label>
                                                    <input type="phone" name="member_contact" id="member_contact" class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </form>
                        <div class="clearfix"></div>

                        @include('layouts.errors')

                        <p class="error text-center alert alert-danger"></p>
                        <div class="modal-footer">
                            <button type="submit" id="member_update_done" class="btn btn-primary">Update</button>
                            <button type="button" id="member_update_cancel" class="btn btn-dark " data-dismiss="modal">Discard</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>