    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta http-equiv=”X-UA-Compatible” content=”IE=EmulateIE9”>
    <meta http-equiv=”X-UA-Compatible” content=”IE=9”>
    <link rel="shortcut icon" href="{{ URL::to('public/admin/images/ico/favicon.ico') }}">   
    <title>YR Institute</title>
    <!--Core CSS -->
    
        <link rel="apple-touch-icon" href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/images/ico/apple-icon-120.png">
        {!! Html::style('public/admin/images/ico/favicon.ico') !!}
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

        <!-- BEGIN: Vendor CSS-->
        {!! Html::style('public/admin/vendors/css/vendors.min.css') !!}
        {!! Html::style('public/admin/vendors/css/weather-icons/climacons.min.css') !!}
        {!! Html::style('public/admin/vendors/css/weather-icons/climacons.min.css') !!}
        {!! Html::style('public/admin/fonts/meteocons/style.min.css') !!}
        {!! Html::style('public/admin/vendors/css/charts/morris.css') !!}
        <!-- END: Vendor CSS-->

        <!-- BEGIN: Theme CSS-->
        {!! Html::style('public/admin/css/bootstrap.min.css') !!}
        {!! Html::style('public/admin/css/bootstrap-extended.min.css') !!}
        {!! Html::style('public/admin/css/colors.min.css') !!}
        {!! Html::style('public/admin/css/components.min.css') !!}
        <!-- END: Theme CSS-->

        <!-- BEGIN: Page CSS-->
        {!! Html::style('public/admin/css/core/menu/menu-types/vertical-menu-modern.css') !!}
        {!! Html::style('public/admin/css/core/colors/palette-gradient.min.css') !!}
        {!! Html::style('public/admin/fonts/simple-line-icons/style.min.css') !!}
        {!! Html::style('public/admin/css/core/colors/palette-gradient.min.css') !!}
        {!! Html::style('public/admin/css/pages/timeline.min.css') !!}
        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        {!! Html::style('public/admin/css/style.css') !!}
        <!-- END: Custom CSS-->

</head>
<body class="vertical-layout vertical-menu-modern 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Header-->
   @include('admin/layouts/includes/header')
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
    @include('admin/layouts/includes/sidebar')
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- Stats -->
<div class="row">
    <div class="col-xl-3 col-lg-6 col-12">
        <div class="card">
            <div class="card-content">
                <div class="media align-items-stretch">
                    <div class="p-2 text-center bg-primary bg-darken-2">
                        <i class="icon-camera font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-gradient-x-primary white media-body">
                        <h5>Products</h5>
                        <h5 class="text-bold-400 mb-0"><i class="ft-plus"></i> 28</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
        <div class="card">
            <div class="card-content">
                <div class="media align-items-stretch">
                    <div class="p-2 text-center bg-danger bg-darken-2">
                        <i class="icon-user font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-gradient-x-danger white media-body">
                        <h5>New Users</h5>
                        <h5 class="text-bold-400 mb-0"><i class="ft-arrow-up"></i>1,238</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
        <div class="card">
            <div class="card-content">
                <div class="media align-items-stretch">
                    <div class="p-2 text-center bg-warning bg-darken-2">
                        <i class="icon-basket-loaded font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-gradient-x-warning white media-body">
                        <h5>New Orders</h5>
                        <h5 class="text-bold-400 mb-0"><i class="ft-arrow-down"></i> 4,658</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-12">
        <div class="card">
            <div class="card-content">
                <div class="media align-items-stretch">
                    <div class="p-2 text-center bg-success bg-darken-2">
                        <i class="icon-wallet font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-gradient-x-success white media-body">
                        <h5>Total Profit</h5>
                        <h5 class="text-bold-400 mb-0"><i class="ft-arrow-up"></i> 5.6 M</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Stats -->
