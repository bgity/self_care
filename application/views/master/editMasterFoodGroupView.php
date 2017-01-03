
<!--    ng-controller="MasterFoodGroup"-->
<div class="row" ng-controller="MasterFoodGroup">
    <div class="col-sm-12">
        <div class="sub_row">
            <a class="pull-left back_left back_none">
                <img src="<?php echo base_url('assets/admin/layout/img/Back-icon.png'); ?>" />
            </a>
            <a class="pull-right close_right" ng-click="$modalCancel()">
                <img src="<?php echo base_url('assets/admin/layout/img/Close-Button-icon.png'); ?>" />
            </a>
            <h3 class="comn_mainhead">Edit Food Group Master</h3><br/>
        </div>
    </div>
    <div class="col-md-12 col-sm-12" style="padding-bottom:50px;" >
       
        <div class="row">
            <div class="col-md-12">
                <div class="portlet box blue-hoki">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-globe"></i>Food Group Master
                        </div>
                        <div class="actions">
                            
                        </div>
                    </div>
                    <div class="portlet-body"> 
                        <form class="form-horizontal" valid-submit="processedit()" name="frmwrn" novalidate>
                            <table class="table table-striped table-bordered table-hover" id="sample_4">
                                <tr>
                                    <td>Id</td>
                                    <td><input readonly type="text" ng-model="frm.id" id="id"></td>
                                </tr>
                                <tr>
                                    <td>Name </td>
                                    <td><input type="text" ng-model="frm.name" id="name" name="name"></td>
                                </tr>
                                
                                <tr>
                                    <td>Weight Per Serving</td>
                                    <td><input type="text" ng-model="frm.weight_per_serving" id="weight_per_serving"></td>
                                </tr>
                                
                                <tr>
                                    <td>Protein</td>
                                    <td><input type="text" ng-model="frm.prot_per_serving" id="prot_per_serving"></td>
                                </tr>
                                <tr>
                                    <td>Fat</td>
                                    <td><input type="text" ng-model="frm.fat_per_serving" id="fat_per_serving"></td>
                                </tr>
                                <tr>
                                    <td>Cho</td>
                                    <td><input type="text" ng-model="frm.chol_per_serving" id="chol_per_serving"></td>
                                </tr>
                                <tr>
                                    <td>Calories</td>
                                    <td><input type="text" ng-model="frm.calo_per_serving" id="calo_per_serving"></td>
                                </tr>
                                <tr>
                                    <td>Calcium</td>
                                    <td><input type="text" ng-model="frm.calc_per_serving" id="calc_per_serving"></td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>
<!--                                    <input type="button" value="Save" ng-click="edit()"></td>-->
                                            <button type="submit" value="Submit" class="btn save_btn">Save</button>
                                </tr>
                            </table>
                        </form>
                        



                    </div>
                   
                </div>
            </div>

        </div>

    </div>	

    <!-- END MAIN CONTENT -->
     </div>
