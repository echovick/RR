<?php require_once("includes/session.php");?>
<?php confirm_logged_out(); ?>
<?php require_once("/includes/header.php");?>
    <body>
        <!-- navbar -->
        <div class="navbar">
            <nav class="nav__mobile"></nav>
            <div class="container">
                <div class="navbar__inner">
                    <a href="../" class="navbar__logo">REWARDS RETURN</a>
                    <div class="navbar__menu-mob"><a href="#" id='toggle'><svg role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z" class=""></path></svg></a></div>
                </div>
            </div>
        </div>
            <!-- Authentication pages -->
        <div class="auth">
            <div class="container">
                <div class="auth__inner"  style="margin-top:-60px;">
                    <div class="auth__media">
                        <img src="../images/icon/flat_login.png">
                    </div>
                    <div class="auth__auth">
                        <h1 class="auth__title">ADMIN</h1>
                        <form class="" role="presentation" id="login-form" action="includes/login_process.php" method="post">                                            
                            <label>Username</label>
                            <input class="" placeholder="Username" required="required" name="username" id="LoginForm_username" type="text" minlength="3" maxlength="10"/>                        
                            <label>Password</label>
                            <input autocomplete="off" class="" placeholder="Password" required="required" name="password" id="LoginForm_password" type="password" minlength="5" maxlength="10"/>
                            <button type='submit' name="submit" class="button button__primary">Log in</button>
                            <a class="" href="login/recovery.html"><h6 class="left-align" >Forgot your password?</h6></a>                     
                        </form>                
                    </div>
                </div>
            </div>
        </div> 
        <!-- Footer -->
        <div class="footer footer--dark">
            <div class="container">
                <div class="footer__inner">
                    <a href="../" class="footer__textLogo ">REWARDS RETURN </a>
                    <div class="footer__data">
                        <div class="footer__data__item">
                        </div>
                        <div class="footer__data__item">
                        </div>
                        <div class="footer__data__item">
                            <div class="footer__row">
                                <a href="./" class="footer__link">Log In</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <script src='../themes/front/js/app.min.js'></script>
    <script>(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,'script','../www.google-analytics.com/analytics.js','ga');ga('create', 'UA-70494693-1', 'auto');ga('send', 'pageview');</script>
    <script type="text/javascript">
    /*<![CDATA[*/
    jQuery(function($) {
    jQuery('#yw1').after("<a id=\"yw1_button\" href=\"\/login\/captcha\/refresh\/1\">Get a new code<\/a>");
    jQuery(document).on('click', '#yw1_button', function(){
        jQuery.ajax({
            url: "\/login\/captcha\/refresh\/1",
            dataType: 'json',
            cache: false,
            success: function(data) {
                jQuery('#yw1').attr('src', data['url']);
                jQuery('body').data('captcha.hash', [data['hash1'], data['hash2']]);
            }
        });
        return false;
    });

    });
    /*]]>*/
    </script>
    </body>
</html>