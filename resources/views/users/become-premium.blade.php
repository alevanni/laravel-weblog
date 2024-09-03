

@extends('layouts.app')

@section('title', 'Manage premium membership')

@section('content')
<h1>{{$user->username}}, your current status is:</h1>
<h2>
{{ $user->premium ===1 ? "Premium" : "Basic" }}
   
</h2>
 <button> {{ $user->premium ===1 ? "Back to basic" : "Pay for premium membership" }} </button>



@endsection