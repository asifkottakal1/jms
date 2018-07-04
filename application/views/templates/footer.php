   <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <!--<a class="btn btn-primary" href="">Logout</a>-->
            <?php
            echo anchor('Ctrl_login/logout','Logout',array('class'=>'btn btn-primary'));
            ?>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url();?>external/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>external/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url();?>external/vendor/jquery-ui/jquery-ui.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url();?>external/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="<?php echo base_url();?>external/vendor/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url();?>external/vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>external/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url();?>external/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="<?php echo base_url();?>external/js/sb-admin-datatables.min.js"></script>
    <script src="<?php echo base_url();?>external/js/sb-admin-charts.min.js"></script>
    <script type="text/javascript">

      
         $("#registered_ss").autocomplete({
            source:['']
         });
         $('#registered_ss').keyup(function(){
            ssid=$('#registered_ss').val();
            $.ajax ({
               method: 'post',
               url:'<?=base_url('sannadha_sevakan/get_ss/') ?>'+ssid,
               success: function(data)
               {
                  if(data)
                  {
                     data=JSON.parse(data);
                     $("#registered_ss").autocomplete ({
                              source:data
                          });
                  }
               }
            })
         });
      
      
    </script>
  </div>
</body>

</html>
