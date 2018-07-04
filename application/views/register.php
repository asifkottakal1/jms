
<body class="bg-dark">
  <form method="post" action="<?php echo base_url() ?>ctrl_login/registration" id='regform'>
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputName">First name</label>
                <input class="form-control" id="exampleInputName" name="fname" type="text" aria-describedby="nameHelp" placeholder="Enter first name" required pattern="[A-Za-z]{3,}" title="Only A-Z characters are allowed (Minimum 3 characters required)">
              </div>
              <div class="col-md-6">
                <label for="exampleInputLastName">Last name</label>
                <input class="form-control" id="exampleInputLastName" name="lname" type="text" aria-describedby="nameHelp" placeholder="Enter last name" required pattern="[A-Za-z]{3,}" title="Only A-Z characters are allowed">
              </div>
            </div>
          </div>
          <div class="form-group">
           <div class="form-row">
              <div class="col-md-6">
            <label for="exampleInputEmail1">Email address</label>
            &emsp;<label id="exemail" style="color: #f00;font-weight: bold;"></label>
            <input class="form-control" id="exampleInputEmail1" name="email" type="email" aria-describedby="emailHelp" placeholder="Enter email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Enter valid email" onblur="check_existence(this,'email')">
          </div>
           <div class="col-md-6">
                <label for="exampleInputMobile">Mobile</label>
                &emsp;<label id="exmobile" style="color: #f00;font-weight: bold;"></label>
                <input class="form-control" id="exampleInputMobile" name="mobile" type="text" aria-describedby="nameHelp" placeholder="Enter Mobile" required pattern="[789][0-9]{9}" title="Enter valid 10 digit mobile number" onblur="check_existence(this,'mobile')">
              </div>
            </div>
          </div>
          <!-- <div class="form-group">
           <div class="form-row">
              <div class="col-md-6">
            <label for="exampleInputBrandName">Brand Name</label>
            <input class="form-control" id="exampleInputBrandName" name="brandname" type="text" aria-describedby="nameHelp" placeholder="Enter Brand Name" required pattern="[A-Za-z]{3,}" title="Only A-Z characters are allowed (Minimum 3 characters required)">
          </div>
           <div class="col-md-6">
                <label for="exampleInputUserName">User Name</label>
                &emsp;<label id="exuname" style="color: #f00;font-weight: bold;"></label>
                <input class="form-control" id="exampleInputUserName" name="uname" type="text" aria-describedby="nameHelp" placeholder="Enter User Name" required pattern=".{3,}" title="Minimum 3 characters required" onblur="check_existence(this,'uname')">
              </div>
            </div>
          </div> -->
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Password</label>
                <input class="form-control" id="exampleInputPassword1" name="pass" type="password" placeholder="Password" required>
              </div>
              <div class="col-md-6">
                <label for="exampleConfirmPassword">Confirm password</label>
                &ensp;<label id="conpass" style="color: #f00;"></label>
                <input class="form-control" id="exampleConfirmPassword" type="password" placeholder="Confirm password" required onkeyup="check_pass()">
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-12">
                <label for="exampleInputPassword1">Address</label>
                <textarea class="form-control" id="exampleInputPassword1" name="address" type="text" placeholder="Address" required></textarea>
              </div>
            </div>
          </div>
           <!-- <div class="form-group">
           <div class="form-row">
              <div class="col-md-6">
            <label for="exampleInputCity">City</label>
            <input class="form-control" id="exampleInputCity" name="city" type="text" aria-describedby="nameHelp" placeholder="Enter City" required pattern="[A-Za-z]{3,}" title="Only A-Z characters are allowed (Minimum 3 characters required)">
          </div>
           <div class="col-md-6">
                <label for="exampleInputPincode">Pincode</label>
                <input class="form-control" id="exampleInputPincode" name="pin" type="text" aria-describedby="nameHelp" placeholder="Enter Pincode" required pattern="[0-9]{6}" maxlength="6" title="Enter valid pincode">
              </div>
            </div>
          </div> -->
          <button class="btn btn-primary btn-block" type='submit'>Register</button>
        <div class="text-center">
          <a class="d-block small mt-3" href="index.php">Login Page</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>
  </form>
<script type="text/javascript">
    function check_pass()
    {
      pass=$('#exampleInputPassword1').val();
      cpass=$('#exampleConfirmPassword').val();
      if(pass!=cpass)
      {
        $('#conpass').html('Passwords not match');
        $("#regform").submit(function(e){
        e.preventDefault();
        });
      }
      else
      {
        $('#conpass').html('');
        $("#regform").unbind();
      }
    }
  </script>
