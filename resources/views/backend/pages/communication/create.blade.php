@extends('backend.app')
@section('title', 'Application Management')
@section('page_title', 'Application')

@prepend('styles')
    <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Application</label>
                                    <select class="custom-select select2" name="application_id">
                                        <option value="">Please select Application</option>
                                        @foreach ($applications as $id => $job_title)
                                            @if (old('application_id') == $id)
                                                <option value="{{ $id }}" selected>ID: {{ $id }} Title:
                                                    {{ $job_title }}</option>
                                            @else
                                                <option value="{{ $id }}">ID: {{ $id }} Title:
                                                    {{ $job_title }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="communication_date">Communication Date</label>
                                    <input type="date" class="form-control" value="{{ old('communication_date') }}"
                                        id="communication_date" name="communication_date">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="communication_type">Communication Type</label>
                                    <input type="text" class="form-control" value="{{ old('communication_type') }}"
                                        id="communication_type" name="communication_type"
                                        placeholder="Enter Communication Type">
                                </div>
                            </div>


                        </div>

                        <div class="form-group">
                            <label>Communication Content: </label>
                            <textarea id="content" name="content">{{ old('content') }}</textarea>
                        </div>



                    </div>

                    <div class="card-footer">
                        <a href="{{ route('communication.index') }}" class="btn btn-warning">Cancle</a>
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>


@endsection


@push('scripts')
    <script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function() {
            // Summernote
            $('#content').summernote({
                placeholder: 'Enter Communication Content',
                tabsize: 2,
                height: 300
            })

            // for select2
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })
    </script>
@endpush
