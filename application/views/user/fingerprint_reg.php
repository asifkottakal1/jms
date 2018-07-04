 <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#"><b>Finger Print Registration</b></a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>

      <!-- Modal -->
      <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="display: block;text-align: center;">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Verify Member</h4>
            </div>
            <div class="modal-body">
              <div class="row">
               <div class="col-sm-12">
                  <label id='memberuniqid'></label>
               </div>
              </div>
              <div class="row">
               <div class="col-sm-4">
                  <label>Name :</label>
               </div>
               <div class="col-sm-5" id="membername"></div>
              </div>
              <div class="row">
               <div class="col-sm-4">
                  <label>Address :</label>
               </div>
               <div class="col-sm-5" id="memberaddr"></div>
              </div>
              <div class="row">
               <div class="col-sm-4">
                  <label>Mobile :</label>
               </div>
               <div class="col-sm-5" id="membermob"></div>
              </div>
              <div class="row">
               <div class="col-sm-6" id="memberpic">
               </div>
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="verify_who('member2')">Verify</button>
            </div>
          </div></div>

        </div>
      </div>

      <form method="post" action="<?php echo base_url()?>fingerprint/fingerprint_reg">
      <div class="row row_space">
        <div class="col-sm-4">
          <label class="label_left"><h4>Master Data</h4></label>
        </div>
      </div>

      <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">Member's Unique ID</label>
        </div>
        <div class="col-sm-6">
          <input type="text" name="memid" id="memid" class="form-control" required placeholder="Type MUI (MembershipUnique ID)">
        </div>
        <div class="col-sm-3">
            <button type="button" class="verify_btn verify_member" onclick="verify_who('member')">Verify & Confirm</button>
        </div>
      </div>

      <div class="row row_space">
        <div class="col-sm-12">
          <hr style="height: 1px;background-color: #000" />
        </div>
      </div>

      <div class="row" style="margin-bottom: 20px">
        <div class="col-sm-4">
          <label class="label_left"><h4>New Details</h4></label>
        </div>
      </div>

      <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">Print of Finger</label>
        </div>
        <div class="col-sm-6">
          <select name="finger" id="finger" required class="form-control">
             <option value="">---Select---</option>
             <option value='left'>Left Thumb</option>
             <option value='right'>Right Thumb</option>
          </select>
        </div>
      </div>

      <div class="row row_space">
        <div class="col-sm-1">
        </div>
        <div class="col-sm-3 fingerprint">          
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
      else if(z=='engName')
      {
         engname=$('#engname').val();
         $.ajax ({
            method: 'post',
            url: "nameLanguage/verify_engname/"+engname,
            success: function(data)
            {
              if(data)
              {
                  alert('Verified!');
                  $('#engname').attr('readonly',true);
                  $('.verify_engName').css('display','none');
                  $('#engname').attr('onmousedown','return false');
              }
              else
              {
                  alert("Invalid! Type name using english alphabets only");   
              }
            }
         });
      }
      else if(z=='motherlangname')
      {
         alert('Verified!');
         $('#motherlangname').attr('readonly',true);
         $('.verify_motherlangname').css('display','none');
         $('#motherlangname').attr('onmousedown','return false');
      }
      else if(z=='statelang')
      {
         alert('Verified!');
         $('#statelang').attr('readonly',true);
         $('.verify_statelang').css('display','none');
         $('#statelang').attr('onmousedown','return false');
      }
      else if(z=='nationlang')
      {
         alert('Verified!');
         $('#nationlang').attr('readonly',true);
         $('.verify_nationlang').css('display','none');
         $('#nationlang').attr('onmousedown','return false');
      }
      else if(z=='otherlang')
      {
         alert('Verified!');
         $('#otherlang').attr('readonly',true);
         $('.verify_otherlang').css('display','none');
         $('#otherlang').attr('onmousedown','return false');
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

    function change_language(e)
    {
      motherlang=e.value;
      engname=$('#engname').val();
      $.ajax ({
         method: 'post',
         url: "nameLanguage/get_motherlanguage_name/"+engname+"/"+motherlang,
         success: function(data)
         {
           if(data)
           {
               $('#motherlangname').val(data);
           }
           else
           {
               alert("Invalid! Type name using english alphabets only");   
           }
         }
      });
    }

    function change_morelanguage(e)
    {
      motherlang=e.value;
      engname=$('#engname').val();
      $.ajax ({
         method: 'post',
         url: "nameLanguage/get_motherlanguage_name/"+engname+"/"+motherlang,
         success: function(data)
         {
           if(data)
           {
               $('#otherlang').val(data);
           }
           else
           {
               alert("Invalid! Type name using english alphabets only");   
           }
         }
      });
    }

</script>