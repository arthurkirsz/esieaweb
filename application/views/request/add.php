<link rel="stylesheet" href="<?php echo URL; ?>public/css/kalendae.css" type="text/css" charset="utf-8">
<script src="<?php echo URL; ?>public/js/moment.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo URL; ?>public/js/kalendae.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo URL; ?>public/js/kalendae.standalone.js" type="text/javascript" charset="utf-8"></script>

<style type="text/css">
    
    
</style>


<div class="app-body">

    <div class="row">
        <div class="col-lg-12">
            <?php $this->renderFeedbackMessages(); ?>
        </div>
    </div>

    <div class="row">
        <style type="text/css">

            .app-input {
                outline: 0;
                border-radius: .3125em;
                border: 1px solid #D0D1D5;
                padding: 10px;
                text-align: left;
                border-color: #D0D2D6;
                background-color: #fff;
                border-bottom-color: #dedfe2;
                background-color: #F6F7FA;
                box-shadow: inset 0 1px 0 0 #EAEBEE;
                opacity: .7;
                width: 100%;
            }

            .app-input:focus {
                background-color: #fff;
                box-shadow: none;
                opacity: 1;
                border-color: #78C182;
            }

            .searchfield-top {
                -webkit-border-bottom-right-radius: 0px;
                -webkit-border-bottom-left-radius: 0px;
                -moz-border-radius-bottomright: 0px;
                -moz-border-radius-bottomleft: 0px;
                border-bottom-right-radius: 0px;
                border-bottom-left-radius: 0px;
                margin-bottom:-1px;
            }
            .searchfield-bottom {
                -webkit-border-top-right-radius: 0px;
                -webkit-border-top-left-radius: 0px;
                -moz-border-radius-topright: 0px;
                -moz-border-radius-topleft: 0px;
                border-top-right-radius: 0px;
                border-top-left-radius: 0px;
                margin-bottom: 29px;
            }

            .input-radius {
                border-radius: .3125em;
            }
        </style>
        <div class="col-lg-5" style="padding: 24px 40px;background-color: #fff;border-radius: .3125em;border-left: 1px solid #dedfe2;border-right: 1px solid #dedfe2;border-bottom: 1px solid #D0D1D5;box-shadow: 0 1px 0 0 #dedfe2;min-height: 455px;margin-right: 20px;">
            <form action="<?php echo URL; ?>request/create" method="POST" class="js-create-request">

                <input class="app-input searchfield-bottom input-radius js-input" placeholder="Type de la demande" name="type">


                <input class="app-input searchfield-top js-input" type="text" name="startdate" value="" placeholder="Date de début" autocomplete="off">
                <input class="val-startdate" type="hidden" name="startdate" value="">
                <input class="app-input searchfield-bottom js-input" type="text" name="enddate" value="" placeholder="Date de fin" autocomplete="off">
                <input class="val-enddate" type="hidden" name="enddate" value="">
                
                <!-- TODO CUSTOM HOUR SELECTION EN DESSOUS DES CALENDRIERS -->
                <!-- <input type="hidden" value="" name="starthour" id="starthour">
                <input type="hidden" value="" name="endhour" id="endhour"> -->




                <!-- TODO -->
                <!-- La durée devrait etre implicite, selon les règles de gestion de l'espace en cours -->
                <!-- <input name="length" type="text" class="app-input" placeholder="Durée (j/h)"> -->


                <!-- NÉCÉSSAIRE ? OU A METTRE DANS LE LISTING ? -->
                <!-- 
                <label for="center">Observations</label>
                <textarea rows="5" name="note" id="note" value="" class="form-control"></textarea>
                -->
                <button type="submit" class="btn btn-default">Créer</button>
            </form>
        </div>

        <div class="col-lg-5 app-selectors" style="padding: 24px 40px;background-color: #fff;border-radius: .3125em;border-left: 1px solid #dedfe2;border-right: 1px solid #dedfe2;border-bottom: 1px solid #D0D1D5;box-shadow: 0 1px 0 0 #dedfe2;min-height: 455px;">
            <div class="js-select-type js-select-item">
                <h1>Choisissez le type de demande</h1>
                <ul class="app-list">
                    <li><a href="#">Congés payés</a></li>
                    <li><a href="#">Congés sans solde</a></li>
                    <li><a href="#">Congés maladie</a></li>
                    <li><a href="#">Congés maternité</a></li>
                    <li><a href="#">Congés paternité</a></li>
                    <li><a href="#">Congés pour enfant malade</a></li>
                    <li><a href="#">Congés sabbatique</a></li>
                    <li><a href="#">Congés pour examen</a></li>
                    <li><a href="#">Congés pour événement familial</a></li>
                </ul>
            </div>
            <div class="js-select-startdate js-select-item">
                <h1>Choisissez une date de début</h1>
                <div id="cal-start" class="calendar"></div>
            </div>
            <div class="js-select-enddate js-select-item">
                <h1>Choisissez une date de début</h1>
                <div id="cal-end" class="calendar"></div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <?php
                $html = "";            
                $html .= '<table class="" id="supercal">';

                //$SERVICES = array($_POST['service']);
                $SERVICES = array();
                // print_r($SERVICES);

                $html .= '<tr>';
                $html .= '<td>&nbsp;</td>';
                for($i=1;$i<=31;$i++) {
                    if($i<10)
                        $html .= '<th>&nbsp;&nbsp;'.$i.'</th>';
                    else
                        $html .= '<th>'.$i.'</th>';

                }
                $html .= '</tr>';

                        
                foreach($MONTHS as $month => $key) {
                    $html .= '<tr id="'.$month.'__'.$key.'">';
                    $html .= '<td>'.$month.'</td>';
                    for($i=1;$i<=31;$i++) {
                        // echo $tab1[$month][$i]['nb'].'<hr/>'.(($tab1[$month][$i]['nb']*100)/$j );
                        $value = ( ($tab1[$month][$i]['nb']*100)/$j ) ; // % de l'équipe en congés, si filtre appliqué
                        $people = explode(';', $tab1[$month][$i]['qui']);
                        if (in_array($UID, $people)) {
                            $bg_color = "green";
                            $color = "#fff";
                        }
                        else {
                            switch( $value ) {
                                case 0 :
                                    $bg_color='#FBFAF4';
                                    $color='#666';
                                break;
                                case ($value<2) :
                                    $bg_color= "#BCF04D";
                                    $color = "#666";
                                break;
                                case ($value<=20) :
                                    $bg_color= "#BCF04D";
                                    $color = "#666";
                                break;
                                case ($value<=40) :
                                    $bg_color= "#F5E000";
                                    $color = "#666";
                                break;
                                case ($value<60) :
                                    $bg_color= "#F5E000";
                                    $color = "#666";
                                break;
                                case ($value>60) :
                                    $bg_color= "#F55200";
                                    $color = "#666";
                                break;
                                default :
                                    $bg_color='#FBFAF4';
                                    $color = "#666";
                                break;
                            }
                            // $color = '#FBFAF4';
                        }

                        // echo '---'.$color; 
                        // $html .= '<td id="'.$month."_".$i.'" class="day bg_'.$color.' " alt="'.$value.'"><span style="display:none;" class="qui;'.$tab1[$month][$i]['qui'].'"></span>&nbsp;&nbsp;</td>';
                    
                        $html .= '<td id="'.$month."_".$i.'" class="day" alt="'.$bg_color.'"><span class="qui;'.$tab1[$month][$i]['qui'].'"></span>&nbsp;';
                        $html .= ($tab1[$month][$i]['nb']>=1) ? '<span class="number" style="color: '.$color.';">'.$tab1[$month][$i]['nb'].'</span>' : '';
                        $html .= '&nbsp;</td>';
                    }
                    $html .= '</tr>';
                }
                
                $html .= '</table>';
            ?>
        </div>
    </div>
