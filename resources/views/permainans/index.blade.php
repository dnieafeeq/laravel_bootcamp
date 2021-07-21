<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class="container py-5">
    <div class="row">
        <div class="col-6 bg-light">
            <h3>Senarai Permainan</h3>
            <ul>
                @foreach ($permainans as $permainan)
                <li style="text-transform:">{{$permainan->nama}}, RM{{$permainan->harga}}, {{$permainan->syarikat}}, {{$permainan->jenis}}, {{$permainan->pub_date}}</li>
                @endforeach
            </ul>
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
</div>

