<script>
	var REGION = "CARAGA";
</script>

<div id="snackbar">Table copied to clipboard...</div>

<div class="row">
	<ul class="nav nav-tabs">
	  <li class="active"><a data-toggle="tab" class="btn btn-sm btn-danger tabpill" href="#home" style="border-radius:0px; color:#fff; border-radius: 5px; padding: 5px; font-size: 15px" id="toexcel1">Form 1 (Main Report - F1)</a></li>
	  <li><a data-toggle="tab" href="#home2" class="btn btn-sm btn-danger tabpill" style="border-radius:0px; color:#fff; border-radius: 5px; padding: 5px; font-size: 15px" id="toexcel2">Form 1.2 (Damages and Assistance - F2)</a></li>
	  <li class="dropdown">
	  		<a class="dropdown-toggle btn btn-sm btn-danger tabpill" data-toggle="dropdown" href="#" style="border-radius:0px; color:#fff; border-radius: 5px; padding: 5px; font-size: 15px">  Status of Displacement <b class="caret"></b></a>
	  		<ul class="dropdown-menu">
            	 <li ><a data-toggle="tab" href="#evacuation_stats" id="toexcel3" style="font-size: 15px">Form 2 - (Evacuations - F3)</a></li>
            	 <li ><a data-toggle="tab" href="#evacuation_stats_outside" id="toexcel4" style="font-size: 15px">Form 3 (Outside Evacuations - F4)</a></li>
            	 <li ><a data-toggle="tab" href="#evacuation_sex_age" id="toexcel_sex_age" style="font-size: 15px">Sex and Age Disaggregated Data</a></li>
	        </ul>
	  </li>
	  <li><a data-toggle="tab" href="#damagesperbrgy" class="btn btn-sm btn-danger tabpill" style="border-radius:0px; color:#fff; border-radius: 5px; padding: 5px; font-size: 15px" id="toexcel7">Damages and Assistance per Barangay - F7</a></li>

	  <?php if($_SESSION['isdswd'] == 't'){ ?>
	  	<li><a data-toggle="tab" href="#assistance" class="btn btn-sm btn-danger tabpill" style="border-radius:0px; color:#fff; border-radius: 5px; padding: 5px; font-size: 15px" id="toexcel6">Food and Non-Food Assistance - F6</a></li>
	  <?php } ?>

	  <li class="dropdown">
	  		<a class="dropdown-toggle btn btn-sm btn-danger tabpill" data-toggle="dropdown" href="#" style="border-radius:0px; color:#fff; border-radius: 5px; padding: 5px; font-size: 15px"> <span class="fa fa-wrench"></span> Chart and Tools <b class="caret"></b></a>
	  		<ul class="dropdown-menu">
	            <!-- <?php if($_SESSION['can_create_report'] == 't'){ ?> <li ><a id="addnarrativebtn" style="font-size: 15px"> <span class="fa fa-file-word-o"></span> Attach Narrative Report</a></li> <?php } ?> -->
				     <li><a id="viewcharts" data-toggle="tab" href="#viewchart" style="font-size: 15px"> <span class="fa fa-bar-chart"></span> Chart of Affected LGUs </a></li>
				     <!-- <li><a data-toggle="tab" href="#narrative" style="font-size: 15px"> <span class="fa fa-newspaper-o"></span> View Narrative Report </a></li> -->
				     <li><a id="disaster_map" data-toggle="tab" href="#disastermap" style="font-size: 15px"> <span class="fa fa-map"></span> Disaster Map</a></li>
				     <li><a id="report_summary" data-toggle="tab" href="#reportsummary" style="font-size: 15px"> <span class="fa fa-file"></span> Report Summary</a></li>
	        </ul>
	  </li>
	  
	</ul>
	<div style="left:50%; top:45%; position:fixed; z-index:99999; background-color:#304456; padding-top:20px; padding-bottom:20px; padding-left:50px; padding-right:45px; border-radius:5px; color:#fff" id="loader">
    <center><div class="loader"></div></center>
    Loading data...
  	</div>
	<div class="tab-content">
		<br>
		<div class="form-group col-md-12" style="margin-left: -10px">
			<div class="btn-group" style="border-radius: 5px">
			  	<button style="border-radius: 5px; margin-right: 5px; font-size: 15px" type="button" class="btn btn-success btn-sm" id="saveasnewrecord"><i class="fa fa-plus-circle"></i> Save as new Record and Update Data (Ctrl+S)</button>
			  	<div class="btn-group" style="margin-right: 5px; font-size: 15px" id="addfamiecs">
				   <button style="border-radius: 5px; font-size: 15px" type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown">
				   <span class="fa fa-plus-circle"></span> Add Displaced Families (Inside and Outside EC) <span class="caret"></span></button>
				   <ul class="dropdown-menu" role="menu" style="margin-top:7px">
				     <li><a id="addfamiec" style="font-size: 15px"> Add Affected Families Inside EC (Ctrl+I)  </a></li>
				     <li><a id="addfamoec" style="font-size: 15px"> Add Affected Families Outside EC (Ctrl+Q) </a></li>
				     <li><a id="addsexage" style="font-size: 15px"> Add Sex and Age Data </a></li>
				     <!-- <li><a id="addfamaffected" style="font-size: 15px"> Add Total Affected Families </a></li> -->
				   </ul>
				</div>
				<button style="border-radius: 5px; margin-right: 5px; font-size: 15px" type="button" class="btn btn-primary btn-sm" id="adddamass"><i class="fa fa-plus-circle"></i> Add Cost of Assistance [P/MLGU] (Ctrl+D)</button>
				<button style="border-radius: 5px; margin-right: 5px; font-size: 15px" type="button" class="btn btn-default btn-sm" id="exporttoexcel"><label style="border-radius: 5px; border:1px solid #006400; position:absolute; width:30px; height:40px; margin-top:-9px; margin-left:-3px; background-color:#006400; color:#fff;"><i class="fa fa-file-excel-o" style="margin-top:11px; margin-left:3px; cursor:pointer"></i></label>          Export to Excel (Ctrl+E)
				</button>
				<!-- <button style="border-radius: 5px; margin-right: 5px; font-size: 15px" type="button" class="btn btn-primary btn-sm" id="addCommentsbtn"><i class="fa fa-sticky-note"></i> Discussions <span class="badge badge-primary" id="commentcounter"></span> </button> -->
			</div>
		</div>

	  <div id="reportsummary" class="tab-pane fade">
	  	<ul class="nav nav-tabs">
		  <li class="active">
		  	<a id="toexcel_all_summary" data-toggle="tab" class="btn btn-sm btn-danger tabpill" href="#allsummary" style="border-radius:0px; color:#fff; border-radius: 5px; padding: 5px; font-size: 15px">All Summary</a>
		  </li>
		  <li>
		  	<a data-toggle="tab" class="btn btn-sm btn-danger tabpill" href="#summary_breakdown" style="border-radius:0px; color:#fff; border-radius: 5px; padding: 5px; font-size: 15px">Summary Breakdown</a>
		  </li>
		  <li>
		  	<a data-toggle="tab" class="btn btn-sm btn-danger tabpill" href="#cost_dswd_summary" style="border-radius:0px; color:#fff; border-radius: 5px; padding: 5px; font-size: 15px">Cost of DSWD Assistance Summary</a>
		  </li>
		  <li>
		  	<a id="toexcel_sad_summary" data-toggle="tab" class="btn btn-sm btn-danger tabpill" href="#summary_sex_age_breakdown" style="border-radius:0px; color:#fff; border-radius: 5px; padding: 5px; font-size: 15px">SAD Data Summary (Now)</a>
		  </li>
		</ul>

		<div class="tab-content">
			<div id="allsummary" class="tab-pane fade in active">
				<div class="col-md-12" style="border:1px solid gray; " id="tbl_masterquery_summary">
			    	<table style="width:100%; font-size: 11px" id="tbl_masterquery_rev_summary" class="tbl_masterquery_revs">
			    		<thead>
			    			<tr>
			    				<th style="vertical-align: middle; text-align:center; font-weight:lighter; color: #000; font-family: Arial" colspan="25">Department of Social Welfare and Development</th>
			    			</tr>
			    			<tr>
			    				<th style="vertical-align: middle; text-align:center; color: #000; font-family: Arial" colspan="25"><b>DISASTER RESPONSE, OPERATIONS, MONITORING AND INFORMATION CENTER</b></th>
			    			</tr>
			    			<tr>
			    				<th style="vertical-align: middle; text-align:center; font-weight:lighter; color: #000; font-family: Arial" colspan="25">Batasan Pambansa Complex, Constitution Hills</th>
			    			</tr>
			    			<tr>
			    				<th style="vertical-align: middle; text-align:center; font-weight:lighter; color: #000; font-family: Arial" colspan="25">Quezon City</th>
			    			</tr>
			    			<tr>
			    				<th style="vertical-align: middle; text-align:center; font-weight:lighter; color: #000; font-family: Arial" colspan="25"><br></th>
			    			</tr>
			    			<tr>
			    				<th style="vertical-align: middle; text-align:center; color: #000; font-family: Arial" colspan="25"><b>STATUS OF DISASTER OPERATIONS</b></th>
			    			</tr>
			    			<tr>
			    				<th style="vertical-align: middle; text-align:center; font-weight:lighter; color: #000; font-family: Arial" id="asofdate_summary" colspan="25">As of: </th>
			    			</tr>
			    			<tr>
			    				<th style="vertical-align: middle; text-align:center; font-weight:lighter; color: #000; font-family: Arial" id="asoftime_summary" colspan="25">Time: </th>
			    			</tr>
			    			<tr>
			    				<th style="vertical-align: middle; text-align:left; font-weight:lighter; color: #000; font-family: Arial" colspan="25">Region:<b> <script>document.write(`${REGION}`)</script> </b> </th>
			    			</tr>
			    			<tr>
			    				<th style="vertical-align: middle; text-align:left; font-weight:lighter; color: #000; font-family: Arial" id="disastertype_summary" colspan="25"></th>
			    			</tr>
			    			<tr>
			    				<th style="vertical-align: middle; text-align:left; font-weight:lighter; color: #000; font-family: Arial" id="disasterdate_summary" colspan="25"></th>
			    			</tr>
			    			<tr>
								<th rowspan="3" style="vertical-align: middle; text-align:center; border:1px solid #000; font-family: Arial; background-color: #B6DDE8; color: #000; font-family: Arial">
									<b>AFFECTED AREAS</b>
								</th>
								<th rowspan="3" colspan="3" style="vertical-align: middle; text-align:center; border:1px solid #000; font-family: Arial; background-color: #B6DDE8; color: #000; font-family: Arial">
									<b>NUMBER OF AFFECTED</b>
								</th>
								<th rowspan="3" colspan="2" style="vertical-align: middle; text-align:center; border:1px solid #000; font-family: Arial; background-color: #B6DDE8; color: #000; font-family: Arial">
									<b>NUMBER OF ECs</b>	
								</th>
								<td colspan="12" style="vertical-align: middle; text-align:center; border:1px solid #000; font-family: Arial; background-color: #B6DDE8; color: #000; font-family: Arial">
									<b>TOTAL NUMBER SERVED</b>
								</td>
								<td rowspan="3" colspan="3" style="vertical-align: middle; text-align:center; border:1px solid #000; font-family: Arial; background-color: #B6DDE8; color: #000; font-family: Arial; padding:0px">
									<b>NO. OF DAMAGED HOUSES</b>
								</td>
								<td rowspan="3" colspan="4" style="vertical-align: middle; text-align:center; border:1px solid #000; font-family: Arial; background-color: #B6DDE8; color: #000">
									<b>TOTAL COST OF ASSISTANCE (PhP)</b>
								</td>
							</tr>
							<tr>
								<td colspan="4" style="vertical-align: middle; text-align:center; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;">
									<b>INSIDE EC</b>
								</td>
								<td colspan="4" style="vertical-align: middle; text-align:center; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;">
									<b>OUTSIDE EC</b>
								</td>
								<td colspan="4" style="vertical-align: middle; text-align:center; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;">
									<b>TOTAL SERVED</b>
								</td>
							</tr>
							<tr>
								<td colspan="2" style="vertical-align: middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;"> Families </td>
								<td colspan="2" style="vertical-align: middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;"> Persons </td>
								<td colspan="2" style="vertical-align: middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;"> Families </td>
								<td colspan="2" style="vertical-align: middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;"> Persons </td>
								<td colspan="2" style="vertical-align: middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;"> Families </td>
								<td colspan="2" style="vertical-align: middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;"> Persons </td>
							</tr>
							
							<tr>
								<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;"> Province/<br>City/Municipality </td>
								<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;"> Brgys. </td>
								<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;"> Families </td>
								<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;"> Persons </td>
								<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;"> Cum </td>
								<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;"> Now </td>
								<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;"> Cum </td>
								<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;"> Now </td>
								<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;"> Cum </td>
								<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;"> Now </td>
								<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;"> Cum </td>
								<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;"> Now </td>
								<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;"> Cum </td>
								<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;"> Now </td>
								<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;"> Cum </td>
								<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;"> Now </td>
								<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;"> Cum </td>
								<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;"> Now </td>
								<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;"> Total </td>
								<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;"> Totally </td>
								<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;"> Partially </td>
								<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;"> DSWD </td>
								<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;"> LGU </td>
								<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;"> NGOs/OTHERS </td>
								<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;"> GRAND TOTAL </td>
							</tr>
							<tr>
								<td style="background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;"><b><script>document.write(`${REGION}`)</script></b></td>
								<td style="text-align:center; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;" id="totalbrgy_summary"> </td>
								<td style="text-align:center; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;" id="totalfamily_summary"> </td>
								<td style="text-align:center; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;" id="totalperson_summary"> </td>
								<td style="text-align:center; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;" id="totalec_cum_summary"> </td>
								<td style="text-align:center; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;" id="totalec_now_summary"> </td>
								<td style="text-align:center; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;" id="totalinsideec_fam_cum_summary"> </td>
								<td style="text-align:center; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;" id="totalinsideec_fam_now_summary"> </td>
								<td style="text-align:center; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;" id="totalinsideec_person_cum_summary"> </td>
								<td style="text-align:center; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;" id="totalinsideec_person_now_summary"> </td>
								<td style="text-align:center; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;" id="totaloutisideec_fam_cum_summary"> </td>
								<td style="text-align:center; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;" id="totaloutisideec_fam_now_summary"> </td>
								<td style="text-align:center; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;" id="totaloutsideec_person_cum_summary"> </td>
								<td style="text-align:center; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;" id="totaloutsideec_person_now_summary"> </td>
								<td style="text-align:center; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;" id="totalserved_fam_cum_summary"> </td>
								<td style="text-align:center; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;" id="totalserved_fam_now_summary"> </td>
								<td style="text-align:center; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;" id="totalserved_person_cum_summary"> </td>
								<td style="text-align:center; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;" id="totalserved_person_now_summary"> </td>
								<td style="text-align: center; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;" id="tott_damaged_summary"> </td>
								<td style="text-align: center; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;" id="tot_damaged_summary"> </td>
								<td style="text-align: center; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;" id="part_damaged_summary"> </td>
								<td style="text-align: right; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;" id="tdswd_asst_summary"> </td>
								<td style="text-align: right; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;" id="tlgu_asst_summary"> </td>
								<td style="text-align: right; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;" id="tngo_asst_summary"> </td>
								<td style="text-align: right; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;" id="ttotal_asst_summary"> </td>
							</tr>
			    		</thead>
			    		<tbody>
			    		</tbody>
			    		<tfoot>
							<tr>
								<td colspan="25" style="text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000; font-family: Arial;"> *** NOTHING FOLLOWS ***</td>
							</tr>
							<tr>
			    				<th style="text-align:center; font-weight:lighter" colspan="25"> </th>
			    			</tr>
			    			<tr>
			    				<th style="text-align:center; font-weight:bolder; color: #000; font-family: Arial;" colspan="8">Prepared by: </th>
			    				<th style="text-align:center; font-weight:bolder; color: #000; font-family: Arial;" colspan="9">Recommended by: </th>
			    				<th style="text-align:center; font-weight:bolder; color: #000; font-family: Arial;" colspan="8">Approved by: </th>
			    			</tr>
			    			<tr>
			    				<th style="text-align:center; font-weight:lighter" colspan="25"> </th>
			    			</tr>
			    			<tr>
			    				<th style="text-align:center; font-weight:bolder; color: #000; font-family: Arial;" colspan="8" id="spreparedby_summary"></th>
			    				<th style="text-align:center; font-weight:bolder; color: #000; font-family: Arial;" colspan="9" id="srecommendedby_summary"></th>
			    				<th style="text-align:center; font-weight:bolder; color: #000; font-family: Arial;" colspan="8" id="sapprovedby_summary"></th>
			    			</tr>
			    			<tr>
			    				<th style="text-align:center; font-weight:bolder; color: #000; font-family: Arial;" colspan="8" id="spreparedbypos_summary"></th>
			    				<th style="text-align:center; font-weight:bolder; color: #000; font-family: Arial;" colspan="9" id="srecommendedbypos_summary"></th>
			    				<th style="text-align:center; font-weight:bolder; color: #000; font-family: Arial;" colspan="8" id="sapprovedbypos_summary"></th>
			    			</tr>
						</tfoot>
			    	</table>
			    </div>
			</div>
			<div id="summary_breakdown" class="tab-pane fade" style="background-color: #ffffff">
			  	<div class="col-sm-12" id="" style="font-size:30px;">
			  		<div class="col-md-6">
			  			<button class="btn btn-default btn-sm" onclick="selectElementContents( document.getElementById('tbl_materquery_summary'));" title="Copy to clipboard">
			  				<span class="fa fa-copy"></span></button>
			  			<h4 style="color: #000">Summary of Affected Families and Persons</h4>
				  		<table id="tbl_materquery_summary" style="font-family: Arial; font-size: 11px; color: #000; width: 600px">
				  			<thead>
				  				<tr>
				  					<th rowspan="2" class="report_summary_td">PROVINCE/CITY/<br>MUNICIPALITY</th>
				  					<th colspan="3" class="report_summary_td">NUMBER OF AFFECTED</th>
				  				</tr>
				  				<tr>
				  					<th class="report_summary_td">BARANGAYS</th>
				  					<th class="report_summary_td">FAMILIES</th>
				  					<th class="report_summary_td">PERSONS</th>
				  				</tr>
				  				<tr>
				  					<th class="report_summary_td" style="text-align: left"><script>document.write(`${REGION}`)</script></th>
				  					<th class="report_summary_td" id="tbl_materquery_summary_brgy"></th>
				  					<th class="report_summary_td" id="tbl_materquery_summary_fam"></th>
				  					<th class="report_summary_td" id="tbl_materquery_summary_person"></th>
				  				</tr>
				  			</thead>
				  			<tbody>
				  			</tbody>
				  		</table>
				  	</div>
				  	<div class="col-md-6">
				  		<button class="btn btn-default btn-sm" onclick="selectElementContents( document.getElementById('tbl_evac_summary'));" title="Copy to clipboard">
			  				<span class="fa fa-copy"></span></button>
				  		<h4 style="color: #000">Summary of Displaced Families and Persons Inside ECs</h4>
				  		<table id="tbl_evac_summary" style="font-family: Arial; font-size: 11px; color: #000; width: 600px">
				  			<thead>
				  				<tr>
				  					<th rowspan="4" class="report_summary_td">PROVINCE/CITY/<br>MUNICIPALITY</th>
				  					<th rowspan="3" colspan="2" class="report_summary_td">NUMBER OF <br>EVACUATION CENTER (ECs)</th>
				  					<th colspan="4" class="report_summary_td">NUMBER OF DISPLACED</th>
				  				</tr>
				  				<tr>
				  					<th colspan="4" class="report_summary_td">INSIDE ECs</th>
				  				</tr>
				  				<tr>
				  					<th colspan="2" class="report_summary_td">FAMILIES</th>
				  					<th colspan="2" class="report_summary_td">PERSONS</th>
				  				</tr>
				  				<tr>
				  					<th class="report_summary_td">CUM</th>
				  					<th class="report_summary_td">NOW</th>
				  					<th class="report_summary_td">CUM</th>
				  					<th class="report_summary_td">NOW</th>
				  					<th class="report_summary_td">CUM</th>
				  					<th class="report_summary_td">NOW</th>
				  				</tr>
				  				<tr>
				  					<th class="report_summary_td" style="text-align: left"><script>document.write(`${REGION}`)</script></th>
				  					<th class="report_summary_td" id="tbl_evac_summary_ec_cum"></th>
				  					<th class="report_summary_td" id="tbl_evac_summary_ec_now"></th>
				  					<th class="report_summary_td" id="tbl_evac_summary_family_cum"></th>
				  					<th class="report_summary_td" id="tbl_evac_summary_family_now"></th>
				  					<th class="report_summary_td" id="tbl_evac_summary_person_cum"></th>
				  					<th class="report_summary_td" id="tbl_evac_summary_person_now"></th>
				  				</tr>
				  			</thead>
				  			<tbody>
				  			</tbody>
				  		</table>
				  	</div>
			  	</div>
			  	<div class="col-sm-12" id="" style="font-size:30px; margin-top: 10px">
			  		<div class="col-md-6">
				  		<button class="btn btn-default btn-sm" onclick="selectElementContents( document.getElementById('tbl_evac_outside_summary'));" title="Copy to clipboard">
			  				<span class="fa fa-copy"></span></button>
				  		<h4 style="color: #000">Summary of Displaced Families and Persons Outside ECs</h4>
				  		<table id="tbl_evac_outside_summary" style="font-family: Arial; font-size: 11px; color: #000; width: 600px">
				  			<thead>
				  				<tr>
				  					<th rowspan="3" class="report_summary_td">PROVINCE/CITY/<br>MUNICIPALITY</th>
				  					<th colspan="4" class="report_summary_td">NUMBER OF DISPLACED OUTSIDE ECs</th>
				  				</tr>
				  				<tr>
				  					<th colspan="2" class="report_summary_td">FAMILY</th>
				  					<th colspan="2" class="report_summary_td">PERSONS</th>
				  				</tr>
				  				<tr>
				  					<th class="report_summary_td">CUM</th>
				  					<th class="report_summary_td">NOW</th>
				  					<th class="report_summary_td">CUM</th>
				  					<th class="report_summary_td">NOW</th>
				  				</tr>
				  				<tr>
				  					<th class="report_summary_td" style="text-align: left"><script>document.write(`${REGION}`)</script></th>
				  					<th class="report_summary_td" id="tbl_evac_outside_summary_family_cum"></th>
				  					<th class="report_summary_td" id="tbl_evac_outside_summary_family_now"></th>
				  					<th class="report_summary_td" id="tbl_evac_outside_summary_person_cum"></th>
				  					<th class="report_summary_td" id="tbl_evac_outside_summary_person_now"></th>
				  				</tr>
				  			</thead>
				  			<tbody>
				  			</tbody>
				  		</table>
				  	</div>
			  		<div class="col-md-6">
			  			<button class="btn btn-default btn-sm" onclick="selectElementContents( document.getElementById('tbl_displaced_summary'));" title="Copy to clipboard">
			  				<span class="fa fa-copy"></span></button>
				  		<h4 style="color: #000">Summary of Displaced Families and Persons</h4>
				  		<table id="tbl_displaced_summary" style="font-family: Arial; font-size: 11px; color: #000; width: 600px">
				  			<thead>
				  				<tr>
				  					<th rowspan="3" class="report_summary_td">PROVINCE/CITY/<br>MUNICIPALITY</th>
				  					<th colspan="4" class="report_summary_td">NUMBER OF DISPLACED</th>
				  				</tr>
				  				<tr>
				  					<th colspan="2" class="report_summary_td">FAMILIES</th>
				  					<th colspan="2" class="report_summary_td">PERSONS</th>
				  				</tr>
				  				<tr>
				  					<th class="report_summary_td">CUM</th>
				  					<th class="report_summary_td">NOW</th>
				  					<th class="report_summary_td">CUM</th>
				  					<th class="report_summary_td">NOW</th>
				  				</tr>
				  				<tr>
				  					<th class="report_summary_td" style="text-align: left"><script>document.write(`${REGION}`)</script></th>
				  					<th class="report_summary_td" id="tbl_displaced_summary_family_cum"></th>
				  					<th class="report_summary_td" id="tbl_displaced_summary_family_now"></th>
				  					<th class="report_summary_td" id="tbl_displaced_summary_person_cum"></th>
				  					<th class="report_summary_td" id="tbl_displaced_summary_person_now"></th>
				  				</tr>
				  			</thead>
				  			<tbody>
				  			</tbody>
				  		</table>
				  	</div>
			  	</div>
			  	<div class="col-sm-12" style="margin-top: 10px">
			  		<div class="col-md-6">
				  		<button class="btn btn-default btn-sm" onclick="selectElementContents( document.getElementById('tbl_damaged_summary'));" title="Copy to clipboard">
			  				<span class="fa fa-copy"></span></button>
				  		<h4 style="color: #000">Summary of Damaged Houses</h4>
				  		<table id="tbl_damaged_summary" style="font-family: Arial; font-size: 11px; color: #000; width: 600px">
				  			<thead>
				  				<tr>
				  					<th rowspan="2" class="report_summary_td">PROVINCE/CITY/MUNICIPALITY</th>
				  					<th colspan="3" class="report_summary_td">NUMBER OF DAMAGED HOUSES</th>
				  				</tr>
				  				<tr>
				  					<th class="report_summary_td">TOTAL</th>
				  					<th class="report_summary_td">TOTALLY</th>
				  					<th class="report_summary_td">PARTIALLY</th>
				  				</tr>
				  				<tr>
				  					<th class="report_summary_td" style="text-align: left"><script>document.write(`${REGION}`)</script></th>
				  					<th class="report_summary_td" id="tbl_damaged_summary_tot"></th>
				  					<th class="report_summary_td" id="tbl_damaged_summary_totally"></th>
				  					<th class="report_summary_td" id="tbl_damaged_summary_patially"></th>
				  				</tr>
				  			</thead>
				  			<tbody>
				  			</tbody>
				  		</table>
				  	</div>
				  	<div class="col-md-6">
				  		<button class="btn btn-default btn-sm" onclick="selectElementContents( document.getElementById('tbl_cost_assistance_summary'));" title="Copy to clipboard">
			  				<span class="fa fa-copy"></span></button>
				  		<h4 style="color: #000">Summary of Cost of Assistance Provided</h4>
				  		<table id="tbl_cost_assistance_summary" style="font-family: Arial; font-size: 11px; color: #000; width: 600px">
				  			<thead>
				  				<tr>
				  					<th rowspan="2" class="report_summary_td">PROVINCE/CITY/MUNICIPALITY</th>
				  					<th colspan="4" class="report_summary_td">TOTAL COST OF ASSISTANCE</th>
				  				</tr>
				  				<tr>
				  					<th class="report_summary_td">DSWD</th>
				  					<th class="report_summary_td">LGU</th>
				  					<th class="report_summary_td">NGOs/OTHERS</th>
				  					<th class="report_summary_td">GRAND TOTAL</th>
				  				</tr>
				  				<tr>
				  					<th class="report_summary_td" style="text-align: left"><script>document.write(`${REGION}`)</script></th>
				  					<th class="report_summary_td" style="text-align: right; padding-right: 3px" id="tdswd_asst_summary_breakdown"></th>
				  					<th class="report_summary_td" style="text-align: right; padding-right: 3px" id="tlgu_asst_summary_breakdown"></th>
				  					<th class="report_summary_td" style="text-align: right; padding-right: 3px" id="tngo_asst_summary_breakdown"></th>
				  					<th class="report_summary_td" style="text-align: right; padding-right: 3px" id="ttotal_asst_summary_breakdown"></th>
				  				</tr>
				  			</thead>
				  			<tbody>
				  			</tbody>
				  		</table>
				  	</div>
			  	</div>
			</div>
			<div id="cost_dswd_summary" class="tab-pane fade" style="background-color: #ffffff; padding: 5px">
				<button class="btn btn-default btn-sm" onclick="selectElementContents( document.getElementById('tbl_cost_dswd_summary'));" title="Copy to clipboard"><span class="fa fa-copy"></span></button>
				<table id="tbl_cost_dswd_summary" style="font-family: Arial; font-size: 11px; color: #000; width: 1000px;">
		  			<thead>
		  			</thead>
		  			<tbody>
		  			</tbody>
		  			<tfoot>
		  			</tfoot>
		  		</table>
			</div>
			<div id="summary_sex_age_breakdown" class="tab-pane fade" style="color: #000">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color: #FFF" id="tbl_evacuation_sex_age_summary">
					<button class="btn btn-default btn-sm" onclick="selectElementContents( document.getElementById('tbl_sex_age_summary'));" title="Copy to clipboard"><span class="fa fa-copy"></span></button>
			  		<table style="width:100%; font-size: 10px" id="tbl_sex_age_summary">
			  			<thead>
			  				<tr>
			  					<th style="background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px;" rowspan="3">PROVINCE/CITY/MUNICIPALITY</th>
			  					<th style="background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="16">
			  					SEX AND AGE DISTRIBUTION OF IDPs CURRENTLY INSIDE ECs</th>
			  					<th style="background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="10">
			  					SECTORAL DATA OF IDPs CURRENTLY INSIDE ECs</th>
			  				</tr>	
			  				<tr>
			  					<th style="background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="2">
			  					INFANT <br/>< 1 y/o (0-11 mos)</th>
			  					<th style="background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="2">
			  					TODDLERS <br/>1-3 y/o</th>
			  					<th style="background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="2">
			  					PRESCHOOLERS <br/>2-5 y/o</th>
			  					<th style="background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="2">
			  					SCHOOL AGE <br/>6-12 y/o</th>
			  					<th style="background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="2">
			  					TEENAGE <br/>13-19 y/o</th>
			  					<th style="background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="2">
			  					ADULT <br/>20-59 y/o</th>
			  					<th style="background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="2">
			  					SENIOR CITIZENS <br/>60 and above</th>
			  					<th style="background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="2">
			  					TOTAL</th>
			  					<th style="background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="1">
			  					PREGNANT WOMEN</th>
			  					<th style="background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="1">
			  					LACTATING MOTHER</th>
			  					<th style="background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="2">
			  					UNACCOMPANIED CHILDREN</th>
			  					<th style="background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="2">
			  					PWDs</th>
			  					<th style="background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="2">
			  					SOLO PARENTS</th>
			  					<th style="background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="2">
			  					IPs</th>
			  				</tr>	
			  				<tr>
			  					<!-- infant -->
			  					<th style="width: 60px; background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px">MALE</th>
			  					<th style="width: 60px; background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px">FEMALE</th>
			  					<!-- toddlers -->
			  					<th style="width: 60px; background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px">MALE</th>
			  					<th style="width: 60px; background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px">FEMALE</th>
			  					<!-- preschoolers -->
			  					<th style="width: 60px; background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px">MALE</th>
			  					<th style="width: 60px; background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px">FEMALE</th>
			  					<!-- schoolage -->
			  					<th style="width: 60px; background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px">MALE</th>
			  					<th style="width: 60px; background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px">FEMALE</th>
			  					<!-- teenage -->
			  					<th style="width: 60px; background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px">MALE</th>
			  					<th style="width: 60px; background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px">FEMALE</th>
			  					<!-- adult -->
			  					<th style="width: 60px; background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px">MALE</th>
			  					<th style="width: 60px; background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px">FEMALE</th>
			  					<!-- senior -->
			  					<th style="width: 60px; background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px">MALE</th>
			  					<th style="width: 60px; background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px">FEMALE</th>
			  					<!-- total -->
			  					<th style="width: 60px; background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px">MALE</th>
			  					<th style="width: 60px; background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px">FEMALE</th>

			  					<!-- pregnant -->
			  					<th style="width: 60px; background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px">FEMALE</th>
			  					<!-- lactating -->
			  					<th style="width: 60px; background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px">FEMALE</th>
			  					<!-- unaccompanied -->
			  					<th style="width: 60px; background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px">MALE</th>
			  					<th style="width: 60px; background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px">FEMALE</th>
			  					<!-- pwd -->
			  					<th style="width: 60px; background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px">MALE</th>
			  					<th style="width: 60px; background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px">FEMALE</th>
			  					<!-- solo parent -->
			  					<th style="width: 60px; background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px">MALE</th>
			  					<th style="width: 60px; background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px">FEMALE</th>
			  					<!-- ip -->
			  					<th style="width: 60px; background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px">MALE</th>
			  					<th style="width: 60px; background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px">FEMALE</th>
			  				<tr id="sex_age_total_caraga_summary">
			  					<th style="background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:left; padding:2px">
			  						<script>document.write(`${REGION}`)</script>
			  					</th>
			  					<th style="background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px" 
			  					id="infant_male_now_c_summary"></th>
			  					<th style="background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px" 
			  					id="infant_female_now_c_summary"></th>

			  					<th style="background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px" 
			  					id="toddlers_male_now_c_summary"></th>
			  					<th style="background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px" 
			  					id="toddlers_female_now_c_summary"></th>

			  					<th style="background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px" 
			  					id="preschoolers_male_now_c_summary"></th>
			  					<th style="background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px" 
			  					id="preschoolers_female_now_c_summary"></th>

			  					<th style="background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px" 
			  					id="schoolage_male_now_c_summary"></th>
			  					<th style="background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px" 
			  					id="schoolage_female_now_c_summary"></th>

			  					<th style="background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px" 
			  					id="teenage_male_now_c_summary"></th>
			  					<th style="background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px" 
			  					id="teenage_female_now_c_summary"></th>

			  					<th style="background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px" 
			  					id="adult_male_now_c_summary"></th>
			  					<th style="background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px" 
			  					id="adult_female_now_c_summary"></th>

			  					<th style="background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px" 
			  					id="senior_male_now_c_summary"></th>
			  					<th style="background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px" 
			  					id="senior_female_now_c_summary"></th>

			  					<th style="background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px" 
			  					id="tot_male_now_c_summary"></th>
			  					<th style="background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px" 
			  					id="tot_female_now_c_summary"></th>

			  					<th style="background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px" 
			  					id="pregnant_now_c_summary"></th>

			  					<th style="background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px" 
			  					id="lactating_mother_now_c_summary"></th>

			  					<th style="background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px" 
			  					id="unaccompanied_minor_male_now_c_summary"></th>
			  					<th style="background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px" 
			  					id="unaccompanied_minor_female_now_c_summary"></th>

			  					<th style="background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px" 
			  					id="pwd_male_now_c_summary"></th>
			  					<th style="background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px" 
			  					id="pwd_female_now_c_summary"></th>

			  					<th style="background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px" 
			  					id="solo_parent_male_now_c_summary"></th>
			  					<th style="background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px" 
			  					id="solo_parent_female_now_c_summary"></th>

			  					<th style="background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px" 
			  					id="ip_male_now_c_summary"></th>
			  					<th style="background-color: #B6DDE8; color: #000; border:1px solid #000; text-align:center; padding:2px" 
			  					id="ip_female_now_c_summary"></th>

			  				</tr>
			  			</thead>
			  			<tbody>
			  			</tbody>
			  		</table>	
			  	</div>
			</div>
		</div>

	  </div>
	  <div id="sex_disaggregation" class="tab-pane fade">
	  	<div class="col-sm-12" id="" style="font-size:30px">
	  		CURRENTLY UNDER DEVELOPMENT :-)
	  	</div>
	  </div>
	  <div id="disastermap" class="tab-pane fade">
	  	<center>
		  	<div class="col-sm-12" id="dmap" style="font-size:30px">
		  		<div id="mapid" style="width:50%; height: 84vh"></div>
		  	</div>
		</center>
	  </div>
	  <div id="narrative" class="tab-pane fade">
	  	<iframe src="" style="width: 100%; height: 1500px; border: 0px; background-color: #F7F7F7; margin-top: 20px" id="frame_narrative_report"></iframe>
	  </div>
	  <div id="home" class="tab-pane fade in active">
	  		<div class="col-md-8" style="color:#000; font-weight: bold; margin-top: 10px; font-size: 15px">
	  			<label class="green">Report notes:</label> <br>
	  			<label class="red" style="font-size:13px">
	  				1.) Right-click in each city/municipality to toggle menu. 
	  					<ul>
	  						<li>Update Cost of Assistance from LGUs</li>
	  						<li>Update Total Affected Families</li> 
	  						<li>Add/Update DSWD Assistance Data</li>
	  						<li>Add/Update House Damages Data</li>
	  					</ul>
	  				2.) Right-click in each evacuation center to update evacuation center data.
	  			</label>
	  		</div>
	  		<div class="col-md-4 pull-right" style="color:#000; font-weight: bold; margin-top: 10px; font-size: 15px">
	  				Number of affected municipalities: <label id="count_allmunis"></label><br>
	  				Number of affected cities: <label id="count_allcity"></label>
	  		</div>
	    	<div class="col-md-12" style="border:1px solid gray; " id="tbl_masterquery_revs">
		    	<table style="width:100%; font-size: 11px; font-family: Arial" id="tbl_masterquery_rev" class="tbl_masterquery_revs">
		    		<thead>
		    			<tr>
		    				<th style="vertical-align: middle; text-align:center; font-weight:lighter; color: #000" colspan="27">Department of Social Welfare and Development</th>
		    			</tr>
		    			<tr>
		    				<th style="vertical-align: middle; text-align:center; color: #000" colspan="27"><b>DISASTER RESPONSE, OPERATIONS, MONITORING AND INFORMATION CENTER</b></th>
		    			</tr>
		    			<tr>
		    				<th style="vertical-align: middle; text-align:center; font-weight:lighter; color: #000" colspan="27">Batasan Pambansa Complex, Constitution Hills</th>
		    			</tr>
		    			<tr>
		    				<th style="vertical-align: middle; text-align:center; font-weight:lighter; color: #000" colspan="27">Quezon City</th>
		    			</tr>
		    			<tr>
		    				<th style="vertical-align: middle; text-align:center; font-weight:lighter; color: #000" colspan="27"><br></th>
		    			</tr>
		    			<tr>
		    				<th style="vertical-align: middle; text-align:center; color: #000" colspan="27"><b>STATUS OF DISASTER OPERATIONS</b></th>
		    			</tr>
		    			<tr>
		    				<th style="vertical-align: middle; text-align:center; font-weight:lighter; color: #000" id="asofdate" colspan="27">As of: </th>
		    			</tr>
		    			<tr>
		    				<th style="vertical-align: middle; text-align:center; font-weight:lighter; color: #000" id="asoftime" colspan="27">Time: </th>
		    			</tr>
		    			<tr>
		    				<th style="vertical-align: middle; text-align:left; font-weight:lighter; color: #000" colspan="27">Region:<b> <script>document.write(`${REGION}`)</script> </b> </th>
		    			</tr>
		    			<tr>
		    				<th style="vertical-align: middle; text-align:left; font-weight:lighter; color: #000" id="disastertype" colspan="27"></th>
		    			</tr>
		    			<tr>
		    				<th style="vertical-align: middle; text-align:left; font-weight:lighter; color: #000" id="disasterdate" colspan="27"></th>
		    			</tr>
		    			<tr>
							<td rowspan="3" style="vertical-align: middle; text-align:center; border:1px solid #000; background-color: #B6DDE8; color: #000">
								<b>AFFECTED AREAS</b>
							</td>
							<td rowspan="4" style="vertical-align: middle; text-align:center; border:1px solid #000; background-color: #B6DDE8; color: #000;">
								<b>BARANGAYS</b>
							</td>
							<td rowspan="4" style="vertical-align: middle; text-align:center; border:1px solid #000; background-color: #B6DDE8; color: #000;">
								<b>EVACUATION CENTERS</b>
							</td>
							<td rowspan="3" colspan="3" style="vertical-align: middle; text-align:center; border:1px solid #000; background-color: #B6DDE8; color: #000">
								<b>NUMBER OF AFFECTED</b>
							</td>
							<td rowspan="3" colspan="2" style="vertical-align: middle; text-align:center; border:1px solid #000; background-color: #B6DDE8; color: #000">
								<b>NUMBER OF ECs</b>
							</td>
							<td colspan="12" style="vertical-align: middle; text-align:center; border:1px solid #000; background-color: #B6DDE8; color: #000">
								<b>TOTAL NUMBER SERVED</b>
							</td>
							<td rowspan="3" colspan="3" style="vertical-align: middle; text-align:center; border:1px solid #000; background-color: #B6DDE8; color: #000; padding:0px">
								<b>NO. OF DAMAGED HOUSES</b>
							</td>
							<td rowspan="3" colspan="4" style="vertical-align: middle; text-align:center; border:1px solid #000; background-color: #B6DDE8; color: #000">
								<b>TOTAL COST OF ASSISTANCE (PhP)</b>
							</td>
						</tr>
						<tr>
							<td colspan="4" style="vertical-align: middle; text-align:center; border:1px solid #000; background-color: #B6DDE8; color: #000">
								<b>INSIDE EC</b>
							</td>
							<td colspan="4" style="vertical-align: middle; text-align:center; border:1px solid #000; background-color: #B6DDE8; color: #000">
								<b>OUTSIDE EC</b>
							</td>
							<td colspan="4" style="vertical-align: middle; text-align:center; border:1px solid #000; background-color: #B6DDE8; color: #000">
								<b>TOTAL SERVED</b>
							</td>
						</tr>
						<tr>
							<td colspan="2" style="vertical-align: middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000"> Families </td>
							<!-- <td colspan="2" style="vertical-align: middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000"> Persons Actual </td> -->
							<td colspan="2" style="vertical-align: middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000"> Persons </td>
							<td colspan="2" style="vertical-align: middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000"> Families </td>
							<td colspan="2" style="vertical-align: middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000"> Persons </td>
							<td colspan="2" style="vertical-align: middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000"> Families </td>
							<td colspan="2" style="vertical-align: middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000"> Persons </td>
						</tr>
						
						<tr>
							<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000"> Province/<br>City/Municipality </td>
							<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000"> Brgys. </td>
							<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000"> Families </td>
							<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000"> Persons </td>
							<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000"> Cum </td>
							<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000"> Now </td>
							<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000"> Cum </td>
							<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000"> Now </td>
							<!-- <td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000"> Cum </td>
							<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000"> Now </td> -->
							<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000"> Cum </td>
							<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000"> Now </td>
							<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000"> Cum </td>
							<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000"> Now </td>
							<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000"> Cum </td>
							<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000"> Now </td>
							<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000"> Cum </td>
							<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000"> Now </td>
							<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000"> Cum </td>
							<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000"> Now </td>
							<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000"> Total </td>
							<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000"> Totally </td>
							<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000"> Partially </td>
							<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000"> DSWD </td>
							<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000"> LGU </td>
							<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000"> NGOs/OTHERS </td>
							<td style="vertical-align:middle; text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000"> GRAND TOTAL </td>
						</tr>
						<tr>
							<td style="background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000"><b><script>document.write(`${REGION}`)</script></b></td>
							<td style="text-align:center; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000"></td>
							<td style="text-align:center; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000"></td>
							<td style="text-align:center; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000" id="totalbrgy"> </td>
							<td style="text-align:center; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000" id="totalfamily"> </td>
							<td style="text-align:center; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000" id="totalperson"> </td>
							<td style="text-align:center; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000" id="totalec_cum"> </td>
							<td style="text-align:center; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000" id="totalec_now"> </td>
							<td style="text-align:center; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000" id="totalinsideec_fam_cum"> </td>
							<td style="text-align:center; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000" id="totalinsideec_fam_now"> </td>
							<!-- <td style="text-align:center; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000" id="totalinsideec_person_cum_a"> </td>
							<td style="text-align:center; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000" id="totalinsideec_person_now_a"> </td> -->
							<td style="text-align:center; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000" id="totalinsideec_person_cum"> </td>
							<td style="text-align:center; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000" id="totalinsideec_person_now"> </td>
							<td style="text-align:center; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000" id="totaloutisideec_fam_cum"> </td>
							<td style="text-align:center; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000" id="totaloutisideec_fam_now"> </td>
							<td style="text-align:center; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000" id="totaloutsideec_person_cum"> </td>
							<td style="text-align:center; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000" id="totaloutsideec_person_now"> </td>
							<td style="text-align:center; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000" id="totalserved_fam_cum"> </td>
							<td style="text-align:center; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000" id="totalserved_fam_now"> </td>
							<td style="text-align:center; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000" id="totalserved_person_cum"> </td>
							<td style="text-align:center; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000" id="totalserved_person_now"> </td>
							<td style="text-align: center; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000" id="tott_damaged"> </td>
							<td style="text-align: center; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000" id="tot_damaged"> </td>
							<td style="text-align: center; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000" id="part_damaged"> </td>
							<td style="text-align: right; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000" id="tdswd_asst"> </td>
							<td style="text-align: right; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000" id="tlgu_asst"> </td>
							<td style="text-align: right; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000" id="tngo_asst"> </td>
							<td style="text-align: right; font-weight:bold; background-color:red; color:#fff; border:1px solid #000; background-color: #B6DDE8; color: #000" id="ttotal_asst"> </td>
						</tr>
		    		</thead>
		    		<tbody>
		    		</tbody>
		    		<tfoot>
						<tr>
							<td colspan="27" style="text-align:center; font-weight:bold; border:1px solid #000; background-color: #B6DDE8; color: #000"> *** NOTHING FOLLOWS ***</td>
						</tr>
						<tr>
		    				<th style="text-align:center; font-weight:lighter" colspan="27"> </th>
		    			</tr>
		    			<tr>
		    				<th style="text-align:center; font-weight:bolder; color: #000" colspan="8">Prepared by: </th>
		    				<th style="text-align:center; font-weight:bolder; color: #000" colspan="10">Recommended by: </th>
		    				<th style="text-align:center; font-weight:bolder; color: #000" colspan="11">Approved by: </th>
		    			</tr>
		    			<tr>
		    				<th style="text-align:center; font-weight:lighter" colspan="27"> </th>
		    			</tr>
		    			<tr>
		    				<th style="text-align:center; font-weight:bolder; color: #000" colspan="8" id="spreparedby"></th>
		    				<th style="text-align:center; font-weight:bolder; color: #000" colspan="10" id="srecommendedby"></th>
		    				<th style="text-align:center; font-weight:bolder; color: #000" colspan="11" id="sapprovedby"></th>
		    			</tr>
		    			<tr>
		    				<th style="text-align:center; font-weight:bolder; color: #000" colspan="8" id="spreparedbypos"></th>
		    				<th style="text-align:center; font-weight:bolder; color: #000" colspan="10" id="srecommendedbypos"></th>
		    				<th style="text-align:center; font-weight:bolder; color: #000" colspan="11" id="sapprovedbypos"></th>
		    			</tr>
					</tfoot>
		    	</table>
		    </div>
	  </div>
	  <div id="menu1" class="tab-pane fade">
	    <h3>Menu 1</h3>
	    <p>Some content in menu 1.</p>
	  </div>
	  <div id="evacuation_stats" class="tab-pane fade">
	  	<div class="col-md-12" style="margin-top:10px"><label><i class="fa fa-info-circle"></i> Reminders: Double click each entry to update/edit.</label></div>
	  	<div class="col-md-3 pull-right" id="count_ec" style="font-weight:bold; font-size: 15px">

	  	</div>
	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	    	<div class="col-md-12" id="tbl_evac_stats" style="border:1px solid gray">
	    		<table style="width:100%;">
		    		<thead>
		    			<tr>
		    				<th style="text-align:center; font-weight:lighter; color: #000" colspan="12">Department of Social Welfare and Development</th>
		    			</tr>
		    			<tr>
		    				<th style="text-align:center; color: #000" colspan="12"><b>DISASTER RESPONSE, OPERATIONS, MONITORING AND INFORMATION CENTER</b></th>
		    			</tr>
		    			<tr>
		    				<th style="text-align:center; font-weight:lighter; color: #000" colspan="12">Batasan Pambansa Complex, Constitution Hills</th>
		    			</tr>
		    			<tr>
		    				<th style="text-align:center; font-weight:lighter; color: #000" colspan="12">Quezon City</th>
		    			</tr>
		    			<tr>
		    				<th style="text-align:center; font-weight:lighter; color: #000" colspan="12"><br></th>
		    			</tr>
		    			<tr>
		    				<th style="text-align:center; color: #000" colspan="12"><b>STATUS OF EVACUATION CENTERS</b></th>
		    			</tr>
		    			<tr>
		    				<th style="text-align:center; font-weight:lighter; color: #000" id="asofdate_IEC" colspan="12">As of: </th>
		    			</tr>
		    			<tr>
		    				<th style="text-align:center; font-weight:lighter; color: #000" id="asoftime_IEC" colspan="12">Time: </th>
		    			</tr>
		    			<tr>
		    				<th style="text-align:left; font-weight:lighter; color: #000" colspan="12">Region:<b> <script>document.write(`${REGION}`)</script> </b> </th>
		    			</tr>
		    			<tr>
		    				<th style="text-align:left; font-weight:lighter; color: #000" id="disastertype_IEC" colspan="12"></th>
		    			</tr>
		    			<tr>
		    				<th style="text-align:left; font-weight:lighter; color: #000" id="disasterdate_IEC" colspan="12"></th>
		    			</tr>
		    		</thead>
		    		<tbody>
		    		</tbody>
		    	</table>
		  		<table style="width:100%" id="evac_stats">
		  			<thead>
		  				<tr>
		  					<th style="border: 1px solid #000; text-align:center; padding:2px; background-color: #808080; color: #000" rowspan="3">PLACE OF EVACUATION CENTER<br>Province/City/Municipality</th>
		  					<th style="border: 1px solid #000; text-align:center; padding:2px; background-color: #808080; color: #000" rowspan="2" colspan="2">No of ECs'</th>
		  					<th style="border: 1px solid #000; text-align:center; padding:2px; background-color: #808080; color: #000" rowspan="3">BRGY LOCATED (EC)</th>
		  					<th style="border: 1px solid #000; text-align:center; padding:2px; background-color: #808080; color: #000" rowspan="3">NAME OF EVACUATION CENTER</th>
		  					<th style="border: 1px solid #000; text-align:center; padding:2px; background-color: #808080; color: #000" colspan="4">NUMBER SERVED</th>
		  					<th style="border: 1px solid #000; text-align:center; padding:2px; background-color: #808080; color: #000" rowspan="3">BRGY LOCATED (EVACUEES)</th>
		  					<th style="border: 1px solid #000; text-align:center; padding:2px; background-color: #808080; color: #000" rowspan="3">STATUS OF EC<br>(Newly-Opened/Re-opened/<br>Activated/Existing/Closed)</th>
		  					<th style="border: 1px solid #000; text-align:center; padding:2px; background-color: #808080; color: #000" rowspan="3">REMARKS</th>
		  				</tr>
		  				<tr>
		  					<th style="border: 1px solid #000; text-align:center; padding:2px; background-color: #808080; color: #000" colspan="2">Families</th>
		  					<th style="border: 1px solid #000; text-align:center; padding:2px; background-color: #808080; color: #000" colspan="2">Persons</th>
		  				</tr>
		  				<tr>
		  					<th style="border: 1px solid #000; text-align:center; padding:2px; background-color: #808080; color: #000">Cum</th>
		  					<th style="border: 1px solid #000; text-align:center; padding:2px; background-color: #808080; color: #000">Now</th>
		  					<th style="border: 1px solid #000; text-align:center; padding:2px; background-color: #808080; color: #000">Cum</th>
		  					<th style="border: 1px solid #000; text-align:center; padding:2px; background-color: #808080; color: #000">Now</th>
		  					<th style="border: 1px solid #000; text-align:center; padding:2px; background-color: #808080; color: #000">Cum</th>
		  					<th style="border: 1px solid #000; text-align:center; padding:2px; background-color: #808080; color: #000">Now</th>
		  				</tr>		
		  			</thead>
		  			<tbody>
		  				<tr style="background-color:red; color:#fff">
		  					<th style="border: 1px solid #000; text-align:left; padding:2px;"><b><script>document.write(`${REGION}`)</script></b></th>
		  					<th style="border: 1px solid #000; text-align:center; padding:2px" id="caraga_ec_cum"></th>
		  					<th style="border: 1px solid #000; text-align:center; padding:2px" id="caraga_ec_now"></th>
		  					<th style="border: 1px solid #000; text-align:center; padding:2px"></th>
		  					<th style="border: 1px solid #000; text-align:center; padding:2px" id="caraga_fam_cum"></th>
		  					<th style="border: 1px solid #000; text-align:center; padding:2px" id="caraga_fam_now"></th>
		  					<th style="border: 1px solid #000; text-align:center; padding:2px" id="caraga_per_cum"></th>
		  					<th style="border: 1px solid #000; text-align:center; padding:2px" id="caraga_per_now"></th>
		  					<th style="border: 1px solid #000; text-align:center; padding:2px"></th>
		  					<th style="border: 1px solid #000; text-align:center; padding:2px"></th>
		  					<th style="border: 1px solid #000; text-align:center; padding:2px"></th>
		  				</tr>
		  			</tbody>
		  			<tfoot>
						<tr>
							<td colspan="12" style="border: 1px solid #000; text-align:center; padding:2px; background-color: #808080; color: #000"><center><strong>**** NOTHING FOLLOWS ****</strong></center></td>
						</tr>
						<tr>
		    				<th style="text-align:center; font-weight:lighter" colspan="11"> </th>
		    			</tr>
						<tr>
		    				<th style="text-align:center; font-weight:bolder; color: #000" colspan="4">Prepared by: </th>
		    				<th style="text-align:center; font-weight:bolder; color: #000" colspan="4">Recommended by: </th>
		    				<th style="text-align:center; font-weight:bolder; color: #000" colspan="4">Approved by: </th>
		    			</tr>
		    			<tr>
		    				<th style="text-align:center; font-weight:lighter; color: #000" colspan="12"> </th>
		    			</tr>
		    			<tr>
		    				<th style="text-align:center; font-weight:bolder; color: #000" colspan="4" id="spreparedby2"></th>
		    				<th style="text-align:center; font-weight:bolder; color: #000" colspan="4" id="srecommendedby2"></th>
		    				<th style="text-align:center; font-weight:bolder; color: #000" colspan="4" id="sapprovedby2"></th>
		    			</tr>
		    			<tr>
		    				<th style="text-align:center; font-weight:bolder; color: #000" colspan="4" id="spreparedbypos2"></th>
		    				<th style="text-align:center; font-weight:bolder; color: #000" colspan="4" id="srecommendedbypos2"></th>
		    				<th style="text-align:center; font-weight:bolder; color: #000" colspan="4" id="sapprovedbypos2"></th>
		    			</tr>
					</tfoot>
		  		</table>
		  	</div>	
	  	</div>
	  </div>
	  <div id="evacuation_stats_outside" class="tab-pane fade">
	  	<br>
		  	<div class="col-md-12" style="margin-top:10px"><label><i class="fa fa-info-circle"></i> Reminders: Double click each entry to update/edit.</label></div>
		    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="border:1px solid gray;" id="tbl_evacuation_stats_outside">
			    <table style="width:100%;">
		    		<thead>
		    			<tr>
		    				<th colspan="7" style="text-align:center; font-weight:lighter">Department of Social Welfare and Development</th>
		    			</tr>
		    			<tr>
		    				<th colspan="7" style="text-align:center;"><b>DISASTER RESPONSE, OPERATIONS, MONITORING AND INFORMATION CENTER</b></th>
		    			</tr>
		    			<tr>
		    				<th colspan="7" style="text-align:center; font-weight:lighter">Batasan Pambansa Complex, Constitution Hills</th>
		    			</tr>
		    			<tr>
		    				<th colspan="7" style="text-align:center; font-weight:lighter">Quezon City</th>
		    			</tr>
		    			<tr>
		    				<th colspan="7" style="text-align:center; font-weight:lighter"><br></th>
		    			</tr>
		    			<tr>
		    				<th colspan="7" style="text-align:center;"><b>STATUS OF OUTSIDE EVACUATION CENTERS</b></th>
		    			</tr>
		    			<tr>
		    				<th colspan="7" style="text-align:center; font-weight:lighter" id="asofdate_OEC">As of: </th>
		    			</tr>
		    			<tr>
		    				<th colspan="7" style="text-align:center; font-weight:lighter" id="asoftime_OEC">Time: </th>
		    			</tr>
		    			<tr>
		    				<th colspan="7" style="text-align:left; font-weight:lighter">Region:<b> <script>document.write(`${REGION}`)</script> </b> </th>
		    			</tr>
		    			<tr>
		    				<th colspan="7" style="text-align:left; font-weight:lighter" id="disastertype_OEC"></th>
		    			</tr>
		    			<tr>
		    				<th colspan="7" style="text-align:left; font-weight:lighter" id="disasterdate_OEC"></th>
		    			</tr>
		    		</thead>
		    		<tbody>
		    		</tbody>
		    	</table>
		  		<table style="width:100%" id="evac_stats_outside">
		  			<thead>
		  				<tr>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px; width:30%" rowspan="3">HOST LGU<br>Province/City/Municipality</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" rowspan="3">BARANGAY</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="4">NUMBER SERVED</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" rowspan="3">PLACE OF ORIGIN</th>
		  				</tr>
		  				<tr>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="2">Families</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="2">Persons</th>
		  				</tr>
		  				<tr>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">Cum</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">Now</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">Cum</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">Now</th>
		  				</tr>		
		  			</thead>
		  			<tbody>
		  				<tr style="background-color:red; color:#fff">
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:left; padding:2px;"><b><script>document.write(`${REGION}`)</script></b></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="caraga_brgy_num_o"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="caraga_fam_cum_o"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="caraga_fam_now_o"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="caraga_per_cum_o"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="caraga_per_now_o"></th>
		  				</tr>
		  			</tbody>
		  			<tfoot>
						<tr>
							<th colspan="7" style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px;"> <center>*** NOTHING FOLLOWS ***</center></th>
						</tr>
			    		<tr>
		    				<th style="text-align:center; font-weight:lighter" colspan="7"> </th>
		    			</tr>
						<tr>
		    				<th style="text-align:center; font-weight:bolder" colspan="1">Prepared by: </th>
		    				<th style="text-align:center; font-weight:bolder" colspan="3">Recommended by: </th>
		    				<th style="text-align:center; font-weight:bolder" colspan="3">Approved by: </th>
		    			</tr>
		    			<tr>
		    				<th style="text-align:center; font-weight:lighter" colspan="7"> </th>
		    			</tr>
		    			<tr>
		    				<th style="text-align:center; font-weight:bolder" colspan="1" id="spreparedby3"></th>
		    				<th style="text-align:center; font-weight:bolder" colspan="3" id="srecommendedby3"></th>
		    				<th style="text-align:center; font-weight:bolder" colspan="3" id="sapprovedby3"></th>
		    			</tr>
		    			<tr>
		    				<th style="text-align:center; font-weight:bolder" colspan="1" id="spreparedbypos3"></th>
		    				<th style="text-align:center; font-weight:bolder" colspan="3" id="srecommendedbypos3"></th>
		    				<th style="text-align:center; font-weight:bolder" colspan="3" id="sapprovedbypos3"></th>
		    			</tr>
					</tfoot>
		  		</table>	
		  	</div>
	  </div>
	  <div id="evacuation_sex_age" class="tab-pane fade">
	  	<br>
		  	<div class="col-md-12" style="margin-top:10px"><label><i class="fa fa-info-circle"></i> Reminders: Double click each entry to update/edit.</label></div>
		    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="border:1px solid gray;" id="tbl_evacuation_sex_age">
			    <table style="width:100%;">
		    		<thead>
		    			<tr>
		    				<th colspan="53" style="text-align:center; font-weight:lighter">Department of Social Welfare and Development</th>
		    			</tr>
		    			<tr>
		    				<th colspan="53" style="text-align:center;"><b>DISASTER RESPONSE, OPERATIONS, MONITORING AND INFORMATION CENTER</b></th>
		    			</tr>
		    			<tr>
		    				<th colspan="53" style="text-align:center; font-weight:lighter">Batasan Pambansa Complex, Constitution Hills</th>
		    			</tr>
		    			<tr>
		    				<th colspan="53" style="text-align:center; font-weight:lighter">Quezon City</th>
		    			</tr>
		    			<tr>
		    				<th colspan="53" style="text-align:center; font-weight:lighter"><br></th>
		    			</tr>
		    			<tr>
		    				<th colspan="53" style="text-align:center; font-weight: lighter">
		    					<b>SEX AND AGE DISAGGREGATED DATA</b><br/>
		    					<span id="asofdate_SEX"></span><br/>
		    					<span id="asoftime_SEX"></span>
		    				</th>
		    			</tr>
		    			<tr>
		    				<th colspan="53" style="text-align:left; font-weight: lighter">
		    					Region: <b><script>document.write(`${REGION}`)</script></b><br/>
		    					<span id="disastertype_SEX"></span><br/>
		    					<span id="disasterdate_SEX"></span>
		    				</th>
		    			</tr>
		    		</thead>
		    		<tbody>
		    		</tbody>
		    	</table>
		  		<table style="width:100%; font-size: 10px" id="tbl_sex_age">
		  			<thead>
		  				<tr>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px;" rowspan="4">PROVINCE/CITY/MUNICIPALITY</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="32">
		  					SEX AND AGE DISTRIBUTION OF IDPS INSIDE EC</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="20">
		  					SECTORAL DATA OF IDPS INSIDE EC</th>
		  				</tr>	
		  				<tr>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="4">
		  					INFANT < 1 y/o (0-11 mos)</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="4">
		  					TODDLERS 1-3 y/o</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="4">
		  					PRESCHOOLERS 4-5 y/o</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="4">
		  					SCHOOL AGE 6-12 y/o</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="4">
		  					TEENAGE 13-19 y/o</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="4">
		  					ADULT 20-59 y/o</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="4">
		  					SENIOR CITIZENS 60 and above</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="4">
		  					TOTAL</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="2">
		  					PREGNANT WOMEN</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="2">
		  					LACTATING MOTHER</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="4">
		  					UNACCOMPANIED CHILDREN</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="4">
		  					PWDs</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="4">
		  					SOLO PARENTS</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="4">
		  					IPs</th>
		  				</tr>	
		  				<tr>
		  					<!-- infant -->
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="2">MALE</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="2">FEMALE</th>
		  					<!-- toddlers -->
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="2">MALE</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="2">FEMALE</th>
		  					<!-- preschoolers -->
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="2">MALE</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="2">FEMALE</th>
		  					<!-- schoolage -->
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="2">MALE</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="2">FEMALE</th>
		  					<!-- teenage -->
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="2">MALE</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="2">FEMALE</th>
		  					<!-- adult -->
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="2">MALE</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="2">FEMALE</th>
		  					<!-- senior -->
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="2">MALE</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="2">FEMALE</th>
		  					<!-- total -->
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="2">MALE</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="2">FEMALE</th>

		  					<!-- pregnant -->
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="2">FEMALE</th>
		  					<!-- lactating -->
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="2">FEMALE</th>
		  					<!-- unaccompanied -->
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="2">MALE</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="2">FEMALE</th>
		  					<!-- pwd -->
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="2">MALE</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="2">FEMALE</th>
		  					<!-- solo parent -->
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="2">MALE</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="2">FEMALE</th>
		  					<!-- ip -->
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="2">MALE</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" colspan="2">FEMALE</th>
		  				</tr>
		  				<tr>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">CUM</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">NOW</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">CUM</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">NOW</th>

		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">CUM</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">NOW</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">CUM</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">NOW</th>

		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">CUM</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">NOW</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">CUM</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">NOW</th>

		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">CUM</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">NOW</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">CUM</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">NOW</th>

		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">CUM</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">NOW</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">CUM</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">NOW</th>

		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">CUM</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">NOW</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">CUM</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">NOW</th>

		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">CUM</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">NOW</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">CUM</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">NOW</th>

		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">CUM</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">NOW</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">CUM</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">NOW</th>
		  					
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">CUM</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">NOW</th>

		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">CUM</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">NOW</th>

		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">CUM</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">NOW</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">CUM</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">NOW</th>

		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">CUM</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">NOW</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">CUM</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">NOW</th>

		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">CUM</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">NOW</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">CUM</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">NOW</th>
		  					
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">CUM</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">NOW</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">CUM</th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px">NOW</th>
		  				</tr>
		  				<tr id="sex_age_total_caraga">
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:left; padding:2px"><script>document.write(`${REGION}`)</script></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="infant_male_cum_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="infant_male_now_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="infant_female_cum_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="infant_female_now_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="toddlers_male_cum_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="toddlers_male_now_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="toddlers_female_cum_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="toddlers_female_now_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="preschoolers_male_cum_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="preschoolers_male_now_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="preschoolers_female_cum_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="preschoolers_female_now_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="schoolage_male_cum_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="schoolage_male_now_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="schoolage_female_cum_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="schoolage_female_now_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="teenage_male_cum_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="teenage_male_now_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="teenage_female_cum_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="teenage_female_now_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="adult_male_cum_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="adult_male_now_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="adult_female_cum_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="adult_female_now_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="senior_male_cum_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="senior_male_now_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="senior_female_cum_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="senior_female_now_c"></th>

		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="tot_male_cum_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="tot_male_now_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="tot_female_cum_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="tot_female_now_c"></th>

		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="pregnant_cum_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="pregnant_now_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="lactating_mother_cum_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="lactating_mother_now_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="unaccompanied_minor_male_cum_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="unaccompanied_minor_male_now_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="unaccompanied_minor_female_cum_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="unaccompanied_minor_female_now_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="pwd_male_cum_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="pwd_male_now_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="pwd_female_cum_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="pwd_female_now_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="solo_parent_male_cum_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="solo_parent_male_now_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="solo_parent_female_cum_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="solo_parent_female_now_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="ip_male_cum_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="ip_male_now_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="ip_female_cum_c"></th>
		  					<th style="background-color: #808080; color: #000; border:1px solid #000; text-align:center; padding:2px" id="ip_female_now_c"></th>
		  				</tr>
		  			</thead>
		  			<tbody>
		  			</tbody>
		  		</table>	
		  	</div>
	  </div>
	  <div id="casualties" class="tab-pane fade">
	  	<br>
	    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:40px">
	  		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="border:1px solid gray;" id="tbl_ccasualties">
			    <table style="width:100%;">
		    		<thead>
		    			<tr>
		    				<th colspan="13" style="text-align:center; font-weight:lighter; color: #000">Department of Social Welfare and Development</th>
		    			</tr>
		    			<tr>
		    				<th colspan="13" style="text-align:center; color: #000"><b>DISASTER RESPONSE, OPERATIONS, MONITORING AND INFORMATION CENTER</b></th>
		    			</tr>
		    			<tr>
		    				<th colspan="13" style="text-align:center; font-weight:lighter; color: #000">Batasan Pambansa Complex, Constitution Hills</th>
		    			</tr>
		    			<tr>
		    				<th colspan="13" style="text-align:center; font-weight:lighter; color: #000">Quezon City</th>
		    			</tr>
		    			<tr>
		    				<th colspan="13" style="text-align:center; font-weight:lighter; color: #000"><br></th>
		    			</tr>
		    			<tr>
		    				<th colspan="13" style="text-align:center; color: #000"><b>MASTERLIST OF CASUALTIES</b></th>
		    			</tr>
		    			<tr>
		    				<th colspan="13" style="text-align:center; font-weight:lighter; color: #000" id="asofdate_CEC">As of: </th>
		    			</tr>
		    			<tr>
		    				<th colspan="13" style="text-align:center; font-weight:lighter; color: #000" id="asoftime_CEC">Time: </th>
		    			</tr>
		    			<tr>
		    				<th colspan="13" style="text-align:left; font-weight:lighter; color: #000">Region:<b> <script>document.write(`${REGION}`)</script> </b> </th>
		    			</tr>
		    			<tr>
		    				<th colspan="13" style="text-align:left; font-weight:lighter; color: #000" id="disastertype_CEC"></th>
		    			</tr>
		    			<tr>
		    				<th colspan="13" style="text-align:left; font-weight:lighter; color: #000" id="disasterdate_CEC"></th>
		    			</tr>
		    		</thead>
		    		<tbody>
		    		</tbody>
		    	</table>
		    	<table style="width:100%;" id="tbl_casualties">
		    		<thead>
		    			<tr>
		    				<th style="border:1px solid #000; text-align:center; background-color: #808080; color: #000" rowspan="2">No.</th>
		    				<th style="border:1px solid #000; text-align:center; background-color: #808080; color: #000" colspan="3">NAME</th>
		    				<th style="border:1px solid #000; text-align:center; background-color: #808080; color: #000" rowspan="2">AGE</th>
		    				<th style="border:1px solid #000; text-align:center; background-color: #808080; color: #000" rowspan="2">SEX</th>
		    				<th style="border:1px solid #000; text-align:center; background-color: #808080; color: #000" colspan="3">ADDRESS</th>
		    				<th style="border:1px solid #000; text-align:center; background-color: #808080; color: #000" colspan="3">CASUALTIES</th>
		    				<th style="border:1px solid #000; text-align:center; background-color: #808080; color: #000" rowspan="2">REMARKS</th>
		    			</tr>
		    			<tr>
		    				<th style="border:1px solid #000; text-align:center; background-color: #808080; color: #000">LASTNAME</th>
		    				<th style="border:1px solid #000; text-align:center; background-color: #808080; color: #000">FIRSTNAME</th>
		    				<th style="border:1px solid #000; text-align:center; background-color: #808080; color: #000">M.I.</th>
		    				<th style="border:1px solid #000; text-align:center; background-color: #808080; color: #000">PROVINCE</th>
		    				<th style="border:1px solid #000; text-align:center; background-color: #808080; color: #000">CITY/MUNICIPALITY</th>
		    				<th style="border:1px solid #000; text-align:center; background-color: #808080; color: #000">BARANGAY</th>
		    				<th style="border:1px solid #000; text-align:center; background-color: #808080; color: #000">DEAD</th>
		    				<th style="border:1px solid #000; text-align:center; background-color: #808080; color: #000">MISSING</th>
		    				<th style="border:1px solid #000; text-align:center; background-color: #808080; color: #000">INJURED</th>
		    			</tr>
		    		</thead>
		    		<tbody>
		    		</tbody>
		    		<tfoot>
						<tr>
							<th colspan="13" style="border: 1px solid #000; background-color: #808080; color: #000"> <center>*** NOTHING FOLLOWS ***</center></th>
						</tr>
			    		<tr>
		    				<th style="text-align:center; font-weight:lighter; color: #000" colspan="13"> </th>
		    			</tr>
						<tr>
		    				<th style="text-align:center; font-weight:bolder; color: #000" colspan="4">Prepared by: </th>
		    				<th style="text-align:center; font-weight:bolder; color: #000" colspan="4">Recommended by: </th>
		    				<th style="text-align:center; font-weight:bolder; color: #000" colspan="5">Approved by: </th>
		    			</tr>
		    			<tr>
		    				<th style="text-align:center; font-weight:lighter; color: #000" colspan="13"> </th>
		    			</tr>
		    			<tr>
		    				<th style="text-align:center; font-weight:bolder; color: #000" colspan="4" id="spreparedby4"></th>
		    				<th style="text-align:center; font-weight:bolder; color: #000" colspan="4" id="srecommendedby4"></th>
		    				<th style="text-align:center; font-weight:bolder; color: #000" colspan="5" id="sapprovedby4"></th>
		    			</tr>
		    			<tr>
		    				<th style="text-align:center; font-weight:bolder; color: #000" colspan="4" id="spreparedbypos4"></th>
		    				<th style="text-align:center; font-weight:bolder; color: #000" colspan="4" id="srecommendedbypos4"></th>
		    				<th style="text-align:center; font-weight:bolder; color: #000" colspan="5" id="sapprovedbypos4"></th>
		    			</tr>
					</tfoot>
		    	</table>
	    	</div>	
	  	</div>
	  </div>
	 <div id="home2" class="tab-pane fade">
	 		<div class="col-md-12" style="margin-top:10px"><label><i class="fa fa-info-circle"></i> Reminders: Double click each entry to update/edit.</label></div>
	    	<div class="col-md-12" style="border:1px solid gray;" id="tbl_damage_assistance">
		    	<table style="width:100%;">
		    		<thead>
		    			<tr>
		    				<th colspan="17" style="text-align:center; font-weight:lighter; color: #000">Department of Social Welfare and Development</th>
		    			</tr>
		    			<tr>
		    				<th colspan="17" style="text-align:center; color: #000"><b>DISASTER RESPONSE, OPERATIONS, MONITORING AND INFORMATION CENTER</b></th>
		    			</tr>
		    			<tr>
		    				<th colspan="17" style="text-align:center; font-weight:lighter; color: #000">Batasan Pambansa Complex, Constitution Hills</th>
		    			</tr>
		    			<tr>
		    				<th colspan="17" style="text-align:center; font-weight:lighter; color: #000">Quezon City</th>
		    			</tr>
		    			<tr>
		    				<th colspan="17" style="text-align:center; font-weight:lighter; color: #000"><br></th>
		    			</tr>
		    			<tr>
		    				<th colspan="17" style="text-align:center; color: #000"><b>STATUS OF DAMAGES AND COST OF ASSISTANCE</b></th>
		    			</tr>
		    			<tr>
		    				<th colspan="17" style="text-align:center; font-weight:lighter; color: #000" id="asofdate2">As of: </th>
		    			</tr>
		    			<tr>
		    				<th colspan="17" style="text-align:center; font-weight:lighter; color: #000" id="asoftime2">Time: </th>
		    			</tr>
		    			<tr>
		    				<th colspan="17" style="text-align:left; font-weight:lighter; color: #000">Region:<b> <script>document.write(`${REGION}`)</script> </b> </th>
		    			</tr>
		    			<tr>
		    				<th colspan="17" style="text-align:left; font-weight:lighter; color: #000" id="disastertype2"></th>
		    			</tr>
		    			<tr>
		    				<th colspan="17" style="text-align:left; font-weight:lighter; color: #000" id="disasterdate2"></th>
		    			</tr>
		    		</thead>
		    		<tbody>
		    			<table style="width:100%;" id="tbl_casualty_asst">
		    				<thead>
		    					<tr>
		    						<th rowspan="3" style="border:1px solid #000; text-align:center; background-color: #808080; color: #000">AFFECTED AREAS <br>(Province/City/Municipality/Barangay)</th>
		    						<th colspan="2" style="border:1px solid #000; text-align:center; background-color: #808080; color: #000">NUMBER OF</th>
		    						<th rowspan="2" colspan="4" style="border:1px solid #000; text-align:center; background-color: #808080; color: #000">COST OF ASSISTANCE</th>
		    					</tr>
		    					<tr>
		    						<th colspan="2" style="border:1px solid #000; text-align:center; background-color: #808080; color: #000">DAMAGED HOUSES</th>
		    						<!-- <th colspan="3" style="border:1px solid #000; text-align:center; background-color: #808080; color: #000">CASUALTIES</th> -->
		    					</tr>
		    					<tr>
		    						<th style="border:1px solid #000; text-align:center; background-color: #808080; color: #000">TOTALLY</th>
		    						<th style="border:1px solid #000; text-align:center; background-color: #808080; color: #000">PARTIALLY</th>
<!-- 		    						<th style="border:1px solid #000; text-align:center; background-color: #808080; color: #000">DEAD</th>
		    						<th style="border:1px solid #000; text-align:center; background-color: #808080; color: #000">INJURED</th>
		    						<th style="border:1px solid #000; text-align:center; background-color: #808080; color: #000">MISSING</th> -->
		    						<th style="border:1px solid #000; text-align:center; background-color: #808080; color: #000">TOTAL</th>
		    						<th style="border:1px solid #000; text-align:center; background-color: #808080; color: #000">DSWD</th>
		    						<th style="border:1px solid #000; text-align:center; background-color: #808080; color: #000">LGUs</th>
		    						<th style="border:1px solid #000; text-align:center; background-color: #808080; color: #000">NGOs/OTHER GOs</th>
		    					</tr>
		    				</thead>
		    				<tbody>
		    				</tbody>
		    				<tfoot>
								<tr>
									<th colspan="7" style="border:1px solid #000; background-color: #808080; color: #000"> <center>*** NOTHING FOLLOWS ***</center></th>
								</tr>
					    		<tr>
				    				<th style="text-align:center; font-weight:lighter; color: #000" colspan="7"> </th>
				    			</tr>
								<tr>
				    				<th style="text-align:center; font-weight:bolder; color: #000" colspan="3">Prepared by: </th>
				    				<th style="text-align:center; font-weight:bolder; color: #000" colspan="3">Recommended by: </th>
				    				<th style="text-align:center; font-weight:bolder; color: #000" colspan="4">Approved by: </th>
				    			</tr>
				    			<tr>
				    				<th style="text-align:center; font-weight:lighter; color: #000" colspan="7"> </th>
				    			</tr>
				    			<tr>
				    				<th style="text-align:center; font-weight:bolder; color: #000" colspan="3" id="spreparedby5"></th>
				    				<th style="text-align:center; font-weight:bolder; color: #000" colspan="3" id="srecommendedby5"></th>
				    				<th style="text-align:center; font-weight:bolder; color: #000" colspan="4" id="sapprovedby5"></th>
				    			</tr>
				    			<tr>
				    				<th style="text-align:center; font-weight:bolder; color: #000" colspan="3" id="spreparedbypos5"></th>
				    				<th style="text-align:center; font-weight:bolder; color: #000" colspan="3" id="srecommendedbypos5"></th>
				    				<th style="text-align:center; font-weight:bolder; color: #000" colspan="4" id="sapprovedbypos5"></th>
				    			</tr>
							</tfoot>
		    			</table>
		    		</tbody>
		    	</table>
		    </div>
	 </div>
	 <div id="assistance" class="tab-pane fade">
	 		<div class="col-md-12" style="margin-top:10px"><label><i class="fa fa-info-circle"></i> Reminders: Double click each entry to update/edit.</label></div>
	    	<div class="col-md-12">
		    	<div class="col-md-5 bg-white">
		    		<div class="x_panel">
		    			<div class="x-title green"><h2><strong>DSWD Food and Non-Food Assistance to LGU</strong></h2></div>
		                <div class="clearfix"></div>
		                <div class="x-content">
		                  <div class="dashboard-widget-content" style="text-align:justify">
		                    <div class="col-md-12 form-group">
	                    		<select class="form-control" id="provinceAssistance">
			              			<option value="">--- Select Province ---</option>
			              		</select>
		                    </div>
		                    <div class="form-group col-md-12">
			              		<select class="form-control" id="cityAssistance">
			              			<option value="">-- Select City/Municipality --</option>
			              		</select>
			              	</div>
			              	<div class="col-md-6 xdisplay_inputx form-group has-feedback">
		      					<label> Augmentation Date </label>
                                <input type="text" class="form-control has-feedback-left" id="single_cal3" placeholder="Augmentation Date" aria-describedby="inputSuccess2Status3">
                                <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                                <span id="inputSuccess2Status3" class="sr-only">(success)</span>
                            </div>
                            <div class="col-md-6">
                            	<label> Number of families served </label>
                            	<input type="number" class="form-control" id="families_served" min="1" placeholder="Number of families served">
                            </div>
			              	<table class="table table-responsive col-md-12" id="tbl_ch_assistance">
		      					<tbody>
		      						<tr>
		      							<td colspan="4">
		      								<center><strong>---- Select Food and Non-Food Assistance ----</strong></center>
		      							</td>
		      						</tr>
		      						<tr>
		      							<td style="width:50%">
		      								<div class="form-group col-md-12">
							              		<input type="text" class="form-control" id="fnfiassistance" name="fnfiassistance" placeholder="Food and Non-Food">
							              	</div>
		      							</td>
		      							<td>
		      								<div class="form-group col-md-12">
							              		<input type="number" id="fnficost" class="form-control" placeholder="Cost" min="1">
							              	</div>
		      							</td>
		      							<td>
		      								<div class="form-group col-md-12">
							              		<input type="number" id="fnfiquantity" class="form-control" placeholder="Quantity" min="1">
							              	</div>
		      							</td>
		      							<td style="vertical-align:middle"> <button type="button" class="btn btn-primary btn-xs" id="addasstfnfi"><span class="fa fa-plus-circle"></button> </td>
		      						</tr> 
		      					</tbody>
		      				</table>
		      				<table class="table table-responsive col-md-12" id="tbl_assistance_list" style="margin-top:-35px">
		      					<thead>
		      						<tr>
		      							<td colspan="4">
		      								<center><strong>List of Food and Non-Food Assistance to be provided...</strong></center>
		      							</td>
		      						</tr>
		      						<tr>
		      							<th style="width:50%">
		      								Item
		      							</th>
		      							<th style="width:15%">
		      								Cost
		      							</th>
		      							<th style="width:15%; text-align:right">
		      								Quantity
		      							</th>
		      							<th style="width:15%; text-align:right">
		      								Sub-total
		      							</th>
		      							<td style="width:5%"> </td>
		      						</tr>
		      					</thead>
		      					<tbody>
		      					</tbody>
		      					<tfoot>
		      						<tr>
		      							<th style="width:50%; font-size:20px; text-align:left"> Total </th> 
		      							<th colspan="3" style="font-size:20px; text-align:right">
		      								₱ <span id="fnfi_running_total">0</span>
		      							</th>
		      							<th> </th>
		      						</tr>
		      					</tfoot>
		      				</table>
		      				<div class="form-group col-md-12">
		      					<textarea class="form-control" placeholder="Remarks" id="fnfi_remarks"></textarea>
		      				</div>
		      				<!-- <div class="form-group col-md-12">
		      					<input type="radio" class="flat" name="isfoaugmentation"> FO-Caraga Augmentation
		      					<input type="radio" class="flat" name="isfoaugmentation"> Other Region Augmentation
		      				</div> -->
		      				<div class="form-group col-md-12">
		      					<button type="button" class="btn btn-success pull-right btn-sm" id="saveassistance"> <i class="fa fa-plus-circle"></i> Save Assistance </button>
		      				</div>
		                  </div>
		                </div>
		    		</div>
		    	</div>
		    	<div class="col-md-7 bg-white">
		    		<br>
		    		<div class="pull-right">
		    				<label style="font-size:15px">Total Number of Family Food Packs Augmented: <span id="totffps"> </span> </label><br>
		    				<label style="font-size:15px">Total Amount of Family Food Packs Augmented: <span id="amtffps"> </span> </label><br>
		    				<label style="font-size:15px">Total Amount of Other Food and Non-Food Items: <span id="amtnfi"> </span> </label>
		    		</div>
		    		<br>
		    		<div class="x_panel">
		    			<div class="x-title green"><h2><strong>LGUs Provided with Food and Non-Food Asssitance</strong></h2></div>
		                <div class="clearfix"></div>
		                <div class="x-content">
		                  <div class="dashboard-widget-content" style="text-align:justify">
		                  		<table class="table table-responsive table-hover table-striped" id="lgu_list_assistance">
		                  			<thead>
		                  				<tr>
			                  				<th> Province/City/Municipality </th>
			                  				<th> Food and Non-Food Assistance </th>
			                  				<th style="text-align:right"> Quantity</th>
			                  				<th style="text-align:right"> Cost</th>
			                  				<th style="text-align:right"> Date Augmented </th>
			                  				<th style="text-align:right"> Amount </th>
			                  				<th style="text-align:center"></th>
			                  			</tr>
		                  			</thead>
		                  			<tbody>
		                  			</tbody>
		                  		</table>
		                  </div>
		                </div>
		            </div>
		    	</div>
		    </div>
	 </div>
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
	 <div id="viewchart" class="tab-pane fade">
	 		
 		<div class="col-md-12" style="margin-top:20px; width:100%;">
 			<div class="col-md-12 bg-white" id="dromic_chart" style="height: 600px">
	 		</div>
 		</div>
 		<div class="col-md-12" style="margin-top:20px; width:100%;">
 			<div class="col-md-12 bg-white" id="dromic_chart_2" style="height: 600px">
	 		</div>
 		</div>
	 </div>
	</div>

	<ul class='custom-menu'>
	  <li data-action = "first">First thing</li>
	  <li data-action = "second">Second thing</li>
	  <li data-action = "third">Third thing</li>
	</ul>

	<div id="addfamnInside" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" style="width:50%">

          <!-- Modal content-->
          <div class="modal-content" >
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title"> <label>Add</label> <strong>Total Affected Families</strong></h4>
            </div>
            <div class="modal-body">
	            <div class="row">
	              	<div class="form-group col-md-12">
	              		<label>
	              		Reminders: Kindly fill fields correctly. Fields marked with (<i style="color:red">*</i>) are required.
	              		</label>
	              	</div>
	            </div>
              <div class="row">
              	<div class="form-group col-md-6">
              		<label> <i style="color:red">*</i>  Select Province </label>
              		<select class="form-control" id="addfamNinsideECprov">
              			<option value="">--- Select Province ---</option>
              		</select>
              	</div>
              	<div class="form-group col-md-6">
              		<label> <i style="color:red">*</i> Select City/Municipality </label>
              		<select class="form-control" id="addfamNinsideECcity">
              			<option value="">-- Select City/Municipality --</option>
              		</select>
              	</div>
              	<div class="form-group col-md-4">
              		<label> <i style="color:red">*</i>  No. of Affected Barangay </label>
              		<input type="number" class="form-control" id="ecnbrgy" style="text-align: center">
              	</div>
              	<div class="form-group col-md-4">
              		<label> <i style="color:red">*</i>  No. of Affected Family </label>
              		<input type="number" class="form-control" id="ecnfamcum" style="text-align: center">
              	</div>
              	<div class="form-group col-md-4">
              		<label> <i style="color:red">*</i>  No. of Affected Persons </label>
              		<input type="number" class="form-control" id="ecnpercum" style="text-align: center">
              	</div>
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-sm" onclick="addnFamIEC()" id="addnECS"><i class="fa fa-plus-circle"></i> Save and Close</button>
              <button type="button" class="btn btn-warning btn-sm" onclick="addnFamAECS()" id="addnAECS"><i class="fa fa-plus-circle"></i> Save and Add New Data</button>
              <!-- <button type="button" class="btn btn-primary btn-sm" id="addCOECS"><i class="fa fa-pencil"></i> Clear Fields and Add Evacuees from Other Barangay with this EC</button> -->

              <!-- <button type="button" class="btn btn-warning btn-sm" id="updatenECS"><i class="fa fa-pencil"></i> Update Data</button>
              <button type="button" class="btn btn-danger btn-sm" id="deleteEnCS"><i class="fa fa-remove"></i> Delete Data</button> -->
            </div>
          </div>

        </div>
      </div>
    </div>

	<div id="addfaminsideEC" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" style="width:50%">

          <!-- Modal content-->
          <div class="modal-content" >
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title"> <label id="headertitle">Add</label> <strong>Affected Families Inside Evacuation Center</strong></h4>
            </div>
            <div class="modal-body">
	            <div class="row">
	              	<div class="form-group col-md-12">
	              		<label>
	              		Reminders: Kindly fill fields correctly. Fields marked with (<i style="color:red">*</i>) are required.
	              			However, if the evacuation center already exist you can leave the (EC CUM, EC NOW and EC Status) as blank.
	              		</label>
	              	</div>
	            </div>
              <div class="row">
              	<div class="form-group col-md-6">
              		<label> <i style="color:red">*</i>  Select Province </label>
              		<select class="form-control" id="addfaminsideECprov">
              			<option value="">--- Select Province ---</option>
              		</select>
              	</div>
              	<div class="form-group col-md-6">
              		<label> <i style="color:red">*</i> Select City/Municipality </label>
              		<select class="form-control" id="addfaminsideECcity">
              			<option value="">-- Select City/Municipality --</option>
              		</select>
              	</div>
              	<div class="form-group col-md-12">
              		<label> <i style="color:red">*</i>  Barangay Located (EC) </label>
              		<select id="brgylocated_ec" style="width: 100%">
              			<option value="">Select Barangay</option>
              		</select>
              	</div>
              	<div class="form-group col-md-12">
              		<label> <i style="color:red">*</i>  Name of Evacuation Center </label>
              		<input type="text" class="form-control" id="ecname">
              	</div>
              	<div class="form-group col-md-6">
              		<label> <i style="color:red">*</i>  EC CUM </label>
              		<input type="number" class="form-control" id="ecicum" min="0">
              	</div>
              	<div class="form-group col-md-6">
              		<label> <i style="color:red">*</i>  EC NOW </label>
              		<input type="number" class="form-control" id="ecinow" min="0">
              	</div>
              	<div class="form-group col-md-6">
              		<label> <i style="color:red">*</i>  Family CUM </label>
              		<input type="number" class="form-control" id="ecfamcum">
              	</div>
              	<div class="form-group col-md-6">
              		<label> <i style="color:red">*</i>  Family NOW </label>
              		<input type="number" class="form-control" id="ecfamnow">
              	</div>
              	<div class="form-group col-md-6">
              		<label> <i style="color:red">*</i>  Persons CUM </label>
              		<input type="number" class="form-control" id="ecpercum">
              	</div>
              	<div class="form-group col-md-6">
              		<label> <i style="color:red">*</i>  Persons NOW </label>
              		<input type="number" class="form-control" id="ecpernow">
              	</div>
              	<div class="form-group col-md-12">
              		<label> <i style="color:red">*</i>  Place of Origin (Evacuees) </label>
              		<select id="ecplaceorigin" style="width: 100%" multiple>
              		</select>
              	</div>
              	<!-- <div class="form-group col-md-6">
              		<label> <i style="color:red">*</i>  Specific Location/Place of Origin (Evacuees)</label>
              		<input type="text" class="form-control" id="ecplaceorigin1" disabled>
              	</div> -->
              	<div class="form-group col-md-12">
              		<label> EC Status </label>
              		<select class="form-control" id="ecistatus">
              			<option value="">-- Select EC Status --</option>
              			<option value="Newly-Opened">Newly-Opened</option>
              			<option value="Existing">Existing</option>
              			<option value="Closed">Closed</option>
              			<option value="Re-activated">Re-activated</option>
              		</select>
              	</div>
              	<div class="form-group col-md-12">
              		<label> Remarks: </label>
              		<input type="text" class="form-control" id="ec_remarks">
              	</div>
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-sm" onclick="addFamIEC()" id="addECS"><i class="fa fa-plus-circle"></i> Save and Close</button>
              <button type="button" class="btn btn-warning btn-sm" onclick="addFamAECS()" id="addAECS"><i class="fa fa-plus-circle"></i> Save Data and Add New EC</button>
              <button type="button" class="btn btn-primary btn-sm" onclick="addFamCECS()" id="addCECS"><i class="fa fa-plus-circle"></i> Save Data and continue current EC</button>
              <button type="button" class="btn btn-success btn-sm" onclick="addFamIECS()" id="addMECS"><i class="fa fa-plus-circle"></i> Save Data and continue with this municipality</button>
              <!-- <button type="button" class="btn btn-primary btn-sm" id="addCOECS"><i class="fa fa-pencil"></i> Clear Fields and Add Evacuees from Other Barangay with this EC</button> -->

              <button type="button" class="btn btn-warning btn-sm" id="updateECS"><i class="fa fa-pencil"></i> Update Data</button>
              <button type="button" class="btn btn-danger btn-sm" id="deleteECS"><i class="fa fa-remove"></i> Delete Data</button>
              <button type="button" class="btn btn-primary pull-left btn-sm" id="clearECS" title="Clear other fields except EC and add evacuees from other barangay in this EC"><i class="fa fa-eraser"></i> Clear field and add evacuees in this EC</button>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div id="addnewReport" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm" style="width:35%">

          <!-- Modal content-->
          <div class="modal-content" >
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="form-group col-md-12">
                  <label>Would you like to continue to following details before saving?</label>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                <div class="form-group col-md-3">
	                  <label style="margin-top:8px">Disaster Title</label>
	                </div>
	                <div class="form-group col-md-9">
	                  <input type="text" class="form-control" id="newreporttitle">
	                </div>
	            </div>
	            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                <div class="form-group col-md-3">
	                  <label style="margin-top:8px">As of Date</label>
	                </div>
	                <div class="form-group col-md-9">
	                  <input type="text" class="form-control" value="<?php echo date('Y-m-d') ?>" id="newreportdate">
	                </div>
	            </div>
	            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                <div class="form-group col-md-3">
	                  <label style="margin-top:8px">As of Time</label>
	                </div>
	                <div class="form-group col-md-9">
	                  <input type="text" class="form-control" value="<?php echo date('H:i:s') ?>" id="newreporttime">
	                </div>
	            </div>
	            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                <div class="form-group col-md-3">
	                  <label style="margin-top:8px">Prepared by: </label>
	                </div>
	                <div class="form-group col-md-9">
	                  <input type="text" class="form-control" id="preparedby">
	                </div>
	            </div>
	            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                <div class="form-group col-md-3">
	                  <label style="margin-top:8px">Position: </label>
	                </div>
	                <div class="form-group col-md-9">
	                  <input type="text" class="form-control" id="preparedbypos">
	                </div>
	            </div>
	            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                <div class="form-group col-md-3">
	                  <label style="margin-top:8px">Recommended by: </label>
	                </div>
	                <div class="form-group col-md-9">
	                  <input type="text" class="form-control" id="recommendedby">
	                </div>
	            </div>
	            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                <div class="form-group col-md-3">
	                  <label style="margin-top:8px">Position: </label>
	                </div>
	                <div class="form-group col-md-9">
	                  <input type="text" class="form-control" id="recommendedbypos">
	                </div>
	            </div>
	            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                <div class="form-group col-md-3">
	                  <label style="margin-top:8px">Approved by: </label>
	                </div>
	                <div class="form-group col-md-9">
	                  <input type="text" class="form-control" id="approvedby" value="MARI-FLOR A. DOLLAGA LIBANG">
	                </div>
	            </div>
	            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                <div class="form-group col-md-3">
	                  <label style="margin-top:8px">Position: </label>
	                </div>
	                <div class="form-group col-md-9">
	                  <input type="text" class="form-control" id="approvedbypos" value="Regional  Director">
	                </div>
	            </div>
	            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                <div class="alert alert-danger col-md-12" id="errmsgnewdromicec">
	              	</div>
	            </div>
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary btn-sm" onclick="savenewDromicEC()"><i class="fa fa-mail-forward"></i> Continue</button>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div id="adddamageasst" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm" style="width:35%">

          <!-- Modal content-->
          <div class="modal-content" >
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title"><strong>Cost of Assistance Provided (LGU)</strong></h4>
            </div>
            <div class="modal-body">
              <div class="row">
              	<div class="form-group col-md-6">
              		<label> <i style="color:red">*</i>  Select Province </label>
              		<select class="form-control" id="addDamprov">
              			<option value="">--- Select Province ---</option>
              		</select>
              	</div>
				<div class="form-group col-md-6">
              		<label> <i style="color:red">*</i> Select City/Municipality </label>
              		<select class="form-control" id="addDamcity">
              			<option value="">-- Select City/Municipality --</option>
              		</select>
              	</div>
              	<div class="form-group col-md-12">
                  <center><label style="font-size:15px; display:none" class="green">Number of Damaged Houses</label></center>
                </div>
                <div class="form-group col-md-6" style="margin-top:-15px; display:none">
                  <center><label>Totally Damaged</label></center>
                  <input type="number" class="form-control" style="text-align:center" id="ntotally">
                </div>
                <div class="form-group col-md-6" style="margin-top:-15px; display:none">
                  <center><label>Partially Damaged</label></center>
                  <input type="number" class="form-control" style="text-align:center" id="npartially">
                </div>
                <div class="form-group col-md-12">
                  <center><label style="font-size:15px; display:none" class="green">Number of Casualties</label></center>
                </div>
                <div class="form-group col-md-4" style="margin-top:-15px; display:none">
                  <center><label>Dead</label></center>
                  <input type="number" class="form-control" style="text-align:center" id="ndead">
                </div>
                <div class="form-group col-md-4" style="margin-top:-15px; display:none">
                  <center><label>Missing</label></center>
                  <input type="number" class="form-control" style="text-align:center" id="nmising">
                </div>
                <div class="form-group col-md-4" style="margin-top:-15px; display:none">
                  <center><label>Injured</label></center>
                  <input type="number" class="form-control" style="text-align:center" id="ninjured">
                </div>
                <div class="form-group col-md-12">
                  <center><label style="font-size:15px; margin-top:-15px" class="green">Cost of Assistance</label></center>
                </div>
                <div class="form-group col-md-4" style="margin-top:-10px; display:none">
                  <center><label>DSWD</label></center>
                  <input type="number" class="form-control" style="text-align:center" id="ndswd">
                </div>
                <div class="form-group col-md-6" style="margin-top:-10px">
                  <center><label>Cost of Assistance (LGU)</label></center>
                  <input type="number" class="form-control" style="text-align:center" id="nlgu">
                </div>
                <div class="form-group col-md-6" style="margin-top:-10px;">
                  <center><label>NGO/Other GOs</label></center>
                  <input type="number" class="form-control" style="text-align:center" id="nngo">
                </div>
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary btn-sm" onclick="savenewDamAss()" id="saveDamAss"><i class="fa fa-plus-circle"></i> Save Data</button>
              <button type="button" class="btn btn-warning btn-sm" id="upDamAss"><i class="fa fa-pencil"></i> Update Data</button>
              <button type="button" class="btn btn-danger btn-sm" id="deleteDamAss"><i class="fa fa-remove"></i> Delete Data</button>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div id="addfamOEC" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm" style="width:35%">

          <!-- Modal content-->
          <div class="modal-content" >
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title"><strong>Families Outside EC</strong></h4>
            </div>
            <div class="modal-body">
              <div class="row">
          		<h4 style="font-weight:bold" class="green">  HOST LGU (Temporary Displacement of Evacuees) </h4>
              	<div class="form-group col-md-6">
              		<label> <i style="color:red">*</i>  Select Province </label>
              		<select class="form-control" id="addfamOECprov">
              			<option value="">--- Select Province ---</option>
              		</select>
              	</div>
				<div class="form-group col-md-6">
              		<label> <i style="color:red">*</i> Select City/Municipality </label>
              		<select class="form-control" id="addfamOECcity">
              			<option value="">-- Select City/Municipality --</option>
              		</select>
              	</div>
              	<div class="form-group col-md-12">
              		<label> <i style="color:red">*</i> Select Barangay </label>
              		<select class="form-control" id="addfamOECbrgy">
              			<option value="">-- Select Barangay --</option>
              		</select>
              	</div>
              	<div class="form-group col-md-6">
              		<label> <i style="color:red">*</i> Family CUM </label>
              		<input type="number"  class="form-control" id="famcumO" style="text-align:center">
              	</div>
              	<div class="form-group col-md-6">
              		<label> <i style="color:red">*</i> Family NOW </label>
              		<input type="number"  class="form-control" id="famnowO" style="text-align:center">
              	</div>
              	<div class="form-group col-md-6">
              		<label> <i style="color:red">*</i> Person CUM </label>
              		<input type="number"  class="form-control" id="personcumO" style="text-align:center">
              	</div>
              	<div class="form-group col-md-6">
              		<label> <i style="color:red">*</i> Person NOW </label>
              		<input type="number"  class="form-control" id="personnowO" style="text-align:center">
              	</div>

              	<h4 style="font-weight:bold" class="green">  PLACE OF ORIGIN (Evacuees) </h4>
              	<div class="form-group col-md-6">
              		<label> <i style="color:red">*</i>  Select Province </label>
              		<select class="form-control" id="addfamOECprovO">
              			<option value="">--- Select Province ---</option>
              		</select>
              	</div>
				<div class="form-group col-md-6">
              		<label> <i style="color:red">*</i> Select City/Municipality </label>
              		<select class="form-control" id="addfamOECcityO">
              			<option value="">-- Select City/Municipality --</option>
              		</select>
              	</div>
              	<div class="form-group col-md-12">
              		<label> <i style="color:red">*</i> Select Barangay </label>
              		<select class="form-control" id="addfamOECbrgyO">
              			<option value="">-- Select Barangay --</option>
              		</select>
              	</div>

              	<div class="form-group col-md-12">
              		<label> <i style="color:red">*</i> Please Specify if Others</label>
              		<input class="form-control" id="addfamOECbrgyOothers" disabled>
              	</div>

              </div>

              	<!-- <div class="form-group col-md-12">
              		<label> <i style="color:red">*</i> Number of Affected Barangays </label>
              		<input type="number"  class="form-control" id="numbrgyO" style="text-align:center">
              		<label style="color:red"> <sup>Exclude counting of affected barangay if baragangay already exist in list on affected evacuation center</sup></label>
              	</div>
              </div> -->
            <div class="modal-footer">
              <button type="button" class="btn btn-primary btn-sm" onclick="savenewfamOEC()" id="saveFamOEC"><i class="fa fa-plus-circle"></i> Save Data</button>
              <button type="button" class="btn btn-warning btn-sm" onclick="updateFamOEC()" id="upFamOEC"><i class="fa fa-pencil"></i> Update Data</button>
              <button type="button" class="btn btn-danger btn-sm" id="delFamOEC"><i class="fa fa-remove"></i> Delete Data</button>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div id="addCasualtyModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-sm" style="width:35%">

          <!-- Modal content-->
          <div class="modal-content" >
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title"><strong>Casualties</strong></h4>
            </div>
            <div class="modal-body">
              <div class="row">
              	<div class="form-group col-md-6">
              		<label> <i style="color:red">*</i>  Select Province </label>
              		<select class="form-control" id="addcasualtyprov">
              			<option value="">--- Select Province ---</option>
              		</select>
              	</div>
				<div class="form-group col-md-6">
              		<label> <i style="color:red">*</i> Select City/Municipality </label>
              		<select class="form-control" id="addcasualtycity">
              			<option value="">-- Select City/Municipality --</option>
              		</select>
              	</div>
              	<div class="form-group col-md-12">
              		<label> <i style="color:red">*</i> Place of Origin </label>
              		<input type="text"  class="form-control" id="addcasualtybrgy" style="text-align:center">
              	</div>
              	<div class="form-group col-md-5">
              		<label> <i style="color:red">*</i> Lastname </label>
              		<input type="text"  class="form-control" id="addcasualtylname" style="text-align:center">
              	</div>
              	<div class="form-group col-md-5">
              		<label> <i style="color:red">*</i> Firstname </label>
              		<input type="text"  class="form-control" id="addcasualtyfname" style="text-align:center">
              	</div>
              	<div class="form-group col-md-2">
              		<label> M.I. </label>
              		<input type="text"  class="form-control" id="addcasualtymi" style="text-align:center">
              	</div>
              	<div class="form-group col-md-6">
              		<label> Age </label>
              		<input type="number"  class="form-control" id="addcasualtyage" style="text-align:center">
              	</div>
              	<div class="form-group col-md-6">
              		<label> Sex </label>
              		<select class="form-control" id="addcasualtysex">
              			<option value="Male">Male</option>
              			<option value="Female">Female</option>
              		</select>
              	</div>
              	<center>
	              	<div class="form-group col-md-4">
	              		<label class="custom-control custom-checkbox">
						  <input type="radio" class="custom-control-input flat" name="iscasualty" value="dead">
						  <span class="custom-control-description">Dead</span>
						</label>
					</div>
					<div class="form-group col-md-4">
	              		<label class="custom-control custom-checkbox">
						  <input type="radio" class="custom-control-input flat" name="iscasualty" value="missing">
						  <span class="custom-control-description">Missing</span>
						</label>
					</div>
					<div class="form-group col-md-4">
	              		<label class="custom-control custom-checkbox">
						  <input type="radio" class="custom-control-input flat" name="iscasualty" value="injured">
						  <span class="custom-control-description">Injured</span>
						</label>
					</div>
				</center>
              	<div class="form-group col-md-12">
              		<label> Remarks </label>
              		<textarea class="form-control" rows="5" id="addcasualtyremarks"></textarea>
              	</div>
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary btn-sm" onclick="savenewCAS()" id="addcasualty"><i class="fa fa-plus-circle"></i> Save Data</button>
              <button type="button" class="btn btn-warning btn-sm" onclick="updateCAS()" id="updatecasualty"><i class="fa fa-pencil"></i> Update Data</button>
              <button type="button" class="btn btn-danger btn-sm" onclick="deleteCAS()" id="deletecasualty"><i class="fa fa-remove"></i> Delete Data</button>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div id="addCommentsModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg" style="width:75%">

          <!-- Modal content-->
          <div class="modal-content" >
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title"><strong>Comments and Discussions</strong></h4>
            </div>
            <div class="modal-body">
            <div class="row">
	              <div class="col-sm-10">
	 					<textarea class="form-control" id="txt_comment" data-autoresize placeholder="Enter discussions here..." style="resize: none; overflow: hidden; border-radius: 5px"></textarea>
	              </div>
	              <div class="col-sm-2">
	              	  <button type="button" class="btn btn-primary btn-sm pull-right" onclick="saveComment()" style="margin-top: 10px; border-radius: 100px"><i class="fa fa-comment"></i> Save Comment</button>
	              </div>
          	</div>
            <div class="row" style="height:750px; overflow: auto; border: 3px solid #EB4C3C; margin-top: 10px; padding: 10px">
              	<div class="col-sm-12" id="div_comment"></div>

              	<!-- <div class="panel panel-danger">
			      <div class="panel-heading" id="by">Panel with panel-primary class</div>
			      <div class="panel-body">Panel Content</div>
			    </div> -->

            </div>
          </div>

        </div>
      </div>
    </div>

    <div id="addNarrativeModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content" >
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title"><strong>Attach a Narrative Report</strong></h4>
            </div>
            <div class="modal-body">
	            <div class="row">
		              <div class="col-sm-9">
		 					<input type="file" class="form-control" id="txt_file" accept=".doc, .docx"/>
		              </div>
		              <div class="col-sm-3">
		              	  <button type="button" class="btn btn-primary btn-sm pull-right" onclick="uploadFile()" style="border-radius: 100px"><i class="fa fa-save"></i> Upload File</button>
		              </div>
	          	</div>
	          	<br>
	          	<div class="row">
	          		<div class="col-sm-12" id="dropbox">
			             <!-- <div class="alert alert-info" >
			             </div> -->
		            </div>
	          	</div>
          </div>

        </div>
      </div>
    </div>

    <div class="modal fade" id="editDamageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title"><strong>Update Affected/Damages Houses</strong></h4>
	      </div>
	      <div class="modal-body">
	        <form>
		        <div class="col-md-12">
		            <label style="font-size: 18px"><span id="details_province"></span> > <span id="details_muni"></span> > <span id="details_brgy"></span></label><br/>
		        </div><br/><br/>
		        <div class="form-group col-md-12">
		            <label>Cost of Assistance Provided</label>
		            <input type="number" class="form-control" placeholder="Cost of Assistance Provided" min="0" id="costasst_brgyv2">
		        </div>
		        <div class="form-group col-md-6">
		            <label>Affected Families</label>
		            <input type="number" class="form-control" placeholder="Affected Families" min="0" id="damperbrgy_tot_aff_famv2">
		        </div>
		        <div class="form-group col-md-6">
		            <label>Affected Persons</label>
		            <input type="number" class="form-control" placeholder="Affected Persons" min="0" id="damperbrgy_tot_aff_personv2">
		        </div>
		        <div class="form-group col-md-6">
		            <label>Totally Damaged</label>
		            <input type="number" class="form-control" placeholder="Totally Damaged" min="0" id="damperbrgy_totallyv2">
		        </div>
		        <div class="form-group col-md-6">
		            <label>Partially Damaged</label>
		            <input type="number" class="form-control" placeholder="Partially Damaged" min="0" id="damperbrgy_partiallyv2">
		        </div>
	        </form>
	      </div>
	      <div class="modal-footer">
	        <div class="pull-right">
	        	<button type="button" data-dismiss="modal" class="btn btn-default btn-sm" id="close_edit_modal"><i class='fa fa-times'></i> Cancel</button>	
 				<button type="button" class="btn btn-warning btn-sm" id="updatedata_dam_per_brgyv2"><i class='fa fa-edit'></i> Update Data</button>	
 				<button type="button" class="btn btn-danger btn-sm" id="deldata_dam_per_brgyv2"><i class='fa fa-times-circle'></i> Remove Data</button>	
 			</div>
	      </div>
	    </div>
	  </div>
	</div>

	<div class="modal fade" id="addSexAgeDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	      	<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close_edit_modal">
	          <span aria-hidden="true">&times;</span>
	        </button>
	        <h4 class="modal-title"><strong>Add Sex and Age Data</strong></h4>
	      </div>
	      <div class="modal-body">
	        <form>
		        <div class="col-md-6">
		        	<label>Province</label>
		            <select class="form-control" id="provinceSexAge">
              			<option value="">--- Select Province ---</option>
              		</select>
		        </div>
		        <div class="form-group col-md-6">
		        	<label>City/Municipality</label>
		            <select class="form-control" id="citySexAge">
              			<option value="">--- Select City/Municipality ---</option>
              		</select>
		        </div>
		        <div class="form-group col-md-12">
			        <table class="table table-condensed table-bordered">
			        	<tbody>
			        		<tr>
			        			<th rowspan="2" style="text-align: center; width: 250px; vertical-align: middle">Age Range</th>
			        			<th colspan="2" style="text-align: center">Male</th>
			        			<th colspan="2" style="text-align: center">Female</th>
			        		</tr>
			        		<tr>
			        			<th style="text-align: center">Cum</th>
			        			<th style="text-align: center">Now</th>
			        			<th style="text-align: center">Cum</th>
			        			<th style="text-align: center">Now</th>
			        		</tr>
			        		<tr>
			        			<td style="vertical-align: middle">INFANT less than 1 y/o</td>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="infant_male_cum"></th>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="infant_male_now"></th>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="infant_female_cum"></th>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="infant_female_now"></th>
			        		</tr>
			        		<tr>
			        			<td style="vertical-align: middle">TODDLERS 1-3 y/o</td>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="toddlers_male_cum"></th>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="toddlers_male_now"></th>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="toddlers_female_cum"></th>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="toddlers_female_now"></th>
			        		</tr>
			        		<tr>
			        			<td style="vertical-align: middle">PRESCHOOLERS 4-5 y/o</td>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="preschoolers_male_cum"></th>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="preschoolers_male_now"></th>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="preschoolers_female_cum"></th>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="preschoolers_female_now"></th>
			        		</tr>
			        		<tr>
			        			<td style="vertical-align: middle">SCHOOL AGE 6-12 y/o</td>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="schoolage_male_cum"></th>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="schoolage_male_now"></th>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="schoolage_female_cum"></th>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="schoolage_female_now"></th>
			        		</tr>
			        		<tr>
			        			<td style="vertical-align: middle">TEENAGE 13-19 y/o</td>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="teenage_male_cum"></th>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="teenage_male_now"></th>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="teenage_female_cum"></th>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="teenage_female_now"></th>
			        		</tr>
			        		<tr>
			        			<td style="vertical-align: middle">ADULT 20-59 y/o</td>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="adult_male_cum"></th>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="adult_male_now"></th>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="adult_female_cum"></th>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="adult_female_now"></th>
			        		</tr>
			        		<tr>
			        			<td style="vertical-align: middle">SENIOR CITIZEN 60 y/o and up</td>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="senior_male_cum"></th>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="senior_male_now"></th>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="senior_female_cum"></th>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="senior_female_now"></th>
			        		</tr>
			        		<tr>
			        			<th rowspan="2" style="text-align: center; width: 250px; vertical-align: middle">Sector/Group</th>
			        			<th colspan="2" style="text-align: center">Male</th>
			        			<th colspan="2" style="text-align: center">Female</th>
			        		</tr>
			        		<tr>
			        			<th style="text-align: center">Cum</th>
			        			<th style="text-align: center">Now</th>
			        			<th style="text-align: center">Cum</th>
			        			<th style="text-align: center">Now</th>
			        		</tr>
			        		<tr>
			        			<td style="vertical-align: middle">PREGNANT</td>
			        			<th style="text-align: center"></th>
			        			<th style="text-align: center"></th>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="pregnant_cum"></th>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="pregnant_now"></th>
			        		</tr>
			        		<tr>
			        			<td style="vertical-align: middle">LACTATING WOMEN</td>
			        			<th style="text-align: center"></th>
			        			<th style="text-align: center"></th>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="lactating_mother_cum"></th>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="lactating_mother_now"></th>
			        		</tr>
			        		<tr>
			        			<td style="vertical-align: middle">UNACCOMPANIED CHILDREN</td>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="unaccompanied_minor_male_cum"></th>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="unaccompanied_minor_male_now"></th>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="unaccompanied_minor_female_cum"></th>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="unaccompanied_minor_female_now"></th>
			        		</tr>
			        		<tr>
			        			<td style="vertical-align: middle">PERSONS WITH DISABILITIES</td>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="pwd_male_cum"></th>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="pwd_male_now"></th>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="pwd_female_cum"></th>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="pwd_female_now"></th>
			        		</tr>
			        		<tr>
			        			<td style="vertical-align: middle">SOLO PARENTS</td>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="solo_parent_male_cum"></th>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="solo_parent_male_now"></th>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="solo_parent_female_cum"></th>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="solo_parent_female_now"></th>
			        		</tr>
			        		<tr>
			        			<td style="vertical-align: middle">INDIGENOUS PEOPLES</td>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="ip_male_cum"></th>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="ip_male_now"></th>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="ip_female_cum"></th>
			        			<th style="text-align: center"><input class="form-control" style="text-align: center" type="number" min="0" id="ip_female_now"></th>
			        		</tr>
			        	</tbody>
			        </table>
			    </div>
	        </form>
	      </div>
	      <div class="modal-footer">
	        <div class="pull-right">
	        	<button type="button" class="btn btn-success btn-sm" id="saveSexAgeDate"><i class='fa fa-save'></i> Save Data</button>	
 				<!-- <button type="button" class="btn btn-warning btn-sm" id="updateSexAgeDate"><i class='fa fa-edit'></i> Update Data</button>	 -->
 				<button type="button" class="btn btn-danger btn-sm" id="deleteSexAgeDate"><i class='fa fa-times-circle'></i> Remove Data</button>	
 			</div>
	      </div>
	    </div>
	  </div>
	</div>
	
</div>
	