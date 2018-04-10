@extends('site::layouts.app')

@section('content')

    <div class="container">
        <div class="panel panel-default col-md-10 col-md-offset-1">
            <div class="panel-heading">
                <h4>
                    <i class="glyphicon glyphicon-edit"></i> {{trans('site::site.edit_profile')}}
                </h4>
            </div>

            @include('layouts.error')
            <div class="panel-body">

                <form action="{{ route('users.update', $user->id) }}" method="POST" accept-charset="UTF-8">
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label for="name-field">{{trans('site::site.username')}}</label>
                        <input class="form-control" type="text" name="username" id="name-field" value="{{ old('username', $user->username ) }}" />
                    </div>
                    <div class="form-group">
                        <label for="email-field">{{trans('site::site.email')}}</label>
                        <input class="form-control" type="text" name="email" id="email-field" value="{{ old('email', $user->email ) }}" />
                    </div>
                    <div class="form-group">
                        <label for="introduction-field"></label>
                        <textarea name="sign" id="introduction-field" class="form-control" rows="3">{{ old('sign', $user->sign ) }}</textarea>
                    </div>
                    <div class="well well-sm">
                        <button type="submit" class="btn btn-primary">{{trans('site::site.save')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection