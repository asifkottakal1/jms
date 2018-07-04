 <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#"><b>Nation Registration</b></a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>

      <form method="post" action="<?php echo base_url()?>nation/nation_reg">
      <div class="row parent_space">
        <div class="col-sm-4">
          <label class="label_left"><h4>Parent Area Details</h4></label>
        </div>
      </div>

      <div class="row parent_space" style="text-align: center;">
        <div class="col-sm-3">
          <label class="label_left">Continent</label>
        </div>
        <div class="col-sm-6">
          <input type="text" name="contname" id="contname" class="form-control" required placeholder="Type Ucode & Confirm or Search & Confirm">
        </div>
        <div class="col-sm-3">
            <button type="button" class="verify_btn verify_uniname" onclick="verify_continent()">View & Confirm</button>
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
          <label class="label_left">Name of Nation</label>
        </div>
        <div class="col-sm-4">
          <input type="text" name="natname" id="natname" class="form-control" required placeholder="Type name">
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
          <label class="label_left">Capital of Nation</label>
        </div>
        <div class="col-sm-4">
          <input type="text" name="natcapital" id="natcapital" class="form-control" required placeholder="Type Ucode & Confirm or Search & Confirm">
        </div>
        <div class="col-sm-3">
            <button type="button" class="verify_btn verify_natcapital" onclick="verify_natcapital()">View & Confirm</button>
        </div>
      </div>

      <div class="row row_space">
        <div class="col-sm-4">
          <label class="label_left">National Language</label>
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
        <div class="col-sm-4">
          <label class="label_left">National Currency</label>
        </div>
        <div class="col-sm-6">
          <select name="currency" class="form-control" autocomplete="off" required>
            <option value="">---Select Currency---</option>
            <?php foreach ($data2 as $row1) { ?>
              <option value="<?php echo $row1['currency_uniqid']?>"><?php echo $row1['curname']?></option>
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
        $("#contname").autocomplete({
            source:['']
        });
        $('#contname').keyup(function(){
            ssid=$('#contname').val();
            $.ajax ({
                method: 'post',
                url:'<?=base_url('continent/get_uniqid/') ?>'+ssid,
                success: function(data)
                {
                    if(data)
                    {
                        data=JSON.parse(data);
                        $("#contname").autocomplete ({
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

  function verify_natcapital()
  {
    if($('#natcapital').val()!=''&&$('#natcapital').val()!=' ')
    {
      $('#natcapital').attr('readonly',true);
      $('#natcapital').attr('onmousedown','return false');
      $('.verify_natcapital').css('display','none');
      alert("Verified!");
    }
    else
    {
      alert('Enter something');
    }
  }

  function verify_continent()
  {
    universe=$('#contname').val();
    $.ajax ({
      method: 'post',
      url: "<?php echo base_url() ?>continent/verify_continent/"+universe,
      success: function(data)
      {
        if(data=='ok')
        {
            $('#contname').attr('readonly',true);
            $('#contname').attr('onmousedown','return false');
            $('.verify_uniname').css('display','none');
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