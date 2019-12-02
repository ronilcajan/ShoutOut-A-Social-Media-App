<div>



<script src="<?php echo base_url(); ?>bootstrap/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>bootstrap/js/toaster.min.js"></script>
<script src="<?php echo base_url(); ?>bootstrap/js/myajax.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.20/datatables.min.js"></script>
<!-- <script src="<?php echo base_url(); ?>bootstrap/js/textarea.js"></script> -->
<script>
    $(document).ready(function() {
        $("#submit-btn").attr("disabled", true);

        $("#myText").on('keyup', function() {
            if ($(this).val().lenght != 0) $("#submit-btn").attr("disabled", false);
            else $("#submit-btn").attr("disabled", true);
        });
    });
    $(document).ready(function() {
        $(".okay-btn").attr("disabled", true);

        $(".comment-box").on('keyup', function() {
            if ($(this).val().lenght != 0) $(".okay-btn").attr("disabled", false);
            else $(".okay-btn").attr("disabled", true);
        });
    });

    $(document).ready( function () {
        $('#admin-table').DataTable();
    } );
</script>
</div>
</body>
</html>