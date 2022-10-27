@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-header">
                    {{ __('Address') }}                    
                </div>

                <div class="card-body">
                    <form action="/userAddressCreateAction" method="post">
                        Address
                        <br>
                        <textarea name="address">
                            @if( !empty($address) )
                                {{$address}}
                            @endif
                        </textarea>
                        @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror  
                        <br>
                        Default Address
                        <br>
                        <input type="hidden" name="is_default" value="0">
                        <input type="checkbox" name="is_default" value="1">
                        <br>
                        Latitude
                        <br>
                        <input type="input" name="lat" class="@error('lat') is-invalid @enderror">
                        @error('lat')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <br>
                        Longitude
                        <br>
                        <input type="input" name="lng">
                        @error('lng')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <br>
                        <input type="submit" value="submit">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
