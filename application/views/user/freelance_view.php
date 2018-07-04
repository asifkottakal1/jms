 <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#"><b>Freelancers or Daily Wages Workers Registration</b></a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>

      <form method="post" action="<?php echo base_url()?>freelance/freelance_ins" id="freelance">
       <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">Working Area</label>
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
          <label class="label_left">Freelancers or Dialy Wages Worker</label>
        </div>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="mui" id="mui"   required>
        </div>
        <div class="col-sm-3">
            <button type="button" class="verify_btn verify_mui" onclick="verify_who('mui')">Search & Confirm</button>
        </div>
        <!-- <div class="col-sm-2 offset-sm-3">
          <input type="text" class="form-control" name="ins" id="ins"   required>
        </div> -->

        </div>
    
     <div class="row">
      
      <div class="col-sm-2">
       <h6>SI.No</h6>
      </div>
      <div class="col-sm-4">
       <h6>Work Ucode with Search</h6>
      </div>
      <div class="col-sm-5">
       <h6>Work Name</h6>
      </div>
      <!-- <div class="col-sm-1">
       <h6>is rtrd?</h6>
      </div> -->
      
        
     </div>
     <hr style="height: 1px;background-color: #000;margin-bottom: 20px">

     <div class="exp-div">
       <!-- <div class="row">
     
         <div class="col-sm-1">
          <input type="text" class="form-control" name="si_no" required>
         </div>
         <div class="col-sm-4">
           <input type="text" class="form-control" name="ucode" required>
         </div>
         <div class="col-sm-3">
            <button type="button" class="verify_btn verify_unicode" onclick="verify_who('ucode')">verify & Confirm</button>
        </div>
          <div class="col-sm-4">
            <input type="text" class="form-control" name="work" required> 
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
             url: "freelance/area_verify/"+area,
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
       else if(z=='mui')
      {
         mui=$('#mui').val();
         if(mui=='')
         {
            alert('Invalid Freelancer');
            return false;
         }
         $.ajax ({
             method: 'post',
             url: "freelance/mui_verify/"+mui,
             success: function(data)
             {
                 if(data)
                 {
                   data=JSON.parse(data);
                   console.log(data);
                   if(data.status==1)
                   {
                    alert("Verified");
                     $('#mui').attr('readonly',true);
                     $('.verify_mui ').css('display','none');

                    exp=data.response;
                    for(i=0;i<exp.length;i++)
                    {

                     html="<div class=\"row\">"
     
          html+="<div class=\"col-sm-2\">"
          // html+="<input type=\"hidden\" class=\"form-control\" name=\"freelanceid\"  value='"+exp[i]['freelanceid']+"' required>"
           html+="<input type=\"text\" class=\"form-control\" name=\"si_no\" value='"+exp[i]['freelance_id']+"' required>"
          html+="</div>"
          html+="<div class=\"col-sm-4\">"
            html+="<input type=\"text\" class=\"form-control\" name=\"ucode\" value='"+exp[i]['expid']+"' required>"
          html+="</div>"
        //   html+="<div class=\"col-sm-3\">"
        //      html+="<button type=\"button\" class=\"verify_btn verify_ucode\" onclick=\"verify_who('ucode')\">verify & Confirm</button>"
        // html+=" </div>"
           html+="<div class=\"col-sm-5\">"
            html+=" <input type=\"text\" class=\"form-control\" name=\"work\" value='"+exp[i]['wpost']+"' required>"
          html+="</div> "
            html+=" </div> "    
         
        
       
                   
                   

                    
                      $(".exp-div").append(html)
                    }
                   }
                   else
                    alert("Invalid Freelancer");
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
        
        
        




      

    
     


      



       

     




      