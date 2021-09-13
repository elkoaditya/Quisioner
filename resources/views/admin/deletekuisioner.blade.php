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
            <div class="col l12 m12 ">
                <div class="card">
                    <div class="card-content">
                        <div class="result">
                            <h6 style="padding-bottom: 10px"><a href="#">{{$soal->name}}</a></h6>
                            <ul class="collection with-header col l4 m-4 s12" >
                                @foreach($pilgan as $pilgan)
                                    <li class="collection-item"><div>{{$pilgan->name}}<a href="#!" class="secondary-content"><i class="material-icons">autofps_select</i></a></div></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="row mt-3">
                            <div class="col l6 m12">
                                <p>Tipe Soal : <span class="teal-text lighten-2">{{$soal->type}}</span></p>
                                <p>Created‎: ‎<span class="teal-text lighten-2">{{$soal->created_at}}</span></p>
                                <p>Digunakan : <span class="teal-text lighten-2">Kuisioner</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <div class="card">
        <div class="card-title padding-1">
            <h6>Realy To delete this Quis</h6>
        </div>
        <div class="card-content">
            <p>Semua data yang tersimpan pada kuis akan di hapus permanent ! </p>
            <form action="/admin/kuisioner/delete" >
                @csrf
                <input name="id" type="hidden" value="{{$soal->id}}">
                <input type="submit" value="Delete" class="btn-block red btn-flat">
            </form>
        </div>
    </div>
@endsection
