 <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#"><b>Educational Qualification</b></a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>

      <form method="post" action="<?php echo base_url()?>education/education" id="education">
      <div class="row" style="margin-bottom: 20px">
        <div class="col-sm-4">
          <label class="label_left"><h4>New Details</h4></label>
        </div>
      </div>

      <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">Educational Qualification</label>
        </div>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="qualification" id="qualification" required>
        </div>
      </div>

      <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">Course Started Period</label>
        </div>
        <div class="col-sm-5">
          <input type="date" class="form-control" name="startp" id="startp">
        </div>
      </div>

      <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">Studied/Studing Institution</label>
        </div>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="institution" id="institution">
        </div>
      </div>

      <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">Certificate Issued Board/University</label>
        </div>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="cissued" id="cissued">
        </div>
      </div>

      <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">Still Studing this Institution?</label>
        </div>
        <div class="col-sm-5">
         <input name='stlstuding' id='stlstuding' type='radio' value="yes">Yes 
         &ensp;
         <input name='stlstuding' id='stlstuding' type='radio' value="no">No

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

