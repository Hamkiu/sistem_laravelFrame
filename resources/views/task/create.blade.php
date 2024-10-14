@extends('backend/layout/main')
@include('backend/layout/navbar')
@section('content')

    <div class="row">
        <div class="seperator-header layout-top-spacing">
            <h4 class="">Create Task</h4>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form class="row g-3" action="{{ route('task.store') }}" method="POST">
                @csrf
                <div class="col-12">
                    <label for="" class="form-label">Nama Task</label>
                    <input type="text" class="form-control" id="" name="nama_task" placeholder="Sila isi" value="{{ old('nama_task') }}" @error('nama_task') is-invalid @enderror>
                    @error('nama_task')
                    <span style="color: red; font-weight: 600; font-size: 9pt;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Add</button>
                    <a href="{{ route('task') }}" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection