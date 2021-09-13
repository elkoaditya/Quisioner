@extends('assets.header')
@section('header', 'Home Admin')
{{--Untuk CSS--}}
@section('css')

@endsection
{{--untuk JS--}}
@section('js')
    <script src="../../../app-assets/vendors/chartjs/chart.min.js"></script>
    <script src="../../../app-assets/js/custom/custom-script.js"></script>
    <script src="../../../app-assets/js/scripts/dashboard-ecommerce.js"></script>
@endsection


@section('content')
    <div class="row">
        <div class="col md-12 xl3 s12">
            <div class="card recent-buyers-card animate fadeUp">
                <div class="card-content">
                    <h4 class="card-title mb-0">Recent Buyers <i class="material-icons float-right">more_vert</i></h4>
                    <p class="medium-small pt-2">Today</p>
                    <ul class="collection mb-0">
                        <li class="collection-item avatar">
                            <img src="../../../app-assets/images/avatar/avatar-7.png" alt="" class="circle" />
                            <p class="font-weight-600">John Doe</p>
                            <p class="medium-small">18, January 2019</p>
                            <a href="#!" class="secondary-content"><i class="material-icons">star_border</i></a>
                        </li>
                        <li class="collection-item avatar">
                            <img src="../../../app-assets/images/avatar/avatar-3.png" alt="" class="circle" />
                            <p class="font-weight-600">Adam Garza</p>
                            <p class="medium-small">20, January 2019</p>
                            <a href="#!" class="secondary-content"><i class="material-icons">star_border</i></a>
                        </li>
                        <li class="collection-item avatar">
                            <img src="../../../app-assets/images/avatar/avatar-5.png" alt="" class="circle" />
                            <p class="font-weight-600">Jennifer Rice</p>
                            <p class="medium-small">25, January 2019</p>
                            <a href="#!" class="secondary-content"><i class="material-icons">star_border</i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="profile-card" class="card animate fadeRight">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="../../../app-assets/images/gallery/3.png" alt="user bg" />
                </div>
                <div class="card-content">
                    <img src="../../../app-assets/images/avatar/avatar-7.png" alt="" class="circle responsive-img activator card-profile-image cyan lighten-1 padding-2" />
                    <a class="btn-floating activator btn-move-up waves-effect waves-light red accent-2 z-depth-4 right">
                        <i class="material-icons">edit</i>
                    </a>
                    <h5 class="card-title activator grey-text text-darken-4">Roger Waters</h5>
                    <p><i class="material-icons profile-card-i">perm_identity</i> Project Manager</p>
                    <p><i class="material-icons profile-card-i">perm_phone_msg</i> +1 (612) 222 8989</p>
                    <p><i class="material-icons profile-card-i">email</i> yourmail@domain.com</p>
                </div>
                <div class="card-reveal">
                                            <span class="card-title grey-text text-darken-4">Roger Waters <i class="material-icons right">close</i>
                                            </span>
                    <p>Here is some more information about this card.</p>
                    <p><i class="material-icons">perm_identity</i> Project Manager</p>
                    <p><i class="material-icons">perm_phone_msg</i> +1 (612) 222 8989</p>
                    <p><i class="material-icons">email</i> yourmail@domain.com</p>
                    <p><i class="material-icons">cake</i> 18th June 1990</p>
                    <p></p>
                    <p><i class="material-icons">airplanemode_active</i> BAR - AUS</p>
                    <p></p>
                </div>
            </div>

        </div>

        <div class="col  xl9 s12 ">
            <div id="revenue-chart" class="card animate fadeUp">
                <div class="card-content">
                    <h4 class="header mt-0">
                        Kuisioner 2020/2021
                    </h4>
                    <div class="row">
                        <div class="col s12">
                            <div class="yearly-revenue-chart">
                                <canvas id="thisYearRevenue" class="firstShadow" height="50"></canvas>
                                <canvas id="lastYearRevenue" height="50"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col  xl3 s12 ">
            <div class="card padding-4 animate fadeLeft">
                <div class="row">
                    <div class="col s5 m5">
                        <h5 class="mb-0">1885</h5>
                        <p class="no-margin">New</p>
                        <p class="mb-0 pt-8">1,12,900</p>
                    </div>
                    <div class="col s7 m7 right-align">
                        <i class="material-icons background-round mt-5 mb-5 gradient-45deg-purple-amber gradient-shadow white-text">perm_identity</i>
                        <p class="mb-0">Total Clients</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
