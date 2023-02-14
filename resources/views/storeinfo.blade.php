@extends('layouts.parent')

@section('title')
店舗情報編集
@endsection

@push('css')
<link rel="stylesheet" href="{{ asset('css/storeinfo.css') }}">
@endpush

@section('content')

<div class="storeinfo__main">
  <h1>{{ $store->name }}</h1>
  <div class="storeinfo__edit">
    <form action="{{ route('storeinfo.update', ['store_id' => $store->id, 'store_name' => $store->name]) }}"
      method="POST" enctype="multipart/form-data">
      @csrf
      <input type="file" name="image_url" class="storeinfo__edit-image">
      <select name="area">
        @foreach ($areas as $area)
        <option value="{{ $area->id }}" @if( $store->area_id == $area->id ) selected @endif>{{ $area->name }}</option>
        @endforeach
      </select>
      @if ($errors->has('area'))
      <p class="validation__error-red">Error:{{$errors->first('area')}}</p>
      @endif

      <select name="category">
        @foreach ($categories as $category)
        <option value="{{ $category->id }}" @if( $store->category_id == $category->id ) selected @endif>{{
          $category->name }}</option>
        @endforeach
      </select>
      @if ($errors->has('category'))
      <p class="validation__error-red">Error:{{$errors->first('category')}}</p>
      @endif

      <textarea class="storeinfo__edit-description" name="description" id="" cols="30"
        rows="10">{{ $store->description }}</textarea>
      @if ($errors->has('description'))
      <p class="validation__error-red">Error:{{$errors->first('description')}}</p>
      @endif

      <button type="submit" name="store_id" value="{{ $store->id }}">店舗情報を変更する</button>
    </form>
  </div>
</div>
@endsection