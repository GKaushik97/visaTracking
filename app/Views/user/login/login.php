<?php
/**
 * User login
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= PROJECT_TITLE ?></title>
        <link rel="shortcut icon" href="<?= WEBROOT ?>assets/images/favicon.png" type="image/x-icon">
            <!-- CSS files -->
            <link rel="stylesheet" type="text/css" href="<?= WEBROOT ?>assets/bootstrap-5.3/css/bootstrap.min.css">
            <!-- <link rel="stylesheet" type="text/css" href="<?= WEBROOT ?>css/admin/template_admin.css"> -->
            <!-- bootstrap icons -->
            <link rel="stylesheet" href="<? echo WEBROOT;?>assets/bootstrap-5.3/icons/bootstrap-icons.css">
            
            <!-- JS files -->
            <script type="text/javascript" src="<?= WEBROOT ?>assets/jquery/jquery-3.7.1.min.js"></script>
            <script type="text/javascript" src="<?= WEBROOT ?>assets/bootstrap-5.3/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <div class="container">            
            <div class="login-container">
                <form action="<?= WEBROOT ?>login/loginSubmit" method="post">
                    <?= csrf_field() ?>
                    <div class="login-col-padding">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="login-content-block">
                                    <div class="d-flex justify-content-center align-items-center h-100">
                                        <div class="login-block">
                                            <div class="login-text">Login</div>
                                            <div class="mb-3">
                                                <div class="input-items">
                                                    <input class="form-control" name="username" value="<?= set_value('username') ?>" placeholder="User Name" autofocus="autofocus" type="text">
                                                    <i class="bi bi-person"></i>
                                                </div>
                                                <span class="text-danger"><?= validation_show_error('username') ?></span>
                                            </div>
                                            <div class="mb-3">
                                                <div class="input-items">
                                                    <input name="password" class="form-control " placeholder="Password" type="password">
                                                    <i class="bi bi-lock"></i>
                                                </div>
                                                <span class="text-danger"><?= validation_show_error('password') ?></span>
                                            </div>
                                            <span class="text-danger"><? echo isset($message) ? $message : '';?></span>
                                            <div class="d-grid mb-3">
                                                <button class="btn login-btn btn-lg" type="submit" value="LogIn"><i class="bi bi-box-arrow-in-right"></i>&nbsp;Login</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative">
                                    <div class="login-img">
                                        <img src="<?= WEBROOT ?>assets/images/login/login-bg.png" class="img-fluid" alt="login invoice img">
                                    </div>
                                    <!-- <div class="bg-overlay"></div> -->
                                    <div class="position-absolute login-img-overlay login-logo">                                        
                                        <div style="background-color: rgba(255,255,255,0.85);border:1px solid rgba(255,255,255,0.75);border-radius: 20px;/*min-height: 435px;*/  display: flex;justify-content: center;align-items: center;box-shadow: rgb(45, 88, 133) 0px 5px 15px;">
                                            <div class="login-logo">
                                                <div>
                                                    <img src="<?= WEBROOT ?>assets/images/logo.png" class="img-fluid" width="185">
                                                    <div class="login-logo-text">
                                                        <h2>Visa Tracking</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </form>
                <style type="text/css">
                    @font-face {
                        font-family:"Nunito";src:url(<?= WEBROOT ?>assets/fonts/Nunito_Sans/static/Nunito-Light.woff) format("woff");font-weight:300;font-style:normal;
                    }

                    @font-face {
                        font-family:"Nunito";src:url(<?= WEBROOT ?>assets/fonts/Nunito_Sans/static/Nunito-Regular.woff) format("woff");font-weight:400;font-style:normal;
                    }

                    @font-face {
                        font-family:"Nunito";src:url(<?= WEBROOT ?>assets/fonts/Nunito_Sans/static/Nunito-Medium.woff) format("woff");font-weight:500;font-style:normal;
                    }

                    @font-face {
                        font-family:"Nunito";src:url(<?= WEBROOT ?>assets/fonts/Nunito_Sans/static/Nunito-SemiBold.woff) format("woff");font-weight:600;font-style:normal;
                    }

                    @font-face {
                        font-family:"Nunito";src:url(<?= WEBROOT ?>assets/fonts/Nunito_Sans/static/Nunito-Bold.woff) format("woff");font-weight:700;font-style:normal;
                    }
                    body {
                        width: 100%;
                        height: 100vh;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        font-family: "Nunito",sans-serif;
                        font-size: 12px;
                        color: #a0a5a8;
                        background: url("../public/assets/images/login/login-bg-vt.png") no-repeat center center fixed;
                        background-size: auto;
                        background-size: auto;
                        -webkit-background-size: cover;
                        -moz-background-size: cover;
                        -o-background-size: cover;
                        background-size: cover;
                    }

                    .login-block {
                        width: 400px;
                    }
                    .input-items {
                    position: relative;
                    }
                    .input-items input, .input-items textarea {
                    width: 100%;
                    height: 44px;
                    border: 1px solid #e4e4e4;
                    padding-left: 44px;
                    padding-right: 12px;
                    position: relative;
                    font-size: 16px;
                    color: #000000;
                    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
                    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
                    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
                    border-radius: 6px;
                    }
                    .input-items i {
                    position: absolute;
                    top: 8px;
                    left: 13px;
                    font-size: 20px;
                    z-index: 9;
                    color: #2f3192;
                    }
                    .input-items input:focus, .input-items textarea:focus {
                    border-color: #2f3192;
                    }
                    .login-btn {
                    color: #fff;
                    background-color: #2f3192;
                    border-color: #292b8a;
                    }
                    .login-btn:hover {
                    color: #fff;
                    background-color: #d61a20;
                    border-color: #be171c;
                    }
                    .login-text {
                    font-size: 34px;
                    text-align: start;
                    margin-bottom: 1.75rem;
                    color: #2f3192;
                    font-weight: 700;
                    text-align: center;
                    }
                    .l-msg {
                    position: fixed;
                    top: 0px;
                    width: 100%;
                    text-align: right;
                    background-color: rgba(255,255,255,0.2);
                    font-size: 24px;
                    color: #000;
                    padding: 15px;
                    }
                    .f-16 {
                    font-size: 16px;
                    }
                    .loc-title {
                        padding-top: 5px;
                    }
                    .login-footer {
                        color: #666;
                        font-size: 12px;
                        padding-top: 25px;
                        text-align: center;
                    }
                    .login-footer > a {
                        color: #bb2727;
                    }
                    .login-message {
                        text-align: center;
                        color: #000;
                        font-size: 20px;
                    }
                    .login-img {
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        border-top-right-radius: 20px;
                        border-bottom-right-radius: 20px;
                        overflow: hidden;
                    }
                    .login-col-padding .row {
                        margin-left: 0px;
                        margin-right: 0px;
                    }
                    .login-col-padding [class*="col-"] {
                        padding: 0px;
                    }
                    .login-img-overlay {
                        top: 0;
                        bottom: 0;
                        width: 100%;
                    }
                    .login-logo {
                        height: 100%;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        padding: 100px;
                    }
                    .login-logo-text {
                        text-align: center;
                        width: 100%;
                        /*background-color: rgba(255,255,255,0.75);
                        padding: 50px;
                        margin-left: 100px;*/
                    }
                    .login-logo-text h2 {
                        margin-bottom: 0rem;
                        margin-top: 1rem;
                        color: #2f3192;
                        font-size: 1.75rem;
                        /*background: -webkit-linear-gradient(45deg, #ee1d24, #2f3192 50%);
                        background-clip: border-box;
                        -webkit-background-clip: text;
                        -webkit-text-fill-color: transparent;*/
                    }
                    .login-container {
                        background-color: #ffffff;
                        position: relative;
                        box-shadow: rgba(0,132,255, 0.2) 0px 7px 29px 0px;
                        border-radius: 20px;
                    }
                    .login-content-block {
                        background-color: #f9faff;
                        height: 100%;
                        text-align: center;
                        border-left:1px solid #e6f3ff;
                        border-top-left-radius: 20px;
                        border-bottom-left-radius: 20px;
                    }
                    .bg-overlay {
                        position: absolute;
                        background-image: radial-gradient( circle 523px at 7.1% 19.3%, rgba(127,111,219,0.9) 2%, rgba(75,54,212,0.9) 100.7% );
                        top: 0;
                        bottom: 0;
                        left: 0;
                        right: 0;
                        width: 100%;
                        border-top-right-radius: 20px;
                        border-bottom-right-radius: 20px;
                    }
                </style>
            </div>
        </div>
    </body>
</html>