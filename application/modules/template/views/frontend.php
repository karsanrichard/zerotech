<!DOCTYPE html>
<html>
    <head>
        <link href ="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel = "stylesheet" type="text/css"/>
        <style type = "text/css">
            .top_drawer{
                background-color: #f3f3f3;
                height: 40px;
                line-height: 40px;
                border-bottom: 1px solid black;
                z-index: 999;
            }
        </style>
    </head>
    <body>
        <div class = "container">
            <div class = "top_drawer col-md-12">
                <div class = "pull-right">
                    <span style = "color: black;">CART (0)</span>
                </div>
            </div>
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Brand</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="<?php echo base_url(); ?>">Home</a></li>
                            <li><a href="<?php echo base_url(); ?>">Categories</a></li>
                            <li><a href="<?php echo base_url(); ?>">About Us</a></li>
                            <li><a href="<?php echo base_url(); ?>">Contact Us</a></li>
                            <li><a href="<?php echo base_url(); ?>">Search</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
        <script src ="https://code.jquery.com/jquery-2.1.4.min.js" type="text/javascript"></script>
        <script src ="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" type="text/javascript"></script>
    </body>
</html>

