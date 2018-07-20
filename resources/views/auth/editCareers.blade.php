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

                        {{-- Careers --}}
                        <?php $i = 1; ?>
                        @forelse ($resumes as $resume)
                        <div class="form-group row">
                            <label for="resumes_{{ $i }}" class="col-md-4 col-form-label text-md-right">{{ __('Career ').$i }}</label>

                            <div class="col-md-6">
                                <?php
                                $company_name = preg_replace("/入社/", '', $resume->resumes_organization_name);
                                ?>
                                <div>{{ $company_name }}</div>
                                <textarea id="resumes_detail_{{ $resume->id }}" type="resumes_detail_{{ $resume->id }}" class="form-control" name="resumes_detail_{{ $resume->id }}" rows="20">{{ old('resumes_detail_{$resume->id}', $resume->resumes_detail) }}</textarea>
                            </div>
                        </div>
                        <?php $i++; ?>
                        @empty
                        <?php $i = 0; ?>
                        @endforelse

                        {{-- Notes --}}
                        @forelse ($notes as $note)
                        <div class="form-group row">
                            <label for="careers_notes" class="col-md-4 col-form-label text-md-right">{{ __('Notes') }}<br>You can use pre tag.</label>

                            <div class="col-md-6">
                                <input type="hidden" name="notes_id" value="{{ $note->id }}" />
                                <textarea id="careers_notes" type="careers_notes" class="form-control" name="careers_notes" rows="20">{{ old('careers_notes', $note->careers_notes) }}</textarea>
                            </div>
                        </div>
                        @empty
                        <div class="form-group row">
                            <label for="careers_notes" class="col-md-4 col-form-label text-md-right">{{ __('Notes') }}<br>You can use pre tag.</label>

                            <div class="col-md-6">
                                <textarea id="careers_notes" type="careers_notes" class="form-control" name="careers_notes" rows="20">{{ old('careers_notes') }}</textarea>
                            </div>
                        </div>
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
