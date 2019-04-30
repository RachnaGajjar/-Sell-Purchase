@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ $user->name }}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(@$user->profile->avatar)
                    <img src="../uploads/users/{{ $user->profile->avatar }}" style="width: 150; height: 150; padding-bottom: 20px; ">
                    @endif
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Name</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th>Mobile</th>
                                <td><a href="tel:+91{{ @$user->profile->mobile }}">{{ @$user->profile->mobile }}</a></td>
                            </tr>
                            @if(@$user->profile)
                            <tr>
                                <th>Gender</th>
                                <td>{{ $genders[$user->profile->gender] }}</td>
                            </tr>
                            <tr>
                                <th>Semester</th>
                                <td>{{ @$user->profile->semester }}</td>
                            </tr>
                            <tr>
                                <th>Stream</th>
                                <td>{{ @$user->profile->stream }}</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
