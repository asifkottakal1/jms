 <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#"><b>Sales Return Invoice Register For  JMS </b></a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>

      <form method="post" action="<?php echo base_url()?>salesrtninvce/salesrtninvce_reg">
              <div class="col-sm-4">
          <label class="label_left"><h4>Master Data</h4></label>
        </div>
      </div>

      <div class="row parent_space" style="text-align: center;">
        <div class="col-sm-3">
          <label class="label_left">Area Account</label>
        </div>
        <div class="col-sm-6">
          <input type="text" name="areauid" id="areauid" class="form-control  ui-autocomplete-input" required placeholder="Type Area Unicode ">
        </div>
        <div class="col-sm-3">
            <button type="button" class="verify_btn verify_areauid" onclick="verify_who('areauid')">Verify & Confirm</button>
        </div>
      </div>
       <div class="row parent_space" style="text-align: center;">
        <div class="col-sm-3">
          <label class="label_left">Select Sabha or Council Under this area</label>
        </div>
                    


               <div class="col-sm-6">
          <select name="sabha" id="sabha" required class="form-control">

            
          </select>
        </div>
       
      </div>
  <div class="row row_space">
        <div class="col-sm-12">
          <hr style="height: 1px;background-color: #000" />
        </div>
      </div>
<div class="col-sm-4">
          <label class="label_left"><h4>New Details</h4></label>
        </div>
      <div class="row row_space" >
        <div class="col-sm-3">
          <label class="label_left">Sold To</label>
        </div>
        <div class="col-sm-6">
          <input type="text" name="salesrtnuid" id="salesrtnuid" class="form-control" required placeholder="Type">
        </div>
        
       <div class="col-sm-3">
           <button type="button" class="verify_btn verify_salesrtnuid" onclick="verify_who('salesrtnuid')">Verify & Confirm</button>
        </div>
      
      </div>

<div class="row row_space" >
        <div class="col-sm-3">
          <label class="label_left">Sales Account Head</label>
        </div>
         <div class="col-sm-6">
          <select name="salesrtn" id="salesrtn" required class="form-control">
          </select>
        </div>
       
      </div>
      <div class="row row_space">
        <div class="col-sm-3">
          <label class="label_left">Cash or Credit Mode</label>
        </div>
        <div class="col-sm-6">
          <select name="cacr" id="cacr" required class="form-control">
                <option>Cash</option>
                <option>Credit</option>
            
          </select>
        </div>
       
      </div>
       <div class="row row_space">
        <div class="col-sm-12">
          <hr style="height: 1px;background-color: #000" />
        </div>
      </div>
      <div>
       
     <div class="col-sm-4">
          <label class="label_left"><h4>Sales Details</h4></label>
        </div>
      <div>
       <div>       
      <div class="row row_space" style="text-align: center;">

    </div>
</div>
<div class="more" style="visibility: none;" >
  <div id="salesrtn-details-div">
  <div class="row row_space">
    <div class="col-sm-1">Sno</div>
    <div class="col-sm-4">Sales Item</div>
    <div class="col-sm-1">Quantity</div>
    <div class="col-sm-2">Price</div>
    <div class="col-sm-2">Amount</div>
  </div>
 <div class="row row_space" >
   <div class="col-sm-1">
          <input type="text" name="sno[]"  class="form-control sno"  placeholder="">
        </div>
        <div class="col-sm-4">
          <input type="text" name="salesrtnitm[]"  class="form-control salesrtnitm" required placeholder="Type Item Code">
        </div>
     <div class="col-sm-1 quantity-container">
          <input type="text" name="quantity[]"  class="form-control quantity"  placeholder="" value='0'>
        </div>
        <div class="col-sm-2 price-container">
          <input type="text" name="price[]"  class="form-control price"  placeholder="" value='0'>
        </div>
        <div class="col-sm-2 amount-container">
          <input type="text" name="amount[]" class="form-control amount"  placeholder="" value=0 readonly>
        </div>

        <div class="col-sm-2">
        <input type='button' value='+' id='add'>
        </div>
  </div>
</div>

<div class="row row_space" >

<div class="row offset-md-4">

Total Quantity</div>
<div class="col-sm-1">
<input type="text" name="totalQuantity" id="totalQuantity" class="form-control"  placeholder="">
</div>
<div class="row offset-md-1">

