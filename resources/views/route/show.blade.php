@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card card-default">
                <div class="card-header">Data Alumni</div>
                <div class="card-body">
                    <table class='table table-striped'>
                        <tr>
                            <td> Nama </td>
                            <td> {{ $alumni->name }} </td>
                        </tr>
                        <tr>
                            <td> Tahun Lulus </td>
                            <td> {{ $alumni->year }} </td>
                        </tr>
                        <tr>
                            <td> Angkatan</td>
                            <td> {{ $alumni->generation}} </td>
                        </tr>
                        <tr>
                            <td> Jurusan </td>
                            <td> {{ $alumni->majors}} </td>
                        </tr>
                        <tr>
                            <td> Pekerjaan </td>
                            <td> {{ $alumni->job}} </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
