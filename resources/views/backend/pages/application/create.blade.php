@extends('backend.app')
@section('title', 'Application Management')
@section('page_title', 'Application')

@prepend('styles')
    <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.min.css') }}">
@endprepend
@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Application Create</h3>
                </div>

                <form method="POST" action="{{ route('application.store') }}">
                    @csrf

                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="job_title">Job Title</label>
                                    <input type="text" class="form-control" value="{{ old('job_title') }}" id="job_title"
                                        name="job_title" placeholder="Enter Job Title">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="company_name">Company Name</label>
                                    <input type="text" class="form-control" value="{{ old('company_name') }}"
                                        id="company_name" name="company_name" placeholder="Enter Company Name">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="job_source">Job Source</label>
                                    <input type="text" class="form-control" id="job_source"
                                        value="{{ old('job_source') }}" name="job_source" placeholder="Enter Job Source">
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
                        </div>


                        {{-- <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="name">Contact Person Name</label>
                                    <input type="text" class="form-control" value="{{ old('name') }}"
                                        id="name" name="name[]" placeholder="Enter Person Name">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="role">Contact Person Role</label>
                                    <input type="text" class="form-control" value="{{ old('role') }}"
                                        id="role" name="role[]" placeholder="Enter Person Role">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="email">Contact Email</label>
                                    <input type="email" class="form-control" value="{{ old('email') }}"
                                        id="email" name="email[]" placeholder="Enter Email">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="text" class="form-control" value="{{ old('phone') }}"
                                        id="phone" name="phone[]" placeholder="Enter Phone Number">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="social_link">Social Link</label>
                                    <input type="text" class="form-control" value="{{ old('social_link') }}"
                                        id="social_link" name="social_link[]" placeholder="Enter Social Link">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="note">Note</label>
                                    <textarea name="note" class="form-control" id="note[]" rows="5"></textarea>
                                </div>
                            </div>
                        </div> --}}
                    </div>

                    <div class="card-footer">
                        <a href="{{ route('application.index') }}" class="btn btn-warning">Cancle</a>
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>


@endsection


@push('scripts')
    <script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(function() {
            // Summernote
            $('#job-detail').summernote({
                placeholder: 'Enter detail job application',
                tabsize: 2,
                height: 300
            })
        })
    </script>
@endpush
