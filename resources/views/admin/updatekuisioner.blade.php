@extends('assets.header')
@section('header', 'Home Admin')
{{--Untuk CSS--}}
@section('css')

@endsection
{{--untuk JS--}}
@section('js')

@endsection


@section('content')
    <form method="post" action="/admin/kuisioner/update">@csrf
        <input name="idSoal" value="{{$soal->id}}" type="hidden">
        <div class="card">
            <div class="card-title pt-1 pl-1 pr-1">
                Pertanyaan Kuisioner
            </div>
            <div class="card-content">
                <div class="row">
                    <div class="col s12">
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="textarea2" class="materialize-textarea" name="soal">{{$soal->name}}</textarea>
                                <label for="textarea2">Textarea</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-title pt-1 pl-1 pr-1">
                Pilihan Kuisioner
            </div>
            <div class="card-content">
                <div class="row">
                    @php $i = 0; @endphp
                    @foreach($pilgan as $pil)
                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input type="hidden" name="idPil[]" value="{{$pil->id}}">
                                    <input id="email{{$i+1}}" type="text" class="validate" name="opsi[]" value="{{$pil->name}}">
                                    <label for="email{{$i+1}}" data-error="wrong" data-success="right">Options {{$i+1}}</label>
                                    <span class="helper-text" data-error="wrong" data-success="right">Options {{$i+1}}</span>
                                </div>
                            </div>
                        </div>
                        @php $i++; @endphp
                    @endforeach
                </div>
            </div>
        </div>
        <input type="submit" value="simpan">
    </form>

@endsection
