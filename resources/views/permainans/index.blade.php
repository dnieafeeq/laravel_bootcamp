@extends('layouts.base')

@section('content')

<div class="container py-5">
    <div class="row">
        <div class="col-6 bg-light">
            <h3>Senarai Permainan</h3>
            <table class="table table-bordered table-primary">
                <tr>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Syarikat</th>
                    <th>Jenis</th>
                    <th>Tarikh Terbit</th>
                </tr>
                @foreach ($permainans as $permainan)
                <tr>
                    <td>{{ $permainan->nama }}</td>
                    <td>RM{{ $permainan->harga }}</td>
                    <td>{{ $permainan->syarikat }}</td>
                    <td>{{ $permainan->jenis }}</td>
                    <td>{{ $permainan->pub_date }}</td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="col-6">
            <h3>Tambah Permainan</h3>
            <form method="POST" action="/permainans">
                @csrf
                <div class="form-group">
                    <label for="">Nama :</label>
                    <input class="form-control mb-3" type="text" name="nama">
                    <label for="">Harga :</label>
                    <input class="form-control mb-3" type="text" name="harga">
                    <label for="">Syarikat :</label>
                    <input class="form-control mb-3" type="text" name="syarikat">
                    <label for="">Jenis :</label>
                    <input class="form-control mb-3" type="text" name="jenis">
                    <label for="">Tarikh terbit :</label>
                    <input class="form-control mb-3" type="text" name="pub_date">
                </div>
                <input type="hidden" name="kedai_id" value=1>
                <button class="btn btn-primary" type="submit">Tambah</button>
            </form>
        </div>
    </div>
    <div class="row my-4">
        <div class="col-12">
            <h3>Data from SWAPI</h3>
            <table class="table table-bordered table-secondary">
                <tr>
                    <th>Name</th>
                    <th>Model</th>
                    <th>Manufacturer</th>
                </tr>
                @foreach ($dataAPI as $data)
                <tr>
                    <td>{{ $data['name'] }}</td>
                    <td>{{ $data['model'] }}</td>
                    <td>{{ $data['manufacturer'] }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col-9">
            <div class="container mt-5">
                <form action="{{route('muatnaikFail')}}" method="post" enctype="multipart/form-data">
                    <h3 class="text-center mb-5">Muat Naik Fail Laravel</h3>
                    @csrf
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <strong>{{ $message }}</strong>
                    </div>
                    @endif

                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="custom-file">
                        <input type="file" name="file" class="custom-file-input" id="chooseFile">
                        <label class="custom-file-label" for="chooseFile">Pilih Fail</label>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                        Muat Naik
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
