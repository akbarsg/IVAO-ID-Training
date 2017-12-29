
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->  
<head>
    <title>IVAO - International Virtual Aviation Organization</title>

    <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="https://login.ivao.aero//css/bootstrap.min.css">
    <link rel="stylesheet" href="https://login.ivao.aero//css/style.css">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="https://login.ivao.aero///maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" href="https://login.ivao.aero//css/custom-sky-forms.css">

    <!-- CSS Theme -->    
    <link rel="stylesheet" href="https://login.ivao.aero//css/ivao.css" id="style_color">

    <!-- CSS Customization -->
    <link rel="stylesheet" href="https://login.ivao.aero//css/custom.css">
    
    <script Language="JavaScript" Type="text/javascript"><!--
function FrontPage_Form1_Validator(theForm)
{

  if (theForm.Id.value == "")
  {
    alert("Please enter a value for the \"Id\" field.");
    theForm.Id.focus();
    return (false);
  }

  if (theForm.Id.value.length < 1)
  {
    alert("Please enter at least 1 characters in the \"Id\" field.");
    theForm.Id.focus();
    return (false);
  }

  if (theForm.Id.value.length > 10)
  {
    alert("Please enter at most 10 characters in the \"Id\" field.");
    theForm.Id.focus();
    return (false);
  }

  if (theForm.Pwd.value == "")
  {
    alert("Please enter a value for the \"Password\" field.");
    theForm.Pwd.focus();
    return (false);
  }

  if (theForm.Pwd.value.length < 1)
  {
    alert("Please enter at least 1 characters in the \"Password\" field.");
    theForm.Pwd.focus();
    return (false);
  }

  if (theForm.Pwd.value.length > 15)
  {
    alert("Please enter at most 15 characters in the \"Password\" field.");
    theForm.Pwd.focus();
    return (false);
  }
  return (true);
}
//--></script>
	
</head>	

<body id="page-body">

<div class="wrapper">
        <div class="header">
          <div class="topbar">&nbsp;</div>
          <div class="navbar navbar-default">
            <div class="container">
                <div>
                    <a class="navbar-brand" href="https://www.ivao.aero">
                        <img id="logo-header" src="https://login.ivao.aero//img/logo1-default.png" alt="Logo">
                    </a>
                </div>
            </div>
          </div>
        </div>


    <div class="container content">
	<p>&nbsp;</p>
                       <!-- Login-Form -->
                    <div class="col-md-4 col-md-offset-4">
                        <form method="post" action="{{ route('login') }}" class="sky-form" data-ajax="false" onsubmit="return FrontPage_Form1_Validator(this)">
                            {{ csrf_field() }}
                            <header>Login form</header>
                            
                            <fieldset>
                             
                             
                            
                                <section>
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="input">
                                                <i class="icon-prepend fa fa-user"></i>
                                                <input name="vid" type="text" placeholder="VID" />
                                            </label>
                                        </div>
                                    </div>
                                </section>
                                
                                <section>
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="input">
                                                <i class="icon-prepend fa fa-lock"></i>
                                                <input name="password" type="password" placeholder="Password" />
                                            </label>
                                        </div>
                                    </div>
                                </section>
                                
                                <section>
                                    <div class="row">
                                        <div class="col col-4"></div>
                                        <div class="col col-8">
                                            <label class="checkbox"><input type="checkbox" name="remember" checked="checked" value="yes" /><i></i>Keep me logged in</label>
                                        </div>
                                    </div>
                                </section>
                            </fieldset>
                            <footer>
                                <input type="submit" name="login" value="Log in" class="btn-u" />
                            </footer>
                        </form>         
                        
                    </div>
                    <!-- End Login-Form -->
                </div><!--/end row-->	
			

	<!-- End content -->
    </div><!--/wrapper-->

    <!--=== Copyright ===-->
    <div class="footer-v2">
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-8">                     
                    <p>2017 &copy; International Virtual Aviation Organisation. All Rights Reserved. <a href="https://www.ivao.aero/ViewDocument.aspx?Path=/rules:privacy" target="_blank">Privacy Policy</a> | <a href="https://www.ivao.aero/ViewDocument.aspx?Path=/rules:terms" target="_blank">Terms of Service</a></p>
                </div>
                <div class="col-md-4">  
                        <ul class="social-icons pull-right">
                            <li><a href="https://www.facebook.com/ivaohq" target="_blank" data-original-title="Facebook" class="rounded-x social_facebook"></a></li>
                            <li><a href="https://twitter.com/IVAOAERO" target="_blank" data-original-title="Twitter" class="rounded-x social_twitter"></a></li>
                            <li><a href="http://google.com/+ivaoaero" target="_blank" data-original-title="Google Plus" class="rounded-x social_googleplus"></a></li>
                            <li><a href="http://youtube.com/c/ivaoaero" target="_blank" data-original-title="Youtube" class="rounded-x social_youtube"></a></li>
                        </ul>
                </div>
            </div>
        </div> 
        </div> 
    </div><!--/copyright--> 
    <!--=== End Copyright ===-->
</body>
</html>	
