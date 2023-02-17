@extends('layouts.parent')

@section('title')
メール
@endsection

@section('content')
<p>{{ $name }}様<br></p>

<p>
  <br>
  {{ $content }}
</p>

@endsection