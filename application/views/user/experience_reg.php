 <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#"><b>Working Experience</b></a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>

      <form method="post" action="<?php echo base_url()?>Experience/experience" id="education">
      <div class="row" style="margin-bottom: 20px">
        <div class="col-sm-4">
          <label class="label_left"><h4>New Details</h4></label>
        </div>
      </div>

     

      <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">Work Post</label>
        </div>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="wpost" id="wpost">
        </div>
      </div>
 <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">Work Type</label>
        </div>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="wtype" id="wtype">
        </div>
      </div>
      <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">Working Time</label>
        </div>
        <div class="col-sm-5">
          <input type="Time" class="form-control" name="wtime" id="wtime">
        </div>
      </div>

      <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">This Work Started Date</label>
        </div>
        <div class="col-sm-5">
          <input type="date" class="form-control" name="wsdate" id="wsdate">
        </div>
      </div>

      <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">Worked/Working Firm/Pers/Bldng/Org</label>
        </div>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="org" id="org">
        </div>
      </div>

     
      <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">Still Working There?</label>
        </div>
        <div class="col-sm-5">
         <input name='stlwork' id='yes' type='radio' value="yes" checked onclick="$('.working').hide()">Yes&ensp;
         <input name='stlwork' id='no' type='radio' value="no" onclick="$('.working').show()">No

</div>



      </div>
  <div class="row row_space working" style="display: none;">
        <div class="col-sm-3">
          <label class="label_left">This Work Retirment Date</label>
        </div>
        <div class="col-sm-5">
          <input type="date" class="form-control" name="wrdate" id="wrdate">
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
   
   
