@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Basic Info') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('updateUser') }}" enctype="multipart/form-data">
                        @csrf

                        {{-- 個人情報部分 --}}
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
                            <label for="name_kana" class="col-md-4 col-form-label text-md-right">{{ __('Name Kana') }}</label>

                            <div class="col-md-6">
                                <input id="name_kana" type="text" class="form-control{{ $errors->has('name_kana') ? ' is-invalid' : '' }}" name="name_kana" value="{{ old('name_kana', $user->name_kana) }}" required>

                                @if ($errors->has('name_kana'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name_kana') }}</strong>
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
                                <input id="birthday" type="birthday" class="form-control{{ $errors->has('birthday') ? ' is-invalid' : '' }}" name="birthday" value="{{ old('birthday', $user->birthday) }}" required>

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
                                <input id="gender" type="gender" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" value="{{ old('gender', $user->gender) }}" required>

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
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address', $user->address) }}" required>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address_kana" class="col-md-4 col-form-label text-md-right">{{ __('Address Kana') }}</label>

                            <div class="col-md-6">
                                <input id="address_kana" type="address_kana" class="form-control{{ $errors->has('address_kana') ? ' is-invalid' : '' }}" name="address_kana" value="{{ old('address_kana', $user->address_kana) }}" required>

                                @if ($errors->has('address_kana'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address_kana') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tel1" class="col-md-4 col-form-label text-md-right">{{ __('Tel') }}</label>

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
                            <label for="tel2" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }}</label>

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

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image (aspect 3:4)') }}</label>

                            <div class="col-md-6">
                                <div id="trim-border">
                                    @if ($user->img_path)
                                    <img id="img" src="{{ url('/') }}/profilepics/{{ $user->img_path }}" />
                                    @else
                                    <img id="img" src="{{ url('/') }}/person_default.png" />
                                    @endif
                                </div>
                                <input id="image" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" type="file">

                                @if ($errors->has('image'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <hr />

                        {{-- 履歴部分 --}}
                        <?php $i = 1; ?>
                        @forelse ($resumes as $resume)
                        <?php
                        $year = date('Y', strtotime($resume->resumes_date));
                        $month = date('m', strtotime($resume->resumes_date));
                        ?>
                        <div class="form-group row">
                            <label for="resume_{{ $i }}" class="col-md-4 col-form-label text-md-right">{{ __('Resume ').$i }}</label>

                            <div class="input-group col-md-6">
                                <input type="hidden" name="resume_id_{{ $i }}" value="{{ $resume->id }}">
                                <input id="resume_year_{{ $i }}" type="resume_year_{{ $i }}" class="form-control{{ $errors->has('resume_year_{$i}') ? ' is-invalid' : '' }}" name="resume_year_{{ $i }}" value="{{ old('resume_year_{$i}', $year) }}" placeholder="西暦">
                                <input id="resume_month_{{ $i }}" type="resume_month_{{ $i }}" class="form-control{{ $errors->has('resume_month_{$i}') ? ' is-invalid' : '' }}" name="resume_month_{{ $i }}" value="{{ old('resume_month_{$i}', $month) }}">
                                <input id="resume_org_{{ $i }}" type="resume_org_{{ $i }}" class="form-control{{ $errors->has('resume_org_{$i}') ? ' is-invalid' : '' }}" name="resume_org_{{ $i }}" value="{{ old('resume_org_{$i}', $resume->resumes_organization_name) }}">
                            </div>
                        </div>
                        <?php $i++; ?>
                        @empty
                        <?php $i = 0; ?>
                        @endforelse
                        <?php
                        if (empty($count)) {
                            $count = 0;
                        }
                        ?>
                        @for ($n = $i+1; $n < 12; $n++)
                        <div class="form-group row">
                            <label for="resume_{{ $n }}" class="col-md-4 col-form-label text-md-right">{{ __('Resume ').$n }}</label>

                            <div class="input-group col-md-6">
                                <input id="resume_year_{{ $n }}" type="resume_year_{{ $n }}" class="form-control{{ $errors->has('resume_year_{$n}') ? ' is-invalid' : '' }}" name="resume_year_{{ $n }}" value="{{ old('resume_year_{$n}') }}" placeholder="西暦">
                                <input id="resume_month_{{ $n }}" type="resume_month_{{ $n }}" class="form-control{{ $errors->has('resume_month_{$n}') ? ' is-invalid' : '' }}" name="resume_month_{{ $n }}" value="{{ old('resume_month_{$n}') }}">
                                <input id="resume_org_{{ $n }}" type="resume_org_{{ $n }}" class="form-control{{ $errors->has('resume_org_{$n}') ? ' is-invalid' : '' }}" name="resume_org_{{ $n }}" value="{{ old('resume_org_{$n}') }}">
                            </div>
                        </div>
                        @endfor

                        <hr />

                        {{-- 資格部分 --}}
                        <?php $i = 1; ?>
                        @forelse ($licenses as $license)
                        <?php
                        $year = date('Y', strtotime($license->license_date));
                        $month = date('m', strtotime($license->license_date));
                        ?>
                        <div class="form-group row">
                            <label for="license_{{ $i }}" class="col-md-4 col-form-label text-md-right">{{ __('License ').$i }}</label>

                            <div class="input-group col-md-6">
                                <input type="hidden" name="license_id_{{ $i }}" value="{{ $license->id }}">
                                <input id="license_year_{{ $i }}" type="license_year_{{ $i }}" class="form-control{{ $errors->has('license_year_{$i}') ? ' is-invalid' : '' }}" name="license_year_{{ $i }}" value="{{ old('license_year_{$i}', $year) }}" placeholder="西暦">
                                <input id="license_month_{{ $i }}" type="license_month_{{ $i }}" class="form-control{{ $errors->has('license_month_{$i}') ? ' is-invalid' : '' }}" name="license_month_{{ $i }}" value="{{ old('license_month_{$i}', $month) }}">
                                <input id="license_detail_{{ $i }}" type="license_detail_{{ $i }}" class="form-control{{ $errors->has('license_detail_{$i}') ? ' is-invalid' : '' }}" name="license_detail_{{ $i }}" value="{{ old('license_detail_{$i}', $license->license_detail) }}">
                            </div>
                        </div>
                        <?php $i++; ?>
                        @empty
                        <?php $i = 0; ?>
                        @endforelse
                        <?php
                        if (empty($count)) {
                            $count = 0;
                        }
                        ?>
                        @for ($n = $i+1; $n < 7; $n++)
                        <div class="form-group row">
                            <label for="license_{{ $n }}" class="col-md-4 col-form-label text-md-right">{{ __('license ').$n }}</label>

                            <div class="input-group col-md-6">
                                <input id="license_year_{{ $n }}" type="license_year_{{ $n }}" class="form-control{{ $errors->has('license_year_{$n}') ? ' is-invalid' : '' }}" name="license_year_{{ $n }}" value="{{ old('license_year_{$n}') }}" placeholder="西暦">
                                <input id="license_month_{{ $n }}" type="license_month_{{ $n }}" class="form-control{{ $errors->has('license_month_{$n}') ? ' is-invalid' : '' }}" name="license_month_{{ $n }}" value="{{ old('license_month_{$n}') }}">
                                <input id="license_detail_{{ $n }}" type="license_detail_{{ $n }}" class="form-control{{ $errors->has('license_detail_{$n}') ? ' is-invalid' : '' }}" name="license_detail_{{ $n }}" value="{{ old('license_detail_{$n}') }}">
                            </div>
                        </div>
                        @endfor

                        <hr />

                        <div class="form-group row">
                            <label for="hobby" class="col-md-4 col-form-label text-md-right">{{ __('Hobby') }}</label>

                            <div class="col-md-6">
                                @if ($others)
                                <input type="hidden" name="others_id" value="{{ $others->id }}">
                                <textarea id="hobby" type="hobby" class="form-control" name="hobby" rows="5">{{ old('hobby', $others->others_hobby) }}</textarea>
                                @else
                                <textarea id="hobby" type="hobby" class="form-control" name="hobby" rows="5">{{ old('hobby') }}</textarea>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="special" class="col-md-4 col-form-label text-md-right">{{ __('Special') }}</label>

                            <div class="col-md-6">
                                @if ($others)
                                <input type="hidden" name="others_id" value="{{ $others->id }}">
                                <textarea id="special" type="special" class="form-control" name="special" rows="5">{{ old('special', $others->others_special) }}</textarea>
                                @else
                                <textarea id="special" type="special" class="form-control" name="special" rows="5">{{ old('special') }}</textarea>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="reason" class="col-md-4 col-form-label text-md-right">{{ __('Reason for application') }}</label>

                            <div class="col-md-6">
                                @if ($others)
                                <input type="hidden" name="others_id" value="{{ $others->id }}">
                                <textarea id="reason" type="reason" class="form-control" name="reason" rows="5">{{ old('reason', $others->others_reason) }}</textarea>
                                @else
                                <textarea id="reason" type="reason" class="form-control" name="reason" rows="5">{{ old('reason') }}</textarea>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pr" class="col-md-4 col-form-label text-md-right">{{ __('PR') }}</label>

                            <div class="col-md-6">
                                @if ($others)
                                <input type="hidden" name="others_id" value="{{ $others->id }}">
                                <textarea id="pr" type="pr" class="form-control" name="pr" rows="7">{{ old('pr', $others->others_pr) }}</textarea>
                                @else
                                <textarea id="pr" type="pr" class="form-control" name="pr" rows="7">{{ old('pr') }}</textarea>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="expectation" class="col-md-4 col-form-label text-md-right">{{ __('Expectation') }}</label>

                            <div class="col-md-6">
                                @if ($others)
                                <input type="hidden" name="others_id" value="{{ $others->id }}">
                                <textarea id="expectation" type="expectation" class="form-control" name="expectation" rows="4">{{ old('expectation', $others->others_expectation) }}</textarea>
                                @else
                                <textarea id="expectation" type="expectation" class="form-control" name="expectation" rows="4">{{ old('expectation') }}</textarea>
                                @endif
                            </div>
                        </div>

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