</div>


<script type="text/javascript" charset="utf-8">
    jQuery(document).ready(function($) {

        moment.locale("fr");

        
        $('.js-select-item').hide();
        $('.app-input[name="type"]').focus();
        $('.js-select-type').show();

        // var k = new Kalendae('cal', {mode:'range'});
        var k1 = new Kalendae('cal-start');
        k1.subscribe('change', function (date, action) {
           console.log(date, action, this.getSelected());
           console.log(this.getSelected());

            $('.app-input[name="startdate"]').val(moment(this.getSelected()).format("LLLL"));

            $('.val-startdate').val(this.getSelected());
            $('.js-input[name="enddate"]').focus();
           
        });
        var k2 = new Kalendae('cal-end');
        k2.subscribe('change', function (date, action) {
           console.log(date, action, this.getSelected());
           console.log(this.getSelected());

            $('.app-input[name="enddate"]').val(moment(this.getSelected()).format("LLLL"));
            $('.val-enddate').val(this.getSelected()); 
           
        });


        // new Kalendae({
        //     attachTo:document.body,
        //     months:2,
        //     mode:'range',
        //     selected:[Kalendae.moment().subtract({M:1}), Kalendae.moment().add({M:1})]
        // }); 

        $('.js-input').keydown(function(event) {
            event.preventDefault();
        });

        $('.js-input').focus(function(event) {
            $('.js-select-item').hide();

            var item = $(this).attr("name");
            var element = '.js-select-'+item;
            $(element).show();
        });

        $('.js-create-request').submit(function(event) {
            //event.preventDefault();
        });

        $('.js-select-type a').click(function(event) {
            $('.app-input[name="type"]').val($(this).html());
            $('.app-input[name="startdate"]').focus();
        });


    });
