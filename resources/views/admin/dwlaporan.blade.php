@extends('assets.header')
@section('header', 'Home Admin')
{{--Untuk CSS--}}
@section('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.0/css/buttons.dataTables.min.css" />

@endsection
{{--untuk JS--}}
@section('js')
    <script src="../../../app-assets/vendors/chartjs/chart.min.js"></script>
    <script src="../../../app-assets/js/custom/custom-script.js"></script>
    <script src="../../../app-assets/js/scripts/dashboard-ecommerce.js"></script>


    <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>
{{--    <script src="../../../app-assets/vendors/data-tables/js/dataTables.select.min.js"></script>--}}


    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'pdf',
                ]
            } );
        } );
    </script>
@endsection


@section('content')
    <div class="card">
        <div class="card-content">
            <table id="example" class="display nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Pertanyaan</th>
                        <th>Tipe Pertanyaan</th>
                        <th>Jawaban</th>
                        <th>Age</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($soals as $soal)
                        <tr>
                            <td>{{$soal->name}}</td>
                            <td>{{$soal->type}}</td>
                            <td>
                                @php
                                    $by = \App\Models\User::where('id', $soal->created_by)->first();
                                    echo $by->name;
                                @endphp
                            </td>
                            <td>
                                @php
                                    $pils = \App\Models\pilgan::where('id_soal', $soal->id)->get();
                                @endphp
                                <ul>
                                    @foreach($pils as $pil)
                                        <li>
                                            {{$pil->name}} : @php
                                                    $total =  \App\Models\jawaban::where('id_soal', $soal->id)->get()->count();

if ($total == null){
    $total = 0;
}else{
    $total = $total;
}
                                                    $answer = \App\Models\jawaban::where('id_soal', $soal->id)->where('id_jawaban', $pil->id)->get()->count();
if ($answer == null){
    echo 'kosong';
}else{
    echo $answer / $total * 100 . "%";
}

                                                @endphp
                                        </li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