<!--Product sale & buyers -->
<div class="row match-height">
    <div class="col-xl-8 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Products Sales</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div id="products-sales" class="height-300"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Recent Buyers</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content px-1">
                <div id="recent-buyers" class="media-list height-300 position-relative">
                    <a href="#" class="media border-0">
                        <div class="media-left pr-1">
                            <span class="avatar avatar-md avatar-online"><img class="media-object rounded-circle" src="{{ URL::to('public/admin/images/portrait/small/avatar-s-7.png') }}" alt="Generic placeholder image">
                            <i></i>
                            </span>
                        </div>
                        <div class="media-body w-100">
                            <h6 class="list-group-item-heading">Kristopher Candy <span class="font-medium-4 float-right pt-1">$1,021</span></h6>
                            <p class="list-group-item-text mb-0"><span class="badge badge-primary">Electronics</span><span class="badge badge-warning ml-1">Decor</span></p>
                        </div>
                    </a>
                    <a href="#" class="media border-0">
                        <div class="media-left pr-1">
                            <span class="avatar avatar-md avatar-away"><img class="media-object rounded-circle" src="{{ URL::to('public/admin/images/portrait/small/avatar-s-8.png') }}" alt="Generic placeholder image">
                            <i></i>
                            </span>
                        </div>
                        <div class="media-body w-100">
                            <h6 class="list-group-item-heading">Lawrence Fowler <span class="font-medium-4 float-right pt-1">$2,021</span></h6>
                            <p class="list-group-item-text mb-0"><span class="badge badge-danger">Appliances</span></p>
                        </div>
                    </a>
                    <a href="#" class="media border-0">
                        <div class="media-left pr-1">
                            <span class="avatar avatar-md avatar-busy"><img class="media-object rounded-circle" src="{{ URL::to('public/admin/images/portrait/small/avatar-s-9.png') }}" alt="Generic placeholder image">
                            <i></i>
                            </span>
                        </div>
                        <div class="media-body w-100">
                            <h6 class="list-group-item-heading">Linda Olson <span class="font-medium-4 float-right pt-1">$1,112</span></h6>
                            <p class="list-group-item-text mb-0"><span class="badge badge-primary">Electronics</span> <span class="badge badge-success ml-1">Office</span></p>
                        </div>
                    </a>
                    <a href="#" class="media border-0">
                        <div class="media-left pr-1">
                            <span class="avatar avatar-md avatar-online"><img class="media-object rounded-circle" src="{{ URL::to('public/admin/images/portrait/small/avatar-s-10.png') }}" alt="Generic placeholder image">
                            <i></i>
                            </span>
                        </div>
                        <div class="media-body w-100">
                            <h6 class="list-group-item-heading">Roy Clark <span class="font-medium-4 float-right pt-1">$2,815</span></h6>
                            <p class="list-group-item-text mb-0"><span class="badge badge-warning">Decor</span> <span class="badge badge-danger ml-1">Appliances</span></p>
                        </div>
                    </a>
                    <a href="#" class="media border-0">
                        <div class="media-left pr-1">
                            <span class="avatar avatar-md avatar-online"><img class="media-object rounded-circle" src="{{ URL::to('public/admin/images/portrait/small/avatar-s-11.png') }}" alt="Generic placeholder image">
                            <i></i>
                            </span>
                        </div>
                        <div class="media-body w-100">
                            <h6 class="list-group-item-heading">Kristopher Candy <span class="font-medium-4 float-right pt-1">$2,021</span></h6>
                            <p class="list-group-item-text mb-0"><span class="badge badge-primary">Electronics</span><span class="badge badge-warning ml-1">Decor</span></p>
                        </div>
                    </a>
                    <a href="#" class="media border-0">
                        <div class="media-left pr-1">
                            <span class="avatar avatar-md avatar-away"><img class="media-object rounded-circle" src="{{ URL::to('public/admin/images/portrait/small/avatar-s-12.png') }}" alt="Generic placeholder image">
                            <i></i>
                            </span>
                        </div>
                        <div class="media-body w-100">
                            <h6 class="list-group-item-heading">Lawrence Fowler <span class="font-medium-4 float-right pt-1">$1,321</span></h6>
                            <p class="list-group-item-text mb-0"><span class="badge badge-danger">Appliances</span></p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Product sale & buyers -->
<!--Recent Orders & Monthly Salse -->
<div class="row match-height">
    <div class="col-xl-8 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Recent Orders</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <p>Total paid invoices 240, unpaid 150. <span class="float-right"><a href="vertical-modern-menu-template/project-summary.html" target="_blank">Invoice Summary <i class="ft-arrow-right"></i></a></span></p>
                </div>
                <div class="table-responsive">
                    <table id="recent-orders" class="table table-hover mb-0 ps-container ps-theme-default">
                        <thead>
                            <tr>
                                <th>SKU</th>
                                <th>Invoice#</th>
                                <th>Customer Name</th>
                                <th>Status</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-truncate">PO-10521</td>
                                <td class="text-truncate"><a href="#">INV-001001</a></td>
                                <td class="text-truncate">Elizabeth W.</td>
                                <td class="text-truncate"><span class="badge badge-success">Paid</span></td>
                                <td class="text-truncate">$ 1200.00</td>
                            </tr>
                            <tr>
                                <td class="text-truncate">PO-532521</td>
                                <td class="text-truncate"><a href="#">INV-01112</a></td>
                                <td class="text-truncate">Doris R.</td>
                                <td class="text-truncate"><span class="badge badge-warning">Overdue</span></td>
                                <td class="text-truncate">$ 5685.00</td>
                            </tr>
                            <tr>
                                <td class="text-truncate">PO-05521</td>
                                <td class="text-truncate"><a href="#">INV-001012</a></td>
                                <td class="text-truncate">Andrew D.</td>
                                <td class="text-truncate"><span class="badge badge-success">Paid</span></td>
                                <td class="text-truncate">$ 152.00</td>
                            </tr>
                            <tr>
                                <td class="text-truncate">PO-15521</td>
                                <td class="text-truncate"><a href="#">INV-001401</a></td>
                                <td class="text-truncate">Megan S.</td>
                                <td class="text-truncate"><span class="badge badge-success">Paid</span></td>
                                <td class="text-truncate">$ 1450.00</td>
                            </tr>
                            <tr>
                                <td class="text-truncate">PO-32521</td>
                                <td class="text-truncate"><a href="#">INV-008101</a></td>
                                <td class="text-truncate">Walter R.</td>
                                <td class="text-truncate"><span class="badge badge-warning">Overdue</span></td>
                                <td class="text-truncate">$ 685.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-12">
        <div class="card">
            <div class="card-content">
                <div class="card-body sales-growth-chart">
                    <div id="monthly-sales" class="height-250"></div>
                </div>
            </div>
            <div class="card-footer">
                <div class="chart-title mb-1 text-center">
                    <h6>Total monthly Sales.</h6>
                </div>
                <div class="chart-stats text-center">
                    <a href="#" class="btn btn-sm btn-primary mr-1">Statistics <i class="ft-bar-chart"></i></a> <span class="text-muted">for the last year.</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/Recent Orders & Monthly Salse -->
