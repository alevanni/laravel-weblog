

@extends('layouts.app')

@section('title', 'Manage premium membership')

@section('content')
<h1>{{$user->username}}, your current status is:</h1>
<h2>
{{ $user->premium ===1 ? "Premium" : "Basic" }}
   
</h2>
<form action="{{ route('users.update-premium', [$user->id]) }}" method="POST"> 
   @csrf
   @method('PUT')
   <label for="Become premium">Premium</label>
   <input type="checkbox" id="premium" name="premium" value="1" />
   <button type="submit"> Pay for premium membership </button>

</form>




@endsection