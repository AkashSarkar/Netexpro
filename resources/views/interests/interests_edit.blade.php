@extends('layouts.app')

@section('content')

<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                   <form class="form-horizontal"  method="POST" action="{{ route('interests.update',[Auth::user()->id]) }}">
                        {{ csrf_field() }}
                          <input type="hidden" name="_method" value="put">

                        <div class="form-group{{ $errors->has('profession') ? ' has-error' : '' }}">
                            <label for="profession" class="col-md-4 control-label">Profession<span class="required">*</span></label>

                            <div class="col-md-6">
                                <input id="profession" type="text" class="form-control" name="profession" value="{{ $interest->profession }}" required autofocus>

                                @if ($errors->has('profession'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('profession') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('industry') ? ' has-error' : '' }}">
                            <label for="industry" class="col-md-4 control-label">Industry<span class="required">*</span></label>

                            <div class="col-md-6">
                                <input id="industry" type="text" class="form-control" name="industry" value="{{ $interest->industry }}" required autofocus>

                                @if ($errors->has('industry'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('industry') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                   Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
 </div>


 @endsection
