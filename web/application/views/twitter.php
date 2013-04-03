
<!DOCTYPE html>
<!--[if IE 8]>               <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
    <base href="<?php echo base_url(); ?>">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Katakoe - Kamu ngomong pakai bahasa apa?</title>
    <link rel="stylesheet" href="stylesheets/normalize.css" />
    <link rel="stylesheet" href="stylesheets/app.css" />
    <link rel="stylesheet" href="stylesheets/katakoe.css" />
    <!-- <script src="javascripts/vendor/custom.modernizr.js"></script> -->
</head>
<body>
    <header>
    <div class="contain-to-grid">
        <nav class="top-bar sticky">
            <ul class="title-area">
                <li class="name"><h1><a href="#">Katakoe</a></h1></li>
                <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
            </ul>

            <section class="top-bar-section">
                <ul class="left">
                    <li><a href="#">Baranda</a></li>
                    <li><a href="">Apa sih Katakoe itu?</a></li>
                    <li><a href="">Random</a></li>
                </ul>
            </section>
        </nav>
    </div>
    </header>

    <div class="row" id="page">
        
        <div class="large-12 columns">
            <h1>Katakoe. Kamu ngetwit pakai bahasa apa?</h1>
            <hr>
        </div>
        <div class="clear"></div>
        <div class="large-6 push-3 columns">
            <form action="">
                <div class="row collapse">
                    <div class="small-3 large-5 columns">
                      <span class="prefix">Twitter Hashtag #</span>
                    </div>
                    <div class="small-9 large-7 columns">
                      <input id="hashtag" type="text" placeholder="masukin hashtagnya sob">
                    </div>
                </div>
                <button type="button" id="analyze" class="button medium expand">Analisa Twitnya</button>
                <img src="loading.gif" class="loading" style="display:none; margin: 0 auto;width: 48px;" alt="">
                <h3 id="result" class="subheader"></h3>
            </form>
        </div>

    </div>


    <footer>
        <div class="row">
        <div class="large-8 columns">
            
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.
            </p>

        </div>
        </div>
    </footer>



<script src="javascripts/vendor/jquery"></script><!-- 
<script src="javascripts/foundation/foundation.js"></script>
<script src="javascripts/foundation/foundation.alerts.js"></script>
<script src="javascripts/foundation/foundation.clearing.js"></script>
<script src="javascripts/foundation/foundation.cookie.js"></script>
<script src="javascripts/foundation/foundation.dropdown.js"></script>
<script src="javascripts/foundation/foundation.forms.js"></script>
<script src="javascripts/foundation/foundation.joyride.js"></script>
<script src="javascripts/foundation/foundation.magellan.js"></script>
<script src="javascripts/foundation/foundation.orbit.js"></script>
<script src="javascripts/foundation/foundation.placeholder.js"></script>
<script src="javascripts/foundation/foundation.reveal.js"></script>
<script src="javascripts/foundation/foundation.section.js"></script>
<script src="javascripts/foundation/foundation.tooltips.js"></script>
<script src="javascripts/foundation/foundation.topbar.js"></script>
<script>$(document).foundation();</script> -->
<script>
    
    $(document).ready(function(){
        $('form').submit(function(e){
            $('#analyze').text('loading...');
            $('#analyze').addClass('disabled');
            $('input').prop('disabled', true);
            $('.loading').show().css('display','block');
            $('#result').hide();
            q = $('#hashtag').val();
            $.ajax({
               type: "get",
               url: "<?php echo site_url('twitter/ajax'); ?>",
               data: "q="+q,
               success: function(msg){
                //alert(msg)
                $('#analyze').text('Analisa Twitnya');
                $('#analyze').removeClass('disabled');
                $('input').prop('disabled', false);
                $('.loading').hide();
                $('#result').show();
                $('#result').text('Kami menebak bahwa orang yang ngetwit dengan topik '+q+' kebanyakan memakai bahasa ' + msg)
               }
             });
            e.preventDefault();
        })
        $('#analyze').on('click', function(){
            $('#analyze').text('loading...');
            $('#analyze').addClass('disabled');
            $('input').prop('disabled', true);
            $('.loading').show().css('display','block');
            $('#result').hide();
            q = $('#hashtag').val();
            $.ajax({
               type: "get",
               url: "<?php echo site_url('twitter/ajax'); ?>",
               data: "q="+q,
               success: function(msg){
                //alert(msg)
                $('#analyze').text('Analisa Twitnya');
                $('#analyze').removeClass('disabled');
                $('input').prop('disabled', false);
                $('.loading').hide();
                $('#result').show();
                $('#result').text('Kami menebak bahwa orang yang ngetwit dengan topik '+q+' kebanyakan memakai bahasa ' + msg)
               }
             });
        });
    });

</script>
</body>
</html>
