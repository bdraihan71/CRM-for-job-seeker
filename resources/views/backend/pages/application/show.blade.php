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
                    <h3 class="card-title"><b>Job Title:</b> {{ $application->job_title }}</h3>
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Job Title</label>
                                <input type="text" class="form-control" value="{{ $application->job_title }}" disabled>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Salary</label>
                                <input type="text" class="form-control"
                                    value="Min: {{ $application->salary($application->salary_range)['minSalary'] }} - Max: {{ $application->salary($application->salary_range)['maxSalary'] }}"
                                    disabled>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Application Last Date</label>
                                <input type="text" class="form-control" value="{{ $application->application_last_date }}" disabled>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="col-md-3">
                            <div class="form-group">
                                <label for="company_name">Company Name</label>
                                <input type="text" class="form-control" value="{{ old('company_name') }}"
                                    id="company_name" name="company_name" placeholder="Enter Company Name">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="job_source">Job Source</label>
                                <input type="text" class="form-control" id="job_source" value="{{ old('job_source') }}"
                                    name="job_source" placeholder="Enter Job Source">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="location">Location</label>
                                <input type="text" class="form-control" id="location" value="{{ old('location') }}"
                                    name="location" placeholder="Enter Location">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Country</label>
                                <select class="custom-select" name="country_id">
                                    <option value="">Please select country</option>
                                    @foreach ($countries as $country)
                                        @if (old('country_id') == $country->id)
                                            <option value="{{ $country->id }}" selected>{{ $country->name }}</option>
                                        @else
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Job Nature</label>
                                <select class="custom-select" name="job_nature">
                                    <option value="">Please select Job Nature</option>
                                    @foreach ($jobNatures as $key => $jobNature)
                                        @if (old('job_nature') == $key)
                                            <option value="{{ $key }}" selected>{{ $jobNature }}</option>
                                        @else
                                            <option value="{{ $key }}">{{ $jobNature }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Office Type</label>
                                <select class="custom-select" name="office_type">
                                    <option value="">Please select Office Type</option>
                                    @foreach ($officeTypes as $key => $officeType)
                                        @if (old('office_type') == $key)
                                            <option value="{{ $key }}" selected>{{ $officeType }}</option>
                                        @else
                                            <option value="{{ $key }}">{{ $officeType }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="application_last_date">Application Last Date</label>
                                <input type="date" class="form-control" value="{{ old('application_last_date') }}"
                                    id="application_last_date" name="application_last_date">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="salary_range">Salary Range</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="salary_min"
                                            value="{{ old('salary_min') }}" name="salary_min"
                                            placeholder="Enter Minimum Salary">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="salary_max"
                                            value="{{ old('salary_max') }}" name="salary_max"
                                            placeholder="Enter Maximum salary">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Detail Job Application: </label>
                        <textarea id="job-detail" name="detail">{{ old('detail') }}</textarea>
                    </div> --}}
                </div>
                <div class="card-footer">
                    <a href="{{ route('application.index') }}" class="btn btn-warning">Application List</a>
                    <a href="{{ route('application.index') }}" type="submit" class="btn btn-primary float-right">Edit</a>
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
