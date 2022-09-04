@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card mb-4">
                @if (session('errorMessage'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('errorMessage') }}
                    </div>
                @endif
                <h5 class="card-header">Search for Open/Close price in specific date range</h5>
                <form class="card-body" id="formValidations" method="POST" action="{{route('search')}}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label" for="email">Email</label>
                            <input type="text" name="email" id="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" placeholder="Email" />
                            @error('email') <span class="invalid-feedback">{{$message}}</span>@enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="compay-symbol">Company Symbol</label>
                            <select id="compay-symbol" name="compay_symbol" class="select2 form-select @error('compay_symbol') is-invalid @enderror" data-allow-clear="true">
                                <option value="">Select</option>
                                @foreach($symbols as $symbol)
                                    <option value="{{$symbol->symbol}}">{{$symbol->company_name}} ({{$symbol->symbol}})</option>

                                @endforeach
                            </select>
                            @error('compay_symbol') <span class="invalid-feedback">{{$message}}</span>@enderror

                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="start-date">Start Date</label>
                            <input type="text" id="start-date" name="start_date" class="form-control date-picker @error('start_date') is-invalid @enderror"
                                placeholder="YYYY-MM-DD" />
                            @error('start_date') <span class="invalid-feedback">{{$message}}</span>@enderror

                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="end-date">End Date</label>
                            <input type="text" id="end-date" name="end_date" value="{{old('end_date') ? old('end_date',date('Y/m/d')) : ''}}" class="form-control date-picker"
                                placeholder="YYYY-MM-DD" />
                            @error('end_date') <span class="invalid-feedback" style="display: block">{{$message}}</span>@enderror

                        </div>
                    </div>
                    <div class="pt-4">
                        <button type="submit" class="btn btn-primary me-1 me-sm-3">Submit</button>
                        <button type="reset" class="btn btn-label-secondary">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

<script>
    document.addEventListener('DOMContentLoaded', function (e) {
        const fv = FormValidation.formValidation(document.getElementById('formValidations'), {
            fields: {
                email: {
                    validators: {
                        emailAddress: {
                            message: 'The value is not a valid email address',
                        },
                        notEmpty:{
                            message : 'The email field is required'
                        }
                    },
                },
                compay_symbol :{
                    validators :{
                        notEmpty :{
                            message : 'Please select Symbol'
                        }
                    }
                },
                start_date :{
                    validators :{
                        notEmpty :{
                            message : 'Please select start date'
                        }
                    }
                },
                end_date :{
                    validators :{
                        notEmpty :{
                            message : 'Please select end date'
                        }
                    }
                },

            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger(),
                bootstrap: new FormValidation.plugins.Bootstrap5(),
                submitButton: new FormValidation.plugins.SubmitButton(),
                defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                startEndDate: new FormValidation.plugins.StartEndDate({
                    format: 'YYYY/MM/DD',
                    startDate: {
                        field: 'start_date',
                        message: 'The start date must be a valid date and ealier than the end date',
                    },
                    endDate: {
                        field: 'end_date',
                        message: 'The end date must be a valid date and later than the start date',
                    },
                }),
            },
        });

        startDate =$("#start-date")
        if (startDate) {
            startDate.flatpickr({
                enableTime: false,
                dateFormat: 'Y/m/d',
                maxDate : new Date(),
                onChange: function () {
                    fv.revalidateField('start_date');
                },
            });
        }


        endDate =$("#end-date")
        if (endDate) {
            endDate.flatpickr({
                enableTime: false,
                dateFormat: 'Y/m/d',
                maxDate : new Date(),
                onChange: function () {
                    fv.revalidateField('end_date');
                },
            });
        }
    });



</script>
@endpush
