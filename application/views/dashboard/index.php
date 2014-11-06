<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1>Tableau de bord</h1>
            <p><em>Bienvenue dans votre espace Gestion du temps, <strong><?php echo $_SESSION["user_name"]; ?></strong>.</em></p>
        </div>
        <!-- /.col-lg-12 -->
        <!-- echo out the system feedback (error and success messages) -->
        <?php $this->renderFeedbackMessages(); ?>

    </div>
</div>
<!-- /#page-wrapper -->


