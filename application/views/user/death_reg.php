 


 <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#"><b>Death Registration</b></a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>

      <form method="post" action="<?php echo base_url()?>death/death_reg" id="death" enctype='multipart/form-data'>
      <div class="row" style="margin-bottom: 20px">
        <div class="col-sm-4">
          <label class="label_left"><h4>New Details</h4></label>
        </div>
      </div>

      <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">Date and Time of Death</label>
        </div>
        &ensp;&ensp;Date
        <div class="col-sm-2">
          <input type="date" class="form-control" name="date" id="date" required>
        </div>
         &ensp;Time
         <div class="col-sm-2">
          <input type="Time" class="form-control" name="time" id="time" required>
        </div>
        
      </div>

      <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">Death Place</label>
        </div>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="place" id="place">
        </div>
        <div class="col-sm-3">
            <button type="button" class="verify_btn verify_place" onclick="verify_who('place')">Verify & Confirm</button>
        </div>
      </div>

     <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">Death Reason</label>
        </div>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="reason" id="reason">
        </div>
        <div class="col-sm-3">
            <button type="button" class="verify_btn verify_reason" onclick="verify_who('reason')">Verify & Confirm</button>
        </div>
      </div>

    

      <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">Burial Place</label>
        </div>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="burial" id="burial">
        </div>
        <div class="col-sm-3">
            <button type="button" class="verify_btn verify_burial" onclick="verify_who('burial')">Verify & Confirm</button>
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
      $('#death').submit(function(){
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
    else if(z=='place')
      {
         place=$('#place').val();
         $.ajax ({
             method: 'post',
             url: "death/place_verify/"+place,
             success: function(data)
             {
                 if(data)
                 {
                     alert('Verified');
                     $('#place').attr('readonly',true);
                     $('.verify_place').css('display','none');
                     $('#place').attr('onmousedown','return false');
                 }
                 else
                 {
                     alert('Invalid  place!');
                 }
             }
         });
      }
     
     else if(z=='reason')
      {
        place=$('#reason').val();
         $.ajax ({
             method: 'post',
             url: "death/reason_verify/"+place,
             success: function(data)
             {
                 if(data)
                 {
                     alert('Verified');
                     $('#reason').attr('readonly',true);
                     $('.verify_reason').css('display','none');
                     $('#reason').attr('onmousedown','return false');
                 }
                 else
                 {
                     alert('Invalid reason!');
                 }
             }
         });
      }
else if(z=='burial')
      {
         place=$('#burial').val();
         $.ajax ({
             method: 'post',
             url: "death/burial_verify/"+place,
             success: function(data)
             {
                 if(data)
                 {
                     alert('Verified');
                     $('#burial').attr('readonly',true);
                     $('.verify_burial').css('display','none');
                     $('#burial').attr('onmousedown','return false');
                 }
                 else
                 {
                     alert('Invalid burial place!');
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
