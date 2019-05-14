<?php require_once("../includes/header.php");?>
    <body>
        <!-- navbar -->
        <div class="navbar">
            <nav class="nav__mobile"></nav>
            <div class="container">
                <div class="navbar__inner">
                    <a href="../" class="navbar__logo">Sitename<small>(unlimited)</small></a>
                    <nav class="navbar__menu">
                        <ul>
                            <li><a href="../">Home</a></li>
                            <li><a href="../about/">About Us</a></li>
                            <li><a href="../faq/">FAQs</a></li>
                            <li><a href="../terms/">Terms</a></li>
                            <li><a href="../privacy/">Privacy Policy</a></li>
                            <li><a href="../login/">Log In</a></li>
                            <li><a href="../signup/">Sign Up</a></li>
                        </ul>
                    </nav>
                    <div class="navbar__menu-mob"><a href="#" id='toggle'><svg role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z" class=""></path></svg></a></div>
                </div>
            </div>
        </div>
            <!-- Authentication pages -->
        <div class="auth">
            <div class="container">
                <div class="auth__inner"  style="margin-top:0px;">
                    <div class="auth__media">
                        <img src="../images/icon/flat_login.png">
                    </div>
                    <div class="auth__auth">
                        <h1 class="auth__title">Sign Up for free</h1>
                        <form class="" role="presentation" id="login-form" action="../includes/reg_process.php" method="post">                                            
                            <label>Username</label>
                            <input class="" placeholder="Username" required="required" name="username" id="LoginForm_username" type="text" minlength="3" maxlength="10"/>                        
                            <label>Email</label>
                            <input class="" placeholder="Email" required="required" name="email" id="LoginForm_username" type="email" />                        
                            <label>Phone No</label>
                            <input class="" placeholder="Phone No" required="required" name="phoneNumber" id="LoginForm_username" type="text" />                        
                            <label>Bank Name</label>
                            <input class="" placeholder="I.e (GTbank)" required="required" name="bankname" id="LoginForm_username" type="text" minlength="3" maxlength="10"/>
                            <label>Account Number</label>
                            <input class="" placeholder="i.e (022345867)" required="required" name="accntno" id="LoginForm_username" type="text" minlength="5" maxlength="11"/>
                            <label>Account Type</label>
                            <select class="" required="required" name="accnttype" id="NoSponsor_location">
                                <option value="savings">Savings</option>
                                <option value="current">Current</option>
                                <option value="notsure">Not Sure</option>
                            </select>
                            <label>Account Name</label>
                            <input class="" placeholder="John Doe Chukwuma" required="required" name="accntname" id="LoginForm_username" type="text" minlength="3" maxlength="20"/>
                            <label>Password</label>
                            <input autocomplete="off" class="" placeholder="Password" required="required" name="password" id="LoginForm_password" type="password" minlength="5" maxlength="10"/>
                            <label>Retype Password</label>
                            <input autocomplete="off" class="" placeholder="Password" required="required" name="confirmPassword" id="LoginForm_password" type="password" minlength="5" maxlength="10"/>
                            <button value="<?php echo $_GET['ref']?>" type='submit' class="button button__primary" name="register">Sign Up</button>
                            <a class="" href="login/recovery.html"><h6 class="left-align" >Forgot your password?</h6></a>                        
                            <a class="" href="../login/"><h6 class="left-align" >Login</h6></a>                    
                        </form>                
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