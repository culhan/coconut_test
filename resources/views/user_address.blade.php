@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Address') }}</div>

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
                                    <input type="button" value="delete">
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
