<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Andyscript</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
<!--        <base href="http://localhost/bootstrap/">-->
        <link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="/css/bootstrap-responsive.min.css" type="text/css">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600">
        <link rel="stylesheet" href="/css/font-awesome.min.css">
        <link rel="stylesheet" href="/css/jquery-ui-1.10.0.custom.min.css">
        <link rel="stylesheet" href="/css/base-admin-2.css">
        <link rel="stylesheet" href="/css/base-admin-2-responsive.css">
        <link rel="stylesheet" href="/css/dashboard.css">
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="brand" href="index.php">AndyMin <sup>0.1</sup></a>
                    <a type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <i class="icon-cog"></i>
                    </a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-cog"></i>
                                    Settings
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Account Settings</a></li>
                                    <li><a href="#">Privacy Settings</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Help</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-user"></i>
                                    Andy Anderson
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">My Profile</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                        <form class="navbar-search pull-right">
                            <input type="text" class="search-query" name="q" placeholder="Search">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="subnavbar">
            <div class="subnavbar-inner">
                <div class="container">
                    <a class="btn-subnavbar collapsed" data-toggle="collapse" data-target=".subnav-collapse">
                        <i class="icon-reorder"></i>
                    </a>
                    <div class="subnav-collapse collapse">
                        <ul class="mainnav">
                            <li class="active">
                                <a href="/">
                                    <i class="icon-home"></i>
                                    <span>Home</span>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-group"></i>
                                    <span>Users</span>
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/users/list/">List users</a>
                                    </li>
                                    <li>
                                        <a href="/users/add/">Add a user</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-list-alt"></i>
                                    <span>News</span>
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="/news/list/">List news articles</a>
                                    </li>
                                    <li>
                                        <a href="/news/add/">Add a news article</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="main">
            <div class="container">
                <div class="row">
                    <div class="span6">
                        <div class="widget stacked">
                            <div class="widget-header">
                                <i class="icon-signal"></i>
                                <h3>Active Membership Breakdown</h3>
                            </div>
                            <div class="widget-content">
                                <div class="stats">
                                    <div class="stat">
                                        <div id="donut-chart" class="chart-holder"></div>
                                    </div>
                                    <!--<div class="stat">

                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="span6">
                        <div class="widget stacked">
                            <div class="widget-header">
                                <i class="icon-money"></i>
                                <h3>Membership Prices</h3>
                            </div>
                            <div class="widget-content">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="extra">

        </div>
        <div class="footer">

        </div>
        <script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
        <script type="text/javascript" src="/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="/js/jquery.flot.min.js"></script>
        <script type="text/javascript" src="/js/jquery.flot.pie.min.js"></script>
        <script type="text/javascript" src="/js/jquery.flot.resize.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function()
            {
                var data = [
                    { label: "Student", data: 79 },
                    { label: "Student / Unwaged", data: 15 },
                    { label: "Full (Tier 1)", data: 26 },
                    { label: "Full (Tier 2)", data: 7 },
                    { label: "Full (Tier 3)", data: 20 },
                    { label: "Honorary",  data: 22 },
                    { label: "Honorary (no JF)", data: 9 }
                ];

                $.plot($("#donut-chart"), data,
                {

                    //colors: ["#F90", "#222", "#777", "#AAA"],
                    series:
                    {
                        pie:
                        {
                            innerRadius: 0.35,
                            show: true,
                            label:
                            {
                                show: true,
                                formatter: function (label, series)
                                {
                                    return '<div style="text-align: center;">' + series.data[0][1] + ' : ' + Math.round(series.percent) + '%</div>';
                                }
                            }
                        }
                    }/*,
                    legend:
                    {
                        show: false
                    },
                    colors: ["#f90", "#FFB529"]*/
                });
            });
        </script>
    </body>
</html>