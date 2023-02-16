<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="webapp" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/webapp.css') }}" />
    <link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
</head>

<body>
    <!-- /.header ここから -->
<header>
        <div class="header_inner">
            <img src="{{ asset('img/posseLogo.png') }}" alt="POSSE" class="posseLogo" />
            <div class="week_number">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href=""
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        </a>

                        <form id="logout-form" action="" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
            </div>
            <nav class="header_text_container">
                <div class="report_and_posting modal-open">
                    <a href="#modal">
                        <div class="report_and_posting_text">記録・投稿</div>
                    </a>
                </div>
            </nav>
        </div>
    </header>
    <!-- /.header ここまで -->

    <!-- /.graph ここから -->
    <div class="graphs">
        <div class="graphs_left">
            <div class="study_hour">
                <div class="study_hour_card">
                    today
                    <p>{{$today_study_hours}}</p>
                    <p>hour</p>
                </div>
                <div class="study_hour_card">
                    month
                    <p>{{$month_study_hours}}</p>
                    <p>hour</p>
                </div>
                <div class="study_hour_card">
                    total
                    <p></p>
                    <p>hour</p>
                </div>
            </div>
            <div class="study_hour_graph">
                <div class="study_hour_graph_card">
                    <canvas id="bar_chart_cv" class="bar_chart">
                        <script>
                            function show_graph() {
                                var ctx = document.getElementById("bar_chart_cv").getContext('2d');
                                var myChart = new Chart(ctx, {
                                    type: "bar",
                                    data: {
                                        labels: [
                                            "", "2", "", "4", "",
                                            "6", "", "8", "", "10",
                                            "", "12", "", "14", "",
                                            "16", "", "18", "", "20",
                                            "", "22", "", "24", "",
                                            "26", "", "28", "", "30"
                                        ],
                                        datasets: [{
                                            label: "系列Ａ",
                                            data: [1,1,1,1,2,3,4,5,6,7,8
                                            ],
                                            backgroundColor: "rgba(0,112,184)",
                                            // borderColor: "rgb(0,112,184)",
                                            // borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        responsive: true,
                                        legend: {
                                            display: false
                                        },
                                        scales: { // 軸設定
                                            xAxes: [ // Ｘ軸設定
                                                {
                                                    scaleLabel: { // 軸ラベル
                                                        display: true, // 表示設定
                                                        //labelString: '横軸ラベル',    // ラベル
                                                        fontColor: "black", // 文字の色
                                                        fontSize: 16 // フォントサイズ
                                                    },
                                                    gridLines: { // 補助線
                                                        display: false,
                                                        //color: "rgba(255, 0, 0, 0.2)", // 補助線の色
                                                    },
                                                    ticks: { // 目盛り
                                                        // min: 0,                        // 最小値
                                                        // max: 30,                       // 最大値
                                                        // stepSize: 2,                   // 軸間隔
                                                        fontColor: "black", // 目盛りの色
                                                        fontSize: 5 // フォントサイズ
                                                    }
                                                }
                                            ],
                                            yAxes: [ // Ｙ軸設定
                                                {
                                                    scaleLabel: { // 軸ラベル
                                                        display: true, // 表示の有無
                                                        //labelString: '縦軸ラベル',     // ラベル
                                                        fontFamily: "sans-serif",
                                                        fontColor: "black", // 文字の色
                                                        fontFamily: "sans-serif",
                                                        fontSize: 16 // フォントサイズ
                                                    },
                                                    gridLines: { // 補助線
                                                        // display:false,
                                                        color: "rgba(255,255,255)", // 補助線の色
                                                        zeroLineColor: "black" // y=0（Ｘ軸の色）
                                                    },
                                                    ticks: { // 目盛り
                                                        min: 0, // 最小値
                                                        max: 10, // 最大値
                                                        stepSize: 2, // 軸間隔
                                                        fontColor: "black", // 目盛りの色
                                                        fontSize: 14 // フォントサイズ
                                                    }
                                                }
                                            ]
                                        }
                                    }
                                });
                            }
                            show_graph();
                        </script>
                    </canvas>
                </div>
            </div>
        </div>
        <div class="graphs_right">
            <div class="πchart">
                <div id="main" class="main"></div>
                <div class="πchart_card">
                    <div class="πchart_card_title">学習言語</div>
                    <canvas id="doughnut_chart1_cv" class="doughnut_chart"></canvas>
                </div>
                <script>
                    let dataLabelPlugin1 = {
                        afterDatasetsDraw: function(chart, easing) {
                            //To only draw at the end of animation, check for easing === 1
                            let ctx = chart.ctx;
                            chart.data.datasets.forEach(function(dataset, i) {
                                let dataSum = 0;
                                dataset.data.forEach(function(element) {
                                    dataSum += element;
                                });
                                let meta = chart.getDatasetMeta(i);
                                if (!meta.hidden) {
                                    meta.data.forEach(function(element, index) {
                                        // Draw the text in black, with the specified font
                                        ctx.fillStyle = "rgb(255, 255, 255)";
                                        let fontSize = 12;
                                        let fontStyle = "normal";
                                        let fontFamily = "Helvetica Neue";
                                        ctx.font = Chart.helpers.fontString(
                                            fontSize,
                                            fontStyle,
                                            fontFamily
                                        );
                                        // Just naively convert to string for now
                                        let labelString = chart.data.labels[index];
                                        let dataString =
                                            (
                                                Math.round((dataset.data[index] / dataSum) * 1000) /
                                                10
                                            ).toString() + "%";
                                        // Make sure alignment settings are correct
                                        ctx.textAlign = "center";
                                        ctx.textBaseline = "middle";
                                        let padding = 5;
                                        let position = element.tooltipPosition();
                                        ctx.fillText(
                                            labelString,
                                            position.x,
                                            position.y - fontSize / 2 - padding
                                        );
                                        ctx.fillText(
                                            dataString,
                                            position.x,
                                            position.y + fontSize / 2 - padding
                                        );
                                    });
                                }
                            });
                        },
                    };
                    // Chart
                    let myDoughnutChart1 = "doughnut_chart1_cv";
                    let chart = new Chart(myDoughnutChart1, {
                        type: "doughnut",
                        data: {
                            labels: ["", "", "", "", "", "", "", ""],
                            datasets: [{
                                label: "Sample",
                                backgroundColor: [
                                    "rgb(0,66,229)",
                                    "rgb(0,112,185)",
                                    "rgb(0,189,219)",
                                    "rgb(8,205,250)",
                                    "rgb(203,173,240)",
                                    "rgb(108,67,229)",
                                    "rgb(70,9,232)",
                                    "rgb(45,0,186)",
                                ],
                                data: [
                                    3,4,5,7,3,2,4,5
                                ],
                            }, ],
                        },
                        options: {
                            //  title: {
                            //      display: false,
                            //      text: "Sample"
                            //  },
                            legend: {
                                display: false,
                            },
                            maintainAspectRatio: false,
                        },
                        plugins: [dataLabelPlugin1],
                    });
                </script>
                <div class="πchart_card">
                    <div class="πchart_card_title">学習コンテンツ</div>
                    <canvas id="doughnut_chart_cv" class="doughnut_chart">
                        <script>
                            let dataLabelPlugin2 = {
                                afterDatasetsDraw: function(chart, easing) {
                                    //To only draw at the end of animation, check for easing === 1
                                    let ctx = chart.ctx;
                                    chart.data.datasets.forEach(function(dataset, i) {
                                        let dataSum = 0;
                                        dataset.data.forEach(function(element) {
                                            dataSum += element;
                                        });
                                        let meta = chart.getDatasetMeta(i);
                                        if (!meta.hidden) {
                                            meta.data.forEach(function(element, index) {
                                                // Draw the text in black, with the specified font
                                                ctx.fillStyle = "rgb(255, 255, 255)";
                                                let fontSize = 12;
                                                let fontStyle = "normal";
                                                let fontFamily = "Helvetica Neue";
                                                ctx.font = Chart.helpers.fontString(
                                                    fontSize,
                                                    fontStyle,
                                                    fontFamily
                                                );
                                                // Just naively convert to string for now
                                                let labelString = chart.data.labels[index];
                                                let dataString =
                                                    (
                                                        Math.round((dataset.data[index] / dataSum) * 1000) /
                                                        10
                                                    ).toString() + "%";
                                                // Make sure alignment settings are correct
                                                ctx.textAlign = "center";
                                                ctx.textBaseline = "middle";
                                                let padding = 5;
                                                let position = element.tooltipPosition();
                                                ctx.fillText(
                                                    labelString,
                                                    position.x,
                                                    position.y - fontSize / 2 - padding
                                                );
                                                ctx.fillText(
                                                    dataString,
                                                    position.x,
                                                    position.y + fontSize / 2 - padding
                                                );
                                            });
                                        }
                                    });
                                },
                            };
                            // Chart
                            let myDoughnutChart2 = "doughnut_chart_cv";
                            let chart2 = new Chart(myDoughnutChart2, {
                                type: "doughnut",
                                data: {
                                    labels: ["", "", "", ""],
                                    datasets: [{
                                        label: "Sample",
                                        backgroundColor: [
                                            "rgb(0,66,229)",
                                            "rgb(0,112,185)",
                                            "rgb(0,189,219)",
                                            "rgb(8,205,250)",
                                        ],
                                        data: [
                                            7,4,6,6
                                        ],
                                    }, ],
                                },
                                options: {
                                    //  title: {
                                    //      display: false,
                                    //      text: "Sample"
                                    //  },
                                    legend: {
                                        display: false,
                                    },
                                    maintainAspectRatio: false,
                                },
                                plugins: [dataLabelPlugin2],
                            });
                        </script>
                    </canvas>
                </div>
            </div>
        </div>
    </div>
    <!-- /.graph ここまで -->

    <!-- /.modal ここから -->
    <div class="modal" id="modal">
        <a href="#!" class="overlay"></a>
        <div class="modal-wrapper" id="modal_wrapper">
            <a href="#!" class="modal-close">✕</a>
            <div id="spinner_box">
                <main class="wrapper">
                    <section class="container" id="spinner_box">
                        <div class="loader-1"></div>
                    </section>
            </div>
            <div class="done" id='done'>
                <div class="awesome">AWESOME!
                </div>
                <div class="done_circle">
                    <div type="checkbox" class="done_checkbottun" name="study_content"></div>
                </div>
                <div class="done_text">記録・投稿</div>
                <div>完了しました</div>
            </div>
            <div class="modal-contents" id="modal_contents">
                <a href="#!" class="modal-close">✕</a>
                <div class="modal_left">
                    <h1>学習日</h1>
                    <input class="study_day_record" id="study_day_record" type="text"></input>
                    <h1>学習コンテンツ(複数選択可)</h1>
                    <div class="study_content_check_container">
                        <div class="study_content_check_box">
                            <div class="circle" id="circle1">
                                <div type="checkbox" class="checkbottun" id="checkbottun1" name="study_content"
                                    value="N予備校"></div>
                            </div>
                            <div class="checkbottun_text">N予備校</div>
                        </div>
                        <div class="study_content_check_box">
                            <div class="circle" id="circle2">
                                <div type="checkbox" class="checkbottun" id="checkbottun2" name="study_content"
                                    value="ドットインストール"></div>
                            </div>
                            <div class="checkbottun_text">ドットインストール</div>
                        </div>
                        <div class="study_content_check_box">
                            <div class="circle" id="circle3">
                                <div type="checkbox" class="checkbottun" id="checkbottun3" name="study_content"
                                    value="POSSE課題"></div>
                            </div>
                            <div class="checkbottun_text">POSSE課題</div>
                        </div>
                    </div>
                    <h1>学習言語(複数選択可)</h1>
                    <div class="study_language_check_container">
                        <div class="study_language_check_box">
                            <div class="circle" id="circle4">
                                <div type="checkbox" class="checkbottun" id="checkbottun4" name="study_language"
                                    value="HTML"></div>
                            </div>
                            <div class="checkbottun_text">HTML</div>
                        </div>
                        <div class="study_language_check_box">
                            <div class="circle" id="circle5">
                                <div type="checkbox" class="checkbottun" id="checkbottun5" name="study_language"
                                    value="CSS"></div>
                            </div>
                            <div class="checkbottun_text">CSS</div>
                        </div>
                        <div class="study_language_check_box">
                            <div class="circle" id="circle6">
                                <div type="checkbox" class="checkbottun" id="checkbottun6" name="study_language"
                                    value="JavaScript"></div>
                            </div>
                            <div class="checkbottun_text">JavaScript</div>
                        </div>
                        <div class="study_language_check_box">
                            <div class="circle" id="circle7">
                                <div type="checkbox" class="checkbottun" id="checkbottun7" name="study_language"
                                    value="PHP"></div>
                            </div>
                            <div class="checkbottun_text">PHP</div>
                        </div>
                        <div class="study_language_check_box">
                            <div class="circle" id="circle8">
                                <div type="checkbox" class="checkbottun" id="checkbottun8" name="study_language"
                                    value="Laravel"></div>
                            </div>
                            <div class="checkbottun_text">Laravel</div>
                        </div>
                        <div class="study_language_check_box">
                            <div class="circle" id="circle9">
                                <div type="checkbox" class="checkbottun" id="checkbottun9" name="study_language"
                                    value="SQL"></div>
                            </div>
                            <div class="checkbottun_text">SQL</div>
                        </div>
                        <div class="study_language_check_box">
                            <div class="circle" id="circle10">
                                <div type="checkbox" class="checkbottun" id="checkbottun10" name="study_language"
                                    value="SHELL"></div>
                            </div>
                            <div class="checkbottun_text">SHELL</div>
                        </div>
                        <div class="study_language_check_box">
                            <div class="circle" id="circle11">
                                <div type="checkbox" class="checkbottun" id="checkbottun11" name="study_language"
                                    value="情報システム基礎知識(その他)"></div>
                            </div>
                            <div class="checkbottun_text">情報システム基礎知識(その他)</div>
                        </div>
                    </div>
                </div>
                <div class="modal_right">
                    <h1>学習時間</h1>
                    <div class="study_hour_record"></div>
                    <h1>Twitter用コメント</h1>
                    <div class="text_area_container">
                        <textarea name="" class="textarea" id="textarea" cols="30" rows="9"></textarea>
                    </div>
                    <div class="Tweet_check_container">
                        <div class="Twitter_share_box">
                            <div class="circle" id="circle12">
                                <div type="checkbox" class="checkbottun" id="checkbottun12" name="Twitter_share"
                                    value="Twitterにシェアする"></div>
                            </div>
                            <div class="checkbottun_text">Twitterにシェアする</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="report_and_posting2_container" id="report_and_posting2_container" onclick="post">
                <div class="report_and_posting2">
                    <span>
                        記録・投稿
                    </span>
                </div>

            </div>
        </div>
    </div>
    <!-- /.modal ここまで -->
    <script src="{{ asset('js/script.js') }}"></script>