let grafico;

function atualizarGrafico1() {
    const alimentacao = parseFloat(document.getElementById('alimentacao').value) || 0;
    const transporte = parseFloat(document.getElementById('transporte').value) || 0;
    const lazer = parseFloat(document.getElementById('lazer').value) || 0;
    const outros = parseFloat(document.getElementById('outros').value) || 0;

    if (!grafico) {
        const ctx = document.getElementById('grafico').getContext('2d');
        grafico = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Alimentação', 'Transporte', 'Lazer', 'Outros'],
                datasets: [{
                    label: 'Total Gasto',
                    data: [alimentacao, transporte, lazer, outros],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    datalabels: {
                        display: true,
                        color: '#000',
                        formatter: (value, context) => `${value}`,
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    } else {
        grafico.data.datasets[0].data = [alimentacao, transporte, lazer, outros];
        grafico.update();
    }


    const totalGasto = alimentacao + transporte + lazer + outros;
    const mensagem = `Total de Gasto: R$ ${totalGasto.toFixed(2)}`;
    document.getElementById('gastoMensagem').innerText = mensagem;
}

function zerarGrafico() {
    document.getElementById('alimentacao').value = '';
    document.getElementById('transporte').value = '';
    document.getElementById('lazer').value = '';
    document.getElementById('outros').value = '';

    if (grafico) {
        grafico.data.datasets[0].data = [0, 0, 0, 0];
        grafico.update();
    }

   
    document.getElementById('gastoMensagem').innerText = '';
}

document.getElementById('expenseForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const salario = parseFloat(document.getElementById('salary').value) || 0;
    const despesas = parseFloat(document.getElementById('expenses').value) || 0;
    const saldo = salario - despesas;

    const ctx = document.getElementById('expenseChart').getContext('2d');
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Despesas', 'Saldo'],
            datasets: [{
                data: [despesas, saldo],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(75, 192, 192, 0.5)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                datalabels: {
                    display: true,
                    color: '#000',
                    formatter: (value) => `${value}`,
                }
            }
        }
    });

    const mensagem = saldo >= 0 ? `Saldo disponível: R$ ${saldo.toFixed(2)}` : `Atenção! Você está no vermelho: R$ ${Math.abs(saldo).toFixed(2)}`;
    document.getElementById('saldoMensagem').innerText = mensagem;
});
