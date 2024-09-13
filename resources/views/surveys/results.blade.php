@extends('layouts.admin')

@section('main-content')
    <style>
        .chart-container {
            max-width: 400px;
            height: 300px;
        }
    </style>

    <div class="container">
        <h1>Survey Responses for {{ $survey->name }}</h1>
        <p>Total Responses: {{ $totalResponses }}</p>

        @foreach ($results as $sectionIndex => $section)
            <div class="mb-4">
                <h2>{{ $section['section'] }}</h2>
                @foreach ($section['questions'] as $questionIndex => $question)
                    <div class="mb-4">
                        <h5>{{ $question['question'] }}</h5>
                        @if ($question['type'] === 'text')
                            <ul>
                                @foreach ($question['answers'] as $answer)
                                    <li>{{ $answer }}</li>
                                @endforeach
                            </ul>
                        @elseif ($question['type'] === 'number')
                            <div class="chart-container">
                                <canvas id="chart_{{ $sectionIndex }}_{{ $questionIndex }}"></canvas>
                            </div>
                        @else
                            <div class="chart-container">
                                <canvas id="chart_{{ $sectionIndex }}_{{ $questionIndex }}"></canvas>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const results = @json($results);
            Chart.register(ChartDataLabels);

            results.forEach((section, sectionIndex) => {
                section.questions.forEach((question, questionIndex) => {
                    if (question.type === 'text') return;

                    const ctx = document.getElementById(`chart_${sectionIndex}_${questionIndex}`)
                        .getContext('2d');
                    let data = [];
                    let labels = [];
                    let backgroundColors = [];

                    if (question.type === 'radio' || question.type === 'multiselect') {
                        labels = question.options;
                        data = labels.map(option => question.answers.filter(answer => answer ===
                            option.trim()).length);
                        backgroundColors = labels.map(() =>
                            `rgba(${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, 0.2)`
                        );
                    } else if (question.type === 'range') {
                        labels = ['0', '1', '2', '3', '4', '5'];
                        data = labels.map(value => question.answers.filter(answer => answer ==
                            value).length);
                        backgroundColors = labels.map(() =>
                            `rgba(${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, 0.2)`
                        );
                    } else if (question.type === 'number') {
                        // Extract all numeric answers
                        let numericAnswers = question.answers.map(answer => parseFloat(answer));

                        // Calculate unique values and their counts
                        let uniqueValues = Array.from(new Set(numericAnswers));
                        labels = uniqueValues.map(value => value.toString());
                        data = labels.map(label => numericAnswers.filter(answer => parseFloat(
                            answer) === parseFloat(label)).length);
                        backgroundColors = labels.map(() =>
                            `rgba(${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, 0.2)`
                        );
                    }

                    new Chart(ctx, {
                        type: (question.type === 'radio' || question.type ===
                            'multiselect') ? 'pie' : 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: question.question,
                                data: data,
                                backgroundColor: backgroundColors,
                                borderColor: backgroundColors.map(color => color
                                    .replace('0.2', '1')),
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                datalabels: {
                                    color: '#000000',
                                    formatter: (value, context) => {
                                        let total = context.chart.data.datasets[0].data
                                            .reduce((sum, current) => sum + current, 0);
                                        let percentage = (value / total * 100).toFixed(
                                            2) + "%";
                                        return percentage + '\n' + value;
                                    },
                                    anchor: 'center',
                                    align: 'center',
                                    display: true,
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    ticks: {
                                        stepSize: 1
                                    }
                                }
                            }
                        }
                    });

                });
            });
        });
    </script>
@endsection
