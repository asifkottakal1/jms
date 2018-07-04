<?php $this->load->view('templates/header') ?>

<div class="content-wrapper">
    <div class="container-fluid">
  
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#"><b>User Profile</b></a>
        </li>
       
      </ol>
        <table class="table table-bordered">
        	<thead>
        		<tr>
        			<th>Userid</th>
        			<th>Email</th>
        			<th>First Name</th>
        			<th>Last Name</th>
        			<th>Account open date</th>
        			
        			
        			<th>Address</th>
        			<th>Mobile</th>
        			<th>User Uniq Id</th>
        			<th>Activities</th>

        			
        		
        		</tr>
        	</thead>
        	<tbody>
        	<?php foreach($users as $user) {
        	?>
        		<tr>
	        		<td><?=$user['userid']?></td>
	        		<td><?=$user['email']?></td>
	        	    <td><?=$user['firstname']?></td>
	        	    <td><?=$user['lastname']?></td>
	        	   <td><?=$user['acc_opendt']?></td>
	        	   <td><?=$user['address']?></td>
	        	   <td><?=$user['mobile']?></td>
	        	    <td><?=$user['user_uniqid']?></td>
	        	   <td><a href='<?php echo base_url() ?>userdetails/userdetails/<?=$user['user_uniqid']?>'><input type="button" vame="view" value="view" class="btn btn-primary btn-md"></a></td>

	        	   


	        	</tr>
        	<?php
        	} ?>
        	</tbody>
        </table>



</div></div>

<?php $this->load->view('templates/footer') ?>
