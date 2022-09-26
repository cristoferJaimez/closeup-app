const canvas = document.getElementById('myChart');
const ctx = canvas.getContext('2d');



const labels = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
];


const data = {
    labels: [
        'GOLBAL',
        'CADENA',
        'PROPIO'
    ],
    datasets: [{
        label: 'My First Dataset',
        data: [100, 20, 10],
        backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)'
        ],
        hoverOffset: 4
    }]
};

var myChart = new Chart(ctx, {
    type: 'pie',
    data: data,
});