<div>



<script src="<?php echo base_url(); ?>bootstrap/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.bundle.min.js"></script>
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
</script>
</div>
</html>