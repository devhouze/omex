<script src="<?php echo BASE_URL(); ?>assets/js/admin/jquery.min.js"></script>
<script src="<?php echo BASE_URL(); ?>assets/js/admin/jquery.slimscroll.min.js"></script>
<script src="<?php echo BASE_URL(); ?>assets/js/admin/jekyll-search.min.js"></script>
<script src="<?php echo BASE_URL(); ?>assets/js/admin/Chart.min.js"></script>
<script src="<?php echo BASE_URL(); ?>assets/js/admin/jquery-jvectormap-2.0.3.min.js"></script>
<script src="<?php echo BASE_URL(); ?>assets/js/admin/jquery-jvectormap-world-mill.js"></script>
<script src="<?php echo BASE_URL(); ?>assets/js/admin/moment.min.js"></script>
<script src="<?php echo BASE_URL(); ?>assets/js/admin/daterangepicker.js"></script>
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
  


<script src="assets/js/admin/toastr.min.js"></script>



<script src="assets/js/admin/sleek.bundle.js"></script>
