 <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#"><b>State Registration</b></a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>

      <form method="post" action="<?php echo base_url()?>state/state_reg">
      <div class="row parent_space">
        <div class="col-sm-4">
          <label class="label_left"><h4>Parent Area Details</h4></label>
        </div>
      </div>

      <div class="row parent_space" style="text-align: center;">
        <div class="col-sm-3">
          <label class="label_left">Region</label>
        </div>
        <div class="col-sm-6">
          <input type="text" name="regname" id="regname" class="form-control" required placeholder="Type Ucode & Confirm or Search & Confirm">
        </div>
        <div class="col-sm-3">
            <button type="button" class="verify_btn verify_regname" onclick="verify_region()">View & Confirm</button>
        </div>
      </div>

      <div class="row parent_space" style="text-align: center;">
        <div class="col-sm-3">
          <label class="label_left">Parliament Seat</label>
        </div>
        <div class="col-sm-6">
          <input type="text" name="parlname" id="parlname" class="form-control" required placeholder="Type Ucode & Confirm or Search & Confirm">
        </div>
        <div class="col-sm-3">
            <button type="button" class="verify_btn verify_parlname" onclick="verify_parl()">View & Confirm</button>
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
          <label class="label_left">Name of State</label>
        </div>
        <div class="col-sm-4">
          <input type="text" name="statename" id="statename" class="form-control" required placeholder="Type name">
        </div>
      </div>

      <div class="row row_space">
        <!-- <div class="col-sm-4">
          <label class="label_left">Ucode creation for Planet</label>
        </div>
        <div class="col-sm-3">
          <input type="number" name="ucode" id="appointed_ss" class="form-control" required>
        </div> -->
        <div class="col-sm-4">
          <label class="label_left">State Status</label>
        </div>
        <div class="col-sm-3">
          <input type="radio" name="status" value="partial">Partial State &emsp;
          <input type="radio" name="status" value="self">Self State
        </div>
        <div class="col-sm-2">
            <input type="number" name="areasqmtr" class="form-control" placeholder="Area Sqmtr">
        </div>
      </div>

      <div class="row row_space">
        <div class="col-sm-4">
          <label class="label_left">Capital of State</label>
        </div>
        <div class="col-sm-4">
          <input type="text" name="statecapital" id="statecapital" class="form-control" required placeholder="Type Ucode & Confirm or Search & Confirm">
        </div>
        <div class="col-sm-3">
            <button type="button" class="verify_btn verify_statecapital" onclick="verify_statecapital()">View & Confirm</button>
        </div>
      </div>

      <div class="row row_space">
        <div class="col-sm-4">
          <label class="label_left">State Language</label>
        </div>
        <div class="col-sm-6">
          <select name="language" class="form-control" autocomplete="off" required>
            <option value="">---Select Language---</option>
            <?php foreach ($data as $row) { ?>
              <option value="<?php echo $row['language_uniqid']?>"><?php echo $row['language_name']?></option>
            <?php } ?>
          </select>
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
        $("#regname").autocomplete({
            source:['']
        });
        $('#regname').keyup(function(){
            ssid=$('#regname').val();
            $.ajax ({
                method: 'post',
                url:'<?=base_url('region/get_uniqid/') ?>'+ssid,
                success: function(data)
                {
                    if(data)
                    {
                        data=JSON.parse(data);
                        $("#regname").autocomplete ({
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

        $("#parlname").autocomplete({
            source:['']
        });
        $('#parlname').keyup(function(){
            ssid=$('#parlname').val();
            $.ajax ({
                method: 'post',
                url:'<?=base_url('parliament/get_uniqid/') ?>'+ssid,
                success: function(data)
                {
                    if(data)
                    {
                        data=JSON.parse(data);
                        $("#parlname").autocomplete ({
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

  function verify_statecapital()
  {
    if($('#statecapital').val()!=''&&$('#statecapital').val()!=' ')
    {
      $('#statecapital').attr('readonly',true);
      $('#statecapital').attr('onmousedown','return false');
      $('.verify_statecapital').css('display','none');
      alert("Verified!");
    }
    else
    {
      alert('Enter something');
    }
  }

  function verify_region()
  {
    universe=$('#regname').val();
    $.ajax ({
      method: 'post',
      url: "<?php echo base_url() ?>region/verify_region/"+universe,
      success: function(data)
      {
        if(data=='ok')
        {
            $('#regname').attr('readonly',true);
            $('#regname').attr('onmousedown','return false');
            $('.verify_regname').css('display','none');
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

  function verify_parl()
  {
    universe=$('#parlname').val();
    $.ajax ({
      method: 'post',
      url: "<?php echo base_url() ?>parliament/verify_parl/"+universe,
      success: function(data)
      {
        if(data=='ok')
        {
            $('#parlname').attr('readonly',true);
            $('#parlname').attr('onmousedown','return false');
            $('.verify_parlname').css('display','none');
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