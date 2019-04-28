function chartRadar(graphData){
var ctx = document.getElementById('myChart').getContext('2d');
Chart.defaults.global.legend.display = false;//讓label消失
Chart.defaults.global.responsive = false;//不fit screen
graphDataNew = graphData;
// var graphData =[1,2,2,3];
chart = new Chart(ctx, {
type: 'radar',
data: {
    labels: ["力量","智力","幸運","敏捷"],
    datasets: [{
        label: "",
        backgroundColor: "rgba(107, 0, 255,0.5)",
        borderColor: '#0000ff',
        pointBackgroundColor: ['#f1c40f','#e67e22','#16a085','#2980b9'],
        pointLabelFontSize : 12,
        borderWidth: 2,
        pointBorderWidth: 17,
        pointBorderColor: ['#f1c40f','#e67e22','#16a085','#2980b9'],
        data: graphData}]
},

// 配置选项
options: {
	scale: 
	{
		ticks: 
		{
			fontSize: 12,
			beginAtZero: true,
			maxTicksLimit: 7,
			min:0,
			max:100
		},
		pointLabels:
		{
			fontSize: 20,
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
