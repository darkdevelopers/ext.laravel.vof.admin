<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">@lang('admin::login.default.login-headline')</h5>
                    {!! Form::open(array('url' => '/admin', 'class' => 'form-signin')) !!}
                        {!! Form::hidden('_method', 'POST') !!}
                        <div class="form-label-group">
                            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="@lang('admin::login.default.placeholder.email')" value="{{ old('email') }}" required autofocus>
                            <label for="email">@lang('admin::login.placeholder.email')</label>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-label-group">
                            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="@lang('admin::login.default.placeholder.password')" minlength="6" required>
                            <label for="password">@lang('admin::login.placeholder.password')</label>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="rememberPassword" name="rememberPassword" @if(old('rememberPassword') === 'on') checked @endif>
                            <label class="custom-control-label" for="rememberPassword">@lang('admin::login.default.remember-password')</label>
                        </div>
                        {!! Form::button(trans('admin::login.default.btn-sign-in'), array('class' => 'btn btn-lg btn-primary btn-block text-uppercase','type' => 'submit')) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
