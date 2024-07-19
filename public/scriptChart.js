// import Chart from 'chart.js/auto'

window.addEventListener('DOMContentLoaded', () => {
  const ctx = document.getElementById('weatherChart').getContext('2d');

  const tableRows = document.querySelectorAll('#weatherChart-table tr');
  const labels = [];
  const data = [];

  tableRows.forEach((row, index) => {
    const cells = row.querySelectorAll('td');
    labels.push(cells[0].textContent);
    data.push(parseFloat(cells[1].textContent));
  });


  new Chart(ctx, {
    type: 'line',
    data: {
      labels: labels,
      datasets: [{
        label: 'Погода',
        data: data,
        backgroundColor: 'rgba(75, 192, 192, 0.2)',
        borderColor: 'rgba(75, 192, 192, 1)',
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        x: {
          ticks: {
            display: false
          },
          gridLines: {
            display: false
          }
        },
        y: {
          afterFit: (c) => {
            c.width = 40;
          }
        }
      },
      plugins: {
        legend: {
          display: false
        }
      }
    }

  });
});