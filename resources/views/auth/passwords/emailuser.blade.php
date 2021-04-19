@extends('layouts.login')

@section('content')


 {{ $name }} you have been successfully added to our database
<p> Email: {{ $email }} </p>
<p> Fullname: {{ $name }} </p>
<p> User Role: {{ $user_role }} </p>
<p> Status: {{ $status }} </p>