<!-- Social & Weather -->
<div class="row match-height">
    <div class="col-xl-4 col-lg-12">
        <div class="card bg-gradient-x-danger">
            <div class="card-content">
                <div class="card-body">
                    <div class="animated-weather-icons text-center float-left">
                        <svg version="1.1" id="cloudHailAlt2" class="climacon climacon_cloudHailAlt climacon-blue-grey climacon-darken-2 height-100" viewBox="15 15 70 70">
                            <g class="climacon_iconWrap climacon_iconWrap-cloudHailAlt">
                                <g class="climacon_wrapperComponent climacon_wrapperComponent-hailAlt">
                                    <g class="climacon_component climacon_component-stroke climacon_component-stroke_hailAlt climacon_component-stroke_hailAlt-left">
                                        <circle cx="42" cy="65.498" r="2"></circle>
                                    </g>
                                    <g class="climacon_component climacon_component-stroke climacon_component-stroke_hailAlt climacon_component-stroke_hailAlt-middle">
                                        <circle cx="49.999" cy="65.498" r="2"></circle>
                                    </g>
                                    <g class="climacon_component climacon_component-stroke climacon_component-stroke_hailAlt climacon_component-stroke_hailAlt-right">
                                        <circle cx="57.998" cy="65.498" r="2"></circle>
                                    </g>
                                    <g class="climacon_component climacon_component-stroke climacon_component-stroke_hailAlt climacon_component-stroke_hailAlt-left">
                                        <circle cx="42" cy="65.498" r="2"></circle>
                                    </g>
                                    <g class="climacon_component climacon_component-stroke climacon_component-stroke_hailAlt climacon_component-stroke_hailAlt-middle">
                                        <circle cx="49.999" cy="65.498" r="2"></circle>
                                    </g>
                                    <g class="climacon_component climacon_component-stroke climacon_component-stroke_hailAlt climacon_component-stroke_hailAlt-right">
                                        <circle cx="57.998" cy="65.498" r="2"></circle>
                                    </g>
                                </g>
                                <g class="climacon_wrapperComponent climacon_wrapperComponent-cloud">
                                    <path class="climacon_component climacon_component-stroke climacon_component-stroke_cloud" d="M63.999,64.941v-4.381c2.39-1.384,3.999-3.961,3.999-6.92c0-4.417-3.581-8-7.998-8c-1.602,0-3.084,0.48-4.334,1.291c-1.23-5.317-5.974-9.29-11.665-9.29c-6.626,0-11.998,5.372-11.998,11.998c0,3.549,1.55,6.728,3.999,8.924v4.916c-4.776-2.768-7.998-7.922-7.998-13.84c0-8.835,7.162-15.997,15.997-15.997c6.004,0,11.229,3.311,13.966,8.203c0.663-0.113,1.336-0.205,2.033-0.205c6.626,0,11.998,5.372,11.998,12C71.998,58.863,68.656,63.293,63.999,64.941z"></path>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div class="weather-details text-center">
                        <span class="block white darken-1">Snow</span>
                        <span class="font-large-2 block white darken-4">-5&deg;</span>
                        <span class="font-medium-4 text-bold-500 white darken-1">London, UK</span>
                    </div>
                </div>
                <div class="card-footer bg-gradient-x-danger border-0">
                    <div class="row">
                        <div class="col-4 text-center display-table-cell white">
                            <i class="me-wind font-large-1 lighten-3 align-middle"></i> <span class="align-middle">2MPH</span>
                        </div>
                        <div class="col-4 text-center display-table-cell white">
                            <i class="me-sun2 font-large-1 lighten-3 align-middle"></i> <span class="align-middle">2%</span>
                        </div>
                        <div class="col-4 text-center display-table-cell white">
                            <i class="me-thermometer font-large-1 lighten-3 align-middle"></i> <span class="align-middle">13.0&deg;</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-12">
        <div class="card bg-gradient-x-info white">
            <div class="card-content">
                <div class="card-body text-center">
                    <div class="mb-2">
                        <i class="fa fa-twitter font-large-2"></i>
                    </div>
                    <div class="tweet-slider">
                        <ul>
                            <li>Congratulations to Rob Jones in accounting for winning our <span class="yellow">#NFL</span> football pool!
                                <p class="text-italic pt-1">- John Doe</p>
                            </li>
                            <li>Contests are a great thing to partner on. Partnerships immediately <span class="yellow">#DOUBLE</span> the reach.
                                <p class="text-italic pt-1">- John Doe</p>
                            </li>
                            <li>Puns, humor, and quotes are great content on <span class="yellow">#Twitter</span>. Find some related to your business.
                                <p class="text-italic pt-1">- John Doe</p>
                            </li>
                            <li>Are there <span class="yellow">#common-sense</span> facts related to your business? Combine them with a great photo.
                                <p class="text-italic pt-1">- John Doe</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-12">
        <div class="card bg-gradient-x-primary white">
            <div class="card-content">
                <div class="card-body text-center">
                    <div class="mb-2">
                        <i class="fa fa-facebook font-large-2"></i>
                    </div>
                    <div class="fb-post-slider">
                        <ul>
                            <li>Congratulations to Rob Jones in accounting for winning our #NFL football pool!
                                <p class="text-italic pt-1">- John Doe</p>
                            </li>
                            <li>Contests are a great thing to partner on. Partnerships immediately #DOUBLE the reach.
                                <p class="text-italic pt-1">- John Doe</p>
                            </li>
                            <li>Puns, humor, and quotes are great content on #Twitter. Find some related to your business.
                                <p class="text-italic pt-1">- John Doe</p>
                            </li>
                            <li>Are there #common-sense facts related to your business? Combine them with a great photo.
                                <p class="text-italic pt-1">- John Doe</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Social & Weather -->
