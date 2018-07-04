<?php echo form_open('building/test'); ?>
	<div  class="content-wrapper" style='padding: 20px;'>
	<div class="container-fluid">
	  <h4 class="text-center">Building Registration (m)</h4><br>
	
	

	<!-- Parent Area Details -->
	<h5>Parent Area Details</h5>

	<!-- Neighbbourhood -->
	<div class="row form-group">
		<div class="col-md-3">
			<p>Neighbourhood</p>
		</div>
		<div class="col-md-6">
			<input type='text' class="form-control" placeholder="Type Ucode & Confirm or Search & Confirm" id="master" name="txtMaster">
		</div>
		 <div class="col-md-3">
			<button type="button" class="btn btn-default verify_btn " hidden="" data-toggle="modal" data-target="#detailsModal" id="verifyMaster">Verify & Confirm</button>
		</div>
	</div>
	<!-- /Neighbbourhood -->

	<!-- Parliament Seat -->
   <div class="row form-group">
		<div class="col-md-3">
			<p>Parliament Seat</p>
		</div>
		<div class="col-md-6">
			<input type='text' class="form-control" placeholder="Autofill or Type Ucode & Confirm or Search & Confirm" name="txtParliamentSeat" id="parseat"> 
		</div>
		 <div class="col-md-3">
			<button type="button" class="btn btn-default verify_btn" hidden="">Verify & Confirm</button>
		</div>
	</div>
	<!-- /Parliament Seat -->  

	<!-- Assembly Seat -->
	<div class="row form-group">
		<div class="col-md-3">
			<p>Assembly Seat</p>
		</div>
		<div class="col-md-6">
			<input type='text' class="form-control" placeholder="Autofill or Type Ucode & Confirm or Search & Confirm" name="txtAssemblySeat" id="assemblyseat">
		</div>
		 <div class="col-md-3">
			<button type="button" class="btn btn-default verify_btn"  hidden>Verify & Confirm</button>
		</div>
	</div>
	<!-- /Assembly Seat -->
	<!-- /Parent Area Details -->

	<hr>

	<h5>Parent Area of Controlling Departments Details</h5>
	<div class="row form-group">
		<div class="col-md-3">
			<p>Village</p>
		</div>
		<div class="col-md-6">
			<input type='text' class="form-control" placeholder="Type Ucode & Confirm or Search & Confirm" id="master1" name="txtVillage">
		</div>
		 <div class="col-md-3">
			<button type="button" class="btn btn-default verify_btn" hidden="" data-toggle="modal" data-target="#detailsModal" id="verifyMaster">Verify & Confirm</button>
		</div>
	</div>

   <div class="row form-group">
		<div class="col-md-3">
			<p>Police Station</p>
		</div>
		<div class="col-md-6">
			<input type='text' class="form-control" placeholder="Autofill or Type Ucode & Confirm or Search & Confirm" name="txtPolice" id="Police"> 
		</div>
		 <div class="col-md-3">
			<button type="button" class="btn btn-default verify_btn"  hidden="">Verify & Confirm</button>
		</div>
	</div>  

	<div class="row form-group">
		<div class="col-md-3">
			<p>Fire & Safety</p>
		</div>
		<div class="col-md-6">
			<input type='text' class="form-control" placeholder="Autofill or Type Ucode & Confirm or Search & Confirm" name="txtFire" id="fire">
		</div>
		 <div class="col-md-3">
			<button type="button" class="btn btn-default verify_btn"  hidden="">Verify & Confirm</button>
		</div>
	</div>  

	<hr>

	<h5>New Registration Details</h5>
   

	<div class="row form-group">
		<div class="col-md-3">
			<p>Name of Compound</p>
		</div>
		<div class="col-md-6">
			<input type='text' class="form-control" placeholder="Type Name" name="txtName">
		</div>
	</div> 

	<div class="row form-group ruleauth">
		<div class="col-md-3">
			<p>Ruling Authority Reg No</p>
		</div>
		<div class="col-md-6">
			<input type='text' class="form-control" placeholder="Autofill or Type Ucode & Confirm or Search & Confirm" name="txtRuleAuth[]" id="ruleauth1">
		</div>
		<div class="col-md-2">
			<button type="button" class="btn btn-default" data-id="ruleauth1"  >Verify & Confirm</button>
		</div>
		<div class="col-md-1">
			<button type="button" class="btn btn-default" id="addruleauth">+</button>
		</div>
	</div>

	<div id="addauth"></div>

	<div class="row form-group">
		<div class="col-md-3">
			<p>Face & Main Entrance</p>
		</div>
		<div class="col-md-6">
			<select class="form-control" name="selMainEntrance">
				<option value="n">North</option>
				<option value="ne">North East</option>
				<option value="e">East</option>
				<option value="se">South East</option>
				<option value="s">South</option>
				<option value="se">South West</option>
				<option value="w">West</option>
				<option value="nw">North West</option>
			</select>
		</div>
	</div>

	<div class="row form-group">
		<div class="col-md-3">
			<p>Other Entrances</p>
		</div>
		<div class="col-md-2">
			<div>
				<input type="checkbox" name="chkOtherEntrance[]" id="entrancen" value="n">
				<label for="entrancen">Noth</label>
			</div>
			<div>
				<input type="checkbox" name="chkOtherEntrance[]" id="entrancene" value="ne">
				<label for="entrancene">NorthEast</label>
			</div>
			<div>
				<input type="checkbox" name="chkOtherEntrance[]" id="entrancee" value="e">
				<label for="entrancee">East</label>
			</div>
			<div>
				<input type="checkbox" name="chkOtherEntrance[]" id="entrancese" value="se">
				<label for="entrancese">SouthEast</label>
			</div>
		</div>
		<div class="col-md-2">
			<div>
				<input type="checkbox" name="chkOtherEntrance[]" id="entrances" value="s">
				<label for="entrances">South</label>
			</div>
			<div>
				<input type="checkbox" name="chkOtherEntrance[]" id="entrancesw" value="sw">
				<label for="entrancesw">SouthWest</label>
			</div>
			<div>
				<input type="checkbox" name="chkOtherEntrance[]" id="entrancew" value="w">
				<label for="entrancew">West</label>
			</div>
			<div>
				<input type="checkbox" name="chkOtherEntrance[]" id="entrancenw" value="nw">
				<label for="entrancenw">NorthWest</label>
			</div>
		</div>
	</div>
	
	<br>

	<h5>Geographical Postion</h5>
	<div class="row form-group">
		<div class="col-md-3">
			<p>Latitude</p>
		</div>
		<div class="col-md-3">
			<input type="number" class="form-control" name="txtLatitude[]" placeholder="Degrees">
		</div>
		<div class="col-md-3">
			<input type="number" class="form-control" name="txtLatitude[]" placeholder="Minutes">
		</div>
		<div class="col-md-3">
			<input type="number" class="form-control" name="txtLatitude[]" placeholder="Seconds">
		</div>
	</div>
	<div class="row form-group">
		<div class="col-md-3">
			<p>Longitude</p>
		</div>
		<div class="col-md-3">
			<input type="number" class="form-control" name="txtLongitude[]" placeholder="Degrees" >
		</div>
		<div class="col-md-3">
			<input type="number" class="form-control" name="txtLongitude[]" placeholder="Minutes">
		</div>
		<div class="col-md-3">
			<input type="number" class="form-control" name="txtLongitude[]" placeholder="Seconds" step="any">
		</div>
	</div>

	<br>

	<h5>Road Facility</h5>
	<div class="row form-group">
		<div class="col-md-3">
			<p>Road facility</p>
		</div>
		<div class="col-md-6">
			<select name="selRoadFacility" class="form-control">
				<option value="Foot Path">Foot Path</option>
				<option value="Two Wheeler Road">Two Wheeler Road</option>
				<option value="Car Road">Car Road</option>
				<option value="Lorry Road">Lorry Road</option>
			</select>
		</div>
	</div>
	<div class="row form-group">
		<div class="col-md-3">
			<p>Distance to Next Category Road Facility</p>
		</div>
		<div class="col-md-6">
			<input type="text" class="form-control" name="txtDistance">
		</div>
	</div>
	<div class="row form-group">
		<div class="col-md-3">
			<p>Road Atachment Sides</p>
		</div>
		<div class="col-md-3">
			<div>
				<input type="checkbox" name="chkRoad[]" id="roadn" value="n">
				<label for="roadn">Noth</label>
			</div>
			<div>
				<input type="checkbox" name="chkRoad[]" id="roadne" value="ne">
				<label for="roadne">NorthEast</label>
			</div>
			<div>
				<input type="checkbox" name="chkRoad[]" id="roade" value="e">
				<label for="roade">East</label>
			</div>
			<div>
				<input type="checkbox" name="chkRoad[]" id="roadse" value="se">
				<label for="roadse">SouthEast</label>
			</div>
		</div>
		<div class="col-md-3">
			<div>
				<input type="checkbox" name="chkRoad[]" id="roads" value="s">
				<label for="roads">South</label>
			</div>
			<div>
				<input type="checkbox" name="chkRoad[]" id="roadsw" value="sw">
				<label for="roadsw">SouthWest</label>
			</div>
			<div>
				<input type="checkbox" name="chkRoad[]" id="roadw" value="w">
				<label for="roadw">West</label>
			</div>
			<div>
				<input type="checkbox" name="chkRoad[]" id="roadnw" value="nw">
				<label for="roadnw">NorthWest</label>
			</div>
		</div>
	</div>
	
	<br>

	<div class="row form-group">
		<div class="col-md-3">
			<p>Helipad Facility</p>
		</div>
		<div class="col-md-3">
			<input type="radio" name="radHelipad" value="no" id="helipadno" checked>
			<label for="helipadno">No</label>
		</div>
		<div class="col-md-3">
			<input type="radio" name="radHelipad" value="yes" id="helipadyes">
			<label for="helipadyes">Yes</label>
		</div>
	</div>
	
	<br>

	<h5>Nearest Compound (For routemap creation)</h5>
	<div class="row form-group nearcompound">
		<div class="col-md-3">
			<p>Compound Unique Code</p>
		</div>
		<div class="col-md-6">
			<input type="text" name="txtNearCompound[]" class="form-control" id="nearcompound1">
		</div>
		<div class="col-md-2">
			<button type="button" class="btn btn-default" data-id="nearcompound1">Verify & Confirm</button>
		</div>
		<div class="col-md-1">
			<button type="button" class="btn btn-default" id="addnearcompound">+</button>
		</div>
	</div>
	<div id="addcompound"></div>
	
	<br>

	<h5>Chief Postal Service</h5>
	<div class="row form-group">
		<div class="col-md-3">
			<p>Chief Postal Service Agency</p>
		</div>
		<div class="col-md-6">
			<input type="text" name="txtChiefPostalService" class="form-control">
		</div>
	</div>
	<div class="row form-group">
		<div class="col-md-3">
			<p>Pincode</p>
		</div>
		<div class="col-md-6">
			<input type='text' class="form-control" placeholder="" id="pincode" name="txtPincode"  autocomplete='disabled'>
		</div>
	</div> 

	<div class="row form-group">
		<div class="col-md-3">
			<p>Post Office</p>
		</div>
		<div class="col-md-6">
			<select class="form-control" id="postoffice" name="selPostOffice">
			</select>
	</div>
