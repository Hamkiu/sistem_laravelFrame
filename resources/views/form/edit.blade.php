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
            <form class="row g-3" action="{{ route('form.update', encode($form->id_form)) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-6">
                    <label for="" class="form-label">Nama Form</label>
                    <input type="text" class="form-control" id="" name="nama_form" placeholder="Sila isi" value="{{ $form->nama_form }}" @error('nama_form') is-invalid @enderror>
                    @error('nama_form')
                    <span style="color: red; font-weight: 600; font-size: 9pt;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="" class="form-label">Nama Form</label>
                    <select class="form-control" name="id_task" @error('id_task') is-invalid @enderror>
                        @foreach ($task as $row)
                        @php
                            $selected = ($row->id_task == $form->id_task) ? "selected" : "";
                        @endphp
                            <option value="{{ $row->id_task }} {{ $selected }}">{{ $row->nama_task }}</option>
                        @endforeach
                    </select>

                    @error('id_task')
                    <span style="color: red; font-weight: 600; font-size: 9pt;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-6">
                    <label for="" class="form-label">Gambar Form</label>
                    <input type="file" class="form-control file-upload-input" id="formFile" name="gambar_form" @error('gambar_form') is-invalid @enderror accept="image/*" onchange="viewPreview(this, 'tampilGambar')">
                    @error('nama_form')
                    <span style="color: red; font-weight: 600; font-size: 9pt;">{{ $message }}</span>
                    @enderror
                    <p></p>
                    <img id="tampilGambar" src="{{ route('storage',$form->gambar_form) }}" alt="" class="rounded-circle" width="100px" />
                </div>
                <div class="col-6">
                    <label for="" class="form-label">Isi Form</label>
                    <textarea name="isi_form" id="editor" cols="30" rows="10">{{ $form->isi_form }}</textarea>
                    @error('isi_form')
                    <span style="color: red; font-weight: 600; font-size: 9pt;">{{ $message }}</span>
                    @enderror
                </div>
                {{-- <input type="text" name="id_form" id="" value="{{ $form->id_form }}"> --}}
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Change</button>
                    <a href="{{ route('form') }}" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection