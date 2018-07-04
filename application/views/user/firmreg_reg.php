<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="#"><b>Firm Registration</b></a>
      </li>
      <li class="breadcrumb-item active">My Dashboard</li>
    </ol>

    <form method="post" action="<?php echo base_url()?>firmreg/firmreg_reg" id="firmreg">
    

    <div class="row row_space">
      <div class="col-sm-2">
        <label class="label_left">Area</label>
      </div>
      <div class="col-sm-6">
        <input type="text" name="areauid" id="areauid" class="form-control  ui-autocomplete-input" required placeholder="Type Area Unicode ">
      </div>
      <div class="col-sm-3">
          <button type="button" class="verify_btn verify_areauid" onclick="verify_who('areauid')">Verify & Confirm</button>
      </div>
    </div>
      
  

    <div class="row row_space" >
      <div class="col-sm-2">
        <label class="label_left">Name Of Firm</label>
      </div>
      <div class="col-sm-6">
        <input type="text" name="firmname" id="firmname" class="form-control" required placeholder="Type">
      </div>
        <div class="col-sm-4">
        <input type="text" name="registration" id="registration" class="form-control" required placeholder="Govt Registration No">
      </div>
    
    </div>


    <div class="row row_space" >
      <div class="col-sm-2">
        <label class="label_left">Firm Uniq Code Creation</label>
      </div>
      <div class="col-sm-6">
        <input type="text" name="firmcode" id="firmcode" class="form-control" required placeholder="Type">
      </div>
        <div class="col-sm-2">
        <label class="label_left">Date of Establish</label>
      </div>
      <div class="col-sm-2">
        <input type="date" name="date" id="date" class="form-control" required placeholder="">
      </div>
    
    </div>
   <div class="row row_space" >
      <div class="col-sm-2">
        <label class="label_left">Status Of Firm</label>
      </div>
      <div class="col-sm-10">
       <input name='status' id='proprietorship' type='radio'  value="proprietorship" checked onclick="$('.working').hide()">proprietorship&ensp;
     
        <input name='status' id='partnership' type='radio'  value="partnership" checked onclick="$('.working').hide()">partnership&ensp;
  
        <input name='status' id='Public' type='radio'  value="Public" checked onclick="$('.working').hide()">Public Company&ensp;
    
        <input name='status' id='pvt' type='radio'  value="pvt" checked onclick="$('.working').hide()">Pvt Company&ensp;
    
        <input name='status' id='coperetive' type='radio'  value="coperetive" checked onclick="$('.working').hide()">Co-operetive&ensp;
     
    
        <input name='status' id='other' type='radio'  value="other" checked onclick="$('.working').show()">Other
      </div>
    </div>  
  <div class="row row_space working" style="display: none;">
    <div class="col-sm-2">
     <label class="label_left">Other</label>
    </div>
    <div class="col-sm-4">
     <input type="text" class="form-control" name="othertext" id="othertext">
    </div>
   </div>  

  <div class="row row_space" >
    <div class="col-sm-2">
      <label class="label_left">Managing Persons Number:</label>
    </div>
    <div class="col-sm-3">
      <input type="text" name="prsnumber" id="prsnumber" class="form-control" required placeholder="Type No:">
    </div>
   </div> 
   <div class="row row_space" >
    <div class="col-sm-2">
      <label class="label_left">Office Premises Number</label>
    </div>
    <div class="col-sm-3">
      <input type="text" name="offcnumber" id="offcnumber" class="form-control" required placeholder="Type no:">
    </div>
  
  </div>
  <div class="row row_space" >
    <div class="col-sm-2">
      <label class="label_left">Purpose of Firm</label>
    </div>
    
    <textarea row="6" cols="100">
        
    </textarea>
    </div>

   <div class="row row_space">
        <div class="col-sm-12">
          <hr style="height: 1px;background-color: #000" />
        </div>
      </div>
       
     <div class="col-sm-10">
          <label class="label_left"><h4>Office or Premises/Branch Address and Other Details</h4></label>
        </div>

      
        <div class="row row_space" >
      <div class="col-sm-3">
        <label class="label_left">Office U Code</label>
      </div>
      <div class="col-sm-6">
        <input type="text" name="officeucode" id="officeucode" class="form-control" required placeholder="">
      </div>
    </div>
     <div class="row row_space" >
      <div class="col-sm-3">
        <label class="label_left">Office Designation Name</label>
      </div>
      <div class="col-sm-6">
        <input type="text" name="designation" id="designation" class="form-control" required placeholder="">
      </div>
    </div>
    <div class="row row_space" >
      <div class="col-sm-3">
        <label class="label_left">Office Building(Building Uniq code)</label>
      </div>
      <div class="col-sm-6">
        <input type="text" name="buildingucode" id="buildingucode" class="form-control" required placeholder="Type building uniqcode">
      </div>
       <div class="col-sm-3">
            <button type="button" class="verify_btn verify_buildingucode" onclick="verify_who('buildingucode')">Verify & Confirm</button>
        </div>
    </div>
    
    




