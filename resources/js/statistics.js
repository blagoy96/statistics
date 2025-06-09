import Chart from 'chart.js/auto';
import ChartDataLabels from 'chartjs-plugin-datalabels';
/* global Chart */
document.addEventListener('DOMContentLoaded', () => {
    // Set chart container height
    document.querySelectorAll('.chart-container').forEach(el => {
        el.style.position = 'relative';
        el.style.height = '300px';
    });

    const parseData = (id) => {
        const el = document.getElementById(id);
        return {
            el,
            labels: JSON.parse(el.dataset.labels),
            values: JSON.parse(el.dataset.values),
            colors: el.dataset.colors ? JSON.parse(el.dataset.colors) : []
        };
    };

    // Bar chart
    const investment = parseData('investmentsChart');
    new Chart(investment.el, {
        type: 'bar',
        data: {
            labels: investment.labels,
            datasets: [{
                label: 'Invested (€)',
                data: investment.values,
                borderRadius: 4,
                barPercentage: 0.6
            }]
        },
        options: {
            maintainAspectRatio: false,
            scales: {
                x: { grid: { display: false }, ticks: { font: { size: 14 } } },
                y: {
                    beginAtZero: true,
                    ticks: {
                        font: { size: 14 }
                    },
                    grid: { color: '#ececec' }
                }
            },
            plugins: {
                legend: { display: false },
                tooltip: {
                    callbacks: {
                        label: ctx => '€' + ctx.parsed.y.toLocaleString()
                    }
                }
            }
        }
    });

    // Pie chart
    const pie = parseData('portfolioChart');
    new Chart(pie.el, {
        type: 'pie',
        data: {
            labels: pie.labels,
            datasets: [{
                data: pie.values,
                backgroundColor: pie.colors,
                hoverOffset: 8
            }]
        },
        options: {
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        usePointStyle: true,
                        padding: 20,
                        font: { size: 14 }
                    }
                },
                tooltip: {
                    callbacks: {
                        label: ctx => `${ctx.label}: ${ctx.parsed}%`
                    }
                }
            }
        }
    });

    // Doughnut chart
    const donut = parseData('portfolioDonutChart');
    new Chart(donut.el, {
        type: 'doughnut',
        data: {
            labels: donut.labels,
            datasets: [{
                data: donut.values,
                backgroundColor: donut.colors,
                hoverOffset: 8
            }]
        },
        options: {
            maintainAspectRatio: false,
            cutout: '60%',
            plugins: {
                datalabels: {
                    color: '#fff',
                    font: {
                        weight: 'bold',
                        size: 13
                    },
                    anchor: 'center',
                    align: 'center',
                    clamp: true,
                    padding: 0
                },
                legend: {
                    position: 'bottom',
                    labels: {
                        usePointStyle: true,
                        padding: 20,
                        font: { size: 14 }
                    }
                },
                tooltip: {
                    callbacks: {
                        label: ctx => `${ctx.label}: ${ctx.parsed}%`
                    }
                }
            }
        },
        plugins: [ChartDataLabels]
    });
});
