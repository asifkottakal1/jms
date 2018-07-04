<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#"><b>Payment</b></a>
        </li>
        <li class="breadcrumb-item active">User Dashboard</li>
      </ol>

	<?php if($data['flag']==1) { ?>

      <div class="col-sm-12">
      	<h3 align="center">You have made your payment to JMS. Enjoy!</h3>
      </div>	
  
  <?php } else { ?>

    	<div class="row parent_space">
    		<div class="col-sm-12">
    			<h3 align="center">You must pay an amount of 1000 rupees to use JMS</h3>
    		</div>
    	</div>

    	<div class="row parent_space">
    		<div class="col-sm-12">
    			<center>
    				<a href='<?php echo base_url() ?>payment/payumoney'><input type="button" value="Make Payment" class="btn btn-danger btn-lg"></a>
    			</center>
    		</div>
    	</div>

  <?php } ?>

    <!-- /.container-fluid-->
  </div>
</div>