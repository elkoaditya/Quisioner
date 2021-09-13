@extends('assets.header')
@section('header', 'Home Admin')
{{--Untuk CSS--}}
@section('css')
    <link rel="stylesheet" href="../../../app-assets/vendors/select2/select2.min.css" type="text/css">
    <link rel="stylesheet" href="../../../app-assets/vendors/select2/select2-materialize.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/form-select2.css">
@endsection
{{--untuk JS--}}
@section('js')
    <script src="../../../app-assets/vendors/select2/select2.full.min.js"></script>
    <script src="../../../app-assets/js/custom/custom-script.js"></script>
    <script src="../../../app-assets/js/scripts/form-select2.js"></script>
@endsection


@section('content')
    <div id="prefixes" class="card card card-default scrollspy">
        <div class="card-content">
            <h6>Identitas Diri</h6>
            <form method="post">
                @csrf
                <div class="row">
                    <div class="input-field col s12 l3">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="name" type="text" name="name" value="{{$profile->name ? $profile->name : ''}}">
                        <label for="name">Name</label>
                    </div>
                    <div class="input-field col s12 l3">
                        <i class="material-icons prefix">school</i>
                        <input id="nim" type="text" name="nim" value="{{$profile->nim}}">
                        <label for="nim">NIM</label>
                    </div>
                    <div class="input-field col s12 l3">
                        <i class="material-icons prefix">email</i>
                        <input id="email" type="text" name="email" value="{{$profile->email}}">
                        <label for="email">Email</label>
                    </div>
                    <div class="input-field col s12 l3">
                        <i class="material-icons prefix">subtitles</i>
                        <input id="ktp" type="text" name="ktp" value="{{$profile->ktp}}">
                        <label for="ktp">KTP / SIM</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 l3">
                        <i class="material-icons prefix">phone</i>
                        <input id="phone1" type="text" name="phone1" value="{{$profile->noHp}}">
                        <label for="phone1">No Hp 1</label>
                    </div>
                    <div class="input-field col s12 l3">
                        <i class="material-icons prefix">phone</i>
                        <input id="phone2" type="text" name="phone2" value="{{$profile->noHp2}}">
                        <label for="phone2">No Hp 2</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12 l3">
                        <i class="material-icons prefix">pin_drop</i>
                        <input id="tempat" type="text" name="tempat" value="{{$profile->tempatLahir}}">
                        <label for="tempat">Tempat Lahir</label>
                    </div>
                    <div class="input-field col s12 l3">
                        <input placeholder="2019-01-01" id="tgl" type="text" class="" name="tgl" value="{{$profile->tglLahir}}">
                        <label for="tgl">Date</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">question_answer</i>
                        <textarea id="Alamat" class="materialize-textarea" name="alamat" value="{{$profile->alamat}}">{{$profile->alamat}}</textarea>
                        <label for="Alamat">Alamat</label>
                    </div>
                    <div class="row">
                        <div class="input-field col s12 l3">
                            <i class="material-icons prefix">location_searching</i>
                            <input id="kodepos" type="number" name="kodepos" value="{{$profile->kodePos}}">
                            <label for="kodepos">Kode Pos</label>
                        </div>
                        <div class="input-field col s12 l3">
                            <select class="select2 browser-default" name="warganegara" value="{{$profile->kewarganegaraan}}">
                                <option selected >-- Warga Kenegaraam --</option>
                                <option value="wna">WNA</option>
                                <option value="wni">WNI</option>
                            </select>
                        </div>
                        <div class="input-field col s12 l3">
                            <select class="select2 browser-default" name="agama" value="{{$profile->agama}}">
                                <option selected >-- Agama --</option>
                                <option value="Budha">Budha</option>
                                <option value="KongHucu">KongHucu</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Islam">Islam</option>
                            </select>
                        </div>
                        <div class="input-field col s12 l3">
                            <select class="select2 browser-default" name="status" value="{{$profile->status}}">
                                <option selected >-- Status Marital --</option>
                                <option value="Menikah">Menikah</option>
                                <option value="elum Menikah">Belum Menikah</option>
                                <option value="Duda">Duda</option>
                                <option value="Janda">Janda</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Submit
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
