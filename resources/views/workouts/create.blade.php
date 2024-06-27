@extends('layouts.app')

@section('content')
  <div class="container mt-3">
    <h1>トレーニングの記録</h1>
    <form action="{{ route('workouts.store') }}" method="POST">
    @csrf 
    <div class="form-group">
      <label for="date">日付</label>
      <input type="date" name="date" id="date" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="exercise">種目</label>
      <input type="text" name="exercise" id="exercise" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="value">重量</label>
      <input type="number" name="value" id="value" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="perception">メモ</label>
      <input type="text" name="perception" id="perception" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary mt-3">保存</button>
    </form>
    <a href="{{route('workouts.index')}}" class="btn btn-warning mt-1">戻る
    </a>
  </div>
@endsection