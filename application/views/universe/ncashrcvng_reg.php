 <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#"><b> Non Cash Receiving to Janaahasabha or Councils Register</b></a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>

      <form method="post" action="<?php echo base_url()?>ncashrcvng/ncashrcvng_reg">
              <div class="col-sm-4">
          <label class="label_left"><h4>Master Data</h4></label>
        </div>
      </div>

      <div class="row parent_space" style="text-align: center;">
        <div class="col-sm-3">
          <label class="label_left">Area Account</label>
        </div>
        <div class="col-sm-6">
          <input type="text" name="areauid" id="areauid" class="form-control  ui-autocomplete-input" required placeholder="Type Area Unicode ">
        </div>
        <div class="col-sm-3">
            <button type="button" class="verify_btn verify_areauid" onclick="verify_areauid()">Verify & Confirm</button>
        </div>
      </div>
       <div class="row parent_space" style="text-align: center;">
        <div class="col-sm-3">
          <label class="label_left">Select Sabha or Council Under this area</label>
        </div>
                    


               <div class="col-sm-6">
          <select name="sabha" id="sabha" required class="form-control">

            
          </select>
        </div>
       
      </div>
  <div class="row row_space">
        <div class="col-sm-12">
          <hr style="height: 1px;background-color: #000" />
        </div>
      </div>
<div class="col-sm-4">
          <label class="label_left"><h4>New Details</h4></label>
        </div>
      <!--  <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">Cash recvd From</label>
        </div>
        <div class="col-sm-6">
          <input type="text" name="memid" id="memid" class="form-control" required placeholder="Type MUI (MembershipUnique ID)">
        </div>
        <div class="col-sm-3">
            <button type="button" class="verify_btn verify_member" onclick="verify_who('member')">Verify & Confirm</button>
        </div>
      </div> -->

      <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">Non Cash recvd From</label>
        </div>
        <div class="col-sm-6">
          <input type="text" name="memid" id="memid" class="form-control" required placeholder="Type MUI (MembershipUnique ID)">
        </div>
        <div class="col-sm-3">
            <button type="button" class="verify_btn verify_member" onclick="verify_who('member')">Verify & Confirm</button>
        </div>
      </div>
      <!--  <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">Debit or Creadit(Cash in or out)</label>
        </div>
        <div class="col-sm-5">
         <input name='drcr' id='dr' type='radio' id='drcr' value="dr" checked onclick="toggle_visiblity('off')">Dr(Cash in)&ensp;
         <input name='drcr' id='cr' type='radio' id='drcr' value="cr" onclick="toggle_visiblity('on')">cr(Cash Out)

        </div>

         <div class="col-sm-5">
         <input name='drcr' id='debit' type='radio' value="debit" checked onclick="$('#amountLabel').text('Debit Amount')">Dr(Cash in)&ensp;
         <input name='drcr' id='credit' type='radio' value="credit" onclick="$('#amountLabel').text('Credit Amount')">cr(Cash Out)

</div>
      </div> -->
             <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">Item Recieving Account</label>
        </div>
               <div class="col-sm-6">
          <select name="rcvngacc" id="rcvngacc" required class="form-control">
             <option value="">---Select---</option>
             <option value='donation'>Donation</option>
            
          </select>
        </div>
       
      </div>
      <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">Giving mode</label>
        </div>
               <div class="col-sm-6">
          <select name="gmode" id="gmode" required class="form-control">
             <option value="">---Select---</option>
             <option value='handover'>Ready Handover</option>

            
          </select>
        </div>
       
      </div>
       
    <div class="row row_space ">
        <div class="col-sm-3">
          <label class="label_left" >Receiving Item</label>
        </div>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="rcvngitem" id="rcvngitem">
        </div>
        <div class="col-sm-2">
          <label class="label_left" >Quantity</label>
        </div>
        <div class="col-sm-2">
          <input type="text" class="form-control" name="quantity" id="quantity">
        </div>
      </div>
      <div class="row row_space date">
        <div class="col-sm-3">
          <label class="label_left">Item Approximate Valuation</label>
        </div>
        <div class="col-sm-3">
          <input type="text" class="form-control" name="itemvaluation" id="itemvaluation">
        </div>
      </div>
      <div class="row row_space date">
        <div class="col-sm-3">
          <label class="label_left">Date Of Received</label>
        </div>
        <div class="col-sm-3">
          <input type="date" class="form-control" name="date" id="date">
        </div>
      </div>
     <!--  <div class="row row_space credit">
        <div class="col-sm-3">
          <label class="label_left">Transaction Discrption</label>
        </div>
        <div class="col-sm-3">
          <input type="text" class="form-control" name="discrption" id="discrption">
        </div>
      </div> -->
  

      <div class="row row_space">
        <div class="col-sm-12">
          <hr style="height: 1px;background-color: #000" />
        </div>
      </div>
           

      <?php $this->load->view('templates/common_footer'); ?>


