@extends('members.layout')
@section('content')

<div class="card">
  <div class="card-header">Members Page</div>
  <div class="card-body">
        <div class="card-body">
        <h5 class="card-title">Name : {{ $members->name }}</h5>
        <p class="card-text">Address : {{ $members->address }}</p>
        <p class="card-text">Mobile : {{ $members->mobile }}</p>
  </div>
    </hr>
  </div>
</div>
