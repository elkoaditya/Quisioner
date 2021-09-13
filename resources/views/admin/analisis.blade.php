@extends('assets.header')
@section('header', 'Home Admin')
{{--Untuk CSS--}}
@section('css')
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/data-tables/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/layouts/style-horizontal.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-sidebar.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/app-contacts.css">
@endsection
{{--untuk JS--}}
@section('js')
    <script src="../../../app-assets/vendors/data-tables/js/jquery.dataTables.min.js"></script>
    <script src="../../../app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../../app-assets/vendors/data-tables/js/jquery.dataTables.min.js"></script>
    <script src="../../../app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../../app-assets/js/scripts/app-contacts.js"></script>
@endsection


@section('content')
    <div class="content-area" style="width: 100%">
        <div class="app-wrapper">
            <div class="datatable-search">
                <i class="material-icons mr-2 search-icon">search</i>
                <input type="text" placeholder="Search Contact" class="app-filter" id="global_filter">
            </div>
            <div id="button-trigger" class="card card card-default scrollspy border-radius-6 fixed-width">
                <div class="card-content p-0">
                    <table id="data-table-contact" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th class="background-image-none center-align">
                                <label>
                                    <input type="checkbox" onClick="toggle(this)" />
                                    <span></span>
                                </label>
                            </th>
                            <th>User</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Favorite</th>
                            <th>Detail</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($kuis as $m)
                            <tr>
                                <td class="center-align contact-checkbox">
                                    <label class="checkbox-label">
                                        <input type="checkbox" name="foo" />
                                        <span></span>
                                    </label>
                                </td>
                                <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-1.png" alt="avatar"></span></td>
                                <td>{{$m->name}}</td>
                                <td>{{$m->type}}</td>
                                <td>{{$m->created_by}}</td>
                                <td>{{$m->created_at}}</td>
                                <td><a href="/admin/analisis/detail/{{$m->id}}" ><i class="material-icons delete" style="color: green">open_with</i></a></td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
