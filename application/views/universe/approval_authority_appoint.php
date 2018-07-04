<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#"><b>Appointing of Approval Authorities</b></a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>

      <form method="post" action="<?php echo base_url()?>approval_authority/aa_reg">
      <div class="row row_space">
      	<div class="col-sm-4">
      		<label class="label_left">Appointed Sannadha Sevakan</label>
      	</div>
      	<div class="col-sm-7">
      		<input type="text" name="appointed_ss" id="appointed_ss" class="form-control" required autocomplete="off">
      	</div>
      </div>

      <div class="row row_space">
            <div class="col-sm-4">
                  <label class="label_left">This Sannadha Sevakan's Duty</label>
            </div>
            <div class="col-sm-7">
                  <input type="text" name="duty" id="duty" class="form-control" required autocomplete="off">
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

<script type="text/javascript">
  window.onload=function()
  {
    $("#appointed_ss").autocomplete({
      source:['']
    });
    $('#appointed_ss').keyup(function(){
      ssid=$('#appointed_ss').val();
      $.ajax ({
        method: 'post',
        url:'<?=base_url('sannadha_sevakan/get_ss/') ?>'+ssid,
        success: function(data)
        {
          if(data)
          {
            data=JSON.parse(data);
            $("#appointed_ss").autocomplete ({
                          source:data
                      });
          }
        }
      })
    });
  }
</script>