@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Basic Info') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('updateUser') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name_kana" class="col-md-4 col-form-label text-md-right">{{ __('Name Kana') }}</label>

                            <div class="col-md-6">
                                <input id="name_kana" type="text" class="form-control{{ $errors->has('name_kana') ? ' is-invalid' : '' }}" name="name_kana" value="{{ old('name_kana', $user->name_kana) }}" required autofocus>

                                @if ($errors->has('name_kana'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name_kana') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $user->name) }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email', $user->email) }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="birthday" class="col-md-4 col-form-label text-md-right">{{ __('Birthday') }}</label>

                            <div class="col-md-6">
                                <input id="birthday" type="birthday" class="form-control{{ $errors->has('birthday') ? ' is-invalid' : '' }}" name="birthday" value="{{ old('birthday', $user->birthday) }}">

                                @if ($errors->has('birthday'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('birthday') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                <input id="gender" type="gender" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" value="{{ old('gender', $user->gender) }}">

                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="zip" class="col-md-4 col-form-label text-md-right">{{ __('Zip') }}</label>

                            <div class="col-md-6">
                                <input id="zip" type="zip" class="form-control{{ $errors->has('zip') ? ' is-invalid' : '' }}" name="zip" value="{{ old('zip', $user->zip) }}">

                                @if ($errors->has('zip'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('zip') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address_kana" class="col-md-4 col-form-label text-md-right">{{ __('Address Kana') }}</label>

                            <div class="col-md-6">
                                <input id="address_kana" type="address_kana" class="form-control{{ $errors->has('address_kana') ? ' is-invalid' : '' }}" name="address_kana" value="{{ old('address_kana', $user->address_kana) }}">

                                @if ($errors->has('address_kana'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address_kana') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address', $user->address) }}">

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tel1" class="col-md-4 col-form-label text-md-right">{{ __('Tel1') }}</label>

                            <div class="col-md-6">
                                <input id="tel1" type="tel1" class="form-control{{ $errors->has('tel1') ? ' is-invalid' : '' }}" name="tel1" value="{{ old('tel1', $user->tel1) }}">

                                @if ($errors->has('tel1'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tel1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tel2" class="col-md-4 col-form-label text-md-right">{{ __('Tel2') }}</label>

                            <div class="col-md-6">
                                <input id="tel2" type="tel2" class="form-control{{ $errors->has('tel2') ? ' is-invalid' : '' }}" name="tel2" value="{{ old('tel2', $user->tel2) }}">

                                @if ($errors->has('tel2'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tel2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="fax" class="col-md-4 col-form-label text-md-right">{{ __('Fax') }}</label>

                            <div class="col-md-6">
                                <input id="fax" type="fax" class="form-control{{ $errors->has('fax') ? ' is-invalid' : '' }}" name="fax" value="{{ old('fax', $user->fax) }}">

                                @if ($errors->has('fax'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fax') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        @forelse ($resumes as $resume)
                        <div class="form-group row">
                            <label for="resume_1" class="col-md-4 col-form-label text-md-right">{{ __('Resume') }}</label>

                            <div class="input-group col-md-6">
                                <input id="resume_year_1" type="resume_year_1" class="form-control{{ $errors->has('resume_year_1') ? ' is-invalid' : '' }}" name="resume_year_1" value="{{ old('resume_year_1', $resume->resumes_date) }}">
                                <input id="resume_month_1" type="resume_month_1" class="form-control{{ $errors->has('resume_month_1') ? ' is-invalid' : '' }}" name="resume_month_1" value="{{ old('resume_month_1', $resume->resumes_date) }}">
                                <input id="resume_org_1" type="resume_org_1" class="form-control{{ $errors->has('resume_org_1') ? ' is-invalid' : '' }}" name="resume_org_1" value="{{ old('resume_org_1', $resume->resumes_organization_name) }}">
                            </div>
                        </div>
                        <?php $count = $loop->count; ?>
                        @empty
                        @endforelse
                        @for ($n = 0; $n < 11 - $count; $n++)
                        <div class="form-group row">
                            <label for="resume_1" class="col-md-4 col-form-label text-md-right">{{ __('Resume') }}</label>

                            <div class="input-group col-md-6">
                                <input id="resume_year_1" type="resume_year_1" class="form-control{{ $errors->has('resume_year_1') ? ' is-invalid' : '' }}" name="resume_year_1" value="{{ old('resume_year_1') }}">
                            </div>
                        </div>
                        @endfor

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
