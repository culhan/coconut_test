@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <div class="card">

                <div class="card-header">
                    {{ __('Address') }}

                    <a class="nav-link" href="/userAddressCreate" role="button" style="float:right;">
                        <input type="button" value="add">
                    </a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Address</th>
                                <th>default</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach( $data as $dt)
                            <tr>
                                <td>{{$dt->address}}</td>
                                <td>
                                    @if( $dt->is_default == 1)
                                        default
                                    @else
                                        not default
                                    @endif
                                </td>
                                <td>
                                    <input type="button" value="edit">
                                    &nbsp;
                                    @php
                                        $confirmed = false;
                                    @endphp
                                    @if( $dt->UsersDeleteRequestAddress )
                                        @if( $dt->UsersDeleteRequestAddress->is_confirmed == 1)
                                            @php
                                                $confirmed = true;
                                            @endphp
                                        @endif
                                    @endif
                                    @if(auth()->user()->role_id == 'A')
                                        <a href="/approve/{{$dt->id}}">
                                            <input type="button" value="approve">
                                        </a>
                                    @else
                                        @if( $confirmed )
                                            <a href="/userAddressDelete/{{$dt->id}}">
                                                <input type="button" value="delete">
                                            </a>
                                        @else
                                            <a href="/userAddressDeleteRequest/{{$dt->id}}">
                                                <input type="button" value="request delete">                                        
                                            </a>
                                        @endif
                                    @endif
                                    &nbsp;
                                </td>
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
