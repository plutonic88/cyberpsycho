<template>
    <canvas id="graph" width="1000" height="500"></canvas>
</template>




<script>
    export default {


        props : ['labels' ,'values'],

        mounted() {
             var data2 = {

                labels: this.labels,
                datasets: [
                    {
                        label: "Instruction durations for slides",
                        data: this.values,
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
                        
                    }
                
    
   

            });
            

        }
    }
</script>