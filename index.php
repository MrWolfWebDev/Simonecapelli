<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8-general-ci" />
        <title>Simone Capelli</title>
        <link rel="stylesheet" href="css/stile.css" type="text/css" />
        <link href='http://fonts.googleapis.com/css?family=Muli' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" href="js/pirobox/css_pirobox/style_1/style.css"/>


        <link rel="icon" href="favicon.ico" />

        <!-- jQuery Libraries -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>

        <!-- Custom javascript Libraries -->
        <script src="js/functions.js" type="text/javascript"></script>

        <!-- jQuery Plugins -->
        <script src="js/jquery.cycle2.min.js"></script>
        <script src="http://malsup.github.io/jquery.blockUI.js"></script>
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        <script src="js/pirobox/js/pirobox_extended.js"></script>

        <!-- include one or more optional Cycle2 plugins -->
        <script src="js/jquery.cycle2.carousel.min.js"></script>
        <script src="http://malsup.github.com/jquery.cycle2.center.js"></script>

        <script type="text/javascript">

            function openLink(url)
            {
                if (url !== $('#content').attr('sel')) {
                    $('#galleryImg').cycle('destroy');
                    $('#galleryVid').cycle('destroy');
                    $('#bio_slider').cycle('destroy');
                    $('#content').removeAttr('sel');
                    $('#content').attr('sel', url);
                    $('#content').load(url, function() {
                        if (url === "includes/gallery.php") {
                            $('#galleryImg').cycle();
                            $('#galleryVid').cycle();
                            $('#content').addClass('gallery');
                        }
                        if (url === "includes/biografia.php") {
                            $('#content').addClass('biografia');
                            openLinkb('includes/bio.html');
                        }

                        if (url === "includes/sponsor.php") {
                            $('#gallerySpo').cycle();
                            $('#content').addClass('sponsor');
                        }

                        if (url === "includes/news.php") {
                            $('#gallerynews').cycle();
                            $('#content').addClass('news');
                        }

                        if (url === "includes/attivita.php") {
                            $('#galleryatt').cycle();
                            $('#content').addClass('attivita');
                        }
                    });
                }
            }

            function openLinkb(url)
            {
                $('.biopage').load(url);
            }

            function openLinka(url)
            {

                $('#galleryatt').cycle('destroy');

                $('#contatt').load(url, function() {

                    if (url == "includes/gara.php") {
                        $('#galleryatt').cycle();

                    }

                    if (url == "includes/evento.php") {
                        $('#galleryatt').cycle();
                    }
                });
            }
        </script>




    </head>

    <body>


        <div id = "slider" class = "unselectable cycle-slideshow"
             data-cycle-fx = "fade"
             data-cycle-timeout = "15000"
             data-cycle-speed = "1500"
             data-cycle-manual-speed = "500"
             data-cycle-auto-height="0"
             data-cycle-caption="#custom-caption"
             >
            <img src="img/sfondo/sfondo-simo.jpg" />
            <img src="img/sfondo/fondo-cip.jpg"/>
            <img src="img/sfondo/SFONDO-PALEXTRA-01.jpg" />
        </div>
        <!-- END slider -->
        <div id = "logo" onclick="openLink('includes/clear.php');"></div>
        <!-- END logo -->

        <div id = "nav">
            <ul class="unselectable">
                <li id = "news" onclick="javascript:openLink('includes/news.php');">News</li>
                <li id = "bio" onclick="javascript:openLink('includes/biografia.php');">Biografia</li>
                <li id = "gallery" onclick="javascript:openLink('includes/gallery.php');">Galleria</li>
                <li id = "activity" onclick="javascript:openLink('includes/attivita.php');">Attività</li>
                <li id = "sponsor"  onclick="javascript:openLink('includes/sponsor.php');">Sponsor</li>
            </ul>
        </div>
        <!-- END nav -->

        <div id = "content">

        </div>
        <!-- END content -->

        <div id = "footer" class="unselectable">
            <div id = "progress"></div>
            <div id = "leftFooter">
                <img id = "mail" src = "img/footerIcon-Email.png" />
                <img onclick="location.href = 'https://www.facebook.com/simone.vtr';" src = "img/footerIcon-Fb.png" />
                <img id = "contatti" src = "img/footerIcon-Contatti.png" />
            </div>
            <!-- END leftFooter -->
            <div id = "rightFooter">
                <img data-cycle-context="#slider" data-cycle-cmd = "next" id="resumeButton" src = "img/footerIcon-Next.png"/>
                <div id="custom-caption"></div>
                <img data-cycle-context="#slider" data-cycle-cmd = "prev" id="pauseButton" src = "img/footerIcon-Prev.png" />
            </div>
            <!-- END rightFooter -->
        </div>
        <!-- END footer -->

        <div id="mail_form" style="display:none;">
            <form id = "emailBox" method = "post" action="sendmail.php">
                <br />Per contattarci scrivi qui il tuo indirizzo e-mail
                <input id = "email" name = "email" type = "text"/><BR />
                e qui sotto il testo della tua email:
                <textarea id = "emailContent" name = "emailContent"></textarea><br/>
                <input type = "submit" value = "Invia" id="close"/><br />
                <br />
            </form>
        </div>
        <div id="contacts" style="display:none; background-color:#666; color:#FFF; width:400px; height:400px;">
            <a id="chiudi" style="cursor:pointer; position:absolute; right:5px;">x</a>
            <br />
            <img src="img/logo_contatti.png" alt="Sinome Capelli"/><br/>
            <img src="img/simonecapelli.png" alt="Simone Capelli"/>
            <br/>
            <br />
            <p><b>INSEGNANTE TECNICO<br /> ALLENATORE F.I.P.E.</b></p>
            <br/>
            <p align="left" style="margin-left:85px;"><b>P.I.:</b>    01569240094</p>
            <p align="left" style="margin-left:85px;"><b>A:</b>VIA L. GROSSO 28/6 - 17013<BR /> ALBISOLA SUPERIORE(SV)</p>
            <p align="left" style="margin-left:85px;"><b>T:</b>3479259983</p>
            <p align="left" style="margin-left:85px;"><b>M:</b>INFO@SIMONECAPELLI.IT</p>
            <p align="left" style="margin-left:85px;"><b>W:</b>WWW.SIMONECAPELLI.IT</p>
            <br/>
            <br/>
        </div>

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