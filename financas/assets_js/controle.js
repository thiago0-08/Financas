document.addEventListener('DOMContentLoaded', () => {
    const ctx = document.getElementById('expenseChart').getContext('2d');
    const expenseChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Salário', 'Despesas'],
        datasets: [{
          label: 'Valores',
          data: [0, 0],
          backgroundColor: ['#4caf50', '#f44336']
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  
    document.getElementById('expenseForm').addEventListener('submit', (event) => {
      event.preventDefault();
      const salary = parseFloat(document.getElementById('salary').value) || 0;
      const expenses = parseFloat(document.getElementById('expenses').value) || 0;
  
     
      expenseChart.data.datasets[0].data = [salary, expenses];
      expenseChart.update();
  
      
      const saldo = salary - expenses;
      const mensagemElemento = document.getElementById('saldoMensagem');
      
      if (saldo > 0) {
        mensagemElemento.innerHTML = `<div class="alert alert-success" role="alert">
          Seu saldo está positivo! R$${saldo.toFixed(2)}
        </div>`;
      } else if (saldo < 0) {
        mensagemElemento.innerHTML = `<div class="alert alert-danger" role="alert">
          Seu saldo está negativo!R$${Math.abs(saldo).toFixed(2)}
        </div>`;
      } else {
        mensagemElemento.innerHTML = `<div class="alert alert-info" role="alert">
          Seu saldo está equilibrado.
        </div>`;
      }
    });
  });
  