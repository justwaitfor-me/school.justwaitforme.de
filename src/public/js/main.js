const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

google.charts.load('current', { 'packages': ['corechart'] });
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

    // Set Data
    const data = google.visualization.arrayToDataTable([
        ['Contry', 'Mhl'],
        ['Italy', 54.8],
        ['France', 48.6],
        ['Spain', 44.4],
        ['USA', 23.9],
        ['Argentina', 14.5]
    ]);

    // Set Options
    const options = {
        title: 'Test Char',
        colors: ['#e0440e', '#e6693e', '#ec8f6e', '#f3b49f', '#f6c7b6'],
        backgroundColor: 'none',

        chartArea: {
            width: '90%',
            height: '90%',
            left: 0,  // adjust this value to set the left margin
            right: '50%'  // adjust this value to set the right margin
        }
    };

    // Draw
    const chart = new google.visualization.PieChart(document.getElementById('myChart'));
    chart.draw(data, options);

}

const myModal = document.getElementById('addHomeworkModal')
const myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', () => {
    myInput.focus()
})