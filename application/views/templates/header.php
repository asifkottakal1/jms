<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>JMS</title>
  <!-- Bootstrap core CSS-->
  <link href="<?php echo base_url();?>external/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="<?php echo base_url();?>external/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="<?php echo base_url();?>external/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="<?php echo base_url();?>external/css/sb-admin.css" rel="stylesheet">
  <link href="<?php echo base_url();?>external/vendor/jquery-ui/jquery-ui.min.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">JMS</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.html">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="<?php echo base_url() ?>ctrl_profile/profile">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Profile</span>
          </a>
        </li>
       <!--  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="charts.html">
            <i class="fa fa-fw fa-area-chart"></i>
            <span class="nav-link-text">Charts</span>
          </a>
        </li> -->
      <!--   <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="tables.html">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Tables</span>
          </a>
        </li> -->
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-adn"></i>
            <span class="nav-link-text">Accounts</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
             <li>
              <a href='<?php echo base_url() ?>fees_account'>Fees Account Creation and Amount Fixation Registration</a>
            </li>
            <li>
              <a href='<?php echo base_url() ?>Feesgroup'>Fees Group Head Creation</a>
            </li>
            <li>
              <a href='<?php echo base_url() ?>accountgrp'>Account Group Head Creation</a>
            </li>
            <li>
              <a href='<?php echo base_url() ?>cashrcpt'>Cash Recpt Account Head Creation</a>
            </li>
            <li>
              <a href='<?php echo base_url() ?>cashpymnt'>Cash Payment(Expence)Account Head Creation</a>
            </li>
             <li>
              <a href='<?php echo base_url() ?>Nrcpt'>Non Cash Recpt Account Head Creation</a>
            </li>
            <li>
              <a href='<?php echo base_url() ?>npymnt'>Non Cash Payment Account Head Creation</a>
            </li>
            <li>
              <a href='<?php echo base_url() ?>Debtors'>Debitors Account Head Creation</a>
            </li>
            <li>
              <a href='<?php echo base_url() ?>Creditors'>Creditors Account Head Creation</a>
            </li>
            <li>
              <a href='<?php echo base_url() ?>Purchase'>Purchase Account Head Creation</a>
            </li>
             <li>
              <a href='<?php echo base_url() ?>sales'>Sales Account Head Creation</a>
            </li>
            <li>
              <a href='<?php echo base_url() ?>purchasertn'>Purchase Return Account Head Creation</a>
            </li>
            <li>
              <a href='<?php echo base_url() ?>salesrtn'>Sales Return Account Head Creation</a>
            </li>
             <li>
              <a href='<?php echo base_url() ?>feesacc'>Fees Account Creation and Amount Fixation Registration</a>
            </li>
            <li>
              <a href='<?php echo base_url() ?>banking'>JMS Banking Account Entries Registration</a>
            </li>
             <li>
              <a href='<?php echo base_url() ?>cashrcvng'>Cash Recieving to Janamahasabha or Councils Register</a>
            </li>
             <li>
              <a href='<?php echo base_url() ?>ncashrcvng'>Non Cash Recieving to Janamahasabha or Councils Register</a>
            </li>
             <li>
              <a href='<?php echo base_url() ?>pymntjms'>Cash Expences/Payments For  Janamahasabha or Councils Register</a>
            </li>
             <li>
              <a href='<?php echo base_url() ?>npymntjms'>Non Cash Payments For Janamahasabha or Councils Register</a>
            </li>
             <li>
              <a href='<?php echo base_url() ?>purchaseinvce'>Purchase Invoice Register For JMS</a>
            </li>
             <li>
              <a href='<?php echo base_url() ?>purchasertnin'>Purchase Return Invoice Register For JMS</a>
            </li>
             <li>
              <a href='<?php echo base_url() ?>salesinvce'>Sales Invoice Register For JMS</a>
            </li>
            <li>
              <a href='<?php echo base_url() ?>salesrtninvce'>Sales Return Invoice Register For JMS</a>
            </li>
             <li>
              <a href='<?php echo base_url() ?>'>Item of Service,Goods and other transactions registration with grp Head</a>
            </li>
          </ul>
        </li>
       <!--  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Example Pages</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="login.html">Login Page</a>
            </li>
            <li>
              <a href="register.html">Registration Page</a>
            </li>
            <li>
              <a href="forgot-password.html">Forgot Password Page</a>
            </li>
            <li>
              <a href="blank.html">Blank Page</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Menu Levels</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
            <li>
              <a href="#">Second Level Item</a>
            </li>
            <li>
              <a href="#">Second Level Item</a>
            </li>
            <li>
              <a href="#">Second Level Item</a>
            </li>
            <li>
              <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">Third Level</a>
              <ul class="sidenav-third-level collapse" id="collapseMulti2">
                <li>
                  <a href="#">Third Level Item</a>
                </li>
                <li>
                  <a href="#">Third Level Item</a>
                </li>
                <li>
                  <a href="#">Third Level Item</a>
                </li>
              </ul>
            </li>
          </ul>
        </li> -->
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Registration">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseReg" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-registered"></i>
            <span class="nav-link-text">Registration</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseReg">
            <li>
              <a href='<?php echo base_url() ?>compound'>Compound Registration</a>
            </li>
            <li>
              <a href='<?php echo base_url() ?>building'>Building Registration</a>
            </li>
            <li>
              <a href='<?php echo base_url() ?>sannadha_sevakan'>Volunteer Appoint</a>
            </li>
            <li>
              <a href='<?php echo base_url() ?>dataentry_operator'>Data Entry Operator Appoint</a>
            </li>
            <li>
              <a href='<?php echo base_url() ?>universe'>Universe Register</a>
            </li>
            <li>
              <a href='<?php echo base_url() ?>planet'>Planet Register</a>
            </li>
            <li>
              <a href='<?php echo base_url() ?>language'>Language Register</a>
            </li>
            <li>
              <a href='<?php echo base_url() ?>approval_authority'>Approval Authority Appoint</a>
            </li>
            <li>
              <a href='<?php echo base_url() ?>currency'>Currency Register</a>
            </li>
            <li>
              <a href='<?php echo base_url() ?>continent'>Continent Register</a>
            </li>
            <li>
              <a href='<?php echo base_url() ?>nation'>Nation Register</a>
            </li>
            <li>
              <a href='<?php echo base_url() ?>parliament'>Parliament Seat Register</a>
            </li>
            <li>
              <a href='<?php echo base_url() ?>region'>Region Register</a>
            </li>
            <li>
              <a href='<?php echo base_url() ?>state'>State Register</a>
            </li>
            <li>
              <a href='<?php echo base_url() ?>assembly'>Assembly Seat Register</a>
            </li>
          </ul>
        </li>
        <!--  <li class="nav-item" data-toggle="tooltip" data-placement="right" title="accounts">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseAcc" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-adn"></i>
            <span class="nav-link-text">Accounts</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseReg">
            <li>
              <a href='<?php echo base_url() ?>'>Fees Account Creation and Amount Fixation Registration</a>
            </li>
            <li>
              <a href='<?php echo base_url() ?>'>Fees Group Head Creation</a>
            </li>
            <li>
              <a href='<?php echo base_url() ?>'>Account Group Head Creation</a>
            </li>
            <li>
              <a href='<?php echo base_url() ?>'>Cash Recpt Account Head Creation</a>
            </li>
            <li>
              <a href='<?php echo base_url() ?>'>Cash Payment(Expence)Account Head Creation</a>
            </li>
            <li>
              <a href='<?php echo base_url() ?>'>Non Cash Recpt Account Head Creation</a>
            </li>
            <li>
              <a href='<?php echo base_url() ?>'>Non Cash Payment Account Head Creation</a>
            </li>
            <li>
              <a href='<?php echo base_url() ?>'>Debitors Account Head Creation</a>
            </li>
            <li>
              <a href='<?php echo base_url() ?>'>Creators Account Head Creation</a>
            </li>
            <li>
              <a href='<?php echo base_url() ?>'>Purchase Account Head Creation</a>
            </li>
            <li>
              <a href='<?php echo base_url() ?>'>Purchase Return Account Head Creation</a>
            </li>
            <li>
              <a href='<?php echo base_url() ?>'>Sales Return Account Head Creation</a>
            </li>
            <li>
              <a href='<?php echo base_url() ?>'>JMS Banking Account Entries Registration</a>
            </li>
             <li>
              <a href='<?php echo base_url() ?>'>Cash Recieving to Janamahasabha or Councils Register</a>
            </li>
             <li>
              <a href='<?php echo base_url() ?>'>Non Cash Recieving to Janamahasabha or Councils Register</a>
            </li>
             <li>
              <a href='<?php echo base_url() ?>'>Cash Expences/Payments For  Janamahasabha or Councils Register</a>
            </li>
             <li>
              <a href='<?php echo base_url() ?>'>Non Cash Payments For Janamahasabha or Councils Register</a>
            </li>
             <li>
              <a href='<?php echo base_url() ?>'>Purchase Invoice Register For JMS</a>
            </li>
             <li>
              <a href='<?php echo base_url() ?>'>Purchase Return Invoice Register For JMS</a>
            </li>
             <li>
              <a href='<?php echo base_url() ?>'>Item of Service,Goods and other transactions registration with grp Head</a>
            </li>
          </ul>
        </li>
 -->        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="<?php echo base_url() ?>ctrl_main/requests">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">Requests</span>
          </a>
        </li>
        <!-- <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Link</span>
          </a>
        </li> -->
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none">Messages
              <span class="badge badge-pill badge-primary">12 New</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">New Messages:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>David Miller</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Jane Smith</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>John Doe</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all messages</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Alerts:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all alerts</a>
          </div>
        </li>
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>

