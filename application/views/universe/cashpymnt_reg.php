 <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#"><b>Cash Payment(Expence) Account Head Creation</b></a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>

      <form method="post" action="<?php echo base_url()?>cashpymnt/cashpymnt_reg">
      
<div class="col-sm-4">
          <label class="label_left"><h4>Master Data</h4></label>
        </div>
      </div>

      <div class="row parent_space" style="text-align: center;">
        <div class="col-sm-3">
          <label class="label_left">Account Group Head Name</label>
        </div>
        <div class="col-sm-6">
          <input type="text" name="grphname" id="grphname" class="form-control  ui-autocomplete-input" required placeholder="Type ">
        </div>
        <div class="col-sm-3">
            <button type="button" class="verify_btn verify_agrphname" onclick="verify_agrphname()">Verify & Confirm</button>
        </div>
      </div>
  <div class="row row_space">
        <div class="col-sm-12">
          <hr style="height: 1px;background-color: #000" />
        </div>
      </div>
      <div class="row parent_space" style="text-align: center;">
        <div class="col-sm-3">
          <label class="label_left">Cash Payment(Exp) Account Head Name</label>
        </div>
        <div class="col-sm-5">
          <input type="text" name="pymntname" id="pymntname" class="form-control" required placeholder="Type">
        </div>
        
       <div class="col-sm-3">
           <button type="button" class="verify_btn verify_pymntname" onclick="verify_who('pymntname')">Verify & Confirm</button>
        </div>
      
      </div>

      <div class="row parent_space" style="text-align: center;">
        <div class="col-sm-3">
          <label class="label_left">Cash Pymnt(Exp) Account Head U Code</label>
        </div>
        <div class="col-sm-5">
          <input type="text" name="pymntuid" id="pymntuid" class="form-control" required placeholder="Type">
        </div>
       
      </div>

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


        $("#grphname").autocomplete({
            source:['']
        });
        $('#grphname').keyup(function(){
            ssid=$('#grphname').val();
            $.ajax ({
                method: 'post',
                url:'<?=base_url('Npymnt/get_agrphname/') ?>'+ssid,
                success: function(data)
                {
                    if(data)
                    {
                        data=JSON.parse(data);
                        $("#grphname").autocomplete ({
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
      else if(z=='pymntname')
      {
         pymntname=$('#pymntname').val();
         $.ajax ({
            method: 'post',
            url: "cashpymnt/verify_pymntname/"+pymntname,
            success: function(data)
            {
              if(data)
              {
                  alert('Verified!');
                  $('#pymntname').attr('readonly',true);
                  $('.verify_pymntname').css('display','none');
                  $('#pymntname').attr('onmousedown','return false');
              }
              else
              {
                  alert("Invalid! ");   
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
      else
      {
        alert('Unknown person');
      }
    }

    

  function verify_agrphname()
  {
   grphname=$('#grphname').val();
    $.ajax ({
      method: 'post',
      url: "<?php echo base_url() ?>cashpymnt/verify_agrphname/"+grphname,
      success: function(data)
      {
        // console.log(data)
        if(data==1)
        {
            $('#grphname').attr('readonly',true);
            $('#grphname').attr('onmousedown','return false');
            $('.verify_agrphname').css('display','none');
            alert('Verified');
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