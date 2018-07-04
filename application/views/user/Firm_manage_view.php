 <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#"><b>Firm Manage Persons Registration</b></a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>

      <form method="post" action="<?php echo base_url()?>firm_manage/firm_manage_ins" id="firm_manage">
       <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">Area</label>
        </div>
        <div class="col-sm-5">
          <select class="form-control" id="sel1">
             <option>Select Area</option>

           <?php
          foreach($area as $area )
          {
           ?>
          <option value="<?php echo $area->areaid; ?>"><?php echo $area->areaname; ?></option> 
           <?php
          }
          ?>

             
          </select>
        </div>
        <div class="col-sm-3">
            <button type="button" class="verify_btn verify_area" onclick="verify_who('area')">Area & Confirm</button>
        </div>
      </div>

      <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">Firm Unicode</label>
        </div>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="Unicode" id="Unicode"   required>
        </div>
        <div class="col-sm-3">
            <button type="button" class="verify_btn verify_unicode" onclick="verify_who('Unicode')">Search & Confirm</button>
        </div>
        </div>
    
     <div class="row">
      
      <div class="col-sm-3">
       <h6>Dsgntn Name&(Ucod)</h6>
      </div>
      <div class="col-sm-3">
       <h6>Present Duty Bearer</h6>
      </div>
      <div class="col-sm-2">
       <h6>Joining Date</h6>
      </div>
      <!-- <div class="col-sm-1">
       <h6>is rtrd?</h6>
      </div> -->
      <div class="col-sm-2">
       <h6>Retairing Date</h6>
      </div>
       <div class="col-sm-2">
       <h6>Reason of Retirement</h6>
      </div> 
     </div>
     <hr style="height: 1px;background-color: #000;margin-bottom: 20px">

     <div class="exp-div">
      <!-- <div class="row">
     
         <div class="col-sm-3">
          <input type="text" class="form-control" name="dsgntn" required>
         </div>
         <div class="col-sm-2">
           <input type="text" class="form-control" name="duty" required>
         </div>
          <div class="col-sm-1">
             <button type="button" class="btn" onclick="verify_who('dutyv')">Verify</button>
         </div> 
         <div class="col-sm-2">
           <input type="Date" class="form-control" name="join"  required>
         </div>
          <div class="radio">
           <label><input type="radio" name="rtrd">Yes</label>
         </div> 
         <div class="col-sm-2">
           <input type="Date" class="form-control" name="ret"  required>
         </div>
         <div class="col-sm-3">
           <select class="form-control">
              <option>Select</option>
              
           </select>
         </div> 
        </div> -->
     </div>
     
        </div>
        <br>

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

       else if(z=='area')
      {
         area=$('#sel1').val();
         if(area=='')
         {
            alert('Invalid area Number!');
            return false;
         }
         $.ajax ({
             method: 'post',
             url: "firm_manage/area_verify/"+area,
             success: function(data)
             {
              console.log(data);
                 if(data)
                 {
                     alert('Verified');
                     $('#sel1').attr('readonly',true);
                     $('.verify_area ').css('display','none');
                     $('#sel1').attr('onmousedown','return false');
                 }
                 else
                 {
                     alert('Invalid area Number!');
                 }
             }
         });
      }
       else if(z=='Unicode')
      {
         unicode=$('#Unicode').val();
         if(unicode=='')
         {
            alert('Invalid unicode');
            return false;
         }
         $.ajax ({
             method: 'post',
             url: "firm_manage/unicode_verify/"+unicode,
             success: function(data)
             {
                 if(data)
                 {
                   data=JSON.parse(data);
                   console.log(data);
                   if(data.status==1)
                   {
                    alert("Verified");
                     $('#unicode').attr('readonly',true);
                     $('.verify_unicode ').css('display','none');

                    exp=data.response;
                    for(i=0;i<exp.length;i++)
                    {
                    html="<div class=\"row\">";
                    html+="<div class=\"col-sm-3\">"
                    html+="<input type=\"hidden\" class=\"form-control\" name=\"expid\"  value='"+exp[i]['expid']+"' required>"
                    html+="<input type=\"text\" class=\"form-control\" name=\"dsgntn\"  value='"+exp[i]['wpost']+"' required>"
                    html+="</div>"
                    html+="<div class=\"col-sm-3\">"
                   html+=" <input type=\"text\" class=\"form-control\" name=\"duty\"  value='"+exp[i]['user_uniqid']+"'  required>"
                    html+="</div>"
                   //  html+="<div class=\"col-sm-1\">"
                   // html+=" <button type=\"button\" class=\"btn\" onclick=\"verify_who('dutyv')\">Verify</button>"
                   // html+=" </div>"
                    html+="<div class=\"col-sm-2\">"
                    html+="<input type=\"Date\" class=\"form-control\" name=\"join\"  value='"+exp[i]['wsdate']+"'  required>"
                    html+="</div>"
                    // html+="<div class=\"radio\">"
                    // html+="<label><input type=\"radio\" name=\"rtrd\">Yes</label>"
                    // html+="</div>"
                    html+="<div class=\"col-sm-2\">"
                    html+="<input type=\"Date\" class=\"form-control\" name=\"ret\" value='"+exp[i]['wrdate']+"'   required>"
                    html+="</div>"
                     html+="<div class=\"col-sm-2\">"
                    // html+="<input type=\"reason\" class=\"form-control\" name=\"reason\" value='"+exp[i]['reason']+"'   required>"
                    html+="<select class=\"form-control\" name=\"reason\"> "
                    html+= "<option value=\"Not Retired\">Not retired</option>" 
                     html+= "  <option value=\"Financial Problem\">Finantial problem </option>"
                      html+= "  <option value=\"Health Problem\">Health problem </option>"
                     html+= "</select>"
                    html+="</div>"
                    html+="</div>"

                    
                      $(".exp-div").append(html)
                    }
                   }
                   else
                    alert("Invalid Firm");
                     // alert('Verified');
                     // $('#area').attr('readonly',true);
                     // $('.area').css('display','none');
                     // $('#area').attr('onmousedown','return false');
                 }
                 else
                 {
                     alert('Invalid Firm');
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
        
        
        




      

    
     


      



       

     




      