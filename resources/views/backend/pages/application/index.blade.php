@extends('backend.app')
@section('title', 'Application Management')
@section('page_title', 'Application')
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
                    <h3 class="card-title">Application List</h3>

                    <a href="{{ route('application.create') }}"
                        class="btn btn-block btn-primary float-right col-2">Create</a>
                </div>
                <div class="card-body">
                    <table id="application_datatable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Serial Number</th>
                                <th>Country</th>
                                <th>Job Nature</th>
                                <th>Office Type</th>
                                <th>Salary Range</th>
                                <th>Last Date</th>
                                <th>Job Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($applications as $application)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $application->country->name }}</td>
                                    <td>{{ $application->matchJobNature($application->job_nature) }}</td>
                                    <td>{{ $application->matchOfficeType($application->office_type) }}</td>
                                    <td>{{ $application->salary($application->salary_range)['minSalary'] }} -
                                        {{ $application->salary($application->salary_range)['maxSalary'] }}</td>
                                    <td>{{ $application->application_last_date }}</td>
                                    <td style="width:38%">{{ $application->job_title }}</td>
                                    <td style="width:11%">
                                        <a href="{{route('application.show', $application->id)}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                        <button class="btn btn-primary" data-toggle="modal"
                                            data-target="#edit-application-{{ $application->id }}"><i
                                                class="fas fa-edit"></i></button>
                                        <button class="btn btn-danger" data-toggle="modal"
                                            data-target="#delete-modal-{{ $application->id }}"><i
                                                class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                                @include('backend.pages.common.delete_modal', [
                                    'id' => $application->id,
                                    'route' => 'application.destroy',
                                    'message' => 'Application',
                                ])
                                {{-- @include('backend.pages.application.common.edit_modal', ['item' => $application]) --}}
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Serial Number</th>
                                <th>Country</th>
                                <th>Job Nature</th>
                                <th>Office Type</th>
                                <th>Salary Range</th>
                                <th>Last Date</th>
                                <th>Job Title</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>


    @include('backend.pages.application.common.create_modal')
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
