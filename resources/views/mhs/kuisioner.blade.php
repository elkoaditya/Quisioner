@extends('assets.header')
@section('header', 'Home Admin')
{{--Untuk CSS--}}
@section('css')

    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/page-timeline.css">
@endsection
{{--untuk JS--}}
@section('js')
    <script>
        function saveKuis(idS, idP){
            // alert("saved" + idS + idP);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                }
            });
            $.ajax({
                url: "/mhs/kuisioner",
                type: "POST",
                data: {
                    idS: idS,
                    idP: idP,
                },
                cache: false,
                success: function(dataResult){
                    console.log(dataResult);
                },
                error: function (error){
                    console.log(error)
                }
            });


        }
    </script>




@endsection


@section('content')
    <div class="section" id="blog-list">
        <div class="row">
            @foreach($fix as $s)
                <div class="col s12 m12 l12">
                    <div class="card-panel border-radius-6 mt-1 card-animation-1"  style="height: auto">
                        <h6 class="deep-purple-text text-darken-3"><a href="#">{{$s['soal']}}</a></h6>
                        <span>
                            <div class="row">
                                @foreach($s['pilgan'] as $p)
                                    <div class="col s12 m6">
                                        <p class="pt-5">
                                            <label>
                                              <input class="with-gap" name="group{{$s['id']}}" type="{{$s['type']}}" value="{{$p->id}}" onclick="saveKuis({{$s['id']}}, {{$p->id}})"
                                              @php
                                                $temp = \App\Models\jawaban::where('id_user', \Illuminate\Support\Facades\Auth::user()->id)->where('id_soal', $s['id'])->first();
                                                if ($temp != null){
                                                        if($temp['id_jawaban'] == $p->id){
                                                        echo 'checked';
                                                    }
                                                }else{

                                                }
                                              @endphp
                                              />
{{--                                              <span>--}}
{{--                                                <p>{{$p->name}}</p>--}}
{{--                                              </span>--}}
                                                <span>{{$p->name}}</span>
                                            </label>
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
