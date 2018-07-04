<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#"><b>Languages Registration</b></a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>

      <form method="post" action="<?php echo base_url() ?>language/language_reg">
      <div class="row row_space">
      	<div class="col-sm-4">
      		<label class="label_left">Name of Language</label>
      	</div>
      	<div class="col-sm-5">
      		<input type="text" name="lang_name" id="lang_name" class="form-control" required placeholder="Type Name">
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