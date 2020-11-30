<div class="row">
    <div class="card card-default col-md-12">
        <div class="card-header">
            <h3 class="card-title h1-view">Broj prodatih kodova u poslednjih mesec dana</h3>
        </div>
        <div class="card-body">
            <div class="chart">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                    </div>
                </div>
                <canvas id="codesPerMonthSold" style="min-height: 450px; height: 450px; max-height: 450px; max-width: 100%; display: block; width: 634px;" width="634" height="250" class="chartjs-render-monitor"></canvas>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
</div>

<div class="row">
    <div class="container-fluid col-md-6">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title h1-view">Broj prodatih kodova po imenu taga</h3>
            </div>
            <div class="card-body">
                <div class="chart">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas id="customerActive" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%; display: block; width: 634px;" width="634" height="250" class="chartjs-render-monitor"></canvas>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <div class="container-fluid col-md-6">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Aktivni-Neaktivni kupci pie chart</h3>
            </div>
            <div class="card-body">
                <div class="chart">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas id="customerActivePie" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 100%; display: block; width: 634px;" width="634" height="250" class="chartjs-render-monitor"></canvas>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var url = "/codesPerMonthSold";

        $.getJSON(url, function(result) {
            var labels = result.map(function(e) {
                return e.datum;
            });

            var broj_prod = result.map(function(e) {
                return e.broj_prod;
            });

            var graph = $("#codesPerMonthSold").get(0).getContext('2d');

            createGraph(broj_prod, labels, graph, 'Broj kodova prodatih u poslednjih mesec dana', 'Broj kodova za dati dan u mesecu');
        });

        var urlActive = "/codesPerMonthPerTagSold";

        $.getJSON(urlActive, function(result) {
            var labelsActive = result.map(function(e) {
                return e.tag_name;
            });
            var numberOfCustomersActive = result.map(function(e) {
                return e.broj_prodatih;
            });

            var setData = {
                labels: labelsActive,
                datasets: [{
                    data: numberOfCustomersActive,
                    backgroundColor: ["#669911", "#119966", "#123141", "#545697", "#413873"],
                    hoverBackgroundColor: ["#66A2EB", "#FCCE56", "#FF5458", "#45FF98", "#1232FF"]
                }]
            }
            
            var graphActive = $("#customerActive").get(0).getContext('2d');

            createBarGraph(setData, labelsActive, graphActive);

        });
        //     $.getJSON(urlActive, function (result){
        //         var labelsActive = result.map(function (e){
        //             return e.active;
        //         });

        //         var numberOfCustomersActive = result.map(function (e){
        //             return e.numberOfCustomers;
        //         });

        //         var setData = {
        //             labels: labelsActive,
        //             datasets: [
        //                 {
        //                     label: "Odnos aktivnih i neaktivnih kupaca",
        //                     data: numberOfCustomersActive,
        //                     backgroundColor: ["#669911", "#119966" ],
        //                     hoverBackgroundColor: ["#66A2EB", "#FCCE56"]
        //                 }]
        //         }

        //         var graphActive = $("#customerActive").get(0).getContext('2d');
        //         var graphActivePie = $("#customerActivePie").get(0).getContext('2d');

        //         createBarGraph(setData, labelsActive, graphActive);
        //         createPieGraph(setData, labelsActive, graphActivePie);
        //     });
        // });

        function createBarGraph(setData, labelsActive, graphActive) {
            new Chart(graphActive, {
                type: 'bar',
                data: setData,
                options: {
                    legend: {
                        display: false
                    }
                }
            });
        }

        function createPieGraph(setData, labelsActive, graphActive) {
            new Chart(graphActive, {
                type: 'pie',
                data: setData
            });
        }

        function createGraph(numberOfCustomers, labels, graph, title, opisLinije) {
            new Chart(graph, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        data: numberOfCustomers,
                        label: opisLinije,
                        backgroundColor: 'rgb(173, 5, 5)',
                        borderColor: 'rgb(173, 5, 5)',
                        // textColor: white,
                        fill: false
                    }]
                },
                options: {
                    title: {
                        display: false,
                        text: title
                    },
                    scales: {
                        yAxes: [{
                            ticks: {
                                max: 20,
                                min: 0,
                            }
                        }]
                    },
                    legend: {
                        display: true
                    }
                }
            });
        }
    });
</script>