</div>
<br>
<h5>Howmany Storages?</h5>



<div class="row form-group">
		<div class="col-md-3">
			<p> How many Storage Above the Ground Floor</p>
		</div>
		<div class="col-md-6">
			<input type="number" name="agf" class="form-control agf" id="agf">
		</div>
	</div>

	
<div class="row form-group">
		<div class="col-md-3">
			<p>Howmany Storage Below the Ground Floor</p>
		</div>
		<div class="col-md-6">
			<input type="number" name="bgf" class="form-control" id="bgf">
		</div>
	</div>

	<div class="row form-group">
		<div class="col-md-3">
			<p>Howmany Storage with Ground Floor</p>
		</div>
		<div class="col-md-6">
			<input type="number" name="gf" class="form-control" id="gf">
		</div>

		<div class="col-md-3">
			<button type="button" class="btn btn-default" id="sb">View Occupations</button>
		</div>
	</div>
	

	<!-- <h5>Occupations(Seperated Closed Rooms or Flats etc)?</h5> -->
	<!-- <div class="row form-group">
		<div class="col-md-3">
			<p>Have One more Occupations in the Building?</p>
		</div>
		<div class="col-md-3">
			
  	<label><input type="radio" name="optradio">Yes</label>
	</div>
	<div class="col-md-3">
  	<label><input type="radio" name="optradio">No</label>
	</div>
