@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>モチ上げろ！</h1>
   
    <a href="{{ route('workouts.create') }}" class="btn btn-primary">記録する</a>
    <table class="table">
      <thead>
        <tr>
          <th>データ</th>
          <th>種目</th>
          <th>重量</th>
          <th>メモ</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      @foreach( $workouts as $workout )
        <tr>
        <td>{{$workout->date}}</td>
        <td>{{$workout->exercise}}</td>
        <td>{{$workout->value}}</td>
        <td>{{$workout->perception}}</td>
        <td>
          <a href="{{ route('workouts.edit', $workout->id) }}" class="btn btn-secondary">編集</a>
        </td>
        </tr>
      @endforeach 
      </tbody>
    </table>
  </div>
@endsection