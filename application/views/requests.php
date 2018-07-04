<?php $this->load->view('templates/header') ?>

<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#"><b>Dashboard</b></a>
        </li>
        <li class="breadcrumb-item active">Requests</li>
      </ol>


<div class="row">
        <div class="col-lg-12">
          
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Members</div>
    
        <div class="card-body">
  
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Sl No</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Request Date</th>
                  <th>Operation</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>SlNo</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Request date</th>
                  <th>Operation</th>
                </tr>
              </tfoot>
              <tbody>
    <?php

    $i=1;
    if($data[0])
    foreach($data as $item)
    {
      $timestamp = strtotime($item['acc_opendt']);
      $item['acc_opendt']=date('d-m-Y', $timestamp);
    ?>
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $item['Firstname'];?></td>
                  <td><?php echo $item['Lastname'];?></td>
                  <td><?php echo $item['email'];?></td>
                  <td><?php echo $item['acc_opendt'];?></td>
                  <td><?php echo $item['userstatus']=='disabled'?"<a href='enable_user/".$item['userid']."'>Enable</a>":"Rejected";?></td>
                </tr>
                <?php
    $i++;
    }
    ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
      </div>
    </div>
</div>
    <!-- /.container-fluid-->

<?php $this->load->view('templates/footer') ?>
