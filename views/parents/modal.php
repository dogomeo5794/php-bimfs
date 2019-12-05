
<div class="modal" id="parents-add">
    <div class="modal-dialog modal-md">
        <div class="modal-content">     
            <div class="modal-header bg-primary"> 
                <h5 class="modal-title">Add Parent</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> 
            </div>
            <div class="modal-body">
                <form name="parents_add_form" id="parents_add_form" action="" method="post">
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="form-group">
                                <label>Family No. *</label> 
                                <input type="text" name="pfamno" maxlength="10" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Firts Name *</label> 
                                <input type="text" name="pfname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Middle Name *</label> 
                                <input type="text" name="pmname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Last Name *</label> 
                                <input type="text" name="plname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Barangay *</label> 
<!--                                <input type="text" name="paddress" class="form-control" required>-->
                                <select class="form-control select2" name="paddress" style="width: 100%;" required>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label>Birthdate *</label> 
                                <input type="date" name="pbday" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Date Pregnant *</label> 
                                <input type="date" name="preggydate" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Height (cm) *</label> 
                                <input type="number" max="215" min="80" step="0.01" name="pheight" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Blood Type *</label> 
                                <select class="form-control" name="pblood" required>
                                    <option value="select" disabled selected>Select Blood Type</option>
                                    <option value="a+">A+</option>
                                    <option value="a-">A-</option>
                                    <option value="b+">B+</option>
                                    <option value="b-">B-</option>
                                    <option value="o+">O+</option>
                                    <option value="o-">O-</option>
                                    <option value="ab+">AB+</option>
                                    <option value="ab-">AB-</option>
                                </select>
                            </div>
                        </div>
                        
                    </div>
                </form>
            </div>
            <div class="modal-footer" >
                <button type="submit" form="parents_add_form" class="btn btn-primary">
                    <i class="fa fa-save"></i>
                    Save
                </button>
            </div>
        </div>
    </div> 
</div>





<div class="modal" id="update_parents-add">
    <div class="modal-dialog modal-md">
        <div class="modal-content">     
            <div class="modal-header bg-primary"> 
                <h5 class="modal-title">Update Parent</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> 
            </div>
            <div class="modal-body">
                <form name="update_parents_add_form" id="update_parents_add_form" action="" method="post">
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="form-group">
                                <label>Family No. *</label> 
                                <input type="text" name="update_pfamno" maxlength="10" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Firts Name *</label> 
                                <input type="text" name="update_pfname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Middle Name *</label> 
                                <input type="text" name="update_pmname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Last Name *</label> 
                                <input type="text" name="update_plname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Barangay *</label> 
                                <select class="form-control select2" name="update_paddress" style="width: 100%;" required>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label>Birthdate *</label> 
                                <input type="date" name="update_pbday" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Date Pregnant *</label> 
                                <input type="date" name="update_preggydate" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Height (cm) *</label> 
                                <input type="number" max="215" min="80" step="0.01" name="update_pheight" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Blood Type *</label> 
                                <select class="form-control" name="update_pblood" required>
                                    <option value="select" disabled selected>Select Blood Type</option>
                                    <option value="a+">A+</option>
                                    <option value="a-">A-</option>
                                    <option value="b+">B+</option>
                                    <option value="b-">B-</option>
                                    <option value="o+">O+</option>
                                    <option value="o-">O-</option>
                                    <option value="ab+">AB+</option>
                                    <option value="ab-">AB-</option>
                                </select>
                            </div>
                        </div>
                        
                    </div>
                </form>
            </div>
            <div class="modal-footer" >
                <button type="submit" form="update_parents_add_form" class="btn btn-primary btn-update-parent">
                    <i class="fa fa-save"></i>
                    Save
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




<div class="modal" id="toxoid-modal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">     
            <div class="modal-header bg-danger"> 
                <h5 class="modal-title">Calendar</h5>
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                
            </div>
            <div class="modal-body bg-success">
                
                
                <div id="calendar" style="width: 100%"></div>
                
                
            </div>
            <div class="modal-footer bg-success" >
                <button type="button" class="btn btn-danger calendar_btn" id="">
                    <i class="fa fa-check"></i> 
                    OK
                </button>
            </div>
        </div>
    </div> 
</div>




<div class="modal" id="prev_preggy_modal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">     
            <div class="modal-header bg-primary"> 
                <h5 class="modal-title">Updating Records</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> 
            </div>
            <div class="modal-body">
                <form name="prev_preggy_form" id="prev_preggy_form">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <b><h3 class="form-control" id="prev_preggy_label"></h3></b>
                        </div>
                        <div class="form-group">
                            <label>Answer 1</label>
                            <select name="prev_preggy_answer1" class="form-control">
                                <option value="wala">WALA</option>
                                <option value="hu-o">HU-O</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Answer 2</label>
                            <select name="prev_preggy_answer2" class="form-control">
                                <option value="wala">WALA</option>
                                <option value="hu-o">HU-O</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Answer 3</label>
                            <select name="prev_preggy_answer3" class="form-control">
                                <option value="wala">WALA</option>
                                <option value="hu-o">HU-O</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Answer 4</label>
                            <select name="prev_preggy_answer4" class="form-control">
                                <option value="wala">WALA</option>
                                <option value="hu-o">HU-O</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="modal-footer" >
                <button type="submit" form="prev_preggy_form" class="btn btn-info btn_prev_preggy_savechanges">
                    <i class="fa fa-save"></i> 
                    Save Changes
                </button>
            </div>
            
        </div>
    </div>