</div> -->
	<!-- </div> -->
	
	<!--  <h5>Enter Occupations(Type),Reaching Fecilities(Ticks) Sqr Feets(Type)</h5>
	

	<div style="border-style: solid;padding: 10px;">
	<h5>+1 Floor(Ucode in Three Digits +001),(Sno. in Four Digit filled left Zeros)</h5>
	<div class="row form-group">
		<div class="col-md-3">
		<p>Howmany Occupations in +1 Floor?</p>	
		</div> -->
		<!-- <div class="col-md-1"> -->
			<input type="number" hidden name="floor[]" class="form-control ocpn">
			<input type="text" hidden name="ocpn[]"  class="form-control" id="ocpn">
		<!-- </div> -->
		<!-- <div class="col-md-2"> -->
		<!-- <p>Reaching Fecility</p>	 -->
		<!-- </div>
		<div class="col-md-2"> -->
		<input type="checkbox" hidden name="facility[0][]" id="Starecase" value="Starecase">
				<label for="entrancenw" hidden>Starecase</label>
		<!-- </div>
		<div class="col-md-2"> -->
		<input type="checkbox" hidden name="facility[0][]" id="Lift" value="Lift">
				<label for="entrancenw" hidden>Lift</label>
		<!-- </div>
		<div class="col-md-2"> -->
	<input type="checkbox" hidden name="facility[0][]" id="Exlavator" value="Exlavator">
				<label for="entrancenw" hidden>Exlavator</label>
	<!-- 	</div> -->


		<!-- </div>  -->
	

		<!-- <div class="row form-group">
		<div class="col-md-2" >
			<p style=" float: right;" >+001 0001</p>
		</div>
		<div class="col-md-2"  > -->
			<input type="text" hidden="" placeholder="Fill Sqfts" name="sqft[][]"  class="form-control" id="sqft">
		<!-- /div>
		<div class="col-md-2">
			<p style=" float: right;">+001 0002</p>
		</div>
		<div class="col-md-2">
			<input type="text" placeholder="Fill Sqfts" name="sqft" class="form-control" id="sqft">
		</div>
		<div class="col-md-2">
			<p style=" float: right;">+001 0003</p>
		</div>
		<div class="col-md-2">
			<input type="text" placeholder="Fill Sqfts" name="sqft" class="form-control" id="sqft">
		</div>
	</div>  -->

	</div>