<!-- Basic Horizontal Timeline -->
<div class="row match-height">
    <div class="col-xl-8 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Horizontal Timeline</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <div class="card-text">
                        <section class="cd-horizontal-timeline">
                            <div class="timeline">
                                <div class="events-wrapper">
                                    <div class="events">
                                        <ol>
                                            <li><a href="vertical-modern-menu-template.html#0" data-date="16/01/2015" class="selected">16 Jan</a></li>
                                            <li><a href="vertical-modern-menu-template.html#0" data-date="28/02/2015">28 Feb</a></li>
                                            <li><a href="vertical-modern-menu-template.html#0" data-date="20/04/2015">20 Mar</a></li>
                                            <li><a href="vertical-modern-menu-template.html#0" data-date="20/05/2015">20 May</a></li>
                                            <li><a href="vertical-modern-menu-template.html#0" data-date="09/07/2015">09 Jul</a></li>
                                            <li><a href="vertical-modern-menu-template.html#0" data-date="30/08/2015">30 Aug</a></li>
                                            <li><a href="vertical-modern-menu-template.html#0" data-date="15/09/2015">15 Sep</a></li>
                                        </ol>
                                        <span class="filling-line" aria-hidden="true"></span>
                                    </div>
                                    <!-- .events -->
                                </div>
                                <!-- .events-wrapper -->
                                <ul class="cd-timeline-navigation">
                                    <li><a href="vertical-modern-menu-template.html#0" class="prev inactive">Prev</a></li>
                                    <li><a href="vertical-modern-menu-template.html#0" class="next">Next</a></li>
                                </ul>
                                <!-- .cd-timeline-navigation -->
                            </div>
                            <!-- .timeline -->
                            <div class="events-content">
                                <ol>
                                    <li class="selected" data-date="16/01/2015">
                                        <blockquote class="blockquote border-0">
                                            <div class="media">
                                                <div class="media-left">
                                                    <img class="media-object img-xl mr-1" src="{{ URL::to('public/admin/images/portrait/small/avatar-s-5.png') }}" alt="Generic placeholder image">
                                                </div>
                                                <div class="media-body">
                                                    Sometimes life is going to hit you in the head with a brick. Don't lose faith.
                                                </div>
                                            </div>
                                            <footer class="blockquote-footer text-right">Steve Jobs
                                                <cite title="Source Title">Entrepreneur</cite>
                                            </footer>
                                        </blockquote>
                                        <p class="lead mt-2">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at.
                                        </p>
                                    </li>
                                    <li data-date="28/02/2015">
                                        <blockquote class="blockquote border-0">
                                            <div class="media">
                                                <div class="media-left">
                                                    <img class="media-object img-xl mr-1" src="{{ URL::to('public/admin/images/portrait/small/avatar-s-6.png') }}" alt="Generic placeholder image">
                                                </div>
                                                <div class="media-body">
                                                    Sometimes life is going to hit you in the head with a brick. Don't lose faith.
                                                </div>
                                            </div>
                                            <footer class="blockquote-footer text-right">Steve Jobs
                                                <cite title="Source Title">Entrepreneur</cite>
                                            </footer>
                                        </blockquote>
                                        <p class="lead mt-2">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at.
                                        </p>
                                    </li>
                                    <li data-date="20/04/2015">
                                        <blockquote class="blockquote border-0">
                                            <div class="media">
                                                <div class="media-left">
                                                    <img class="media-object img-xl mr-1" src="{{ URL::to('public/admin/images/portrait/small/avatar-s-7.png') }}" alt="Generic placeholder image">
                                                </div>
                                                <div class="media-body">
                                                    Sometimes life is going to hit you in the head with a brick. Don't lose faith.
                                                </div>
                                            </div>
                                            <footer class="blockquote-footer text-right">Steve Jobs
                                                <cite title="Source Title">Entrepreneur</cite>
                                            </footer>
                                        </blockquote>
                                        <p class="lead mt-2">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at.
                                        </p>
                                    </li>
                                    <li data-date="20/05/2015">
                                        <blockquote class="blockquote border-0">
                                            <div class="media">
                                                <div class="media-left">
                                                    <img class="media-object img-xl mr-1" src="{{ URL::to('public/admin/images/portrait/small/avatar-s-8.png') }}" alt="Generic placeholder image">
                                                </div>
                                                <div class="media-body">
                                                    Sometimes life is going to hit you in the head with a brick. Don't lose faith.
                                                </div>
                                            </div>
                                            <footer class="blockquote-footer text-right">Steve Jobs
                                                <cite title="Source Title">Entrepreneur</cite>
                                            </footer>
                                        </blockquote>
                                        <p class="lead mt-2">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at.
                                        </p>
                                    </li>
                                    <li data-date="09/07/2015">
                                        <blockquote class="blockquote border-0">
                                            <div class="media">
                                                <div class="media-left">
                                                    <img class="media-object img-xl mr-1" src="{{ URL::to('public/admin/images/portrait/small/avatar-s-9.png') }}" alt="Generic placeholder image">
                                                </div>
                                                <div class="media-body">
                                                    Sometimes life is going to hit you in the head with a brick. Don't lose faith.
                                                </div>
                                            </div>
                                            <footer class="blockquote-footer text-right">Steve Jobs
                                                <cite title="Source Title">Entrepreneur</cite>
                                            </footer>
                                        </blockquote>
                                        <p class="lead mt-2">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at.
                                        </p>
                                    </li>
                                    <li data-date="30/08/2015">
                                        <blockquote class="blockquote border-0">
                                            <div class="media">
                                                <div class="media-left">
                                                    <img class="media-object img-xl mr-1" src="{{ URL::to('public/admin/images/portrait/small/avatar-s-6.png') }}" alt="Generic placeholder image">
                                                </div>
                                                <div class="media-body">
                                                    Sometimes life is going to hit you in the head with a brick. Don't lose faith.
                                                </div>
                                            </div>
                                            <footer class="blockquote-footer text-right">Steve Jobs
                                                <cite title="Source Title">Entrepreneur</cite>
                                            </footer>
                                        </blockquote>
                                        <p class="lead mt-2">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at.
                                        </p>
                                    </li>
                                    <li data-date="15/09/2015">
                                        <blockquote class="blockquote border-0">
                                            <div class="media">
                                                <div class="media-left">
                                                    <img class="media-object img-xl mr-1" src="{{ URL::to('public/admin/images/portrait/small/avatar-s-7.png') }}" alt="Generic placeholder image">
                                                </div>
                                                <div class="media-body">
                                                    Sometimes life is going to hit you in the head with a brick. Don't lose faith.
                                                </div>
                                            </div>
                                            <footer class="blockquote-footer text-right">Steve Jobs
                                                <cite title="Source Title">Entrepreneur</cite>
                                            </footer>
                                        </blockquote>
                                        <p class="lead mt-2">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum praesentium officia, fugit recusandae ipsa, quia velit nulla adipisci? Consequuntur aspernatur at.
                                        </p>
                                    </li>
                                </ol>
                            </div>
                            <!-- .events-content -->
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Basic Card</h4>
            </div>
            <div class="card-content">
                <img class="img-fluid" src="{{ URL::to('public/admin/images/carousel/06.jpg') }}" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
            </div>
            <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
                <span class="float-left">3 hours ago</span>
                <span class="float-right">
                    <a href="#" class="card-link">Read More <i class="fa fa-angle-right"></i></a>
                  </span>
            </div>
        </div>
    </div>
