<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">JMS Login</div>
      <div class="card-body">
       <?php
       	echo form_open('Ctrl_login/chk_user');
        ?>
          <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input class="form-control" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter Username" name='txtUname' required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" id="exampleInputPassword1" type="password" placeholder="Password" name='txtPass' required>
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember Password</label>
            </div>
          </div>
          <button  type='submit' class="btn btn-primary btn-block">Login</botton>
     <?php
       	echo form_close();
        ?>
        <div class="text-center">
          
        </div>
      </div>
      <a href='ctrl_login/register_user' style="text-align: center;font-size: 12px;margin-bottom: 15px">Register</a>
    </div>
  </div>

