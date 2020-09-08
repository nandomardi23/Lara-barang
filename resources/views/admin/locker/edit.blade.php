@extends('layouts.admin')

@section('title', 'Locker')

@section('content')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.css" />
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.js"></script>

<div class="col-md-8">
    <div class="card shadow">
        <div class="card-body">
            <table class="table table-sm table-bordered table-hover" id="data">
                <thead>
                    <th>No</th>
                    <th>Nama Locker</th>
                    <th>Tanggal dibuat</th>
                    <th width="200">Aksi</th>
                </thead>
                <tbody>
                    @foreach ($lockers as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->locker_name }}</td>
                        <td>{{ $data->created_at->diffForHumans() }}</td>
                        <td>
                            <a href="{{ route("locker.edit", $data->id) }}"
                                class="btn btn-sm btn-warning d-inline mr-1">
                                <i class="fas fa-edit mr-2"></i>edit
                            </a>
                            <form action="{{ route("locker.destroy", $data->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Hapus data ini?')">
                                    <i class="fas fa-trash mr-2"></i>hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="card shadow">
        <div class="card-body">
            <div class="card-title">
                <h5>Ubah Locker</h5>
            </div>

            <form action="{{ route("locker.update", $locker->id) }}" method="POST">
                @csrf
                @method("PUT")
                <div class="form-group">
                    <label>Nama Locker</label>
                    <input type="text" name="locker_name"
                        class="form-control @error('locker_name') is-invalid @enderror"
                        value="{{ $locker->locker_name }}">
                    @error('locker_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-sm btn-primary">
                        <i class="fas fa-save mr-2"></i>ubah
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
    $('#data').DataTable();
});
</script>
@endsection