<div class="more" style="visibility: none;" >
  <div id="phone-details-div">
  
 <div class="row row_space" >
   <div class="col-sm-3">
        <label class="label_left">Office Land Phone</label>
      </div>
      
       
     <div class="col-sm-1 areacode-container">
          <input type="text" name="areacode[]"  class="form-control areacode"  placeholder="" value=''>
        </div>
        <div class="col-sm-4 bldlandno-container">
          <input type="text" name="bldlandno[]"  class="form-control bldlandno"  placeholder="" value=''>
        </div>
       
  <div class="col-sm-2">
            <button type="button" class="verify_btn verify_phone" onclick="verify_who('phone')">Verify & Confirm</button>
        </div>
        <div class="col-sm-2">
        <input type='button' value='if more ++' id='add'>
        </div>
  </div>
</div>



      <div class="row row_space">
        <div class="col-sm-12">
          <hr style="height: 1px;background-color: #000" />
        </div>
      </div>

      <div style="display: none">





        <div class="row row_space phone-details">
         
    <div class="col-sm-1 areacode-container">
      
          <input type="text" name="areacode[]"  class="form-control areacode"  placeholder="" value=''>
        </div>
                <div class="col-sm-4 bldlandno-container">
          <input type="text" name="bldlandno[]"  class="form-control bldlandno"  placeholder="" value=''>
        </div>
       
  <div class="col-sm-2">
            <button type="button" class="verify_btn verify_phone" onclick="verify_who('phone')">Verify & Confirm</button>
        </div>
        <div class="col-sm-2">
        <input type='button' value='x' class='btn btn-danger remove-btn'>
      </div>
  </div></div>





      <div class="row row_space">
        <div class="col-sm-12">
          <hr style="height: 1px;background-color: #000" />
        </div>
      </div>

   

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
                url:'<?=base_url('salesinvce/get_areauid/') ?>'+ssid,
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
         $('#add').click(function(){
            $('.phone-details:last').clone().appendTo('#phone-details-div');
            $("#phone-details-div input[type=text]").prop('required',true);

          })
          $('#phone-details-div').on('click','.remove-btn',function(){
            $(this).closest('.phone-details').remove();
          })
// $("#salesuid").autocomplete({
//             source:['']
//         });
//         $('#salesuid').keyup(function(){
//             ssid=$('#salesuid').val();
//             $.ajax ({
//                 method: 'post',
//                 url:'<?=base_url('salesinvce/get_salesuid/') ?>'+ssid,
//                 success: function(data)
//                 {
//                     if(data)
//                     {
//                         data=JSON.parse(data);
//                         $("#salesuid").autocomplete ({
//                             source:data
//                         });
//                     }
//                 }
//             })
//         });
          
//           $('#add').click(function(){
//             $('.sales-details:last').clone().appendTo('#sales-details-div');
//             $("#sales-details-div input[type=text]").prop('required',true);

//           })

//           $('#sales-details-div').on('click','.remove-btn',function(){
//             $(this).closest('.sales-details').remove();
//           })

//           $('#sales-details-div').on('change','.quantity',function(){
//             sum=0;
//             $('.quantity').each(function(){
//               sum += parseInt($(this).val());
//             });
//             $('#totalQuantity').val(sum);
//             quantity=$(this).val();
//             price=$(this).parent().siblings('.price-container').children('.price').val();
//             console.log(price);
//             amount=quantity*price;
//             $(this).parent().siblings('.amount-container').children('.amount').val(amount);
//             $('.amount').trigger('change');

//           })

//           $('#sales-details-div').on('change','.price',function(){
//             price=$(this).val();
//             quantity=$(this).parent().siblings('.quantity-container').children('.quantity').val();
//             amount=quantity*price;
//             $(this).parent().siblings('.amount-container').children('.amount').val(amount).trigger('change');
//           });

//           $("#sales-details-div").on('change','.amount',function(){
//             sum=0;
//             $('.amount').each(function(){
//               sum += parseInt($(this).val());
//             });
//             $('#totalAmount').val(sum);
//           })

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
  //      else if(z=='salesuid')
  //     {
  //        salesuid=$('#salesuid').val();
  //        $.ajax ({
  //           method: 'post',
  //           url: "salesinvce/verify_salesuid/"+salesuid,
  //           success: function(data)
  //           {
  //             if(data)
  //             {
                  
  //                 $('#salesuid').attr('readonly',true);
  //                 $('.verify_salesuid').css('display','none');
  //                 $('#salesuid').attr('onmousedown','return false');
  //                 alert('Verified!');
  //                 $.ajax({
  //             url:"<?php echo base_url() ?>salesinvce/get_sales/"+salesuid,
  //             success:function(data){
  //               data=JSON.parse(data);
  //               console.log(data)
  //               html='';
  //               for(i=0;i<data.length;i++)
  //               {
  //                 html+="<option value='"+data[i]['salid']+"'>"+data[i]['salesname']+"</option>"
  //               }
  //               $('#sales').html(html)
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