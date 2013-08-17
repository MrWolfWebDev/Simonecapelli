<?php
session_start();
if ($_SESSION['auth'] == 1):
    ?>

    <html>
        <head>
            <title>Pannello di Amministrazione</title>
            <link href="bootstrap/css/bootstrap.css" rel="stylesheet" />
            <link href="bootstrap/css/bootstrap-responsive.css" rel='stylesheet' />
            <link href="css/adminstyle.css" rel="stylesheet" />
            <link rel="stylesheet" type="text/css" href="GAAPI/gacounter.css" media="screen" />

        </head>


        <body>
            <div class='container'>
                <div class="row">
                    <div class="accordion span4 offset4" id="accordion2">
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse1">
                                    <i class="icon-bullhorn"></i> News
                                </a>
                            </div>
                            <div id="collapse1" class="accordion-body collapse" style="height: 0px; ">
                                <div class="accordion-inner">
                                    <ul class="unstyled">
                                        <li><a href="addnews.php"><i class="icon-plus"></i> Aggiungi News</a></li>
                                        <li><a href="delnews.php"><i class="icon-minus"></i> Elimina News</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse2">
                                    <i class="icon-calendar"></i> Gare
                                </a>
                            </div>
                            <div id="collapse2" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    <ul class="unstyled">
                                        <li><a href="addgara.php"><i class="icon-plus"></i> Aggiungi Gara</a></li>
                                        <li><a href="delgara.php"><i class="icon-minus"></i> Elimina Gara</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse3">
                                    <i class="icon-calendar"></i> Eventi
                                </a>
                            </div>
                            <div id="collapse3" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    <ul class="unstyled">
                                        <li><a href="addevent.php"><i class="icon-plus"></i> Aggiungi Evento</a></li>
                                        <li><a href="delevent.php"><i class="icon-minus"></i> Elimina Evento</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse4">
                                    <i class="icon-picture"></i> Immagini
                                </a>
                            </div>
                            <div id="collapse4" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    <ul class="unstyled">
                                        <li><a href="addimmagine.php"><i class="icon-plus"></i> Aggiungi Immagine</a></li>
                                        <li><a href="delimmagine.php"><i class="icon-minus"></i> Elimina Immagine</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse5">
                                    <i class="icon-film"></i> Video
                                </a>
                            </div>
                            <div id="collapse5" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    <ul class="unstyled">
                                        <li><a href="addvideo.php"><i class="icon-plus"></i> Aggiungi Video</a></li>
                                        <li><a href="delvideo.php"><i class="icon-minus"></i> Elimina Video</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse6">
                                    <i class="icon-remove-circle"></i> Logout
                                </a>
                            </div>
                            <div id="collapse6" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    <ul class="unstyled">
                                        <li><a href="logout.php"><i class="icon-remove"></i> Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
            <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
            <script type="text/javascript">

                var _gaq = _gaq || [];
                _gaq.push(['_setAccount', 'UA-43192434-1']);
                _gaq.push(['_trackPageview']);

                (function() {
                    var ga = document.createElement('script');
                    ga.type = 'text/javascript';
                    ga.async = true;
                    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                    var s = document.getElementsByTagName('script')[0];
                    s.parentNode.insertBefore(ga, s);
                })();

            </script>
        </body>

    </html>
    <?php
else:
    header("location:login.php");
endif;
?>