Total Amount</div>
<div class="col-sm-2">
<input type="text" name="totalAmount" id="totalAmount" class="form-control"  placeholder="">
</div>
</div>
       
 <div class="row row_space" >
        <div class="col-sm-2">
          <label class="label_left">Amount in Words</label>
        </div>
        <div class="col-sm-9">
          <input type="text" name="amountw" id="amountw" class="form-control"  placeholder="Type">
        </div>
        
       
      
      </div>




      <div class="row row_space">
        <div class="col-sm-12">
          <hr style="height: 1px;background-color: #000" />
        </div>
      </div>

      <div style="display: none">
        <div class="row row_space sales-details">
    <div class="col-sm-1">
          <input type="text" name="sno[]"  class="form-control sno" placeholder="">
        </div>
        <div class="col-sm-4">
          <input type="text" name="purchasertnitm[]"  class="form-control purchasertnitm" placeholder="Type Item Code">
        </div>
     <div class="col-sm-1 quantity-container">
          <input type="text" name="quantity[]"  class="form-control quantity" placeholder="" value='0'>
        </div>
        <div class="col-sm-2 price-container">
          <input type="text" name="price[]"  class="form-control price" placeholder="" value='0'>
        </div>
        <div class="col-sm-2 amount-container">
          <input type="text" name="amount[]" class="form-control amount" placeholder="" value=0 readonly>
        </div>
        <div class="col-sm-2">
        <input type='button' value='x' class='btn btn-danger remove-btn'>
      </div>
  </div></div> 

       <?php $this->load->view('templates/common_footer'); ?>


