 <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#"><b>Work Group,Work Name,Work Code,Position etc Creation</b></a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>

      <form method="post" action="<?php echo base_url()?>workgroup/workgrp_ins" id="workgroup">
      <div class="row" style="margin-bottom: 20px">
        <div class="col-sm-4">
          <label class="label_left"><h4>New Details</h4></label>
        </div>
      </div>

      <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">Name of Work/Designation</label>
        </div>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="name_work" id="name_work" placeholder="Type name" required>
        </div>
        
      </div>

      <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">Ucode of Work/Designation</label>
        </div>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="ucode_work" id="ucode_work">
        </div>
        
      </div>

      <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">Name of Work/Designation Group</label>
        </div>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="name_workgrp" placeholder="Type name" id="name_workgrp">
        </div>
        
      </div>

      <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">Ucode of Work/Designation</label>
        </div>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="ucode_workgrp" id="ucode_workgrp">
        </div>
        
      </div>

      <div class="row row_space">
        <div class="col-sm-12">
          <hr style="height: 1px;background-color: #000" />
        </div>
      </div>

      <?php $this->load->view('templates/common_footer'); ?>

  </div>
</div>

<script type="text/javascript">

   window.onload= function()
   {
      $('#idcard').submit(function(){
         if(confirm("Your details will be updated as you have entered in the form. Do you want to proceed?"))
         {
            return true;
         }
         else
         {
            return false;
         }
      });
   }

    function verify_who(z)
    {
    	if(z=='member')
    	{
    		memid=$('#memid').val();
    		$.ajax ({
    			method: 'post',
    			url: "userhome/verify_user/"+memid,
    			success: function(data)
    			{
              if(data)
              {
                  jdata=JSON.parse(data);
                 $('#membername').text(jdata[0]['Firstname']+" "+jdata[0]['Lastname']);
                 $('#memberaddr').text(jdata[0]['address']);
                 $('#memberpic').html("<img src='"+jdata[0]['userpic']+"' alt='no image' />");
                 $('#membermob').text(jdata[0]['mobile']);
                  $('#myModal').modal('toggle');
              }
              else
              {
                  alert("Invalid User!");   
              }
    			}
    		});
    	}
      else if(z=='member2')
      {
         $.ajax ({
            method: 'post',
            url: "userhome/verify_user2",
            success: function(data)
            {
              if(data)
              {
                  alert('Verified!');
                  $('#memid').attr('readonly',true);
                  $('.verify_member').css('display','none');
                  $('#memid').attr('onmousedown','return false');
              }
              else
              {
                  alert("Error! Please try Again");   
              }
            }
         });
      }
      else if(z=='aadhar')
      {
         aadhar=$('#aadhar').val();
         if(isNaN(aadhar)||aadhar=='')
         {
            alert('Invalid Aadhar Number!');
            return false;
         }
         $.ajax ({
             method: 'post',
             url: "idcard/aadhar_verify/"+aadhar,
             success: function(data)
             {
                 if(data)
                 {
                     alert('Verified');
                     $('#aadhar').attr('readonly',true);
                     $('.verify_aadhar').css('display','none');
                     $('#aadhar').attr('onmousedown','return false');
                 }
                 else
                 {
                     alert('Invalid Aadhar Number!');
                 }
             }
         });
      }
      else if(z=='voter')
      {
         aadhar=$('#voter').val();
         $.ajax ({
             method: 'post',
             url: "idcard/voter_verify/"+aadhar,
             success: function(data)
             {
                 if(data)
                 {
                     alert('Verified');
                     $('#voter').attr('readonly',true);
                     $('.verify_voter').css('display','none');
                     $('#voter').attr('onmousedown','return false');
                 }
                 else
                 {
                     alert('Invalid Voter ID Number!');
                 }
             }
         });
      }
      else if(z=='passport')
      {
         aadhar=$('#passport').val();
         $.ajax ({
             method: 'post',
             url: "idcard/passport_verify/"+aadhar,
             success: function(data)
             {
                 if(data)
                 {
                     alert('Verified');
                     $('#passport').attr('readonly',true);
                     $('.verify_passport').css('display','none');
                     $('#passport').attr('onmousedown','return false');
                 }
                 else
                 {
                     alert('Invalid Voter ID Number!');
                 }
             }
         });
      }
      else if(z=='ration')
      {
         aadhar=$('#ration').val();
         $.ajax ({
             method: 'post',
             url: "idcard/ration_verify/"+aadhar,
             success: function(data)
             {
                 if(data)
                 {
                     alert('Verified');
                     $('#ration').attr('readonly',true);
                     $('.verify_ration').css('display','none');
                     $('#ration').attr('onmousedown','return false');
                 }
                 else
                 {
                     alert('Invalid Voter ID Number!');
                 }
             }
         });
      }
      else if(z=='license')
      {
         aadhar=$('#license').val();
         $.ajax ({
             method: 'post',
             url: "idcard/license_verify/"+aadhar,
             success: function(data)
             {
                 if(data)
                 {
                     alert('Verified');
                     $('#license').attr('readonly',true);
                     $('.verify_license').css('display','none');
                     $('#license').attr('onmousedown','return false');
                 }
                 else
                 {
                     alert('Invalid Voter ID Number!');
                 }
             }
         });
      }
      else
    	{
    		alert('Unknown person');
    	}
    }

</script>