</div>


<div class="modal" id="cur_problem_modal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">     
            <div class="modal-header bg-primary"> 
                <h5 class="modal-title">Updating Records</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> 
            </div>
            <div class="modal-body">
                <form name="cur_problem_form" id="cur_problem_form">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <b><h3 class="form-control" id="cur_problem_label"></h3></b>
                        </div>
                        <div class="form-group">
                            <label>Answer 1</label>
                            <select name="cur_problem_answer1" class="form-control">
                                <option value="wala">WALA</option>
                                <option value="hu-o">HU-O</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Answer 2</label>
                            <select name="cur_problem_answer2" class="form-control">
                                <option value="wala">WALA</option>
                                <option value="hu-o">HU-O</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="modal-footer" >
                <button type="submit" form="cur_problem_form" class="btn btn-info btn_cur_problem_savechanges">
                    <i class="fa fa-save"></i> 
                    Save Changes
                </button>
            </div>
            
        </div>
    </div>
</div>



<div class="modal" id="trimester_modal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">     
            <div class="modal-header bg-primary"> 
                <h5 class="modal-title">Updating Records</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> 
            </div>
            <div class="modal-body">
                <form name="trimester_form" id="trimester_form">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <b><h3 class="form-control">"<span id="trimester_label"></span>"</h3></b>
                        </div>
                        <div class="form-group">
                            <label>Answer 2 or 3</label>
                            <div id="trimester_div1"></div>
                        </div>
                        <div class="form-group">
                            <label>Answer 4</label>
                            <div id="trimester_div2"></div>
                        </div>
                        <div class="form-group">
                            <label>Answer 5</label>
                            <div id="trimester_div3"></div>
                        </div>
                        <div class="form-group">
                            <label>Answer 6</label>
                            <div id="trimester_div4"></div>
                        </div>
                        <div class="form-group">
                            <label>Answer 7</label>
                            <div id="trimester_div5"></div>
                        </div>
                        <div class="form-group">
                            <label>Answer 8</label>
                            <div id="trimester_div6"></div>
                        </div>
                        <div class="form-group">
                            <label>Answer 9</label>
                            <div id="trimester_div7"></div>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="modal-footer" >
                <button type="submit" form="trimester_form" class="btn btn-info btn_trimester_savechanges">
                    <i class="fa fa-save"></i> 
                    Save Changes
                </button>
            </div>
            
        </div>
    </div>
</div>



<div class="modal" id="trimester_action_modal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">     
            <div class="modal-header bg-primary"> 
                <h5 class="modal-title">Updating Records</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> 
            </div>
            <div class="modal-body">
                <form name="trimester_action_form" id="trimester_action_form">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <b><h3 class="form-control">"<span id="trimester_action_label"></span>"</h3></b>
                        </div>
                        <div class="form-group">
                            <label>Action in answer 2 or 3</label>
                            <div id="trimester_action_div1"></div>
                        </div>
                        <div class="form-group">
                            <label>Action in answer 4</label>
                            <div id="trimester_action_div2"></div>
                        </div>
                        <div class="form-group">
                            <label>Action in answer 5</label>
                            <div id="trimester_action_div3"></div>
                        </div>
                        <div class="form-group">
                            <label>Action in answer 6</label>
                            <div id="trimester_action_div4"></div>
                        </div>
                        <div class="form-group">
                            <label>Action in answer 7</label>
                            <div id="trimester_action_div5"></div>
                        </div>
                        <div class="form-group">
                            <label>Action in answer 8</label>
                            <div id="trimester_action_div6"></div>
                        </div>
                        <div class="form-group">
                            <label>Action in answer 9</label>
                            <div id="trimester_action_div7"></div>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="modal-footer" >
                <button type="submit" form="trimester_action_form" class="btn btn-info btn_trimester_action_savechanges">
                    <i class="fa fa-save"></i> 
                    Save Changes
                </button>
            </div>
            
        </div>
    </div>
</div>




<div class="modal" id="give_birth_modal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">     
            <div class="modal-header bg-danger"> 
                <h5 class="modal-title">Give Birth</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> 
            </div>
            <div class="modal-body">
                <form name="give_birth_form" id="give_birth_form">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Petsa sang pag bun-ag *</label>
                            <input type="date" name="date_delivery" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Oras sang pag bun-ag *</label>
                            <input type="time" name="time_delivery" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Buhi ang Bata *</label>
                            <select name="birth_status" class="form-control">
                                <option value="hu-o" selected>HU-O</option>
                                <option value="indi">INDI</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Maayo ang Panglawason Sang Bata *</label>
                            <select name="birth_condition" class="form-control">
                                <option value="hu-o" selected>HU-O</option>
                                <option value="indi">INDI</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kabug-aton sang bata (Gramo) *</label>
                            <input type="number" name="birth_weight" min="1" value="5" step="1" class="form-control" placeholder="gramo">
                        </div>
                        
                    </div>
                </form>
            </div>
            
            <div class="modal-footer" >
                <button type="submit" form="give_birth_form" class="btn btn-info btn-give-birth">
                    <i class="fa fa-save"></i> 
                    Save
                </button>
            </div>
            
        </div>
    </div>
</div>

