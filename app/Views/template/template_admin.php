<?php
/**
 * Admin Template view
 * This template was developed for CodeIgniter4, and this template will be called in views with section.
 * The code between the section(content) in the view will be diaplayed here with the renderSection()
 * 
 * Template usage
 *  $data['page'] = array(
 *      'title' => 'Main Title',                                -
 *      'page_title' => 'Page Tilte',                           -
 *      'breadcrumb' => [['name' => 'name', 'url' => 'url']],   -
 *      'layout' => 1,                                          - Optional [0 or 1] for fullscreen pages like dahsboards etc,.
 *      'js' => [file1, file2,],                                - load path public/js/admin/<file-name>
 *      'css' => [file1, file,],                                - load path public/css/admin/<file-name>
 *  );
 * @author
 * @version 1.0
 */
?>
<!DOCTYPE html>
<html lang="en" class="menuitem-active">
    <head>
        <title><?= esc(PROJECT_TITLE) ?> : <?= esc($page['title']) ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="<?= WEBROOT ?>assets/images/favicon.png" type="image/x-icon">
        <!-- CSS files -->
        <link rel="stylesheet" type="text/css" href="<?= WEBROOT ?>assets/bootstrap-5.3/css/bootstrap.min.css">
        <!-- <link rel="stylesheet" type="text/css" href="<?= WEBROOT ?>css/admin/template_admin.css"> -->
        <!-- bootstrap icons -->
        <link rel="stylesheet" href="<? echo WEBROOT;?>assets/bootstrap-5.3/icons/bootstrap-icons.css">
        <!-- menu css -->
        <link rel="stylesheet" type="text/css" href="<? echo WEBROOT;?>assets/template/css/template_admin_theme.css">
        <link rel="stylesheet" type="text/css" href="<? echo WEBROOT;?>assets/css/style.css">
        <?
        // Project CSS files
        if(isset($page['css'])) {
            foreach($page['css'] as $css_file) {
                ?><link rel="stylesheet" type="text/css" href="<?= WEBROOT ?>assets/css/<?= $css_file ?>.css?<?= CCV ?>"><?
            }
        }
        ?>
        <!-- DatePicker css -->
        <link rel="stylesheet" type="text/css" href="<?= WEBROOT ?>assets/date-picker/datepicker.min.css" />
        <!-- JS files -->
        <script type="text/javascript">var WEBROOT = '<?= WEBROOT ?>';</script>
        <script type="text/javascript" src="<?= WEBROOT ?>assets/jquery/jquery-3.7.1.min.js"></script>
        <script type="text/javascript" src="<?= WEBROOT ?>assets/bootstrap-5.3/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="<?= WEBROOT ?>assets/date-picker/datepicker.min.js"></script>
        <script type="text/javascript" src="<?= WEBROOT ?>assets/js/main.js"></script>

        <?
        // Project JS files
        if(isset($page['js'])) {
            foreach($page['js'] as $js_file) {
                ?><script type="text/javascript" src="<?= WEBROOT ?>assets/js/<?= $js_file ?>.js?<?= CCV ?>"></script><?
            }
        }
        ?>
    </head>
    <body>
        <div class="wrapper position-relative">
            <? $page_layout = isset($page['layout']) ? $page['layout'] : 0; ?>
            <? // Load main navigation ?>
            <?= view_cell('AdminNavigation::leftNavigation') ?>
            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">
                        <? if($page_layout == 0):?>
                            <div class="page-card-header d-flex justify-content-between align-items-center mb-3 mt-3 pt-1 pb-1">
                                <div class="page-title"><h4><?= esc($page['page_title']); ?></h4></div>
                                <nav aria-label="breadcrumb" class="page-breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= esc(WEBROOT) ?>">Home</a></li>
                                        <?
                                        if(isset($page['breadcrumb'])) {
                                            foreach($page['breadcrumb'] as $breadcrumb_item) {
                                                ?><li class="breadcrumb-item"><a href="<?= esc(WEBROOT) . esc($breadcrumb_item['url']) ?>"><?= esc($breadcrumb_item['name']) ?></a></li><?
                                            }
                                        }
                                        ?>
                                        <li class="breadcrumb-item active" aria-current="page"><?= esc($page['page_title']); ?></li>
                                    </ol>
                                </nav>
                            </div>
                        <div class="card"><div class="card-body"><?= $this->renderSection('content'); ?></div></div>
                        <? endif;?>
                        <? if($page_layout == 1):?>
                            <div class="page-card-header d-flex justify-content-between align-items-center mb-3 mt-3 pt-1 pb-1">
                                <div class="page-title"><h4><?= esc($page['page_title']); ?></h4></div>
                                <nav aria-label="breadcrumb" class="page-breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="<?= esc(WEBROOT) ?>">Home</a></li>
                                        <?
                                        if(isset($page['breadcrumb'])) {
                                            foreach($page['breadcrumb'] as $breadcrumb_item) {
                                                ?><li class="breadcrumb-item"><a href="<?= esc(WEBROOT) . esc($breadcrumb_item['url']) ?>"><?= esc($breadcrumb_item['name']) ?></a></li><?
                                            }
                                        }
                                        ?>
                                        <li class="breadcrumb-item active" aria-current="page"><?= esc($page['page_title']); ?></li>
                                    </ol>
                                </nav>
                            </div>
                            <?= $this->renderSection('content'); ?>
                        <? endif;?>
                    </div>
                </div>
                <footer class="footer">
                    <div class="container-fluid">
                        &copy;&nbsp;<?= date('Y');?>&nbsp;Meil&reg;
                    </div>
                </footer>
            </div>
        </div>               
        <script type="text/javascript" src="<?= WEBROOT ?>assets/template/js/menu.js"></script><!-- menu js -->
        <script>
            // var filesAdded='';
            // function myFunction() {
            //    var element = document.body;
            //    element.classList.toggle("dark-mode");

            //     // add and remove dark theme css
            //     var linkNode = document.querySelector('link[href*="<? echo WEBROOT;?>menu/css/darkTheme.css"]');
            //     if(linkNode != null) {
            //         linkNode.parentNode.removeChild(linkNode);
            //         return
            //     }
            //     else {
            //         var head = document.getElementsByTagName('head')[0] 
                      
            //         // Creating link element 
            //         var style = document.createElement('link')  
            //         style.href = '<? echo WEBROOT;?>menu/css/darkTheme.css'
            //         style.type = 'text/css'
            //         style.rel = 'stylesheet'
            //         head.append(style); 
                      
            //         // Adding the name of the file to keep record 
            //         filesAdded += ' darkTheme.css' 
            //     }
            // }
        </script>
    </body>
</html>