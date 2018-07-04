 <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#"><b>Appoint Sannadha Sevakan</b></a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>

      <form method="post" action="sannadha_sevakan/sannadha_sevakan_appoint">
      <div class="row row_space">
      	<div class="col-sm-4">
      		<label class="label_left">Appointed Sannadha Sevakan</label>
      	</div>
      	<div class="col-sm-5">
      		<input type="text" name="appointed_ss" id="appointed_ss" class="form-control" required>
      	</div>
      	<div class="col-sm-3">
                  <button type="button" class="verify_btn verify_user" onclick="verify_user('appointed_ss')">Verify & Confirm</button>
            </div>
      </div>

      <div class="row row_space">
      	<div class="col-sm-12">
      		<hr style="height: 1px;background-color: #000" />
      	</div>
      </div>

      <?php $this->load->view('templates/common_footer'); ?>
  </form>
  </div>

  <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="display: block;text-align: center;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Verify & Confirm User</h4>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-primary" onclick="check('check')">Confirm</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

</div>

<script type="text/javascript">

	window.onload=function()
	{
		$("#appointed_ss").autocomplete({
			source:['']
		});
		$('#appointed_ss').keyup(function(){
			ssid=$('#appointed_ss').val();
			$.ajax ({
				method: 'post',
				url:'<?=base_url('sannadha_sevakan/get_user/') ?>'+ssid,
				success: function(data)
				{
					if(data)
					{
						data=JSON.parse(data);
						$("#appointed_ss").autocomplete ({
	                        source:data
	                    });
					}
				}
			})
		});
	}

	function verify_user(id)
	{
		userid=$('#'+id).val();
		if(userid=='')
		{
			alert("Invalid user ID!");
			return false;
		}
		else
		{
			$.ajax ({
				method: 'post',
				url: "<?php echo base_url() ?>sannadha_sevakan/verify_user/"+userid,
				success: function(data)
				{
					if(data=='none')
					{
						alert('Invalid user ID!');
					}
					else if(data)
					{
						jdata=JSON.parse(data);
						$("#myModal").find('.modal-body').html("<div class='form-group'>Name: "+jdata[0]['Firstname']+ " "+jdata[0]['Lastname']+"</div><div class='form-group'>Address: "+jdata[0]['address']+"</div><div class='form-group'>Unique ID: "+jdata[0]['user_uniqid']+"</div><div class='form-group' style='float:right;'><div class='col-sm-5'><input type='checkbox' id='check'>&ensp;<b>Confirm</b></div><img src=<?php echo base_url() ?>"+jdata[0]['userpic']+" alt='no image' style='max-width:100%'/></div>");
						$("#myModal").modal();
					}
					else
					{
						alert('Error!')
					}
				}
			});
		}
	}

	function check(id)
	{
		if(!$('#' + id).is(":checked"))
		{
			$('#'+id).focus();
		}
		else
		{
			$.ajax ({
				method: 'post',
				url: "<?php echo base_url() ?>sannadha_sevakan/set_appointed_session/",
				success: function(data)
				{
					if(data=='error')
					{
						alert('Error!');
					}
				}
			});
			$("#myModal").modal('hide');
			$('.verify_user').css('display','none');
			$('#appointed_ss').attr('readonly',true);
			$('#appointed_ss').attr('onmousedown','return false');
			alert('Verified and Confirmed!');
		}
	}

	function save_ss_appoint()
	{
		if(confirm('Are you sure you want to continue?'))
		{
			<?php if(!isset($_SESSION['userDetails']))
			{ echo "alert('Invalid Attempt!')"; } 
			else { ?>
			srno=$('#srno_ss').val();
			appointed=$('#appointed_ss').val();
			registered=$('#registered_ss').val();
			dataoperator=$('#dataoperator').val();
			approved_by=$('#approved_by').val();
			if(srno!=''&&appointed!=''&&registered!=''&&dataoperator!=''&&approved_by!='')
			{
				$.ajax ({
					method:'post',
					url:"<?php echo base_url()?>sannadha_sevakan/sannadha_sevakan_appoint/"+srno+'/'+appointed+'/'+registered+'/'+dataoperator+'/'+approved_by,
					success: function(data)
					{
						console.log('<?php echo json_encode($_SESSION) ?>');
						if(data=='invalid')
						{
							alert("Invalid Attempt");
						}
						else if(data=='unverified')
						{
							alert('Please Verify & Confirm first');
						}
						else if(data=="missing")
						{
							alert("Invalid data supplied");
						}
						else if(data=='yep')
						{
							window.location.href="<?php echo base_url()?>sannadha_sevakan/data_operator_appoint";
						}
						else if(data=='nope')
						{
							alert('An error occured');
						}
						else
						{
							alert("Unknown error occured. Please contact support.");
						}
					}
				});
			}
			else
			{
				alert("Fill all fields to continue");
			}
			<?php } ?>
		}
	}
</script>