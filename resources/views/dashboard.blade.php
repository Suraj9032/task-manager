@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>📊 Dashboard</h2>

    <div class="row text-center">
        <div class="col-md-4">
            <div class="card p-3">
                <h4>Total Tasks</h4>
                <h2>{{ $totalTasks }}</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3">
                <h4>Total Hours Logged</h4>
                <h2>{{ $totalHours }}</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3">
                <h4>Status Breakdown</h4>
                <ul class="list-unstyled">
                    @foreach ($taskStatus as $status => $count)
                        <li><strong>{{ $status }}:</strong> {{ $count }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h5>📈 Task Status Chart</h5>
        <canvas id="taskStatusChart"></canvas>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const statusData = @json($taskStatus);

        new Chart(document.getElementById('taskStatusChart'), {
            type: 'pie',
            data: {
                labels: Object.keys(statusData),
                datasets: [{
                    label: 'Tasks',
                    data: Object.values(statusData),
                    backgroundColor: ['#f39c12', '#3498db', '#2ecc71'],
                }]
            }
        });
    });
</script>
@endsection