<script type="text/javascript">

  window.onload=function()
    {
        $("#memid").autocomplete({
            source:['']
        });
        $('#memid').keyup(function(){
            ssid=$('#memid').val();
            $.ajax ({
                method: 'post',
                url:'<?=base_url('userhome/get_uniqid/') ?>'+ssid,
                success: function(data)
                {
                    if(data)
                    {
                        data=JSON.parse(data);
                        $("#memid").autocomplete ({
                            source:data
                        });
                    }
                }
            })
        });

        $("#areauid").autocomplete({
            source:['']
        });
        $('#areauid').keyup(function(){
            ssid=$('#areauid').val();
            $.ajax ({
                method: 'post',
                url:'<?=base_url('ncashrcvng/get_areauid/') ?>'+ssid,
                success: function(data)
                {
                    if(data)
                    {
                        data=JSON.parse(data);
                        $("#areauid").autocomplete ({
                            source:data
                        });
                    }
                }
            })
        });

          

    }



    function verify_who(z)
    {
      if(z=='member')
      {
        memid=$('#memid').val();
        $.ajax ({
          method: 'post',
          url: "ncashrcvng/verify_user/"+memid,
          success: function(data)
          {
              if(data)
              {
                 /* jdata=JSON.parse(data);
                 $('#membername').text(jdata[0]['Firstname']+" "+jdata[0]['Lastname']);
                 $('#memberaddr').text(jdata[0]['address']);
                 $('#memberpic').html("<img src='"+jdata[0]['userpic']+"' alt='no image' />");
                 $('#membermob').text(jdata[0]['mobile']);
                  $('#myModal').modal('toggle');*/
                  alert('Verified!');
                  $('#memid').attr('readonly',true);
                  $('.verify_member').css('display','none');
                  $('#memid').attr('onmousedown','return false');

              }
              else
              {
                  alert("Invalid User!");   
              }
          }
        });
      }
      //  else if(z=='accholder')
      // {
      //    accholder=$('#accholder').val();
      //    $.ajax ({
      //       method: 'post',
      //       url: "banking/verify_accholder/"+accholder,
      //       success: function(data)
      //       {
      //         if(data)
      //         {
      //             alert('Verified!');
      //             $('#accholder').attr('readonly',true);
      //             $('.verify_accholder').css('display','none');
      //             $('#accholder').attr('onmousedown','return false');
      //         }
      //         else
      //         {
      //             alert("Invalid! ");   
      //         }
      //       }
      //    });
      // }
     
     
     
     
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
      else
      {
        alert('Unknown person');
      }
    }

    
     function verify_areauid()
  {
  areauid=$('#areauid').val();
    $.ajax ({
      method: 'post',
      url: "<?php echo base_url() ?>ncashrcvng/verify_areauid/"+areauid,
      success: function(data)
      {
        // console.log(data)
        if(data==1)
        {
            $('#areauid').attr('readonly',true);
            $('#areauid').attr('onmousedown','return false');
            $('.verify_areauid').css('display','none');
            alert('Verified');
            $.ajax({
              url:"<?php echo base_url() ?>ncashrcvng/get_sabha/"+areauid,
              success:function(data){
                data=JSON.parse(data);
                console.log(data)
                html='';
                for(i=0;i<data.length;i++)
                {
                  html+="<option value='"+data[i]['sabhaid']+"'>"+data[i]['sabhaname']+"</option>"
                }
                $('#sabha').html(html)
              }
            })
        }
        else if(data=='no')
        {
            alert("Doesn't exist");
        }
        else
        {
            alert('An error occured!');
        }
      }
    });
  }



</script>