
<div class="modal" id="users-add-modal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">     
            <div class="modal-header bg-danger"> 
                <h5 class="modal-title">New Users</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                
            </div>
            <div class="modal-body">
                <form name="add_users" id="add_users">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="fname" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Middle Name</label>
                                <input type="text" name="mname" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="lname" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Birthday</label>
                                <input type="date" name="bday" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <select name="gender" class="form-control">
                                    <option value="select" disabled selected>Select Gender</option>
                                    <option class="male">Male</option>
                                    <option class="female">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Position</label>
                                <select name="position" class="form-control">
                                    <option value="select" selected disabled>Select Position</option>
                                    <option value="admin">Administrator</option>
                                    <option value="user">Users</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>ID NO.</label>
                                <input type="text" name="idno" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Contact</label>
                                <input type="text" name="contact" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Civil Status</label>
                                <select name="civstatus" class="form-control">
                                    <option value="select" selected disabled>Select Status</option>
                                    <option value="single">Single</option>
                                    <option value="married">Married</option>
                                    <option value="widowed">Widowed</option>
                                    <option value="separated">Separated</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Date Employed</label>
                                <input type="date" name="dateemployed" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nationality</label>
                                <input type="text" name="nationality" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="activestatus" class="form-control">
                                    <option value="active" selected>Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
                    
                    
            </div>
            <div class="modal-footer" >
                <button type="submit" form="add_users" class="btn btn-sm btn-success">
                    <i class="fa fa-save"></i>
                    SAVE
                </button>
            </div>
        </div>
    </div> 
</div>


<div class="modal" id="parents-info-details">
    <div class="modal-dialog modal-md">
        <div class="modal-content">     
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Records</h4>
                
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer" >
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div> 
</div>




<div class="modal" id="parents-take-action">
    <div class="modal-dialog modal-md">
        <div class="modal-content">     
            <div class="modal-header"> 
                <button type="button" class="close onclose-take-action" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Take action</h4>
                
            </div>
            <div class="modal-body">
                <h3>Take action data will appear here</h3>
            </div>
            <div class="modal-footer" >
                <button type="button" class="btn btn-primary">
                    <i class="fa fa-save"></i> 
                    Save
                </button>
            </div>
        </div>
    </div> 
</div>

