<script src="<?php echo URL; ?>public/js/moment.js" type="text/javascript" charset="utf-8"></script>
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <!-- <h1 class="page-header">Mes demandes</h1> -->
            <h1>Demandes à traiter</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

    <div class="row">
        <div class="col-lg-12">
            <style type="text/css">

            .request {
                border-radius: .3125em;padding-left: 2.35765%;float: left;display: block;margin-right: 2.35765%;width: 100%;margin-right: 0;background: #fff;border-bottom: 1px solid #D0D1D5;
            }


            .request-top {
                -webkit-border-bottom-right-radius: 0px;
                -webkit-border-bottom-left-radius: 0px;
                -moz-border-radius-bottomright: 0px;
                -moz-border-radius-bottomleft: 0px;
                border-bottom-right-radius: 0px;
                border-bottom-left-radius: 0px;
                /*margin-bottom:-1px;*/
            }
            .request-center {
                border-radius: 0px;
            }
            .request-bottom {
                -webkit-border-top-right-radius: 0px;
                -webkit-border-top-left-radius: 0px;
                -moz-border-radius-topright: 0px;
                -moz-border-radius-topleft: 0px;
                border-top-right-radius: 0px;
                border-top-left-radius: 0px;
                margin-bottom: 29px;
            }
            </style>
            <div class="app-request">
                <?php
                    $i = 0;
                    foreach ($this->requests as $request) {
                        echo '<div class="request ' . ( ($i==0) ? 'request-top' : 'request-center' ). '">';
                            echo '<div class="left">' . $request->request_type .  ' 
                                    <p style="font-size: 11px; color: #888;"><em>(déposée <span class="creation_value">' . $request->creation_time . '</span>)</em></p>
                                  </div>';

                            
                            echo '<div class="left date" style="position: relative;
                                    height: 20px;
                                    width: 340px;
                                    text-align: center;
                                    line-height: 41px;
                                    font-size: 15px;">' . $request->request_date . '</div>';


                                    // echo '<div class="left test" style="width: 50px;"></div>';
                                    // echo '<div class="left test3" style="width: 20px;"> -> </div>';
                                    // echo '<div class="left test2" style="width: 50px;"></div>';

                            echo '<div class="left">' . $request->request_length . ' ' .($request->request_length > 1 ? 'jours' : 'jour') . '</div>';
                            echo '<div  style="float:right;margin:10px;">
                                    <a href="'.URL.'request/valid/'.$request->request_id.'">Valider</a>&nbsp;&nbsp;|&nbsp;
                                    <a href="'.URL.'request/invalid/'.$request->request_id.'">Refuser</a>
                                  </div>';

                                echo '<input type="hidden" id="startdate" name="startdate" value="'.$request->startdate.'"/>';
                                echo '<input type="hidden" id="enddate" name="enddate" value="'.$request->enddate.'"/>';
                                echo '<input type="hidden" id="creationtime" name="creationtime" value="'.$request->creation_time.'"/>';

                        echo "</div>";
                        
                        $i++;
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('.request').each(function(index, val) {
            var creationtime = $(this).find('#creationtime').val();
            var pp = moment(new Date(creationtime*1000)).from(new Date());
            $(this).find('.creation_value').html(pp);
            

            var startdate = $(this).find('#startdate').val();
            var dd = moment(new Date(startdate*1000)).format('DD MMM');
            //$(this).find('.test').html(dd);            

            var enddate = $(this).find('#enddate').val();
            dd = moment(new Date(enddate*1000)).format('DD MMM');
            //$(this).find('.test2').html(dd);
        });
    });

</script>