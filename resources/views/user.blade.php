@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card container">
                <div class="card-header row">
                    <div class="col-md-4">
                        {{ __('User') }}
                    </div>

                    <div class="col-md-8">
                        <form action="user">
                            <input type="number" name="range" value="{{$range??''}}" style="float:right;" placeholder="range">
                            <input type="hidden" name="lat" class="lat" value="">
                            <input type="hidden" name="lng" class="lng" value="">
                        </form>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                @if(auth()->user()->role_id == 'A')
                                <th>Request For Delete Address</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                        @foreach( $data as $dt)
                            <tr>
                                <td>{{$dt->name}}</td>
                                <td>{{$dt->email}}</td>
                                @if(auth()->user()->role_id == 'A')
                                <td>
                                    @if( !empty($dt->UsersDeleteRequestAddress()->count()) )
                                        <a href="/userAddress/{{$dt->id}}">Check Requested</a>                                        
                                    @else 
                                        Not request
                                    @endif
                                </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
