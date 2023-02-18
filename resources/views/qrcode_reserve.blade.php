@extends('layouts.parent')

@section('title')
予約情報
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('css/qrcode.css') }}">
@endpush

@section('content')

<div class="qrcode__wrap">
  <h2>予約情報</h2>
  <p>※入店の際に掲示してください</p>
  <div class="qrcode__qrcode">
    {!! QrCode::size(200)->generate(route('storemanager.find', ['reserve_id' => $reserve->id] )) !!}
  </div>
</div>

@endsection