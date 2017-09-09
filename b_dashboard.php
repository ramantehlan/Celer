

        <div class='group_11'>
                
                <div class="box_body " style="height:380px;">
                  <div class='box_body_top '>
                    <div class="box_heading heading_real">
                         <img src="assets/images/sales_graph.png" > 
                            Real-time processing
                    </div>
                  </div>
                        <div class="option_box_action sales_action"></div>

                        <div id='processing_box'>
                                <canvas id='processing_chart'></canvas>
                        </div>

                        <div class='details_of_processing'>

                            <div class='row_of_details'>
                                <div class='head_of_details capital'>Active Program</div> 
                                <div class='body_of_details' id='sales_content'>3</div>
                            </div>
                            <div class='row_of_details'>
                                <div class='head_of_details capital'>Network size</div> 
                                <div class='body_of_details' id='prerec_content'>2123 Devices</div>
                            </div>
                            <div class='row_of_details imp_detail'>
                                <div class='head_of_details capital'>Completed Task</div> 
                                <div class='body_of_details' id='totrec_paid_content'>5</div>
                            </div>
                           
                        </div>
                </div>


        </div>

        <div class='group_12'>

       
               <div class='cards box_body effect_slide_right_1'>
                        <div class="box_body_top">
                                <div class="box_heading small_head heading_complete">
                                    <img src="assets/images/success.png" > 
                                            Process completed
                                </div>
                        </div>
                        <div class='box_content '  >
                                490/560
                        </div>
               </div>

               <div class='cards box_body effect_slide_right_2'>
                        <div class="box_body_top">
                                <div class="box_heading small_head heading_used">
                                    <img src="assets/images/time-left.png" >
                                        Processing used
                                </div>
                        </div>
                        <div class='box_content' >
                                   50TB/200TB
                        </div>
               </div>
    
        </div>



<script type="text/javascript">
//global configuration
var legend = {
            display: true,
            position: "bottom",
            fullWidth: true,
            //onClick: null,
            //onHover: null,
            labels: {
                    boxWidth: 10,
                    fontSize: 12,
                    fontStyle: "normal",
                    fontColor: "#6B6157",
                    fontFamily: "roboto-r",
                    padding: 15,
                },
            reverse: false
        };

var legend_2 = {
            display: false
        };

var layout = {
                padding:00
        };

var title = {
            display: false,
            position: 'top',
            fullWidth: true,
            fontSize: 14,
            fontFamily: "roboto-r",
            fontColor: "#000000",
            fontStyle: "bold",
            padding: 20,
            text: '',
        };

