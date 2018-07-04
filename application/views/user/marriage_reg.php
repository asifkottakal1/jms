 


 <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#"><b>Marriage/Living together Registration</b></a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>

      <form method="post" action="<?php echo base_url(); ?>marriage/marriage_reg" id="marriage" enctype='multipart/form-data'>
      <div class="row" style="margin-bottom: 20px">
        <div class="col-sm-4">
          <label class="label_left"><h4>Partners Datas</h4></label>
        </div>
      </div>

      <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">First partners Uniq ID</label>
        </div>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="fpuid" id="fpuid" required>
        </div>
        <div class="col-sm-3">
            <button type="button" class="verify_btn verify_fpuid" onclick="verify_who('fpuid')">Verify & Confirm</button>
        </div>
      </div>

      <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">Second Partner Uniq ID</label>
        </div>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="spuid" id="spuid">
        </div>
        <div class="col-sm-3">
            <button type="button" class="verify_btn verify_spuid" onclick="verify_who('spuid')">Verify & Confirm</button>
        </div>
      </div>

     <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">Venue</label>
        </div>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="venue" id="venue">
        </div>
        <div class="col-sm-3">
            <button type="button" class="verify_btn verify_venue" onclick="verify_who('venue')">Verify & Confirm</button>
        </div>
      </div>

      <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">Contract Starting Date</label>
        </div>
        <div class="col-sm-5">
          <input type="date" class="form-control" name="cdate" id="cdate">
        </div>
      </div>

      <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">Witnessd 1 uniq ID</label>
        </div>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="witness1" id="witness1">
        </div>
        <div class="col-sm-3">
            <button type="button" class="verify_btn verify_witness1" onclick="verify_who('witness1')">Verify & Confirm</button>
        </div>
      </div>
       <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">Witnessd 2 uniq ID</label>
        </div>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="witness2" id="witness2">
        </div>
        <div class="col-sm-3">
            <button type="button" class="verify_btn verify_witness2" onclick="verify_who('witness2')">Verify & Confirm</button>
        </div>
      </div>
       <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">Certified Authority Uid</label>
        </div>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="authorityid" id="authorityid">
        </div>
        <div class="col-sm-3">
            <button type="button" class="verify_btn verify_authorityid" onclick="verify_who('authorityid')">Verify & Confirm</button>
        </div>
      </div>
      <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">Living Together Contract Copy</label>
        </div>
        <div class="col-sm-5">
 
        <div class="col-sm-1"></div>
        
          <input type="file" name="pic" class="form-control" accept="image/*" onchange="readURL(this,'blah');" >
       
        <div class="col-sm-5" id="photodisplay">
          <img id="blah" src="#" alt="" />
        </div>
      </div>       
       
       
      </div>
      <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">Still living together?</label>
        </div>
        <div class="col-sm-5">
         <input name='stltogether' id='yes' type='radio' id='stltogether' value="yes" checked onclick="toggle_visiblity('off')">Yes&ensp;
         <input name='stltogether' id='no' type='radio' id='stltogether' value="no" onclick="toggle_visiblity('on')">No

        </div>
      </div>

<div class="living" style="display: none;">
<div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">Living Together Retirment Date </label>
        </div>
        <div class="col-sm-5">
          <input type="date" class="form-control" name="retairdate" id="retairdate">
        </div>
      </div>
      <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">Retirement Contract Uniq ID/NO</label>
        </div>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="rcuid" id="rcuid">
        </div>
      </div>
      <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left" id="">Living Together Retirment Copy</label>
        </div>
        <div class="col-sm-5">
      
        <div class="col-sm-1"></div>
        
          <input type="file" name="retpic" class="form-control" accept="image/*" onchange="readURL(this,'blah1');" >
       
        <div class="col-sm-5" id="photodisplay1">
          <img id="blah1" src="#" alt="" />
        </div>
      </div>
          
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
      $('#marriage').submit(function(){
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

   function toggle_visiblity(p)
   {
      if(p=='on')
      {
         $('.living').css('display','block');
      }
      else
      {
         $('.living').css('display','none');
      }
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
      else if(z=='fpuid')
      {
         fpuid=$('#fpuid').val();
         
         $.ajax ({
             method: 'post',
             url: "marriage/fpuid_verify/"+fpuid,
             success: function(data)
             {
                 if(data)
                 {
                     alert('Verified');
                     $('#fpuid').attr('readonly',true);
                     $('.verify_fpuid').css('display','none');
                     $('#fpuid').attr('onmousedown','return false');
                 }
                 else
                 {
                     alert('Invalid first person ID Number!');
                 }
             }
         });
      }
    
     else if(z=='spuid')
      {
         fpuid=$('#spuid').val();
         $.ajax ({
             method: 'post',
             url: "marriage/spuid_verify/"+fpuid,
             success: function(data)
             {
                 if(data)
                 {
                     alert('Verified');
                     $('#spuid').attr('readonly',true);
                     $('.verify_spuid').css('display','none');
                     $('#spuid').attr('onmousedown','return false');
                 }
                 else
                 {
                     alert('Invalid Second Person ID Number!');
                 }
             }
         });
      }
else if(z=='venue')
      {
         fpuid=$('#venue').val();
         $.ajax ({
             method: 'post',
             url: "marriage/venue_verify/"+fpuid,
             success: function(data)
             {
                 if(data)
                 {
                     alert('Verified');
                     $('#venue').attr('readonly',true);
                     $('.verify_venue').css('display','none');
                     $('#venue').attr('onmousedown','return false');
                 }
                 else
                 {
                     alert('Invalid Second Person ID Number!');
                 }
             }
         });
      }
      else if(z=='witness1')
      {
         fpuid=$('#witness1').val();
         $.ajax ({
             method: 'post',
             url: "marriage/witness1_verify/"+fpuid,
             success: function(data)
             {
                 if(data)
                 {
                     alert('Verified');
                     $('#witness1').attr('readonly',true);
                     $('.verify_witness1').css('display','none');
                     $('#witness1').attr('onmousedown','return false');
                 }
                 else
                 {
                     alert('Invalid witness1 ID Number!');
                 }
             }
         });
      }
     else if(z=='witness2')
      {
         fpuid=$('#witness2').val();
         $.ajax ({
             method: 'post',
             url: "marriage/witness2_verify/"+fpuid,
             success: function(data)
             {
                 if(data)
                 {
                     alert('Verified');
                     $('#witness2').attr('readonly',true);
                     $('.verify_witness2').css('display','none');
                     $('#witness2').attr('onmousedown','return false');
                 }
                 else
                 {
                     alert('Invalid witness2 ID Number!');
                 }
             }
         });
      }
       else if(z=='authorityid')
      {
         fpuid=$('#authorityid').val();
         $.ajax ({
             method: 'post',
             url: "marriage/authorityid_verify/"+fpuid,
             success: function(data)
             {
                 if(data)
                 {
                     alert('Verified');
                     $('#authorityid').attr('readonly',true);
                     $('.verify_authorityid').css('display','none');
                     $('#authorityid').attr('onmousedown','return false');
                 }
                 else
                 {
                     alert('Invalid Certified Authority Uid!');
                 }
             }
         });
      }
      else
      {
        alert('Unknown person');
      }
    }
     function readURL(input,id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#'+id)
                    .attr('src', e.target.result)
                $('#'+id).css('max-width',300);
                $('#'+id).css('max-height',300);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

</script>
