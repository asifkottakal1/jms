 <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#"><b>ID Cards Registration</b></a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>

      <form method="post" action="<?php echo base_url()?>idcard/idcard_reg" id="idcard">
      <div class="row" style="margin-bottom: 20px">
        <div class="col-sm-4">
          <label class="label_left"><h4>New Details</h4></label>
        </div>
      </div>

      <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">Aadhar ID</label>
        </div>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="aadhar" id="aadhar" required>
        </div>
        <div class="col-sm-3">
            <button type="button" class="verify_btn verify_aadhar" onclick="verify_who('aadhar')">Verify & Confirm</button>
        </div>
      </div>

      <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">Voters ID</label>
        </div>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="voter" id="voter">
        </div>
        <div class="col-sm-3">
            <button type="button" class="verify_btn verify_voter" onclick="verify_who('voter')">Verify & Confirm</button>
        </div>
      </div>

      <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">Passport ID</label>
        </div>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="passport" id="passport">
        </div>
        <div class="col-sm-3">
            <button type="button" class="verify_btn verify_passport" onclick="verify_who('passport')">Verify & Confirm</button>
        </div>
      </div>

      <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">Ration Card ID</label>
        </div>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="ration" id="ration">
        </div>
        <div class="col-sm-3">
            <button type="button" class="verify_btn verify_ration" onclick="verify_who('ration')">Verify & Confirm</button>
        </div>
      </div>

      <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">Driving License ID</label>
        </div>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="license" id="license">
        </div>
        <div class="col-sm-3">
            <button type="button" class="verify_btn verify_license" onclick="verify_who('license')">Verify & Confirm</button>
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