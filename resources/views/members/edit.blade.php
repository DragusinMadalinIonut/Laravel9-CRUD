@extends('members.layout')
@section('content')

<div class="card" style="margin:20px;">
  <div class="card-header">Edit Member</div>
  <div class="card-body">
      <form action="{{ url('member/' .$member->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$member->id}}" id="id" />
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$member->name}}" class="form-control"></br>
        <label>Address</label></br>
        <input type="text" name="address" id="address" value="{{$member->address}}" class="form-control"></br>
        <label>Mobile</label></br>
        <input type="text" name="mobile" id="mobile" value="{{$member->mobile}}" class="form-control"></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
  </div>
</div>

@stop

