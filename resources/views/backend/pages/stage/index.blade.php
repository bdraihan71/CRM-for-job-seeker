@extends('backend.app')
@section('title', 'Application Management')
@section('page_title', 'Stage')
@prepend('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endprepend
@section('content')
    <div class="row mb-2">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Stage List</h3>

                    <button type="button" class="btn btn-block btn-primary float-right col-2" data-toggle="modal"
                        data-target="#create-stage">Create</button>
                </div>
                <div class="card-body">
                    <table id="stage_datatable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Serial Number</th>
                                <th>Stage Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stages as $stage)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $stage->stage_name }}</td>
                                    <td>
                                        <button class="btn btn-info" data-toggle="modal"
                                            data-target="#edit-stage-{{ $stage->id }}"><i
                                                class="fas fa-edit"></i></button>
                                        <button class="btn btn-danger" data-toggle="modal"
                                            data-target="#delete-modal-{{ $stage->id }}"><i
                                                class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                                @include('backend.pages.common.delete_modal', ['id' => $stage->id, 'route' => 'stage.destroy', 'message' => $stage->stage_name ])
                                @include('backend.pages.stage.common.edit_modal', ['item' => $stage])
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Serial Number</th>
                                <th>Stage Name</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>


    @include('backend.pages.stage.common.create_modal')
@endsection
@push('scripts')
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <script>
        // datatable
        $(function() {
            $("#stage_datatable").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#stage_datatable_wrapper .col-md-6:eq(0)');
        });
        // slug generate
    </script>
@endpush
