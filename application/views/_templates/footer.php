    <?php if (Session::get('user_logged_in') == true): ?>
        <div class="footer">
            <!-- echo out the content of the SESSION via KINT, a Composer-loaded much better version of var_dump -->
            <!-- KINT can be used with the simple function d() -->
            <?php d($_SESSION); ?>
        </div>
	<?php endif; ?>


    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo URL; ?>public/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo URL; ?>public/js/plugins/metisMenu/metisMenu.min.js"></script>


    <!-- Custom Theme JavaScript -->
    <script src="<?php echo URL; ?>public/js/sb-admin-2.js"></script>

</body>
</html>