</div>
<!--/ Basic Horizontal Timeline -->

        </div>
      </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Customizer-->
    <div class="customizer border-left-blue-grey border-left-lighten-4 d-none d-xl-block"><a class="customizer-close" href="#"><i class="ft-x font-medium-3"></i></a><a class="customizer-toggle bg-danger" href="#"><i class="ft-settings font-medium-3 fa-spin fa fa-spin fa-fw white"></i></a><div class="customizer-content p-2">
    <h4 class="text-uppercase mb-0">Theme Customizer</h4>
    <hr>
    <p>Customize & Preview in Real Time</p>
    
    <h5 class="mt-1 text-bold-500">Layout Options</h5>
    <ul class="nav nav-tabs nav-underline nav-justified layout-options">
        <li class="nav-item">
            <a class="nav-link layouts active" id="baseIcon-tab21-base" data-toggle="tab" aria-controls="tabIcon21-base" href="vertical-modern-menu-template.html#tabIcon21-base" aria-expanded="true">Layouts</a>
        </li>
        <li class="nav-item">
            <a class="nav-link navigation" id="baseIcon-tab22-base" data-toggle="tab" aria-controls="tabIcon22-base" href="vertical-modern-menu-template.html#tabIcon22-base" aria-expanded="false">Navigation</a>
        </li>
        <li class="nav-item">
            <a class="nav-link navbar" id="baseIcon-tab23-base" data-toggle="tab" aria-controls="tabIcon23-base" href="vertical-modern-menu-template.html#tabIcon23-base" aria-expanded="false">Navbar</a>
        </li>
    </ul>
    <div class="tab-content px-1 pt-1">
        <div role="tabpanel" class="tab-pane active" id="tabIcon21-base" aria-expanded="true" aria-labelledby="baseIcon-tab21-base">
            
                <div class="custom-control custom-checkbox mb-1">
                    <input type="checkbox" class="custom-control-input" name="collapsed-sidebar" id="collapsed-sidebar">
                    <label class="custom-control-label" for="collapsed-sidebar">Collapsed Menu</label>
                </div>
            
                <div class="custom-control custom-checkbox mb-1">
                    <input type="checkbox" class="custom-control-input" name="fixed-layout" id="fixed-layout">
                    <label class="custom-control-label" for="fixed-layout">Fixed Layout</label>
                </div>
            
                <div class="custom-control custom-checkbox mb-1">
                    <input type="checkbox" class="custom-control-input" name="boxed-layout" id="boxed-layout">
                    <label class="custom-control-label" for="boxed-layout">Boxed Layout</label>
                </div>

                <div class="custom-control custom-checkbox mb-1">
                    <input type="checkbox" class="custom-control-input" name="static-layout" id="static-layout">
                    <label class="custom-control-label" for="static-layout">Static Layout</label>
                </div>
            
        </div>
        <div class="tab-pane" id="tabIcon22-base" aria-labelledby="baseIcon-tab22-base">
            
                <div class="custom-control custom-checkbox mb-1">
                    <input type="checkbox" class="custom-control-input" name="native-scroll" id="native-scroll">
                    <label class="custom-control-label" for="native-scroll">Native Scroll</label>
                </div>
            
                <div class="custom-control custom-checkbox mb-1">
                    <input type="checkbox" class="custom-control-input" name="right-side-icons" id="right-side-icons">
                    <label class="custom-control-label" for="right-side-icons">Right Side Icons</label>
                </div>
            
                <div class="custom-control custom-checkbox mb-1">
                    <input type="checkbox" class="custom-control-input" name="bordered-navigation" id="bordered-navigation">
                    <label class="custom-control-label" for="bordered-navigation">Bordered Navigation</label>
                </div>
            
                <div class="custom-control custom-checkbox mb-1">
                    <input type="checkbox" class="custom-control-input" name="flipped-navigation" id="flipped-navigation">
                    <label class="custom-control-label" for="flipped-navigation">Flipped Navigation</label>
                </div>
            
                <div class="custom-control custom-checkbox mb-1">
                    <input type="checkbox" class="custom-control-input" name="collapsible-navigation" id="collapsible-navigation">
                    <label class="custom-control-label" for="collapsible-navigation">Collapsible Navigation</label>
                </div>
            
                <div class="custom-control custom-checkbox mb-1">
                    <input type="checkbox" class="custom-control-input" name="static-navigation" id="static-navigation">
                    <label class="custom-control-label" for="static-navigation">Static Navigation</label>
                </div>
            
        </div>
        <div class="tab-pane" id="tabIcon23-base" aria-labelledby="baseIcon-tab23-base">
            
                <div class="custom-control custom-checkbox mb-1">
                    <input type="checkbox" class="custom-control-input" name="brand-center" id="brand-center">
                    <label class="custom-control-label" for="brand-center">Brand Center</label>
                </div>
            
                <div class="custom-control custom-checkbox mb-1">
                    <input type="checkbox" class="custom-control-input" name="navbar-static-top" id="navbar-static-top">
                    <label class="custom-control-label" for="navbar-static-top">Static Top</label>
                </div>
            
        </div>
    </div>

    <hr>

    <h5 class="mt-1 text-bold-500">Navigation Color Options</h5>
    <ul class="nav nav-tabs nav-underline nav-justified color-options">
        <li class="nav-item">
            <a class="nav-link nav-semi-light active" id="color-opt-1" data-toggle="tab" aria-controls="clrOpt1" href="vertical-modern-menu-template.html#clrOpt1" aria-expanded="false">Semi Light</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-semi-dark" id="color-opt-2" data-toggle="tab" aria-controls="clrOpt2" href="vertical-modern-menu-template.html#clrOpt2" aria-expanded="false">Semi Dark</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-dark" id="color-opt-3" data-toggle="tab" aria-controls="clrOpt3" href="vertical-modern-menu-template.html#clrOpt3" aria-expanded="false">Dark</a>
        </li>
        <li class="nav-item">
            <a class="nav-link nav-light" id="color-opt-4" data-toggle="tab" aria-controls="clrOpt4" href="vertical-modern-menu-template.html#clrOpt4" aria-expanded="true">Light</a>
        </li>
    </ul>
    <div class="tab-content px-1 pt-1">
        <div role="tabpanel" class="tab-pane active" id="clrOpt1" aria-expanded="true" aria-labelledby="color-opt-1">
            <div class="row">
                <div class="col-6">
                    <h6>Solid</h6>
                    
                        <div class="custom-control custom-radio mb-1">
                            <input type="radio" name="nav-slight-clr" class="custom-control-input bg-blue-grey" data-bg="bg-blue-grey" id="default-solid">
                            <label class="custom-control-label" for="default-solid">Default</label>
                        </div>
                    
                        <div class="custom-control custom-radio mb-1">
                            <input type="radio" name="nav-slight-clr" class="custom-control-input bg-primary" data-bg="bg-primary" id="primary-solid">
                            <label class="custom-control-label" for="primary-solid">Primary</label>
                        </div>
                    
                        <div class="custom-control custom-radio mb-1">
                            <input type="radio" name="nav-slight-clr" class="custom-control-input bg-danger" data-bg="bg-danger" id="danger-solid">
                            <label class="custom-control-label" for="danger-solid">Danger</label>
                        </div>
                    
                        <div class="custom-control custom-radio mb-1">
                            <input type="radio" name="nav-slight-clr" class="custom-control-input bg-success" data-bg="bg-success" id="success-solid">
                            <label class="custom-control-label" for="success-solid">Success</label>
                        </div>
                    
                        <div class="custom-control custom-radio mb-1">
                            <input type="radio" name="nav-slight-clr" class="custom-control-input bg-blue" data-bg="bg-blue" id="blue">
                            <label class="custom-control-label" for="blue">Blue</label>
                        </div>
                    
                        <div class="custom-control custom-radio mb-1">
                            <input type="radio" name="nav-slight-clr" class="custom-control-input bg-cyan" data-bg="bg-cyan" id="cyan">
                            <label class="custom-control-label" for="cyan">Cyan</label>
                        </div>
                    
                        <div class="custom-control custom-radio mb-1">
                            <input type="radio" name="nav-slight-clr" class="custom-control-input bg-pink" data-bg="bg-pink" id="pink">
                            <label class="custom-control-label" for="pink">Pink</label>
                        </div>
                    
                </div>
                <div class="col-6">
                    <h6>Gradient</h6>
                    
                        <div class="custom-control custom-radio mb-1">
                            <input type="radio" name="nav-slight-clr" checked class="custom-control-input bg-blue-grey" data-bg="bg-gradient-x-grey-blue" id="bg-gradient-x-grey-blue">
                            <label class="custom-control-label" for="bg-gradient-x-grey-blue">Default</label>
                        </div>
                    
                        <div class="custom-control custom-radio mb-1">
                            <input type="radio" name="nav-slight-clr" class="custom-control-input bg-primary" data-bg="bg-gradient-x-primary" id="bg-gradient-x-primary">
                            <label class="custom-control-label" for="bg-gradient-x-primary">Primary</label>
                        </div>
                    
                        <div class="custom-control custom-radio mb-1">
                            <input type="radio" name="nav-slight-clr" class="custom-control-input bg-danger" data-bg="bg-gradient-x-danger" id="bg-gradient-x-danger">
                            <label class="custom-control-label" for="bg-gradient-x-danger">Danger</label>
                        </div>
                    
                        <div class="custom-control custom-radio mb-1">
                            <input type="radio" name="nav-slight-clr" class="custom-control-input bg-success" data-bg="bg-gradient-x-success" id="bg-gradient-x-success">
                            <label class="custom-control-label" for="bg-gradient-x-success">Success</label>
                        </div>
                    
                        <div class="custom-control custom-radio mb-1">
                            <input type="radio" name="nav-slight-clr" class="custom-control-input bg-blue" data-bg="bg-gradient-x-blue" id="bg-gradient-x-blue">
                            <label class="custom-control-label" for="bg-gradient-x-blue">Blue</label>
                        </div>
                    
                        <div class="custom-control custom-radio mb-1">
                            <input type="radio" name="nav-slight-clr" class="custom-control-input bg-cyan" data-bg="bg-gradient-x-cyan" id="bg-gradient-x-cyan">
                            <label class="custom-control-label" for="bg-gradient-x-cyan">Cyan</label>
                        </div>
                    
                        <div class="custom-control custom-radio mb-1">
                            <input type="radio" name="nav-slight-clr" class="custom-control-input bg-pink" data-bg="bg-gradient-x-pink" id="bg-gradient-x-pink">
                            <label class="custom-control-label" for="bg-gradient-x-pink">Pink</label>
                        </div>
                    
                </div>
            </div>
        </div>
        <div class="tab-pane" id="clrOpt2" aria-labelledby="color-opt-2">
            
                <div class="custom-control custom-radio mb-1">
                    <input type="radio" name="nav-sdark-clr" checked class="custom-control-input bg-default" data-bg="bg-default" id="opt-default">
                    <label class="custom-control-label" for="opt-default">Default</label>
                </div>
            
                <div class="custom-control custom-radio mb-1">
                    <input type="radio" name="nav-sdark-clr" class="custom-control-input bg-primary" data-bg="bg-primary" id="opt-primary">
                    <label class="custom-control-label" for="opt-primary">Primary</label>
                </div>
            
                <div class="custom-control custom-radio mb-1">
                    <input type="radio" name="nav-sdark-clr" class="custom-control-input bg-danger" data-bg="bg-danger" id="opt-danger">
                    <label class="custom-control-label" for="opt-danger">Danger</label>
                </div>
            
                <div class="custom-control custom-radio mb-1">
                    <input type="radio" name="nav-sdark-clr" class="custom-control-input bg-success" data-bg="bg-success" id="opt-success">
                    <label class="custom-control-label" for="opt-success">Success</label>
                </div>
            
                <div class="custom-control custom-radio mb-1">
                    <input type="radio" name="nav-sdark-clr" class="custom-control-input bg-blue" data-bg="bg-blue" id="opt-blue">
                    <label class="custom-control-label" for="opt-blue">Blue</label>
                </div>
            
                <div class="custom-control custom-radio mb-1">
                    <input type="radio" name="nav-sdark-clr" class="custom-control-input bg-cyan" data-bg="bg-cyan" id="opt-cyan">
                    <label class="custom-control-label" for="opt-cyan">Cyan</label>
                </div>
            
                <div class="custom-control custom-radio mb-1">
                    <input type="radio" name="nav-sdark-clr" class="custom-control-input bg-pink" data-bg="bg-pink" id="opt-pink">
                    <label class="custom-control-label" for="opt-pink">Pink</label>
                </div>
            
        </div>
        <div class="tab-pane" id="clrOpt3" aria-labelledby="color-opt-3">
            <div class="row">
                <div class="col-6">
                    <h3>Solid</h3>
                    
                        <div class="custom-control custom-radio mb-1">
                            <input type="radio" name="nav-dark-clr" class="custom-control-input bg-blue-grey" data-bg="bg-blue-grey" id="solid-blue-grey">
                            <label class="custom-control-label" for="solid-blue-grey">Default</label>
                        </div>
                    
                        <div class="custom-control custom-radio mb-1">
                            <input type="radio" name="nav-dark-clr" class="custom-control-input bg-primary" data-bg="bg-primary" id="solid-primary">
                            <label class="custom-control-label" for="solid-primary">Primary</label>
                        </div>
                    
                        <div class="custom-control custom-radio mb-1">
                            <input type="radio" name="nav-dark-clr" class="custom-control-input bg-danger" data-bg="bg-danger" id="solid-danger">
                            <label class="custom-control-label" for="solid-danger">Danger</label>
                        </div>
                    
                        <div class="custom-control custom-radio mb-1">
                            <input type="radio" name="nav-dark-clr" class="custom-control-input bg-success" data-bg="bg-success" id="solid-success">
                            <label class="custom-control-label" for="solid-success">Success</label>
                        </div>
                    
                        <div class="custom-control custom-radio mb-1">
                            <input type="radio" name="nav-dark-clr" class="custom-control-input bg-blue" data-bg="bg-blue" id="solid-blue">
                            <label class="custom-control-label" for="solid-blue">Blue</label>
                        </div>
                    
                        <div class="custom-control custom-radio mb-1">
                            <input type="radio" name="nav-dark-clr" class="custom-control-input bg-cyan" data-bg="bg-cyan" id="solid-cyan">
                            <label class="custom-control-label" for="solid-cyan">Cyan</label>
                        </div>
                    
                        <div class="custom-control custom-radio mb-1">
                            <input type="radio" name="nav-dark-clr" class="custom-control-input bg-pink" data-bg="bg-pink" id="solid-pink">
                            <label class="custom-control-label" for="solid-pink">Pink</label>
                        </div>
                    
                </div>

                <div class="col-6">
                    <h3>Gradient</h3>
                    
                        <div class="custom-control custom-radio mb-1">
                            <input type="radio" name="nav-dark-clr" class="custom-control-input bg-blue-grey" data-bg="bg-gradient-x-grey-blue" id="bg-gradient-x-grey-blue1">
                            <label class="custom-control-label" for="bg-gradient-x-grey-blue1">Default</label>
                        </div>
                    
                        <div class="custom-control custom-radio mb-1">
                            <input type="radio" name="nav-dark-clr" checked class="custom-control-input bg-primary" data-bg="bg-gradient-x-primary" id="bg-gradient-x-primary1">
                            <label class="custom-control-label" for="bg-gradient-x-primary1">Primary</label>
                        </div>
                    
                        <div class="custom-control custom-radio mb-1">
                            <input type="radio" name="nav-dark-clr" checked class="custom-control-input bg-danger" data-bg="bg-gradient-x-danger" id="bg-gradient-x-danger1">
                            <label class="custom-control-label" for="bg-gradient-x-danger1">Danger</label>
                        </div>
                    
                        <div class="custom-control custom-radio mb-1">
                            <input type="radio" name="nav-dark-clr" checked class="custom-control-input bg-success" data-bg="bg-gradient-x-success" id="bg-gradient-x-success1">
                            <label class="custom-control-label" for="bg-gradient-x-success1">Success</label>
                        </div>
                    
                        <div class="custom-control custom-radio mb-1">
                            <input type="radio" name="nav-dark-clr" checked class="custom-control-input bg-blue" data-bg="bg-gradient-x-blue" id="bg-gradient-x-blue1">
                            <label class="custom-control-label" for="bg-gradient-x-blue1">Blue</label>
                        </div>
                    
                        <div class="custom-control custom-radio mb-1">
                            <input type="radio" name="nav-dark-clr" checked class="custom-control-input bg-cyan" data-bg="bg-gradient-x-cyan" id="bg-gradient-x-cyan1">
                            <label class="custom-control-label" for="bg-gradient-x-cyan1">Cyan</label>
                        </div>
                    
                        <div class="custom-control custom-radio mb-1">
                            <input type="radio" name="nav-dark-clr" checked class="custom-control-input bg-pink" data-bg="bg-gradient-x-pink" id="bg-gradient-x-pink1">
                            <label class="custom-control-label" for="bg-gradient-x-pink1">Pink</label>
                        </div>
                    
                </div>
            </div>
        </div>
        <div class="tab-pane" id="clrOpt4" aria-labelledby="color-opt-4">
            
                <div class="custom-control custom-radio mb-1">
                    <input type="radio" name="nav-light-clr" class="custom-control-input bg-blue-grey" data-bg="bg-blue-grey bg-lighten-4" id="light-blue-grey">
                    <label class="custom-control-label" for="light-blue-grey">Default</label>
                </div>
            
                <div class="custom-control custom-radio mb-1">
                    <input type="radio" name="nav-light-clr" class="custom-control-input bg-primary" data-bg="bg-primary bg-lighten-4" id="light-primary">
                    <label class="custom-control-label" for="light-primary">Primary</label>
                </div>
            
                <div class="custom-control custom-radio mb-1">
                    <input type="radio" name="nav-light-clr" class="custom-control-input bg-danger" data-bg="bg-danger bg-lighten-4" id="light-danger">
                    <label class="custom-control-label" for="light-danger">Danger</label>
                </div>
            
                <div class="custom-control custom-radio mb-1">
                    <input type="radio" name="nav-light-clr" class="custom-control-input bg-success" data-bg="bg-success bg-lighten-4" id="light-success">
                    <label class="custom-control-label" for="light-success">Success</label>
                </div>
            
                <div class="custom-control custom-radio mb-1">
                    <input type="radio" name="nav-light-clr" class="custom-control-input bg-blue" data-bg="bg-blue bg-lighten-4" id="light-blue">
                    <label class="custom-control-label" for="light-blue">Blue</label>
                </div>
            
                <div class="custom-control custom-radio mb-1">
                    <input type="radio" name="nav-light-clr" class="custom-control-input bg-cyan" data-bg="bg-cyan bg-lighten-4" id="light-cyan">
                    <label class="custom-control-label" for="light-cyan">Cyan</label>
                </div>
            
                <div class="custom-control custom-radio mb-1">
                    <input type="radio" name="nav-light-clr" class="custom-control-input bg-pink" data-bg="bg-pink bg-lighten-4" id="light-pink">
                    <label class="custom-control-label" for="light-pink">Pink</label>
                </div>
            
        </div>
    </div>

    <hr>

    <h5 class="mt-1 mb-1 text-bold-500">Menu Color Options</h5>
    <div class="form-group">
        <!-- Outline Button group -->
        <div class="btn-group customizer-sidebar-options" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-outline-info" data-sidebar="menu-light">Light Menu</button>
            <button type="button" class="btn btn-outline-info" data-sidebar="menu-dark">Dark Menu</button>
        </div>
    </div>
</div>
    </div>
    <!-- End: Customizer-->

    @include('admin/layouts/includes/footer')
   
  

    <!-- BEGIN: Vendor JS-->
    {!! Html::script('public/admin/vendors/js/vendors.min.js') !!}
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    {!! Html::script('public/admin/vendors/js/charts/raphael-min.js') !!}
    {!! Html::script('public/admin/vendors/js/charts/morris.min.js') !!}
    {!! Html::script('public/admin/vendors/js/extensions/unslider-min.js') !!}
    {!! Html::script('public/admin/vendors/js/timeline/horizontal-timeline.js') !!}
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    {!! Html::script('public/admin/js/core/app-menu.min.js') !!}
    {!! Html::script('public/admin/js/core/app.min.js') !!}
    {!! Html::script('public/admin/js/scripts/customizer.min.js') !!}
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    {!! Html::script('public/admin/js/scripts/pages/dashboard-ecommerce.min.js') !!}
    <!-- END: Page JS-->







<!--script for this page-->
</body>
</html>