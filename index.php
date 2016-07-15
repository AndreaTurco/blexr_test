<?php 
require_once __DIR__.'/functions.php';
$tkn = generateFormToken('form_convert');
?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Odds converter - A.Turco</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
    <div id="wrap">
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <?php include 'menu.php';?>

        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
          <div class="container">
            <h1>Blexr Test</h1>
            <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
          </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <h2>Odds converter</h2>
                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                    <p><a class="btn btn-info" data-toggle="modal" data-target="#myModal" role="button">Open Modal &raquo;</a></p>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <span aria-hidden="true" class="close_modal" data-dismiss="modal"></span>
                                    <span class="dice"></span>
                                    <span class="corner"></span>
                                    <h4 class="modal-title" id="myModalLabel">Modal Odds Convert</h4>
                                </div>
                                <div class="modal-body">
                                    <h3>Insert one parameter for each conversion</h3>
                                    <div id="form_convert" class="row">
                                        <input type="hidden" id="tkn" value="<?php echo $tkn;?>">
                                        <div class="col-md-4">
                                            <h4>Fractional Odds</h4>
                                            <input type="text" data-odd-format="uk"/>
                                        </div>
                                        <div class="col-md-4">
                                            <h4>Decimal Odds</h4>
                                            <input type="text" data-odd-format="eu"/>
                                        </div>
                                        <div class="col-md-4">
                                            <h4>Moneyline  Odds</h4>
                                            <input type="text" data-odd-format="us"/>
                                        </div>
                                    </div>
                                    <div id="no_odd_found" class="alert alert-danger row" role="alert" style="display: none;">no odds found</div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" id="convert_odd">Convert</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- /container -->
    </div><!--wrapper-->
    <footer class="text-right text-muted">
        <p>A.Turco test 2016</p>
    </footer>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="js/vendor/bootstrap.min.js"></script>

    <script src="js/main.js"></script>
    </body>
</html>
