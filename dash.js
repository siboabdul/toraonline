document.addEventListener("DOMContentLoaded", function() {
  createColumnChart();
  
  // Add event listeners to update chart on vote count change
  document.getElementById("votes-candidate1").addEventListener("DOMSubtreeModified", updateChart);
  document.getElementById("votes-candidate2").addEventListener("DOMSubtreeModified", updateChart);
  document.getElementById("votes-candidate3").addEventListener("DOMSubtreeModified", updateChart);
  document.getElementById("votes-candidate4").addEventListener("DOMSubtreeModified", updateChart);
});

function updateChart() {
  const data = {
    labels: ['PARTY A', 'PARTY B', 'PARTY C', 'PARTY D'],
    datasets: [
      {
        label: 'Performance',
        data: [
          parseInt(document.getElementById("votes-candidate1").textContent),
          parseInt(document.getElementById("votes-candidate2").textContent),
          parseInt(document.getElementById("votes-candidate3").textContent),
          parseInt(document.getElementById("votes-candidate4").textContent)
        ],
        backgroundColor: ['darkblue', 'green', 'black', 'skyblue'],
        borderColor: 'black',
        borderWidth: 1
      }
    ]
  };

  const ctx = document.getElementById('columnChart').getContext('2d');

  new Chart(ctx, {
    type: 'bar',
    data: data,
    options: {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        x: {
          beginAtZero: true
        },
        y: {
          beginAtZero: true
        }
      }
    }
  });
}

function createColumnChart() {
  const data = {
    labels: ['PARTY A', 'PARTY B', 'PARTY C', 'PARTY D'],
    datasets: [
      {
        label: 'Performance',
        data: [30, 49, 70, 80],
        backgroundColor: ['darkblue', 'green', 'black', 'skyblue'],
        borderColor: 'black',
        borderWidth: 1
      }
    ]
  };

  const ctx = document.getElementById('columnChart').getContext('2d');

  new Chart(ctx, {
    type: 'bar',
    data: data,
    options: {
      responsive: true,
      maintainAspectRatio: false,
      scales: {
        x: {
          beginAtZero: true
        },
        y: {
          beginAtZero: true
        }
      }
    }
  });
}