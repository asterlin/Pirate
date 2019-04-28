function chartRadar(graphData){
var ctx = document.getElementById('myChart').getContext('2d');
Chart.defaults.global.legend.display = false;//讓label消失
Chart.defaults.global.responsive = true;//不fit screen
graphDataNew = graphData;
// var graphData =[1,2,2,3];
chart = new Chart(ctx, {
type: 'radar',
data: {
    labels: ["力量","智力","幸運","敏捷"],
    datasets: [{
        label: "",
        backgroundColor: "rgba(0, 255, 0,0.1)",
        borderColor: '#00ff00',
        pointBackgroundColor: ['#f1c40f','#e67e22','#16a085','#2980b9'],
        pointLabelFontSize : 20,
        borderWidth: 2,
        pointBorderWidth: 20,
        pointBorderColor: ['#f1c40f','#e67e22','#16a085','#2980b9'],
        data: graphData}]
},

// 配置选项
options: {
	scale: 
	{
		ticks: 
		{
			fontSize: 20,
			beginAtZero: true,
			maxTicksLimit: 7,
			min:0,
			max:5
		},
		pointLabels:
		{
			fontSize: 50,
			color: '#0044BB',
			boxWidth: 70
		},
		gridLines: 
		{
			color: '#009FCC'
		}
	}
}
});
}
