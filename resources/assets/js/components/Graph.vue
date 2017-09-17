<template>
    <canvas id="graph" width="1000" height="500"></canvas>
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
                    },

                    {
                        label: this.labels[1],
                        data: this.values[1],
                        backgroundColor:"#000000",
                        hoverBackgroundColor: "#000000",
                    },
                    {
                        label: this.labels[2],
                        data: this.values[2],
                        backgroundColor:"#15BE1D",
                        hoverBackgroundColor: "#15BE1D",
                    },
                    {
                        label: this.labels[3],
                        data: this.values[3],
                        backgroundColor:"#152FBE",
                        hoverBackgroundColor: "#152FBE",
                    },
                    {
                        label: this.labels[4],
                        data: this.values[4],
                        backgroundColor:"#E81EBA",
                        hoverBackgroundColor: "#E81EBA",
                    },
                    {
                        label: this.labels[5],
                        data: this.values[5],
                        backgroundColor:"#727C85",
                        hoverBackgroundColor: "#727C85",
                    }
                    ]
            };
            //var context = document.querySelector('#graph').getContext('2d');


           // Chart.defaults.global.maintainAspectRatio = false;

            const chart = new Chart(this.$el.getContext('2d'), {
                type: 'bubble',
                data: data2,
                options: {
                        scales: {
                            xAxes: [{
                                ticks: {
                                    max: 75000,
                                    min: 0,
                                    stepSize: 15000
                                }
                            }]
                        }
                    }
                
    
   

            });
            console.log(chart.generateLegend());

        }
    }
</script>