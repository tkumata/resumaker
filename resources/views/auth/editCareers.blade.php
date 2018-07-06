@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Careers') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('updateCareers') }}" enctype="multipart/form-data">
                        @csrf

                        <?php $i = 1; ?>
                        @forelse ($careers as $career)
                        <?php
                        $year = date('Y', strtotime($career->careers_date));
                        $month = date('m', strtotime($career->careers_date));
                        ?>
                        <div class="form-group row">
                            <label for="career_{{ $i }}" class="col-md-4 col-form-label text-md-right">{{ __('career ').$i }}</label>

                            <div class="input-group col-md-6">
                                <input type="hidden" name="career_id_{{ $i }}" value="{{ $career->id }}">
                                <input id="career_year_{{ $i }}" type="career_year_{{ $i }}" class="form-control{{ $errors->has('career_year_{$i}') ? ' is-invalid' : '' }}" name="career_year_{{ $i }}" value="{{ old('career_year_{$i}', $year) }}" placeholder="西暦">
                                <input id="career_month_{{ $i }}" type="career_month_{{ $i }}" class="form-control{{ $errors->has('career_month_{$i}') ? ' is-invalid' : '' }}" name="career_month_{{ $i }}" value="{{ old('career_month_{$i}', $month) }}">
                                <input id="career_org_{{ $i }}" type="career_org_{{ $i }}" class="form-control{{ $errors->has('career_org_{$i}') ? ' is-invalid' : '' }}" name="career_org_{{ $i }}" value="{{ old('career_org_{$i}', $career->careers_organization_name) }}">
                            </div>
                        </div>
                        <?php $i++; ?>
                        @empty
                        <?php $i = 0; ?>
                        @endforelse

                        {{-- submit button --}}
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