var hover = {
                mode: "point",
                intersect: true,
                animationDuration: 300,
                onHover: null,//call the function
        };

 var animation = {
                duration: 600,
                easing: "easeOutSine",
                onProgress: null ,//function
                onComplete: null //function 
        };

  var scales = {
            
            yAxes: [{
                display: true,
                drawBorder: true,
                ticks: {
                    beginAtZero:true,
                    display: true,
                    padding:15,
                    fontSize:11, 
                    fontColor:'#777777',
                    callback: function(label, index, labels) {
                        return label +' GB';
                        
                    }
               },
                gridLines: {
                    display: true,
                    color:"#F45B69",
                    drawBorder: false,
                    zeroLineColor: "#F45B69",
                }
            }],

            xAxes: [{
                display: true,
                drawBorder: false,
                 barPercentage: 0.7,
                 ticks:{fontSize:10,
                       fontColor:'#777777',
                 },
                 gridLines: {
                    display: false,
                    color:"#F45B69",
                    drawBorder: false,
                    zeroLineColor: "#F45B69",

                }

            }]
        };


        <?php 
        $tip = "enabled: true,
            mode: 'nearest',
            intersect: true,
            position: 'average', //nearest or average
            backgroundColor: '#000',
            titleFontFamily: 'roboto-r',
            titleFontSize: 12,
            titleFontStyle: 'bold',
            titleFontColor: '#fff',
            titleSpacing: 0,
            titleMarginBottom: 5,
            bodyFontFamily: 'roboto-r',
            bodyFontSize: 13,
            bodyFontStyle: 'normal',
            bodyFontColor: '#f4f4f4',
            bodySpacing: 0,
            /*footerFontFamily: 'text-heading',
            footerFontSize
            footerFontStyle
            footerFontColor
            footerSpacing
            footerMarginTop
            */
            xPadding:20,
            yPadding:10,
            caretSize: 6,
            cornerRadius: 6,
            //multiKeyBackground: '#fff',
            displayColors: false,";

            $colorset_2 = "[
                '#D78521',
                '#E5DADA',
                '#392061',
                '#DAEFB3',
                '#E59500',
                '#003F91',
                '#3772FF',
                '#EDFF7A',
                '#C6AD94',
                '#392061',
                '#EA9E8D',
                '#85BDA6',
                '#D64550',
                '#E55812',
                '#2F4B26',
                '#EF709D',
                '#EFE7DA',
                '#5DA9E9',
                '#987284',
                '#D17B0F',
                '#F22B29',
                '#E5F4E3',
                '#F49D37',
                '#140F2D',
                '#F18F01',
                '#006E90',
                '#6D326D',
                '#A0E8AF',
                '#B0228C',
                '#E8D33F',
                '#488B49',
                '#F49D37',
                '#BF1363',
                '#1C2826',
                '#F092DD',
                '#C5E063',

            ]";

        ?>


 function tip(type){
        if(type == 'task'){
            return {
                    <?php echo $tip; ?>
                    callbacks: {
                            title: function(tooltipItem, data) {return data.labels[tooltipItem[0].index];},
                            label: function(tooltipItem, data) {
                            var value = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                            return value;
                            }
                        }

                };
        }
        else if(type == 'processing'){
                return {
                    <?php echo $tip; ?>
                    callbacks: {
                              title: function(tooltipItem, data) {return data.labels[tooltipItem[0].index];},
                              label: function(tooltipItem, data) {
                              var label = data.datasets[tooltipItem.datasetIndex].label;
                              var value = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                              return value + " GB";
                              }
                         }
            };

        }
 }


 var data = new Array();

 for(var i = 0; i < 12; i++){
    data.push(Math.floor(Math.random() * 1000));
 }

 function reload(){
    data.shift();
    data.push(Math.floor(Math.random() * 1000));

    processing_flow.data.datasets[0].data = data;
    processing_flow.update(50);
 }

 var loop = setInterval(reload , 1000)


//for font
Chart.defaults.global.defaultFontColor = "#ADADAD";
Chart.defaults.global.defaultFontFamily = "roboto-r";
Chart.defaults.global.defaultFontSize = 12;
Chart.defaults.global.defaultFontStyle = "normal";

//for chart
Chart.defaults.global.responsive = true;
Chart.defaults.global.responsiveAnimationDuration = 500;
Chart.defaults.global.maintainAspectRatio = true;
Chart.defaults.global.events = ["mousemove", "mouseout", "click", "touchstart", "touchmove", "touchend"];
Chart.defaults.global.onClick = null;
Chart.defaults.global.legendCallback = null;
Chart.defaults.global.onResize = null;


// for processing
var ctx_1 = document.getElementById("processing_chart");

var processing_flow = new Chart(ctx_1, {
    type: 'line',
    data: {
        labels:["","","","","","","","","","","",""],
        datasets: [{
            type:"line",
            label: "Real-Time Processing",
            data: data,
            fill: true,
            backgroundColor: "#563F1B",
            lineTension: 0.2,
            borderWidth:0,
            borderColor:'#33250F',
            pointRadius: 1.5,
            pointHitRadius:3,
            pointHoverRadius: 3,

            pointBorderColor: "#1C1408",
            pointBackgroundColor: "#1C1408",
            pointBorderWidth: 1,
            pointHoverBorderWidth: 2,

           /* pointHoverBackgroundColor: "#B5771B",
            pointHoverBorderColor: "#B5771B",*/
            
        }
        ] ,
        xLabels: ["","","","","","","","","","","",""] ,
        yLabels: [] ,
    },
    options: {
                hover: hover,
                animation: animation,
                legend: legend,
                layout: layout,
                scales: scales,
                title: title,
                tooltips:tip("processing")

    }
});


</script>