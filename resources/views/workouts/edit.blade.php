@extends('layouts.app')

@section('content')
  <div class="container mt-3">
    <h1>修正</h1>
    <h1>ユーザーID : {{ $workout->user_id }}</h1>
    <form action="{{ route('workouts.update', $workout->id) }}" method="POST">
    @csrf 
    @method('PUT')
    <div class="form-group">
      <label for="date">日付</label>
      <input type="date" name="date" id="date" class="form-control" value="{{ $workout->date }}" required>
    </div>
    <div class="form-group">
      <label for="exercise">種目</label>
      <input type="text" name="exercise" id="exercise" class="form-control" value="{{ $workout   ->exercise }}" required>
    </div>
    <div class="form-group">
      <label for="value">重量</label>
      <input type="number" name="value" id="value" class="form-control" value="{{ $workout->value }}" required>
    </div>
    <div class="form-group">
      <label for="perception">メモ</label>
      <input type="text" name="perception" id="perception" class="form-control" value="{{ $workout->perception }}" required>
    </div>
    <button type="submit" class="btn btn-primary mt-3">変更</button>
    </form>
    <a href="{{route('workouts.index')}}" class="btn btn-warning mt-1">戻る
    </a>
  </div>
@endsection