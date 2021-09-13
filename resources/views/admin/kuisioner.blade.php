@extends('assets.header')
@section('header', 'Home Admin')
{{--Untuk CSS--}}
@section('css')

@endsection
{{--untuk JS--}}
@section('js')

@endsection


@section('content')
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <p class="mb-2">Total Kuisioner ( {{count($fix)}} )</p>
                    <a class="waves-effect waves-light  btn" style="background-color: green" href="/admin/kuisioner/add"><i class="material-icons left">keyboard_hide</i> Tambah Kuisioner</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach($fix as $soal)
            @php

            @endphp
            <div class="col l12 m12 ">
                <div class="card">
                    <div class="card-content">
                        <div class="result">
                            <h6 style="padding-bottom: 10px"><a href="#">{{$soal['soal']}}</a></h6>
                            <ul class="collection with-header col l4 m-4 s12" >
                                @foreach($soal['pilgan'] as $pilgan)
                                    <li class="collection-item"><div>{{$pilgan->name}}<a href="#!" class="secondary-content"><i class="material-icons">autofps_select</i></a></div></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="row mt-3">
                            <div class="col l6 m12">
                                <p>Tipe Soal : <span class="teal-text lighten-2">{{$soal['type']}}</span></p>
                                <p>Created‎: ‎<span class="teal-text lighten-2">{{$soal['created_at']}}</span></p>
                                <p>Digunakan : <span class="teal-text lighten-2">Kuisioner</span></p>
                                <a class="mb-6 btn-floating waves-effect waves-light orange accent-2 mt-1 mr-1" href="/admin/kuesioner/update/{{$soal['id']}}">
                                    <i class="material-icons">brush</i>
                                </a>
                                <a class="mb-6 btn-floating waves-effect waves-light red accent-2 mt-1" href="/admin/kuesioner/delete/{{$soal['id']}}">
                                    <i class="material-icons">delete_forever</i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