<br>
<input type="text" class="form-control" id="hide1" name="hide1" hidden="">
<h5>Land Phone Servicer & Phone Numbers</h5>
	<div class="row form-group">
		<div class="col-md-3">
			<p>Land phone Service Name</p>
		</div>
		<div class="col-md-6">
			<select class="form-control" id="service_name" name="service_name">
				<option>Select</option>
				<option>s1</option>
				<option>s2</option>
			</select>
		</div>
	</div>
	<div class="row form-group">
		<div class="col-md-3">
			<p>Nearest Exchange/Office</p>
		</div>
		<div class="col-md-6">
			<select class="form-control" id="office" name="office">
				<option>Select</option>
				<option>o1</option>
				<option>o2</option>
			</select>
		</div>
	</div> 

	<div class="row form-group">
		<div class="col-md-3">
			<p>Land Phone Area Code</p>
		</div>
		<div class="col-md-6">
			<select class="form-control" id="code" name="code">
				<option>Select</option>
				<option>c1</option>
				<option>c2</option>
			</select>
	</div>
</div>

<div class="sr" style="border-style: solid;padding: 10px;">
<div class="row form-group">
		<div class="col-md-3">
			<p>Sr.No.</p>
		</div>
		<div class="col-md-6">
			<input type="text" name="sr_no[]" class="form-control" id="sr_no">
		</div>
	</div>

	<div class="row form-group">
		<div class="col-md-3">
			<p>Land Phone Number</p>
		</div>
		<div class="col-md-6">
			<input type="number"  class="form-control" id="number" name="number[]">
		</div>
	</div>

	<div class="row form-group">
		<div class="col-md-3">
			<p>Occupation of Use Phone</p>
		</div>
		<div class="col-md-6">
			<select class="form-control"  id="occupation"  name="occupation[]">
				<option>Select</option>
				<option>p1</option>
				<option>p2</option>
			</select>
	</div>
</div>



	<div class="row form-group">
		<div class="col-md-3">
			<p>Department of Use Phone in Occu</p>
		</div>
		<div class="col-md-5">
			<input type="text" class="form-control" id="Department" name="Department[0][]">
		</div>
		<div class="col-md-1">
			<button type="button" class="btn btn-default addone">+</button>
			
		</div>
		&nbsp;If another no.click Button
		</div>
	</div>

	<div class="row form-group">
	<div class="col-md-8 offset-md-4">
			<div class="col-md-12">
				<div style="padding: 10px;">
			<button type="button" class="btn btn-default"  id="addfour">+</button>
  
			&nbsp;&nbsp;If Other Phone Service Number.click + Button
		</div>
		</div>
		</div>
	</div>
	<input type="text" id="hide" hidden="">

