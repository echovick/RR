<?php require("userinc.php"); 
//Send request to server to get http or https address
$protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

//Set $currentURL as the http or https address
$currentURL = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . $_SERVER['QUERY_STRING'];
?>

<!doctype html>
<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-124890021-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-124890021-1');
</script>
    <meta class="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <script type="text/javascript" src="assets/861c30a6/jquery.min.js"></script>
        <title>sitename  - Login</title><meta name="description" content="sitename " />
        <link rel='stylesheet' href='../themes/front/css/style.min.css' />
        <link rel="stylesheet" href="../maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" />
        <link rel="apple-touch-icon" href="../images/apple-touch-icon/apple-touch-icon.png" />
        <link rel="apple-touch-icon" sizes="76x76" href="../images/apple-touch-icon/apple-touch-icon-76x76.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="../images/apple-touch-icon/apple-touch-icon-114x114.png" />
        <link rel="apple-touch-icon" sizes="120x120" href="../images/apple-touch-icon/apple-touch-icon-120x120.png" />
        <link rel="apple-touch-icon" sizes="152x152" href="../images/apple-touch-icon/apple-touch-icon-152x152.png" />
        <link rel="apple-touch-icon" sizes="180x180" href="../images/apple-touch-icon/apple-touch-icon-180x180.png" />
    </head>