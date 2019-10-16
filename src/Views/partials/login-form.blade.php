<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">@lang('admin::login.default.login-headline')</h5>
                    {!! Form::open(array('url' => 'admin/login', 'class' => 'form-signin')) !!}
                        {!! Form::hidden('_method', 'POST') !!}
                        <div class="form-label-group">
                            <input type="email" id="inputEmail" class="form-control" placeholder="@lang('admin::login.default.placeholder.email')" required autofocus>
                            <label for="inputEmail">@lang('admin::login.placeholder.email')</label>
                        </div>

                        <div class="form-label-group">
                            <input type="password" id="inputPassword" class="form-control" placeholder="@lang('admin::login.default.placeholder.password')" required>
                            <label for="inputPassword">@lang('admin::login.placeholder.password')</label>
                        </div>

                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="rememberPassword">
                            <label class="custom-control-label" for="rememberPassword">@lang('admin::login.default.remember-password')</label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">@lang('admin::login.default.btn-sign-in')</button>
                        {!! Form::button(trans('admin::login.default.btn-sign-in'), array('class' => 'btn btn-lg btn-primary btn-block text-uppercase','type' => 'button')) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