<?php $this->load->view("templates/common_footer"); ?>
	<script type="text/javascript">
		window.onload=function()
	{

		// $("#master").autocomplete({
		// 	source:['']
		// });
		// $("#master").keyup(function(){
		// 	stag= $(this).val();
		// 	$.ajax({
		// 		url:"<?=site_url('compound/load_neighbourhood')?>/"+stag,
		// 		success:function(data){
		// 			console.log(data)
		// 			data=JSON.parse(data);

		// 			$("#master").autocomplete({
		// 				source:data,
		// 				select: function(event, ui){
		// 					//console.log(ui.item.value);
		// 					$.ajax({
		// 						url:"<?=site_url('compound/verify_neighbourhood')?>/"+ui.item.value,
		// 						success:function (data) {
		// 							data=JSON.parse(data);
		// 							console.log(data)
		// 							$('#parseat').val(data.parliament_seat);
		// 							$('#assemblyseat').val(data.assembly_seat);
									
		// 						}
		// 					})
		// 				}
		// 			});
		// 			$('#master').autocomplete("search");
		// 		}
		// 	});
		// });

		// $("#verifyMaster").click(function(){
		// 	if($('#master').val()!='')
		// 	{
		// 		$.ajax({
		// 			url:"<?=site_url('compound/verify_neighbourhood')?>/"+$('#master').val(),
		// 			success:function (data) {
		// 				data=JSON.parse(data);
		// 				console.log(data);
		// 				if(data)
		// 				{
		// 					$('#detailname').html(data.name);
		// 					$('#detailcapital').html(data.capital);
		// 					$('#detailmaster').html(data.state);
		// 				}
		// 				else
		// 				{
		// 					$('#detailname').html('');
		// 					$('#detailcapital').html('');
		// 					$('#detailmaster').html('');
		// 				}
						
		// 			}
		// 		})
		// 	}
			
		// })

		// $("#pincode").autocomplete({
		// 	source:['']
		// });
		// $("#pincode").keyup(function(){
		// 	stag= $(this).val();
		// 	$.ajax({
		// 		url:"<?=site_url('compound/search_pincode')?>/"+stag,
		// 		success:function(data){
		// 			data=JSON.parse(data);
		// 			$("#pincode").autocomplete({
		// 				source:data,
		// 				select: function(event, ui){
		// 					$.ajax({
		// 						url:"<?=site_url('compound/load_postoffice')?>/"+ui.item.value,
		// 						success:function (data) {
		// 							data=JSON.parse(data);
		// 							html='';
		// 							for(i=0;i<data.length;i++){
		// 								po=data[i]['unique_id'];
		// 								name=data[i]['name'];
		// 								html+="<option value='"+po+"'>"+name+"</option>";
		// 							}
		// 							$("#postoffice").html(html);
		// 						}
		// 					})

		// 				}
		// 			});
		// 			$('#pincode').autocomplete("search");
		// 		}
		// 	});
		// });

		// $("#pincode").change(function(){
		// 	$.ajax({
		// 		url:"<?=site_url('compound/load_postoffice')?>/"+$(this).val(),
		// 		success:function (data) {
		// 			data=JSON.parse(data);
		// 			html='';
		// 			for(i=0;i<data.length;i++){
		// 				po=data[i]['unique_id'];
		// 				name=data[i]['name'];
		// 				html+="<option value='"+po+"'>"+name+"</option>";
		// 			}
		// 			$("#postoffice").html(html);
		// 		}
		// 	})
		// });

		// $('#addruleauth').click(function(){

		// 	slno=$('.ruleauth').length+1;
		// 	html='';
		// 	html+="<div class='row form-group ruleauth'>";
		// 	html+="<div class='offset-md-3 col-md-6'>";
		// 	html+="<input type='text' class='form-control' placeholder='Autofill or Type Ucode & Confirm or Search & Confirm' name='txtRuleAuth[]' id='ruleauth"+slno+"'>";
		// 	html+="</div>";
		// 	html+="<div class='col-md-2'>";
		// 	html+="<button type='button' class='btn btn-default' data-id='ruleauth"+slno+"'>Verify & Confirm</button>";
		// 	html+="</div>";
		// 	html+="<div class='col-md-1'>";
		// 	html+="<button type='button' class='btn btn-danger remove-btn'>x</button>";
		// 	html+="</div>"
		// 	html+="</div>";
		// 	$(html).insertBefore('#addauth')

		// 	$('.remove-btn').on('click',function(){
		// 		$(this).parent().parent().remove();
		// 	})
		// })

		// $('#addnearcompound').click(function(){

		// 	slno=$('.nearcompound').length+1;
		// 	html='';
		// 	html+="<div class='row form-group nearcompound'>";
		// 	html+="<div class='offset-md-3 col-md-6'>";
		// 	html+="<input type='text' class='form-control' p name='txtNearCompound[]' id='nearcompound"+slno+"'>";
		// 	html+="</div>";
		// 	html+="<div class='col-md-2'>";
		// 	html+="<button type='button' class='btn btn-default' data-id='nearcompound"+slno+"'>Verify & Confirm</button>";
		// 	html+="</div>";
		// 	html+="<div class='col-md-1'>";
		// 	html+="<button type='button' class='btn btn-danger remove-btn'>x</button>";
		// 	html+="</div>"
		// 	html+="</div>";
		// 		html+="</div>";
		// 	$(html).insertBefore('#addcompound');

		// 	$('.remove-btn').on('click',function(){
		// 		$(this).parent().parent().remove();
		// 	})
		// })

	// 	$('.addone').on('click',function(){
	// 		slno=$("input[name='sr_no[]']").length-1;
	// 		html='';

	// 	html+="<div class=\"row form-group\">"
	// 	html+="<div class=\"col-md-3\">"
	// 		html+="<p>Department of Use Phone in Occu</p>"
	// 	html+="</div>"
	// 	html+="<div class=\"col-md-5\">"
	// 		html+="<input type=\"text\" name=\"Department["+slno+"][]\" class=\"form-control\" id=\"Department\">"
	// 	html+="</div>"
	// 		html+="<div class='col-md-1'>";
	// 		html+="<button type='button' class='btn btn-danger remove-btn'>x</button>";
	// 		html+="</div>"
	// 	html+="	&nbsp;If another no.click Button";
	// 		html+="</div>";

	// 			$(html).insertAfter($(this).parent().parent());


	// 			$('.remove-btn').on('click',function(){
	// 			$(this).parent().parent().remove();
	// 		})
	// })


	// 	$('#addfour').click(function(){
	// 		slno=$('.sr_no').length+1;
	// 		html='';
	// 		html+="<div class=\"sr\" style=\"border-style: solid;padding: 10px;\">"
	//  	html+="<div class=\"row form-group\">"
	// 		html+="<div class=\"col-md-3\">"
	// 			html+="<p>Sr.No.</p>"
	// 		html+="</div>"
	// 		html+="<div class=\"col-md-6\">"
	// 			html+="<input type=\"text\" name=\"sr_no[]\" class=\"form-control\" id=\"sr_no\">"
	// 	html+="</div>"
	// 	html+="</div>"

	// 	html+="<div class=\"row form-group\">"
	// 		html+="<div class=\"col-md-3\">"
	// 			html+="<p>Land Phone Number</p>"
	// 		html+="</div>"
	// 		html+="<div class=\"col-md-6\">"
	// 			html+="<input type=\"text\"  class=\"form-control\" name=\"number[]\">"
	// 	html+="	</div>"
	// 	html+="</div>"

	// 	html+="<div class=\"row form-group\">"
	// 		html+="<div class=\"col-md-3\">"
	// 			html+="<p>Occupation of Use Phone</p>"
	// 		html+="</div>"
	// 		html+="<div class=\"col-md-6\">"
	// 			html+="<select class=\"form-control\" id=\"sr_no[]\" name=\"occupation[]\">"
	// 				html+="<option>Select</option>"
	// 				html+="<option>p1</option>"
	// 				html+="<option>p2</option>"
	// 			html+="</select>"
	// 	html+="</div>"
	// html+="</div>"


	// 	slno=$("input[name='sr_no[]']").length;

	// 	html+="<div class=\"row form-group\">"
	// 		html+="<div class=\"col-md-3\">"
	// 			html+="<p>Department of Use Phone in Occu</p>"
	// 		html+="</div>"
	// 		html+="<div class=\"col-md-5\">"
	// 			html+="<input type=\"text\" name=\"Department["+slno+"][]\" class=\"form-control\" id=\"Department\">"
	// 		html+="</div>"
	// 		html+="<div class=\"col-md-1\">"
	// 		html+="	<button type=\"button\" class=\"btn btn-default addone\">+</button>"
	// 			html+="</div>"
	// 		html+="&nbsp;If another no.click Button"
	// 		html+="</div>"
	// 	html+="<div class=\"row form-group\">"
	// 	html+="<div class=\"col-md-8 offset-md-4\">"
	// 			html+="<div class=\"col-md-12\">"
	// 		html+="<button type='button' class='btn btn-danger remove-btn'>x</button>";
	// 	html+="&nbsp;&nbsp;If Other Phone Service Number.click + Button";
	// 		html+="</div>"
	// 		html+="</div>"
	// 	html+="</div>"

	// 			$(html).insertBefore('#hide');

	// 			$('.remove-btn').on('click',function(){
	// 			$(this).closest('.sr').remove();
	// 		})

	// 			$('.addone').on('click',function(){
	// 		slno=$("input[name='sr_no[]']").length-1;
			
	// 		html='';

	// 	html+="<div class=\"row form-group\">"
	// 	html+="<div class=\"col-md-3\">"
	// 		html+="<p>Department of Use Phone in Occu</p>"
	// 	html+="</div>"
	// 	html+="<div class=\"col-md-5\">"
	// 		html+="<input type=\"text\" name=\"Department["+slno+"][]\" class=\"form-control\" id=\"Department\">"
	// 	html+="</div>"
	// 		html+="<div class='col-md-1'>";
	// 		html+="<button type='button' class='btn btn-danger remove-btn'>x</button>";
	// 		html+="</div>"
	// 	html+="	&nbsp;If another no.click Button";
	// 		html+="</div>";

	// 			$(html).insertAfter($(this).parent().parent());


	// 			$('.remove-btn').on('click',function(){
	// 			$(this).parent().parent().remove();
	// 		})
	// })
	// })

			$('#agf,#bgf').change(function(){
				agf=parseInt($("#agf").val());
				bgf=parseInt($("#bgf").val());
				gf=(agf+bgf)+1;
				$("#gf").val(gf);
			})

// 			$('#sb1').click(function(){
//     gf=parseInt($("#gf").val());
		
// 				for(var j=agf,i=0;j>=-(bgf);j--,i++){
  	
//     html='';

// 				html+="<h5>Enter Occupations(Type),Reaching Fecilities(Ticks) Sqr Feets(Type)</h5>"
// 			html+="<div style=\"border-style: solid;padding: 10px;\">"
// 			if(j<0){
// 				var s= Math.abs(j);
// 				html+="<h5>"+j+" Floor(Ucode -00"+s+")</h5>"
// 			}
// 			else{
// 		html+="<h5>"+j+" Floor(Ucode 00"+j+")</h5>"
// 	}
// 		html+="<div class=\"row form-group\">"
// 			html+="<div class=\"col-md-2\">"
// 			html+="<p>Howmany Occupations in "+j+" Floor?</p>"	
// 			html+="</div>"
// 			html+="<div class=\"col-md-1\">"
// 				html+="<input type=\"number\" hidden name=\"floor["+i+"]\" class=\"form-control ocpn\" value='"+j+"'>"

// 				html+="<input type=\"number\" name=\"ocpn["+i+"]\" class=\"form-control ocpn\" data-floor='"+i+"'>"
// 		html+="	</div>"
		
// 			html+="<div class=\"col-md-2\">"
// 			html+="<p>Reaching Fecility</p>	"
// 			html+="</div>"
// 			html+="<div class=\"col-md-2\">"
// 			html+="<input type=\"checkbox\" name=\"facility["+i+"][]\" id=\"Starecase\" value=\"Starecase\">"
// 			html+="	<label for=\"entrancenw\">&nbsp;Starecase</label>"
// 			html+="</div>"
// 			html+="<div class=\"col-md-2\">"
// 			html+="<input type=\"checkbox\" name=\"facility["+i+"][]\" id=\"Lift\" value=\"Lift\">"
// 			html+="	<label for=\"entrancenw\">&nbsp;Lift</label>"
// 			html+="</div>"
// 			html+="<div class=\"col-md-2\">"
// 		html+="<input type=\"checkbox\" name=\"facility["+i+"][]\" id=\"Exlavator\" value=\"Exlavator\">"
// 			html+="	<label for=\"entrancenw\">&nbsp;Exlavator</label>"
// 			html+="</div>"
// 			html+="</div>"
// 		 		html+="<div class=\"row form-group row1\">"
// 		// 	html+="<div class=\"col-md-2\" >"
// 		// 		html+="<p style=\" float: right;\">+001 0001</p>"
			
// 		// 	html+="</div>"
// 		// 	html+="<div class=\"col-md-2\"  >"
// 		// 		html+="<input type=\"text\" placeholder=\"Fill Sqfts\" name=\"sqft\"  class=\"form-control\" id=\"sqft\">"
// 		// 	html+="</div>"
// 		// 	html+="<div class=\"col-md-2\">"
// 		// 		html+="<p style=\" float: right;\">+001 0002</p>"
// 		// 	html+="</div>"
// 		// 	html+="<div class=\"col-md-2\">"
// 		// 		html+="<input type=\"text\" placeholder=\"Fill Sqfts\" name=\"sqft\" class=\"form-control\" id=\"sqft\">"
// 		// 	html+="</div>"
// 		// 	html+="<div class=\"col-md-2\">"
// 		// 		html+="<p style=\" float: right;\">+001 0003</p>"
// 		// 	html+="</div>"
// 		// 	html+="<div class=\"col-md-2\">"
// 		// 		html+="<input type=\"text\" placeholder=\"Fill Sqfts\" name=\"sqft\" class=\"form-control\" id=\"sqft\">"
// 		html+="<input type=\"text\" class=\"form-control\" id=\"hide2\" name=\"hide1\" hidden=\"\">"
// 		html+="	</div>"
		
// 		html+="</div>"




// 		$(html).insertBefore('#hide1');
	
// }
// 		$('.ocpn').on('change',function(){
// 			floor=$(this).attr('data-floor');
// 			ocpn=parseInt($(this).val());
// 			console.log(ocpn)
// 						html='';
						
// 								for(var i=1;i<=ocpn;i++){
			


					
// 			html+="<div class=\"col-md-2\" >"
// 				html+="<p style=\" float: right;\">000"+i+"(Sno.)</p>"
			
// 			html+="</div>"
// 			html+="<div class=\"col-md-2\"  >"
// 				html+="<input type=\"number\" placeholder=\"Fill Sqfts\" name=\"sqft["+floor+"][]\"  class=\"form-control\" id=\"sqft\">"
// 			html+="</div>"
		
// 		// $(html).insertBefore('#hide2');
// }

// $(this).parent().parent().siblings('.row1').html(html)
// })

// 	})



$("#sb").click(function(){
			gf=parseInt($("#gf").val());
		agf=parseInt($("#agf").val());
				bgf=parseInt($("#bgf").val());
		
				for(var j=agf,i=0;j>=-(bgf);j--,i++){
  	
    html='';

				html+="<h5>Enter Occupations(Type),Reaching Fecilities(Ticks) Sqr Feets(Type)</h5>"
			html+="<div style=\"border-style: solid;padding: 10px;\">"
			if(j<0){
				var s= Math.abs(j);
				html+="<h5>"+j+" Floor(Ucode -00"+s+")</h5>"
			}
			else{
		html+="<h5>"+j+" Floor(Ucode 00"+j+")</h5>"
	}
		html+="<div class=\"row form-group\">"
			html+="<div class=\"col-md-2\">"
			html+="<p>Howmany Occupations in "+j+" Floor?</p>"	
			html+="</div>"
			html+="<div class=\"col-md-1\">"
				html+="<input type=\"number\" hidden name=\"floor["+i+"]\" class=\"form-control ocpn\" value='"+j+"'>"

				html+="<input type=\"number\" name=\"ocpn["+i+"]\" class=\"form-control ocpn\" data-floor='"+i+"'>"
		html+="	</div>"
		
			html+="<div class=\"col-md-2\">"
			html+="<p>Reaching Fecility</p>	"
			html+="</div>"
			html+="<div class=\"col-md-2\">"
			html+="<input type=\"checkbox\" name=\"facility["+i+"][]\" id=\"Starecase\" value=\"Starecase\">"
			html+="	<label for=\"entrancenw\">&nbsp;Starecase</label>"
			html+="</div>"
			html+="<div class=\"col-md-2\">"
			html+="<input type=\"checkbox\" name=\"facility["+i+"][]\" id=\"Lift\" value=\"Lift\">"
			html+="	<label for=\"entrancenw\">&nbsp;Lift</label>"
			html+="</div>"
			html+="<div class=\"col-md-2\">"
		html+="<input type=\"checkbox\" name=\"facility["+i+"][]\" id=\"Exlavator\" value=\"Exlavator\">"
			html+="	<label for=\"entrancenw\">&nbsp;Exlavator</label>"
			html+="</div>"
			html+="</div>"
		 		html+="<div class=\"row form-group row1\">"
		// 	html+="<div class=\"col-md-2\" >"
		// 		html+="<p style=\" float: right;\">+001 0001</p>"
			
		// 	html+="</div>"
		// 	html+="<div class=\"col-md-2\"  >"
		// 		html+="<input type=\"text\" placeholder=\"Fill Sqfts\" name=\"sqft\"  class=\"form-control\" id=\"sqft\">"
		// 	html+="</div>"
		// 	html+="<div class=\"col-md-2\">"
		// 		html+="<p style=\" float: right;\">+001 0002</p>"
		// 	html+="</div>"
		// 	html+="<div class=\"col-md-2\">"
		// 		html+="<input type=\"text\" placeholder=\"Fill Sqfts\" name=\"sqft\" class=\"form-control\" id=\"sqft\">"
		// 	html+="</div>"
		// 	html+="<div class=\"col-md-2\">"
		// 		html+="<p style=\" float: right;\">+001 0003</p>"
		// 	html+="</div>"
		// 	html+="<div class=\"col-md-2\">"
		// 		html+="<input type=\"text\" placeholder=\"Fill Sqfts\" name=\"sqft\" class=\"form-control\" id=\"sqft\">"
		html+="<input type=\"text\" class=\"form-control\" id=\"hide2\" name=\"hide1\" hidden=\"\">"
		html+="	</div>"
		
		html+="</div>"



		$(html).insertBefore('#hide1');

	
}
		$('.ocpn').on('change',function(){
			floor=$(this).attr('data-floor');
			ocpn=parseInt($(this).val());
			console.log(ocpn)
						html='';
						
								for(var i=1;i<=ocpn;i++){
			


					
			html+="<div class=\"col-md-2\" >"
				html+="<p style=\" float: right;\">000"+i+"(Sno.)</p>"
			
			html+="</div>"
			html+="<div class=\"col-md-2\"  >"
				html+="<input type=\"number\" placeholder=\"Fill Sqfts\" name=\"sqft["+floor+"][]\"  class=\"form-control\" id=\"sqft\">"
			html+="</div>"
		
		// $(html).insertBefore('#hide2');
}

$(this).parent().parent().siblings('.row1').html(html)
})

	})
}
	</script>
