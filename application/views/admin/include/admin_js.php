
<script src="<?php echo base_url(); ?>assets/js/admin/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/admin/jekyll-search.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/admin/Chart.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/admin/jquery-jvectormap-2.0.3.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/admin/jquery-jvectormap-world-mill.js"></script>
<script src="<?php echo base_url(); ?>assets/js/admin/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/admin/daterangepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/js/admin/notify.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/admin/jquery-ui.js"></script>
<script src="<?=base_url('assets/js/admin/timepicker.js')?>"></script>

<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
  $( function() {
    $( ".datepicker" ).datepicker();
  } );
</script>

<script>
  $('.ckeditor').ckeditor();
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



<script>
    function checkFileDetails(width,height,file) {
        var fi = file;
        if (fi.files.length > 0) {      // FIRST CHECK IF ANY FILE IS SELECTED.
           
            for (var i = 0; i <= fi.files.length - 1; i++) {
                var fileName, fileExtension, fileSize, fileType, dateModified;

                // FILE NAME AND EXTENSION.
                fileName = fi.files.item(i).name;
                fileExtension = fileName.replace(/^.*\./, '');

                // CHECK IF ITS AN IMAGE FILE.
                // TO GET THE IMAGE WIDTH AND HEIGHT, WE'LL USE fileReader().
                if (fileExtension == 'png' || fileExtension == 'jpg' || fileExtension == 'jpeg') {
                   // readImageFile(fi.files.item(i),width,height, fi);             // GET IMAGE INFO USING fileReader().
                    $(fi).nextAll('span:first').text('');
                    $('.submit-form').removeAttr('disabled');

                }else{
                     $('.submit-form').prop("disabled", true);
                    $(fi).nextAll('span:first').text('Image formate should be (jpeg,jpg,png)');
                }
               
            }

            // GET THE IMAGE WIDTH AND HEIGHT USING fileReader() API.
            function readImageFile(file,width,heigh, fi) {
                var reader = new FileReader(); // CREATE AN NEW INSTANCE.

                reader.onload = function (e) {
                    var img = new Image();      
                    img.src = e.target.result;

                    img.onload = function () {
                        var w = this.width;
                        var h = this.height;

                        if(w>=width && h>=height){
                          $(fi).nextAll('span:first').text('');
                            $('.submit-form').removeAttr('disabled');
                        }else{

                            $('.submit-form').prop("disabled", true);
                             $(fi).nextAll('span:first').text('For Best View Upload Images In '+width+' x '+height);
                        }


                        // document.getElementById('fileInfo').innerHTML =
                        //     document.getElementById('fileInfo').innerHTML + '<br /> ' +
                        //         'Name: <b>' + file.name + '</b> <br />' +
                        //         'File Extension: <b>' + fileExtension + '</b> <br />' +
                        //         'Size: <b>' + Math.round((file.size / 1024)) + '</b> KB <br />' +
                        //         'Width: <b>' + w + '</b> <br />' +
                        //         'Height: <b>' + h + '</b> <br />' +
                        //         'Type: <b>' + file.type + '</b> <br />' +
                        //         'Last Modified: <b>' + file.lastModifiedDate + '</b> <br />';
                    }
                };
                reader.readAsDataURL(file);
            }
        }
    }
</script>