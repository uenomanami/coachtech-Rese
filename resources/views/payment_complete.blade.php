@extends('layouts.parent')

@section('title')
stripeテスト完了
@endsection

@push('css')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
{{--
<link rel="stylesheet" href="{{ asset('css/payment.css') }}"> --}}
@endpush

@section('content')
<p class="text-center mt-5">決済が完了しました！</p>
@endsection