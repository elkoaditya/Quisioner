@extends('assets.header')
@section('header', 'Home Admin')
{{--Untuk CSS--}}
@section('css')

@endsection
{{--untuk JS--}}
@section('js')

@endsection


@section('content')
    <div class="section users-edit">
        <div class="card">
            <div class="card-title pl-1 pt-1">
                <h5>Update User</h5>
            </div>
            <div class="card-content">
                <div class="row">
                    <div class="col s12" id="account">
                        <form id="accountForm" action="/admin/users/update" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <div class="row">
                                <div class="col s12 m6">
                                    <div class="row">
                                        <div class="col s12 input-field">
                                            <input id="username" name="nim" type="text" class="validate" value="{{$user->nim}}" data-error=".errorTxt1">
                                            <label for="username">NIM</label>
                                            <small class="errorTxt1"></small>
                                        </div>
                                        <div class="col s12 input-field">
                                            <input id="name" name="name" type="text" class="validate" value="{{$user->name}}" data-error=".errorTxt2">
                                            <label for="name">Name</label>
                                            <small class="errorTxt2"></small>
                                        </div>
                                        <div class="col s12 input-field">
                                            <input id="email" name="email" type="email" class="validate" value="{{$user->created_at}}" data-error=".errorTxt3" disabled>
                                            <label for="email">Created</label>
                                            <small class="errorTxt3"></small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m6">
                                    <div class="row">
                                        <div class="col s12 input-field">
                                            <select name="role">
                                                <option
                                                @php
                                                    if($user->role == 'mhs') echo 'selected';
                                                @endphp
                                                 value="mhs">Mahasiswa</option>
                                                <option
                                                    @php
                                                        if($user->role == 'admin') echo 'selected';
                                                    @endphp
                                                 value="admin">Admin</option>
                                            </select>
                                            <label>Role</label>
                                        </div>
                                        <div class="col s12 input-field">
                                            <select disabled>
                                                <option>Active</option>
                                                <option>Banned</option>
                                                <option>Close</option>
                                            </select>
                                            <label>Status</label>
                                        </div>
                                        <div class="col s12 input-field">
                                            <input id="company" name="password" type="text" class="validate" required>
                                            <label for="company">New Password</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 display-flex justify-content-end mt-3">
                                    <button type="button" class="btn btn-light">Cancel</button>
                                    <button type="submit" class="btn indigo">Save changes</button>
                                </div>
                            </div>
                        </form>
                        <!-- users edit account form ends -->
                    </div>
                </div>
                <!-- </div> -->
            </div>
        </div>
    </div>
@endsection
