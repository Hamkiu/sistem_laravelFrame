@extends('backend/layout/main')
@include('backend/layout/navbar')
@section('content')
    <div class="row">
        <div class="seperator-header layout-top-spacing">
            <h4 class="">List of Task</h4>
        </div>
        <div>
            @if(session()->has('message'))
                <div class="alert alert-{{ session()->get('message')[0] }}">
                {{ session()->get('message')[1] }}
                </div>
            @endif
        </div>
        <div class=" text-end">
            <a href="{{ route('task.create') }}" class="btn btn-success"><i data-feather="plus"></i> Tambah</a>
        </div>
    </div>

    
    

    <div class="col-xl-12 col-lg-12 col-sm-12 layout-top-spacing layout-spacing">
        <div class="widget-content widget-content-area br-8">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">
                        <thead>
                        <tr>
                            <th class="" scope="col"><b>Id</b></th>
                            <th scope="col"><b>Nama Task</b></th>
                            <th class="text-center" scope="col"><b>Tindakan</b></th>
                        </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($task as $row)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$row->nama_task}}</td>
                                    <td class="text-center">
                                        <div class="action-btns">
                                            <a href="{{route('task.edit',$row->id_task)}}" class="action-btn btn-edit bs-tooltip me-2" data-toggle="tooltip" data-placement="top" title="Edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                            </a>
                                            <a href="javascript:void(0);" onclick="confirmDelete('{{route('task.delete', $row->id_task)}}')" class="action-btn btn-delete bs-tooltip" data-toggle="tooltip" data-placement="top" title="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
        </div>
    </div>           


    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        feather.replace();
        function confirmDelete(deleteUrl) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = deleteUrl;
                }
            })
        }
    </script>
@endsection