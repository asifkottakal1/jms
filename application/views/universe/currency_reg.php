<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#"><b>Currency Registration</b></a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>

      <form method="post" action="<?php echo base_url()?>currency/currency_reg" enctype="multipart/form-data">
      <div class="row row_space">
      	<div class="col-sm-4">
      		<label class="label_left">Name of Currency</label>
      	</div>
      	<div class="col-sm-5">
      		<input type="text" name="name" id="name" class="form-control" required placeholder="Type Name">
      	</div>
      </div>

      <div class="row row_space">
            <div class="col-sm-4">
                  <label class="label_left">Currency symbol</label>
            </div>
            <div class="col-sm-4">
                  <input type="file" name="symbol" id="symbol" class="form-control" required accept="image/*">
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