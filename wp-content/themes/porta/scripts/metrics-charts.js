(function () {
  function initialiseMetricCharts() {
    if (typeof Chart === 'undefined') {
      return;
    }

    var chartContainers = document.querySelectorAll('.metrics-donut__chart');

    Array.prototype.forEach.call(chartContainers, function (container) {
      var canvas = container.querySelector('.js-metric-chart');
      if (!canvas) {
        return;
      }

      var score = parseFloat(container.getAttribute('data-score'));
      if (!isFinite(score)) {
        return;
      }

      var color = container.getAttribute('data-color') || '#f28b20';
      var context = canvas.getContext('2d');

      new Chart(context, {
        type: 'doughnut',
        data: {
          labels: ['Score', 'Rest'],
          datasets: [
            {
              data: [score, Math.max(0, 100 - score)],
              backgroundColor: [color, '#f0f0f0'],
              borderWidth: 0,
              hoverOffset: 4,
            },
          ],
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          cutout: '78%',
          plugins: {
            legend: {
              display: false,
            },
            tooltip: {
              callbacks: {
                label: function (context) {
                  if (context.dataIndex === 0) {
                    return context.parsed + '/100';
                  }

                  return null;
                },
              },
              displayColors: false,
            },
          },
        },
      });
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initialiseMetricCharts);
  } else {
    initialiseMetricCharts();
  }
})();
