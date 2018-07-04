<div class="row row_space">
            <div class="col-sm-4">
                  <label>This Registration Volunteer</label>
            </div>
            <div class="col-sm-5">
                  <input type="text" name="registered_ss" id="registered_ss" class="form-control" placeholder="Type MUI (Membership Unique ID)" required autocomplete="off">
            </div>
            <div class="col-sm-3">
                  <button type="button" class="verify_btn verify_registered_ss" onclick="verify_data('registered_ss')">Verify & Confirm</button>
            </div>
      </div>

      <!-- Modal -->
<div id="commonmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="display: block;text-align: center;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Volunteer</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
         <label id="ssuniqid"></label>
        </div>
        <div class="form-group row">
         <div class="col-sm-12">
            Name: <label id='ssnamelbl'></label>
         </div>
         <div class="col-sm-5" id='sspic'>
            
         </div>
        </div>
         <div class="form-group row">
            <div class="col-sm-4">Address: </div>
            <div class="col-sm-4" id="ssaddress">
               
            </div>
         </div>
         <div class="form-group row">
            <div class="col-sm-4">Mobile: </div>
            <div class="col-sm-5" id="ssmobile">
               
            </div>
         </div>
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-primary" onclick="verify_complete('registered_ss')">Verify</button>
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

      <div class="row row_space">
            <div class="col-sm-4">
                  <label>This data entry operator</label>
            </div>
            <div class="col-sm-5">
                  <input type="text" name="dataoperator" id="dataoperator" class="form-control" placeholder="Type MUI (Membership Unique ID)" required disabled value="<?php echo $_SESSION['userDetails']['regid'] ?>">
            </div>
      </div>

            <div class="row row_space" style="margin: auto;width: 50%">
                  <div class="col-sm-3">
                        <input type="submit" value="Submit" class="btn btn-danger btn-lg">
                  </div>
                  <div class="col-sm-3">
                        <input type="button" value="Clear and Re-enter" class="btn btn-default btn-lg" onclick="clear_all()">
                  </div>
            </div>

      <script type="text/javascript">

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

     function verify_complete(id)
     {
         alert("Verified!");
         $('.verify_registered_ss').css('display','none');
         $('#'+id).attr('readonly',true);
         $('#'+id).attr('onmousedown','return false');
         $('#commonmodal').modal('toggle');
     }

      function verify_data(id)
      {
            if(id=='registered_ss')
            {
                  data=$('#'+id).val();
                  $.ajax ({
                        method:'post',
                        url:"<?php echo base_url()?>sannadha_sevakan/verify_registered_ss/"+data,
                        success: function(data)
                        {
                              if(data=='invalid')
                              {
                                    alert("Invalid Attempt!");
                              }
                              else if(data=="missing")
                              {
                                    alert("Invalid data supplied!");
                              }
                              else if(data=="nope")
                              {
                                    alert("Doesn't exist!");
                              }
                              else if(data)
                              {
                                 $('#commonmodal').modal('toggle');
                                 jdata=JSON.parse(data);
                                 $('#ssnamelbl').text(jdata[0]['Firstname']+" "+jdata[0]['Lastname']);
                                 $('#ssmobile').text(jdata[0]['mobile']);
                                 $('#ssaddress').text(jdata[0]['address']);
                                 // console.log(jdata);
                                 $('#ssuniqid').text(jdata[0]['ssuser_uniqid']);
                                 $('#sspic').html("<img src='"+jdata[0]['userpic']+"' alt='no image'/>");
                                    
                              }
                        }
                  });
            }
            else if(id=='dataoperator')
            {
                  data=$('#'+id).val();
                  $.ajax ({
                        method:'post',
                        url:"<?php echo base_url()?>sannadha_sevakan/verify_dataoperator/"+data,
                        success: function(data)
                        {
                              if(data=='invalid')
                              {
                                    alert("Invalid Attempt!");
                              }
                              else if(data=="missing")
                              {
                                    alert("Invalid data supplied!");
                              }
                              else if(data=="yep")
                              {
                                    alert("Verified!");
                                    $('.verify_dataoperator').css('display','none');
                                    $('#'+id).attr('readonly',true);
                              }
                              else if(data=="nope")
                              {
                                    alert("Doesn't exist!");
                              }
                        }
                  });
            }
            else
            {
                  alert('Invalid');
            }
      }
      </script>