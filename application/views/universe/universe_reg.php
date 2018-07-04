 <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#"><b>Universe Registration</b></a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>

      <form method="post" action="universe/universe_register">
      <div class="row" style="margin-bottom: 20px">
        <div class="col-sm-4">
          <label class="label_left"><h4>New Registration Details</h4></label>
        </div>
        <div class="col-sm-2 gmaps" id='gmaps'>
          
        </div>

      </div>

      <div class="row row_space">
        <div class="col-sm-4">
          <label class="label_left">Name of Universe</label>
        </div>
        <div class="col-sm-4">
          <input type="text" name="uniname" id="srno_ss" class="form-control" required placeholder="Type name">
        </div>
      </div>

      <div class="row row_space">
        <!-- <div class="col-sm-4">
          <label class="label_left">Ucode creation for universe</label>
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
          <label class="label_left">Capital of Universe</label>
        </div>
        <div class="col-sm-4">
          <input type="text" name="unicapital" id="unicapital" class="form-control" required placeholder="Type Ucode & Confirm or Search & Confirm">
        </div>
        <div class="col-sm-3">
            <button type="button" class="verify_btn verify_unicap" onclick="verify_unicapital()">View & Confirm</button>
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

  function verify_unicapital()
  {
    if($('#unicapital').val()!=''&&$('#unicapital').val()!=' ')
    {
      $('#unicapital').attr('readonly',true);
      $('#unicapital').attr('onmousedown','return false');
      $('.verify_unicap').css('display','none');
      alert("Verified!");
    }
    else
    {
      alert('Enter something');
    }
  }

</script>