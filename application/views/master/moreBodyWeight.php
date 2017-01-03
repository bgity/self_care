
<div class="row" >
    <div class="col-sm-12">
           
                   <div class="table-responsive">
                   <table class="table table-striped table-bordered table-hover" >
                            <tr>
                                    <th> Gender	
                                    </th>
                                    <th>
                                     Height in feet 
                                    </th>
                                    <th>
                                        Height in cm 
                                    </th>
                                    <th>
                                        Height in inches
                                    </th>
                                    <th>
                                        Height in sq. meter
                                    </th>
                                    
                                    
                                </tr>
                                   <tr>
                                    <td>
                                        {{frm.gender}}
                                    </td>

                                    <td>
                                        {{frm.height_in_feet}}
                                    </td>
                                    <td>
                                        {{frm.height_in_cm}}
                                    </td>
                                    <td>
                                        {{frm.height_in_inches}} 
                                    </td>
                                    <td>
                                        {{frm.height_in_meter}}
                                    </td>
                                    
                                </tr>
                        </table>        
                        <table class="table table-striped table-bordered table-hover" > 
                            <thead>
                                <tr>
                                    <th>
                                       AGE LIMIT
                                    </th>
                                    <th>
                                        I.B.W. FOR SMALL FRAME
                                    </th>
                                    <th>
                                        I.B.W. FOR MEDIUM FRAME
                                    </th>
                                     <th>
                                        I.B.W. FOR LARGE FRAME 
                                    </th>
                                     	
                                   
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>16-30</td>
                                    <td>
                                        {{frm.bw_small_frame}} - {{frm.bw_small_frame_maxval}}
                                    </td>

                                    <td>
                                        {{frm.bw_medium_frame}} - {{frm.bw_medium_frame_maxval}}
                                    </td>

                                    <td>
                                        {{frm.bw_large_frame}} - {{frm.bw_large_frame_maxval}}
                                    </td>

                                    
                                </tr>
                                <tr>
                                    <td>31-40</td>
                                    <td>
                                        {{frm.bw_small_frame--1.5 | number:2}} - {{frm.bw_small_frame_maxval--1.5 | number:2}}
                                    </td>

                                    <td>
                                        {{frm.bw_medium_frame--1.5 | number:2}} - {{frm.bw_medium_frame_maxval--1.5 | number:2}}
                                    </td>

                                    <td>
                                        {{frm.bw_large_frame--1.5 | number:2}} - {{frm.bw_large_frame_maxval--1.5 | number:2}}
                                    </td>

                                    
                                </tr>
                                <tr>
                                    <td>41-50</td>
                                    <td>
                                        {{frm.bw_small_frame--3 | number:2}} - {{frm.bw_small_frame_maxval--3 | number:2}}
                                    </td>

                                    <td>
                                        {{frm.bw_medium_frame--3 | number:2}} - {{frm.bw_medium_frame_maxval--3 | number:2}}
                                    </td>

                                    <td>
                                        {{frm.bw_large_frame--3 | number:2}} - {{frm.bw_large_frame_maxval--3 | number:2}}
                                    </td>

                                    
                                </tr>
                                <tr>
                                    <td>51-60</td>
                                    <td>
                                        {{frm.bw_small_frame--4.5 | number:2}} - {{frm.bw_small_frame_maxval--4.5 | number:2}}
                                    </td>

                                    <td>
                                        {{frm.bw_medium_frame--4.5 | number:2}} - {{frm.bw_medium_frame_maxval--4.5 | number:2}}
                                    </td>

                                    <td>
                                        {{frm.bw_large_frame--4.5 | number:2}} - {{frm.bw_large_frame_maxval--4.5 | number:2}}
                                    </td>

                                    
                                </tr>
                                <tr>
                                    <td>60+</td>
                                    <td>
                                        {{frm.bw_small_frame--6 | number:2}} - {{frm.bw_small_frame_maxval--6 | number:2}}
                                    </td>

                                    <td>
                                        {{frm.bw_medium_frame--6 | number:2}} - {{frm.bw_medium_frame_maxval--6 | number:2}}
                                    </td>

                                    <td>
                                        {{frm.bw_large_frame--6 | number:2}} - {{frm.bw_large_frame_maxval--6 | number:2}}
                                    </td>

                                    
                                </tr>
                            </tbody>
                        </table>
                    </div> 
                                                   
                    <div  class="form-actions">
					<button class="btn default" type="button" ng-click="$modalCancel()">Cancel</button>
                 
     </div>
  </div>
</div>
