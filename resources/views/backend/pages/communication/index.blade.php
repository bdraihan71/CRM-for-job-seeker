@extends('backend.app')
@section('title', 'Communication Management')
@section('page_title', 'Communication')
@prepend('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endprepend
@section('content')
    <div class="row mb-2">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Communication Logs</h3>

                    <a href="{{ route('communication.create') }}"
                        class="btn btn-block btn-primary float-right col-2">Create</a>
                </div>
                <div class="card-body">
                    <table id="application_datatable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Serial Number</th>
                                <th>Job Title</th>
                                <th>Communication Date</th>
                                <th>Communication Type</th>
                                <th>Content</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($communicationHistories as $communication)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td style="width:35%">{{ $communication->application->job_title }}</td>
                                    <td>{{ $communication->communication_date }}</td>
                                    <td>{{ $communication->communication_type }}</td>
                                    <td>{{ $communication->content }}</td>
                                    <td style="width:11%">
                                        <a href="{{route('communication.show', $communication->id)}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                        <a href="{{route('communication.edit', $communication->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                        <button class="btn btn-danger" data-toggle="modal"
                                            data-target="#delete-modal-{{ $communication->id }}"><i
                                                class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                                @include('backend.pages.common.delete_modal', [
                                    'id' => $communication->id,
                                    'route' => 'communication.destroy',
                                    'message' => 'Communication',
                                ])
                               
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Serial Number</th>
                                <th>Job Title</th>
                                <th>Communication Date</th>
                                <th>Communication Type</th>
                                <th>Content</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>


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
            $("#application_datatable").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#application_datatable_wrapper .col-md-6:eq(0)');
        });
        // slug generate
    </script>
@endpush
