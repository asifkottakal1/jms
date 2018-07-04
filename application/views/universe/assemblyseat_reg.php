 <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#"><b>Assembly Seat Registration</b></a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>

      <form method="post" action="<?php echo base_url()?>assembly/assemblyseat_reg">
      <div class="row parent_space">
        <div class="col-sm-4">
          <label class="label_left"><h4>Parent Area Details</h4></label>
        </div>
      </div>

      <div class="row parent_space" style="text-align: center;">
        <div class="col-sm-3">
          <label class="label_left">State</label>
        </div>
        <div class="col-sm-6">
          <input type="text" name="statename" id="statename" class="form-control" required placeholder="Type Ucode & Confirm or Search & Confirm">
        </div>
        <div class="col-sm-3">
            <button type="button" class="verify_btn verify_statename" onclick="verify_state()">View & Confirm</button>
        </div>
      </div>

      <div class="row row_space">
        <div class="col-sm-12">
          <hr style="height: 1px;background-color: #000" />
        </div>
      </div>

      <div class="row" style="margin-bottom: 20px">
        <div class="col-sm-4">
          <label class="label_left"><h4>New Registration Details</h4></label>
        </div>
        <div class="col-sm-2 gmaps" id='gmaps'>
          
        </div>
      </div>

      <div class="row row_space">
        <div class="col-sm-4">
          <label class="label_left">Name of Assembly</label>
        </div>
        <div class="col-sm-4">
          <input type="text" name="assemname" id="assemname" class="form-control" required placeholder="Type name">
        </div>
      </div>

      <div class="row row_space">
        <!-- <div class="col-sm-4">
          <label class="label_left">Ucode creation for Planet</label>
        </div>
        <div class="col-sm-3">
          <input type="number" name="ucode" id="appointed_ss" class="form-control" required>
        </div> -->
        <div class="col-sm-7">
        </div>
        <div class="col-sm-2">
            <input type="number" name="areasqmtr" class="form-control" placeholder="Area Sqmtr">
        </div>
      </div>

      <div class="row row_space">
        <div class="col-sm-4">
          <label class="label_left">Capital of Assembly</label>
        </div>
        <div class="col-sm-4">
          <input type="text" name="assemcapital" id="assemcapital" class="form-control" required placeholder="Type Ucode & Confirm or Search & Confirm">
        </div>
        <div class="col-sm-3">
            <button type="button" class="verify_btn verify_assemcapital" onclick="verify_assemcapital()">View & Confirm</button>
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

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9pDMijfgvhSnCHSq4ypNuzo-BQQwYXRw"></script>

<script type="text/javascript">

  google.maps.event.addDomListener(window, 'load', myMap);
  function myMap() 
  {
    var mapProp= 
    {
        center:new google.maps.LatLng(10.8505,76.2711),
        zoom:5,
    };
    var map=new google.maps.Map(document.getElementById("gmaps"),mapProp);
  }

  window.onload=function()
    {
        $("#statename").autocomplete({
            source:['']
        });
        $('#statename').keyup(function(){
            ssid=$('#statename').val();
            $.ajax ({
                method: 'post',
                url:'<?=base_url('state/get_uniqid/') ?>'+ssid,
                success: function(data)
                {
                    if(data)
                    {
                        data=JSON.parse(data);
                        $("#statename").autocomplete ({
                            source:data
                        });
                    }
                    else
                    {
                        alert('Invalid!');
                    }
                }
            })
        });
    }

  function verify_assemcapital()
  {
    if($('#assemcapital').val()!=''&&$('#assemcapital').val()!=' ')
    {
      $('#assemcapital').attr('readonly',true);
      $('#assemcapital').attr('onmousedown','return false');
      $('.verify_assemcapital').css('display','none');
      alert("Verified!");
    }
    else
    {
      alert('Enter something');
    }
  }

  function verify_state()
  {
    universe=$('#statename').val();
    $.ajax ({
      method: 'post',
      url: "<?php echo base_url() ?>state/verify_state/"+universe,
      success: function(data)
      {
        if(data=='ok')
        {
            $('#statename').attr('readonly',true);
            $('#statename').attr('onmousedown','return false');
            $('.verify_statename').css('display','none');
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