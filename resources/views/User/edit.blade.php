@extends('layouts.master')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"></h1>
            </div>
        </div>
    </div>
</div>

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <form action="/user/{{$user->id}}/update" method="POST">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">User Edit</h3>
                    <button type="submit" href="#" class="btn btn-success btn-sm" style="float: right;  margin-left: 10px;">Update</button>
                    <a href="/users" class="btn btn-light btn-sm" style="float: right;">Back to list</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input name="name" type="text" class="form-control" value="{{$user->name}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input name="email" type="email" class="form-control" value="{{$user->email}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
          </form>
        </div>
    </div>
</<section>
@endsection
