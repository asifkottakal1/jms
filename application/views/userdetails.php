
<style type="text/css">
 .table td, .table th{
  border-top: none;
 }

 .content-wrapper{
  background: #f3f3f3;
 }
 
 .card{
  background: #fff;
  padding: 20px;
  height: 100%;
  
  border-radius: 0;
 }
 

 .border-top-black{
   border-top:3px solid #000000;
 }

 .profile-image{
  width: 100%;
  height: 100%;
  position: relative;
  padding: 0;
 }
 
 .profile-image img{
  width: inherit;
  height: inherit;
  object-fit: contain;
  object-position: top;
  
 }

 .row{
  margin-bottom: 20px;
 }

 .row:last-child{
  margin-bottom: 0;
 }
</style>

<div class="content-wrapper">
 <div class="container-fluid">
  <div class="row">
   <div class="col-md-3">
    <div class="card border-top-black border-secondary mb-3">
     <div class="profile-image">
      <img src="<?=base_url($userdata['photos']['userpic'])?>">
     </div>
    </div>
   </div>
   <div class="col-md-9">
    <div class="card border-top-black border-secondary mb-3">
     <h3><i class="fa fa-fw fa-user"></i> About</h3>
      <table class="table table-borderless" >
       <thead>

       </thead>
     <tbody>
       <tr>



        <td  class="col-xs-5 control-label" >
        First Name:</td><td><?=$userdata['users']['firstname']?></td> 
    
        <td>
        Last Name:</td><td><?=$userdata['users']['lastname']?></td>
       </tr>
       <tr><td>
       Address:</td><td><?=$userdata['users']['address']?></td>
      
        <td>
        Email:</td><td><?=$userdata['users']['email']?></td>
       </tr>
       <tr>
        <td>
        Mobile:</td><td><?=$userdata['users']['mobile']?></td>
        
       </tr>

     </tbody></table>
    </div>
   </div>
   
  </div>





  <div class="row">
    <div class="col-md-6">
      <div class="card border-top-black border-secondary mb-3">
        <h3><i class="fa fa-heart "></i> Marriage Details</h3>
        <table class="table table-borderless" >
          <thead>
          </thead>
          <tbody>
            <tr>
              <td>First Person ID:</td><td><?=$userdata['marriage']['fpuid']?></td> 
            </tr>
            <tr>
              <td>Second Person ID:</td>
              <td><?=$userdata['marriage']['spuid']?></td>
            </tr>
            <tr>
             <td>Venue:</td><td><?=$userdata['marriage']['venue']?></td>
            </tr>
             <tr>
             <td>Witness1:</td><td><?=$userdata['marriage']['witness1']?></td>
            </tr>
             <tr>
             <td>Witness2:</td><td><?=$userdata['marriage']['witness2']?></td>
            </tr>
             <tr>
             <td>Authorityid:</td><td><?=$userdata['marriage']['authorityid']?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card border-top-black border-secondary mb-3">
         <h3><i class="fa fa-id-card-o "></i> Idcard</h3>
        <table class="table table-borderless" >
    <tbody>
     <tr>
      <td>
       Aadhar:</td><td><?=$userdata['idcard']['aadhar']?></td> 
     </tr>
      <tr>
      <td>
       Ration:</td><td><?=$userdata['idcard']['ration']?></td>
     </tr>
     <tr>
      <td>
       Passport:</td><td><?=$userdata['idcard']['passport']?></td>
     </tr>
     <tr>
      <td>
       License:</td><td><?=$userdata['idcard']['license']?></td>
     </tr>
     <tr>
      <td>
       Voter:</td><td><?=$userdata['idcard']['voter']?></td>
     </tr>
    

    </tbody></table>
      </div>
    </div>
  </div>


<div class="row">
    <div class="col-md-6">
      <div class="row">
        <div class="col">
          <div class="card border-top-black border-secondary mb-3">
        <h3><i class="fa fa-graduation-cap "></i>Qualification</h3>
           <table class="table table-borderless">
            <tbody>
     <tr>
      <td>
       Qualification:</td><td><?=$userdata['qualification']['qualification']?></td> 
     </tr>
      <tr>
      <td>
      Start Period:</td><td><?=$userdata['qualification']['startp']?></td>
     </tr>
     <tr>
      <td>
       Institution:</td><td><?=$userdata['qualification']['institution']?></td>
     </tr>
     <tr>
      <td>
      Cirtificate issued:</td><td><?=$userdata['qualification']['cissued']?></td>
     </tr>
     <tr>
      <td>
       Voter:</td><td><?=$userdata['qualification']['stlstuding']?></td>
     </tr>
    

             </tbody></table>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="card border-top-black border-secondary mb-3">
             <h3><i class="fa fa-mobile"></i> Mobile</h3>
        <table class="table table-borderless" >
             <tbody>
              <tr>
               <td>
               Moble No:</td><td><?=$userdata['mobile']['code']?><?=$userdata['mobile']['mobile']?></td> 
              </tr>
              <tr>
               <td>
                Date:</td><td><?=$userdata['mobile']['date']?></td>
              </tr>
             </tbody></table>
          </div>
        </div>
      </div>
  </div>
    <div class="col-md-6">
      <div class="card border-top-black border-secondary mb-3">
         <h3><i class="fa fa-suitcase "></i> Work Experience</h3>
        <table class="table table-borderless" >
    <tbody>
     <tr>
      <td>
       Work Post:</td><td><?=$userdata['experience']['wpost']?></td> 
     </tr>
      <tr>
      <td>
      Start Period:</td><td><?=$userdata['experience']['wtype']?></td>
     </tr>
     <tr>
      <td>
       Institution:</td><td><?=$userdata['experience']['wtime']?></td>
     </tr>
     <tr>
      <td>
      Cirtificate issued:</td><td><?=$userdata['experience']['wsdate']?></td>
     </tr>
     <tr>
      <td>
      Organisation:</td><td><?=$userdata['experience']['org']?></td>
     </tr>
     <tr>
      <td>
       Still Work there?:</td><td><?=$userdata['experience']['stlwork']?></td>
     </tr>
     <?php if ($userdata['experience']['stlwork']=="yes") {
     ?>
      <tr>
      <td>
       Work Retairment Date:</td><td><?=$userdata['experience']['wrdate']?></td>
     </tr>
     <?php
     } ?>
    

    </tbody></table>
      </div>
    </div>
  </div>


</div><!--/container-fluid-->
  




 

 
     

 

 </div></div>

<?php $this->load->view('templates/footer') ?>