</script>

<style type="text/css" media="screen">
    .kalendae .k-days span.closed {
        background:red;
    }
</style>

<script type="text/javascript">

    // $(document).ready(function() {
        

    //         var param   = new Object;
    //         param = { 
    //             dateFormat: 'dd/mm/yy',
    //             altFormat: 'yy-mm-dd',
    //             minDate: '-0d', maxDate: '',
    //             dayNames: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'],
    //             dayNamesMin: ['Di', 'Lu', 'Ma', 'Me', 'Je', 'Ve', 'Sa'],
    //             monthNames: ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
    //             monthNamesShort: ['Jan','Fev','Mar','Avr','Mai','Jun','Jul','Aou','Sep','Oct','Nov','Dec'],
    //             showAnim: 'fade',
    //             duration: 'slow',
    //             changeMonth: true};
                
    //         param.onClose = function(date) {
    //             if ( $(".datepicker2").val() == '' ) {
    //                 $( ".datepicker2" ).datepicker( "setDate" , date );
    //                 generate_select();
    //                 // Si on a choisi la date1, date2>=date1 , sinon date2 == aujourdhui
    //                 if ($(".datepicker1").val()!='') {
    //                     var minimum = $(".datepicker1").val();
    //                     $( ".datepicker2" ).datepicker(  "option", "minDate",  minimum);        
    //                 }
    //                 else {
    //                     $( ".datepicker2" ).datepicker(  "option", "minDate",  '-0d');      
    //                 }
    //             }
    //         }
                
    //         param.onChange = function(date) {
    //             alert(date);
    //         }
                
    //         $(".datepicker1").datepicker(param);
            
    //         param.onClose = function(date) {
    //             generate_select();
    //         }
            
    //         $(".datepicker2").datepicker(param);

    //         $( ".slider" ).slider({
    //           value:8,
    //           min: 8,
    //           max: 20,
    //           step: 1,
    //           slide: function( event, ui ) {
    //             $( "#amount" ).val( "$" + ui.value );
    //           }
    //         });
    //         $( "#amount" ).val( "$" + $( "#slider" ).slider( "value" ) );





    // });
</script>