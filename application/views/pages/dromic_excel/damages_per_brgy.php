<div id="damagesperbrgy" class="tab-pane fade">
	<div class="col-md-4" style="margin-top:20px; position: sticky; position: -webkit-sticky;">
		<div class="col-md-12 bg-white">
			<h4 class="red">Damages and Assistance per Barangay</h4>
			<div class="form-group col-md-12">
				<select class="form-control" id="province_dam_per_brgy">
					<option value="">-- Select Province --</option>
	        </select>
			</div>
			<div class="form-group col-md-12">
				<select class="form-control" id="city_dam_per_brgy">
					<option value="">-- Select City/Municipality --</option>
	        </select>
			</div>
			<div class="form-group col-md-12">
				<select class="form-control" id="brgy_dam_per_brgy">
					<option value="">-- Select Barangay --</option>
	    </select>
			</div>
			<div class="form-group col-md-12">
				<label>Cost of Assistance Provided</label>
				<input type="number" class="form-control" placeholder="Cost of Assistance Provided" min="0" id="costasst_brgy">
			</div>
			<div class="form-group col-md-6">
				<label>Affected Families</label>
				<input type="number" class="form-control" placeholder="Affected Families" min="0" id="damperbrgy_tot_aff_fam">
			</div>
			<div class="form-group col-md-6">
				<label>Affected Persons</label>
				<input type="number" class="form-control" placeholder="Affected Persons" min="0" id="damperbrgy_tot_aff_person">
			</div>
			<div class="form-group col-md-6">
				<label>Totally Damaged</label>
				<input type="number" class="form-control" placeholder="Totally Damaged" min="0" id="damperbrgy_totally">
			</div>
			<div class="form-group col-md-6">
				<label>Partially Damaged</label>
				<input type="number" class="form-control" placeholder="Partially Damaged" min="0" id="damperbrgy_partially">
			</div>
			<div class="col-md-12">
 			<div class="pull-right">
 				<button type="button" class="btn btn-success btn-sm" id="savedata_dam_per_brgy"><i class='fa fa-plus-circle'></i> Save Data</button>	
 				<button type="button" class="btn btn-warning btn-sm" id="updatedata_dam_per_brgy" style="visibility: hidden"><i class='fa fa-edit'></i> Update Data</button>	
 				<button type="button" class="btn btn-danger btn-sm" id="deldata_dam_per_brgy" style="visibility: hidden"><i class='fa fa-times-circle'></i> Remove Data</button>	
 			</div>
 		</div>
			<div class="form-group col-md-4" style="visibility: hidden">	
				<label>Dead</label>
				<input type="number" class="form-control" placeholder="Dead" min="0" id="damperbrgy_dead">
			</div>
			<div class="form-group col-md-4" style="visibility: hidden">
				<label>Injured</label>
				<input type="number" class="form-control" placeholder="Injured" min="0" id="damperbrgy_injured">
			</div>
			<div class="form-group col-md-4" style="visibility: hidden">
				<label>Missing</label>
				<input type="number" class="form-control" placeholder="Missing" min="0" id="damperbrgy_missing">
			</div>
		</div>
	</div>
	<div class="col-md-8" style="margin-top:20px">
		<div class="col-md-12 bg-white">
			<div class="col-md-12" style="margin-top:10px"><label><i class="fa fa-info-circle"></i> Reminders: Double click each entry to update/edit.</label></div>
    	<div class="col-md-12" id="tbl_damage_assistance">
	    	<table style="width:100%;">
	    		<tbody>
	    			<table style="width:100%;" id="tbl_damages_per_brgy">
	    				<thead>
	    					<tr>
	    						<th rowspan="3" style="border:1px solid #000; text-align:center">AFFECTED AREAS <br>(Province/City/Municipality)</th>
	    						<th rowspan="3" style="border:1px solid #000; text-align:center">COST OF ASSISTANCE PROVIDED</th>
	    						<th colspan="4" style="border:1px solid #000; text-align:center">NUMBER OF</th>
	    					</tr>
	    					<tr><th colspan="2" style="border:1px solid #000; text-align:center">AFFECTED</th>
	    						<th colspan="2" style="border:1px solid #000; text-align:center">DAMAGED HOUSES</th>
	    					</tr>
	    					<tr>
	    						<th style="border:1px solid #000; text-align:center">FAMILIES</th>
	    						<th style="border:1px solid #000; text-align:center">INDIVIDUALS</th>
	    						<th style="border:1px solid #000; text-align:center">TOTALLY</th>
	    						<th style="border:1px solid #000; text-align:center">PARTIALLY</th>
	    					</tr>
	    				</thead>
	    				<tbody>
	    				</tbody>
	    			</table>
	    		</tbody>
	    	</table>
	    </div>
	</div>
	</div>
</div>