<script type="text/javascript">

  window.onload=function()
    {
        $("#memid").autocomplete({
            source:['']
        });
        $('#memid').keyup(function(){
            ssid=$('#memid').val();
            $.ajax ({
                method: 'post',
                url:'<?=base_url('userhome/get_uniqid/') ?>'+ssid,
                success: function(data)
                {
                    if(data)
                    {
                        data=JSON.parse(data);
                        $("#memid").autocomplete ({
                            source:data
                        });
                    }
                }
            })
        });

        $("#areauid").autocomplete({
            source:['']
        });
        $('#areauid').keyup(function(){
            ssid=$('#areauid').val();
            $.ajax ({
                method: 'post',
                url:'<?=base_url('salesrtninvce/get_areauid/') ?>'+ssid,
                success: function(data)
                {
                    if(data)
                    {
                        data=JSON.parse(data);
                        $("#areauid").autocomplete ({
                            source:data
                        });
                    }
                }
            })
        });
$("#salesrtnuid").autocomplete({
            source:['']
        });
        $('#salesrtnuid').keyup(function(){
            ssid=$('#salesrtnuid').val();
            $.ajax ({
                method: 'post',
                url:'<?=base_url('salesrtninvce/get_salesrtnuid/') ?>'+ssid,
                success: function(data)
                {
                    if(data)
                    {
                        data=JSON.parse(data);
                        $("#salesrtnuid").autocomplete ({
                            source:data
                        });
                    }
                }
            })
        });
          
          $('#add').click(function(){
            $('.salesrtn-details:last').clone().appendTo('#salesrtn-details-div');
            $("#salesrtn-details-div input[type=text]").prop('required',true);

          })

          $('#salesrtn-details-div').on('click','.remove-btn',function(){
            $(this).closest('.salesrtn-details').remove();
          })

          $('#salesrtn-details-div').on('change','.quantity',function(){
            sum=0;
            $('.quantity').each(function(){
              sum += parseInt($(this).val());
            });
            $('#totalQuantity').val(sum);
            quantity=$(this).val();
            price=$(this).parent().siblings('.price-container').children('.price').val();
            console.log(price);
            amount=quantity*price;
            $(this).parent().siblings('.amount-container').children('.amount').val(amount);
            $('.amount').trigger('change');

          })

          $('#salesrtn-details-div').on('change','.price',function(){
            price=$(this).val();
            quantity=$(this).parent().siblings('.quantity-container').children('.quantity').val();
            amount=quantity*price;
            $(this).parent().siblings('.amount-container').children('.amount').val(amount).trigger('change');
          });

          $("#salesrtn-details-div").on('change','.amount',function(){
            sum=0;
            $('.amount').each(function(){
              sum += parseInt($(this).val());
            });
            $('#totalAmount').val(sum);
          })

    }



    function verify_who(z)
    {
      if(z=='member')
      {
        memid=$('#memid').val();
        $.ajax ({
          method: 'post',
          url: "userhome/verify_user/"+memid,
          success: function(data)
          {
              if(data)
              {
                  jdata=JSON.parse(data);
                 $('#membername').text(jdata[0]['Firstname']+" "+jdata[0]['Lastname']);
                 $('#memberaddr').text(jdata[0]['address']);
                 $('#memberpic').html("<img src='"+jdata[0]['userpic']+"' alt='no image' />");
                 $('#membermob').text(jdata[0]['mobile']);
                  $('#myModal').modal('toggle');
              }
              else
              {
                  alert("Invalid User!");   
              }
          }
        });
      }
       else if(z=='salesrtnuid')
      {
         salesrtnuid=$('#salesrtnuid').val();
         $.ajax ({
            method: 'post',
            url: "salesrtninvce/verify_salesrtnuid/"+salesrtnuid,
            success: function(data)
            {
              if(data)
              {
                  
                  $('#salesrtnuid').attr('readonly',true);
                  $('.verify_salesrtnuid').css('display','none');
                  $('#salesrtnuid').attr('onmousedown','return false');
                  alert('Verified!');
                  $.ajax({
              url:"<?php echo base_url() ?>salesrtninvce/get_salesrtn/"+salesrtnuid,
              success:function(data){
                data=JSON.parse(data);
                console.log(data)
                html='';
                for(i=0;i<data.length;i++)
                {
                  html+="<option value='"+data[i]['srtid']+"'>"+data[i]['salesrtname']+"</option>"
                }
                $('#salesrtn').html(html)
              }
            })
        }
        else if(data=='no')
        {
            alert("Doesn't exist");
        }
        else
        {
            alert('An error occured!');
        }
      }
    });
  }
              
      else if(z=='areauid')
  {
  areauid=$('#areauid').val();
    $.ajax ({
      method: 'post',
      url: "<?php echo base_url() ?>purchaseinvce/verify_areauid/"+areauid,
      success: function(data)
      {
        // console.log(data)
        if(data)
        {
            $('#areauid').attr('readonly',true);
            $('#areauid').attr('onmousedown','return false');
            $('.verify_areauid').css('display','none');
            alert('Verified');
            $.ajax({
              url:"<?php echo base_url() ?>purchaseinvce/get_sabha/"+areauid,
              success:function(data){
                data=JSON.parse(data);
                console.log(data)
                html='';
                for(i=0;i<data.length;i++)
                {
                  html+="<option value='"+data[i]['sabhaid']+"'>"+data[i]['sabhaname']+"</option>"
                }
                $('#sabha').html(html)
              }
            })
        }
        else if(data=='no')
        {
            alert("Doesn't exist");
        }
        else
        {
            alert('An error occured!');
        }
      }
    });


  } 
     
     
     
      else if(z=='member2')
      {
         $.ajax ({
            method: 'post',
            url: "userhome/verify_user2",
            success: function(data)
            {
              if(data)
              {
                  alert('Verified!');
                  $('#memid').attr('readonly',true);
                  $('.verify_member').css('display','none');
                  $('#memid').attr('onmousedown','return false');
              }
              else
              {
                  alert("Error! Please try Again");   
              }
            }
         });
      }
      else
      {
        alert('Unknown person');
      }
    }

    
  //    function verify_areauid()
  // {
  // areauid=$('#areauid').val();
  //   $.ajax ({
  //     method: 'post',
  //     url: "<?php echo base_url() ?>banking/verify_areauid/"+areauid,
  //     success: function(data)
  //     {
  //       // console.log(data)
  //       if(data==1)
  //       {
  //           $('#areauid').attr('readonly',true);
  //           $('#areauid').attr('onmousedown','return false');
  //           $('.verify_areauid').css('display','none');
  //           alert('Verified');
  //           $.ajax({
  //             url:"<?php echo base_url() ?>banking/get_sabha/"+areauid,
  //             success:function(data){
  //               data=JSON.parse(data);
  //               console.log(data)
  //               html='';
  //               for(i=0;i<data.length;i++)
  //               {
  //                 html+="<option value='"+data[i]['sabhaid']+"'>"+data[i]['sabhaname']+"</option>"
  //               }
  //               $('#sabha').html(html)
  //             }
  //           })
  //       }
  //       else if(data=='no')
  //       {
  //           alert("Doesn't exist");
  //       }
  //       else
  //       {
  //           alert('An error occured!');
  //       }
  //     }
  //   });


  // }

  

// function verify_purchaseuid()
//   {
//   purchaseuid=$('#purchaseuid').val();
//     $.ajax ({
//       method: 'post',
//       url: "<?php echo base_url() ?>purchaseinvce/verify_purchaseuid/"+purchaseuid,
//       success: function(data)
//       {
//         // console.log(data)
//         if(data==1)
//         {
//             $('#purchaseuid').attr('readonly',true);
//             $('#purchaseuid').attr('onmousedown','return false');
//             $('.verify_purchaseuid').css('display','none');
//             alert('Verified');
//             $.ajax({
//               url:"<?php echo base_url() ?>purchaseinvce/get_purchase/"+purchaseuid,
//               success:function(data){
//                 data=JSON.parse(data);
//                 console.log(data)
//                 html='';
//                 for(i=0;i<data.length;i++)
//                 {
//                   html+="<option value='"+data[i]['prchid']+"'>"+data[i]['purchase']+"</option>"
//                 }
//                 $('#purchase').html(html)
//               }
//             })
//         }
//         else if(data=='no')
//         {
//             alert("Doesn't exist");
//         }
//         else
//         {
//             alert('An error occured!');
//         }
//       }
//     });
//   }

   
</script>
 <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>