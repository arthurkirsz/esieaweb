<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1>Gestion des utilisateurs</h1>
            <p>
                <em>Cette section est dédiée au listing des utilisateurs et actions associées.</em>
            </p>
        </div>
    </div>
    <!-- echo out the system feedback (error and success messages) -->
            <?php $this->renderFeedbackMessages(); ?>

          


            <div class="row">
                <?php
                    foreach ($this->users as $user) {
                        // if ($user->user_active == 0) {
                        //     echo '<tr class="inactive">';
                        // } else {
                        //     echo '<tr class="active">';
                        // }
                        echo '<div class="col-lg-12" style="margin-top: 20px;">';

                                    echo '<h3 style="text-align:center; color: #fff; font-size: 14px;">'.$user->user_name.'</h3>';
                                    echo '<h4 style="color: #000; font-size: 12px;text-align:center;">'.$user->user_email.'</h4>';
                                    

                                    echo '<div class="avatar" style="border-radius: 80px; overflow: hidden; width: 80px; height: 80px;margin: auto;">';

                                    if (isset($user->user_avatar_link)) {
                                        echo '<img src="'.$user->user_avatar_link.'" width="80px" />';
                                    }

                                    echo '</div>';


                                    
                                    
                                    echo '<div>Active: '.$user->user_active.'</div>';
                                    echo '<div><a href="'.URL.'overview/showuserprofile/'.$user->user_id.'">Show user\'s profile</a></div>';
                                    echo '<div><a href="'.URL.'user/delete_action/'.$user->user_id.'">Delete user</a></div>';
                        echo "</div>";
                    }
                ?>
            </div>

        </div>
        <div class="left col-30 mg-10">
            <a href="<?php echo URL; ?>user/register" class="button">Créer un nouveau collaborateur</a>        
        </div>
        <br style="clear:both">
    </div>
</div>