<template>
    <canvas id="graph" width="1110" height="400"></canvas>
</template>




<script>
    export default {


        props : ['labels' ,'values'],

        mounted() {
             var data2 = {
                datasets: [
                    {
                        label: this.labels[0],
                        data: this.values[0],
                        backgroundColor:"#FF6384",
                        hoverBackgroundColor: "#FF6384",
                    }
                    ]
            };
            //var context = document.querySelector('#graph').getContext('2d');


           // Chart.defaults.global.maintainAspectRatio = false;

            const chart = new Chart(this.$el.getContext('2d'), {
                type: 'line',
                data: data2,
                options: {
                        scales: {
                            xAxes: [{
                                type: 'linear',
                                position: 'bottom',
                                ticks: {
                                    max: 1110,
                                    min: 0,
                                    
                                }
                                
                            }],
                            yAxes: [{
                                type: 'linear',
                                position: 'left',
                                ticks: {
                                  //  max: 400,
                                    min: 0,
                                    
                                }
                                
                            }]

                        },
                        showLines : false,

                    }
                
    
   

            });
            console.log(chart.generateLegend());

        }
    }
</script>