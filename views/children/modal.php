
<div class="modal" id="child-add">
    <div class="modal-dialog modal-md">
        <div class="modal-content">     
            <div class="modal-header bg-primary"> 
                <h5 class="modal-title">Add Child</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> 
            </div>
            <div class="modal-body">
                <form name="child_add_form" id="child_add_form" action="" method="post">
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="form-group">
                                <label>Firts Name *</label> 
                                <input type="text" name="cfname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Middle Name *</label> 
                                <input type="text" name="cmname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Last Name *</label> 
                                <input type="text" name="clname" class="form-control" required>
                            </div>
<!--
                            <div class="form-group">
                                <label>Family Address *</label> 
                                <input type="text" name="caddress" class="form-control" required>
                            </div>
-->
                            <div class="form-group">
                                <label>Family Address *</label> 
                                <select class="form-control select2" name="caddress" style="width: 100%;" required>
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Mother's Name *</label> 
                                <input type="text" name="motname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Mother's Educational Level *</label> 
                                <input type="text" name="motschool" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Mother's Work *</label> 
                                <input type="text" name="motwork" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Father's Name *</label> 
                                <input type="text" name="fatname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Father's Educational Level *</label> 
                                <input type="text" name="fatschool" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Father's Work *</label> 
                                <input type="text" name="fatwork" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label>Family No. *</label> 
                                <input type="text" name="cfamno" maxlength="10" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Child's No. *</label> 
                                <input type="text" name="childno" maxlength="10" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Sex *</label> 
                                <select name="cgender" class="form-control" required>
                                    <option value="select" selected disabled>Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Birthdate *</label> 
                                <input type="date" name="cbday" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Birth Weight *</label> 
                                <input type="number" max="215" min="0.5" step="0.01" name="cweight" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Date 1st Seen *</label> 
                                <input type="date" name="dfseen" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Place Delivery *</label> 
                                <input type="text" name="placedeliver" class="form-control" required>
                            </div>
                            
                        </div>
                        
                    </div>
                </form>
            </div>
            <div class="modal-footer" >
                <button type="submit" form="child_add_form" class="btn btn-primary">
                    <i class="fa fa-save"></i>
                    Save
                </button>
            </div>
        </div>
    </div> 
</div>





<div class="modal" id="update_child-add">
    <div class="modal-dialog modal-md">
        <div class="modal-content">     
            <div class="modal-header bg-primary"> 
                <h5 class="modal-title">Update Child</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> 
            </div>
            <div class="modal-body">
                <form name="update_child_add_form" id="update_child_add_form" action="" method="post">
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="form-group">
                                <label>Firts Name *</label> 
                                <input type="text" name="update_cfname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Middle Name *</label> 
                                <input type="text" name="update_cmname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Last Name *</label> 
                                <input type="text" name="update_clname" class="form-control" required>
                            </div>
<!--
                            <div class="form-group">
                                <label>Family Address *</label> 
                                <input type="text" name="caddress" class="form-control" required>
                            </div>
-->
                            <div class="form-group">
                                <label>Family Address *</label> 
                                <select class="form-control select2" name="update_caddress" style="width: 100%;" required>
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Mother's Name *</label> 
                                <input type="text" name="update_motname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Mother's Educational Level *</label> 
                                <input type="text" name="update_motschool" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Mother's Work *</label> 
                                <input type="text" name="update_motwork" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Father's Name *</label> 
                                <input type="text" name="update_fatname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Father's Educational Level *</label> 
                                <input type="text" name="update_fatschool" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Father's Work *</label> 
                                <input type="text" name="update_fatwork" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label>Family No. *</label> 
                                <input type="text" name="update_cfamno" maxlength="10" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Child's No. *</label> 
                                <input type="text" name="update_childno" maxlength="10" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Sex *</label> 
                                <select name="update_cgender" class="form-control" required>
                                    <option value="select" selected disabled>Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Birthdate *</label> 
                                <input type="date" name="update_cbday" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Birth Weight *</label> 
                                <input type="number" max="215" min="0.5" step="0.01" name="update_cweight" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Date 1st Seen *</label> 
                                <input type="date" name="update_dfseen" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Place Delivery *</label> 
                                <input type="text" name="update_placedeliver" class="form-control" required>
                            </div>
                            
                        </div>
                        
                    </div>
                </form>
            </div>
            <div class="modal-footer" >
                <button type="submit" form="update_child_add_form" class="btn btn-primary btn_update_child">
                    <i class="fa fa-save"></i>
                    Save Changes
                </button>
            </div>
        </div>
    </div> 
</div>





<div class="modal" id="brod_sis_modal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">     
            <div class="modal-header bg-danger"> 
                <h5 class="modal-title">Add Brother or Sister</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> 
            </div>
            <div class="modal-body">
                <form name="sibling_add_form" id="sibling_add_form" action="" method="post">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Sibling Name *</label> 
                                <input type="text" name="sibling_name" class="form-control" required placeholder="Sibling Full name">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Sibling Gender *</label> 
                                <select name="sibling_gender" class="form-control" required>
                                    <option value="male" selected>Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Sibling Birthday *</label> 
                                <input type="date" name="sibling_bday" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" >
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    <i class="fa fa-close"></i> 
                    Cancel
                </button>
                <button type="submit" form="sibling_add_form" class="btn btn-info">
                    <i class="fa fa-save"></i> 
                    Save
                </button>
            </div>
        </div>
    </div> 
</div>





<div class="modal" id="updatebrod_sis_modal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">     
            <div class="modal-header bg-danger"> 
                <h5 class="modal-title">Update Sibling</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> 
            </div>
            <div class="modal-body">
                <form name="sibling_update_form" id="sibling_update_form" action="" method="post">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Sibling Name *</label> 
                                <input type="text" name="updatesibling_name" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Sibling Gender *</label> 
                                <select name="updatesibling_gender" class="form-control" required>
                                    <option value="male" selected>Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Sibling Birthday *</label> 
                                <input type="date" name="updatesibling_bday" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer" >
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    <i class="fa fa-close"></i> 
                    Cancel
                </button>
                <button type="submit" form="sibling_update_form" class="btn btn-info">
                    <i class="fa fa-save"></i> 
                    Save Changes
                </button>
            </div>
        </div>
    </div> 
</div>





<div class="modal" id="nutrition_services_modal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">     
            <div class="modal-header bg-danger"> 
                <h5 class="modal-title">Updating Records</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> 
            </div>
            <div class="modal-body">
                <form name="nutrition_services_form" id="nutrition_services_form">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <b><h3 class="form-control" id="nutrition_services_label"></h3></b>
                        </div>
                        <div class="form-group">
                            <label>1st</label>
                            <input type="text" name="answer_1st" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>2nd</label>
                            <input type="text" name="answer_2nd" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>3rd</label>
                            <input type="text" name="answer_3rd" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>4th</label>
                            <input type="text" name="answer_4th" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>5th</label>
                            <input type="text" name="answer_5th" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>6th</label>
                            <input type="text" name="answer_6th" class="form-control">
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="modal-footer" >
                <button type="submit" form="nutrition_services_form" class="btn btn-info btn_nutrition_services_savechanges">
                    <i class="fa fa-save"></i> 
                    Save Changes
                </button>
            </div>
            
        </div>
    </div>
</div>
