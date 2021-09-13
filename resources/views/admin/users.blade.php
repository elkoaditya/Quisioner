@extends('assets.header')
{{--@section('header', 'Home Admin')--}}
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
    <div class="sidebar-left sidebar-fixed">
        <div class="sidebar">
            <div class="sidebar-content">
                <div class="sidebar-header">
                    <div class="sidebar-details">
                        <h5 class="m-0 sidebar-title"><i class="material-icons app-header-icon text-top">perm_identity</i> Mahasiswa
                        </h5>
                        <div class="mt-10 pt-2">
                            <p class="m-0 subtitle font-weight-700">Total number of Mahasiswa</p>
                            <p class="m-0 text-muted">1457 Mahasiswa</p>
                        </div>
                    </div>
                </div>
                <div id="sidebar-list" class="sidebar-menu list-group position-relative animate fadeLeft delay-1">
                    <div class="sidebar-list-padding app-sidebar sidenav" id="contact-sidenav">
                        <ul class="contact-list display-grid">
                            <li class="sidebar-title">Filters</li>
                            <li class=""><a class="text-sub modal-trigger" href="#modal1" ><i class="material-icons mr-2"> person_add </i> Tambah Mahasiswa</a></li>
                        </ul>
                    </div>
                </div>
                <a href="#" data-target="contact-sidenav" class="sidenav-trigger hide-on-large-only"><i class="material-icons">menu</i></a>
            </div>
        </div>
    </div>

    <div class="content-area content-right">
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
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($mhs as $m)
                            <tr>
                                <td class="center-align contact-checkbox">
                                    <label class="checkbox-label">
                                        <input type="checkbox" name="foo" />
                                        <span></span>
                                    </label>
                                </td>
                                <td><span class="avatar-contact avatar-online"><img src="../../../app-assets/images/avatar/avatar-1.png" alt="avatar"></span></td>
                                <td>{{$m->name}}</td>
                                <td>{{$m->nim}}</td>
                                <td>{{$m->role}}</td>
                                <td>{{$m->created_at}}</td>
                                <td><a href="/admin/users/update/{{$m->id}}"><span><i class="material-icons" style="color: green">settings_backup_restore</i></span><a/> </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div id="modal1" class="modal">
        <form method="post" action="/admin/users/add">
            @csrf
            <div class="modal-content">
                <h4>Tambah Mahasiswa</h4>
                <div class="container" style="padding-left: 40px; padding-right: 40px;">
                    <div class="row">
                        <div class="input-field">
                            <input id="last_name" type="text" class="validate" name="nim">
                            <label for="last_name">NIM</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field">
                            <input id="last_name" type="text" class="validate" name="name">
                            <label for="last_name">Nama</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat ">Cancel</a>
                <input type="submit" value="Save" class="waves-effect waves-green btn-flat ">
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">save</a>
            </div>
        </form>
    </div>
@endsection
