@extends('layouts.app')

@section('charthead')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
<script src="https://cdn.jsdelivr.net/npm/dayjs@1.10.4/dayjs.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns"></script>
@endsection

@section('chartmain')
<div>
    <canvas id="workoutChart" width="400" height="200"></canvas>
</div>
<script>
    // Chart.js と ChartDataLabels の統合
    Chart.register(ChartDataLabels);

    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('workoutChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! $dates->toJson() !!},
                datasets: [{
                    label: 'あなたの記録',
                    data: {!! $values->toJson() !!},
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2,
                    fill: false
                }]
            },
            options: {
                plugins: {
                    datalabels: {  // ChartDataLabels のオプションを設定
                        display: false,  // ラベルを非表示にする場合はここを設定
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.xLabel.toDateString();
                            }
                        }
                    }
                },
                scales: {
                  x: {
                            type: 'time',
                            time: {
                                parser: 'yyyy-MM-dd', // 修正箇所
                                tooltipFormat: 'PP', // 修正箇所: `date-fns`の標準フォーマット
                                unit: 'day',
                                displayFormats: {
                                    day: 'yyyy-MM-dd' // 修正箇所
                                }
                            },
                            title: {
                                display: true,
                                text: 'Date'
                            }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Value'
                        }
                    }
                }
            }
        });
    });
</script>
@endsection
@section('content')
  <div class="container">
    <h1 class="fst-italic mt-3 mb-3">モチ上げろ！</h1>
 
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