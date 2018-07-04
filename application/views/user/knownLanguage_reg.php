 <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#"><b>Known Languages Registration</b></a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>

      <!-- Modal -->
      <!-- <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

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
      </div> -->

      <form method="post" action="<?php echo base_url()?>language/knownLanguages_reg">
      <!-- <div class="row row_space">
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
      </div> -->

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
          <label class="label_left">Known Language</label>
        </div>
        <div class="col-sm-6">
          <select name="language" id="language" required class="form-control" onchange="showskill()">
             <option value="">---Select---</option>
             <option value='en'>English</option>
             <option value='ml'>Malayalam</option>
             <option value='hi'>Hindi</option>
             <option value='ta'>Tamil</option>
          </select>
        </div>
      </div>

      <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">Skills of this Language</label>
        </div>
        <div class="col-sm-9">
          <input type="checkbox" name="fluent" value="1">&ensp;Fluent Speak&emsp;
          <input type="checkbox" name="just" value="1">&ensp;Just Speak&emsp;
          <input type="checkbox" name="read" value="1">&ensp;Read&emsp;
          <input type="checkbox" name="write" value="1">&ensp;Write&emsp;
          <input type="checkbox" name="essay" value="1">&ensp;Essay&emsp;
          <input type="checkbox" name="oral" value="1">&ensp;Oral&emsp;
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

    function clear_all()
     {
          $.ajax ({
               method: 'post',
               url:"<?php echo base_url() ?>sannadha_sevakan/clear_all",
               success: function(data)
               {
                    location.reload();
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
    	else
    	{
    		alert('Unknown person');
    	}
    }

    function showskill()
    {
      
    }

</script>