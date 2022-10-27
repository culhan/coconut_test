@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Address') }}</div>

                <div class="card-body">
                    <form action="/userAddressCreateAction">
                        Address
                        <br>
                        <textarea name="address">
                            @if( !empty($address) )
                                {{$address}}
                            @endif
                        </textarea>
                        <input name="user_id" type="hidden" value="{{$user_id}}">    
                        <br>
                        Default Address
                        <br>
                        <input type="checkbox" name="is_default" value="1">
                        <br>
                        <input type="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
