
<script src="<?php echo base_url(); ?>assets/js/admin/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/admin/jekyll-search.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/admin/Chart.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/admin/jquery-jvectormap-2.0.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/admin/jquery-jvectormap-world-mill.js"></script>
<script src="<?php echo base_url(); ?>assets/js/admin/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/admin/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/js/admin/notify.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/admin/jquery-ui.js"></script>

<script>
  $( function() {
    $( ".datepicker" ).datepicker();
  } );
</script>
<script>
  jQuery(document).ready(function() {
    jQuery('input[name="dateRange"]').daterangepicker({
    autoUpdateInput: false,
    singleDatePicker: true,
    locale: {
      cancelLabel: 'Clear'
    }
  });
    jQuery('input[name="dateRange"]').on('apply.daterangepicker', function (ev, picker) {
      jQuery(this).val(picker.startDate.format('MM/DD/YYYY'));
    });
    jQuery('input[name="dateRange"]').on('cancel.daterangepicker', function (ev, picker) {
      jQuery(this).val('');
    });
  });
</script>
  
<script>
 $(document).ready(function() {
        $.notify.defaults({
            position: 'top right',
            style: 'bootstrap'
        });
        <?php if ($this->session->flashdata('success')) { ?>
            $.notify("<?php echo $this->session->flashdata('success'); ?>", "success");
        <?php }
        if ($this->session->flashdata('error')) { ?>
            $.notify("<?php echo $this->session->flashdata('error'); ?>", "error");
        <?php }
        if ($this->session->flashdata('warning')) { ?>
            $.notify("<?php echo $this->session->flashdata('warning'); ?>", "warn");
        <?php }
        if ($this->session->flashdata('info')) { ?>
            $.notify("<?php echo $this->session->flashdata('info'); ?>", "info");
        <?php } ?>
    });
</script>

<script src="<?=base_url();?>assets/js/admin/toastr.min.js"></script>



<script src="<?=base_url();?>assets/js/admin/sleek.bundle.js"></script>


