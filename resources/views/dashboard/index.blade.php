
@extends('layouts.dashboard')

@section('content')
	@if (current_user()->role->name == "superuser")
	
		@include("dashboard/partials/_superuser-dashboard")
	@elseif	(current_user()->role->name == "administrator")
		@include("dashboard/partials/_admin-dashboard")
	@endif

	
@endsection



