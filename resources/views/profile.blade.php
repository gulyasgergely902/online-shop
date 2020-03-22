@extends('layout')

@section('content')
	<div class="jumbotron">
		<h1>Hi, {{Auth::user()->name}}!</h1>
	</div>
	<div class="jumbotron">
		<h2>Last purchases</h2>
	</div>
@endsection