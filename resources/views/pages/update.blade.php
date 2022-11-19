@include('pages.session')
@extends('layouts.app');
@section('popup')
    
<div class="login-box" style="margin:14% auto;background-color: white">
            <div class="form-group">
                <label>Enter Approximate Date:</label>
            </div>
        <form action="/update/{{$cid}}" method="GET">
            <div class="input-group">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="date" name="date" id="date">
            </div>
            <div class="row">
            {{-- <input type="hidden" name="cid" value="{{$cid}}"> --}}
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Save</button>
            </div>
        </form>
</div>                                    
@endsection