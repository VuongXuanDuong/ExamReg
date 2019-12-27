<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>ExamReg</title>
    <link rel="icon" href="{{asset('Logo-VNU.png')}}">
<!--<link rel="stylesheet" href="{{asset('css/style.css')}}">-->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.5/sweetalert2.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">-->

    <!-- Google icon -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="http://propeller.in/components/icons/css/google-icons.css">

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="http://propeller.in/components/typography/css/typography.css">

    <link rel="stylesheet" type="text/css" href="http://propeller.in/components/card/css/card.css">

    <link rel="stylesheet" type="text/css" href="http://propeller.in/components/button/css/button.css">

    <link rel="stylesheet" type="text/css" href="http://propeller.in/components/radio/css/radio.css">

    <link rel="stylesheet" type="text/css" href="http://propeller.in/components/radio/css/textfield.css">
    <link rel="stylesheet" type="text/css" href="http://propeller.in/components/checkbox/css/checkbox.css">

    <link rel="stylesheet" type="text/css" href="http://propeller.in/components/modal/css/modal.css">

    <link rel="stylesheet" type="text/css" href="http://propeller.in/components/typography/css/typography.css">
    <!-- Bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">

    <!-- Propeller css -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/propeller.min.css')}}">

    <!-- Propeller.date.time.picker.css -->
    <link rel="stylesheet" type="text/css"
          href="{{asset('css/components/datetimepicker/bootstrap-datetimepicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/components/datetimepicker/pmd-datetimepicker.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('css/propeller-theme.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('css/propeller-admin.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.min.js"></script>
</head>
<body>
<div id="app">
    @include('StudentLayout.navbar')
    <div class="pmd-sidebar-overlay"></div>
    @include('StudentLayout.sidebar')
    <div id="content" class="pmd-content inner-page">
        @yield('content')
    </div>
</div>

<!-- Scripts Starts -->
<!--<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.5/sweetalert2.all.min.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.min.js"></script>-->
<script src="/js/custom.js"></script>
<script src="http://propeller.in/components/global/js/global.js"></script>

<!-- Propeller ripple effect js -->
<script type="text/javascript" src="http://propeller.in/components/button/js/ripple-effect.js"></script>

<!-- Propeller checkbox js -->
<script type="text/javascript" src="http://propeller.in/components/checkbox/js/checkbox.js"></script>

<!-- Propeller radio js -->
<script type="text/javascript" src="http://propeller.in/components/radio/js/radio.js"></script>

<!-- Propeller textfield js -->
<script type="text/javascript" src="http://propeller.in/components/textfield/js/textfield.js"></script>

<!-- Propeller modal js -->
<script type="text/javascript" src="http://propeller.in/components/modal/js/modal.js"></script>
<script src="{{asset('js/jquery-1.12.2.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script>
    $(document).ready(function () {
        var sPath = window.location.pathname;
        var sPage = sPath.substring(sPath.lastIndexOf('/') + 1);
        $(".pmd-sidebar-nav").each(function () {
            $(this).find("a[href='" + sPage + "']").parents(".dropdown").addClass("open");
            $(this).find("a[href='" + sPage + "']").parents(".dropdown").find('.dropdown-menu').css("display", "block");
            $(this).find("a[href='" + sPage + "']").parents(".dropdown").find('a.dropdown-toggle').addClass("active");
            $(this).find("a[href='" + sPage + "']").addClass("active");
        });
    });
</script>
<script type="text/javascript">
    (function () {
        "use strict";
        var toggles = document.querySelectorAll(".c-hamburger");
        for (var i = toggles.length - 1; i >= 0; i--) {
            var toggle = toggles[i];
            toggleHandler(toggle);
        }
        ;

        function toggleHandler(toggle) {
            toggle.addEventListener("click", function (e) {
                e.preventDefault();
                (this.classList.contains("is-active") === true) ? this.classList.remove("is-active") : this.classList.add("is-active");
            });
        }

    })();
</script>

<script src="{{asset('js/propeller.min.js')}}"></script>

<!-- Javascript for revenue progressbar animation effect-->
<script>
    function progress(percent, $element) {
        var progressBarWidth = percent * $element.width() / 100;
        $element.find('.progress-bar').animate({width: progressBarWidth}, 500);
    }

    progress(50, $('.cash-progressbar'));
    progress(30, $('.card-progressbar'));
    progress(60, $('.wallet-progressbar'));
    progress(40, $('.credit-progressbar'));
    progress(10, $('.other-progressbar'));
</script>
<!-- Javascript for revenue progressbar animation effect-->


<!--circle chart-->
<script src="{{asset('js/themes/circles.min.js')}}"></script>
<script>
    <!--
    javascript
    for total sales
    chart-->
    var colors = [
        ['#dfe3e7', '#f79332'], ['#dfe3e7', '#f79332'], ['#dfe3e7', '#f79332'], ['#dfe3e7', '#2ab7ee'], ['#dfe3e7', '#00719d']
    ], circles = [];
    for (var i = 1; i <= 3; i++) {
        var child = document.getElementById('circles-' + i),
            percentage = 10 + (i * 8);

        circles.push(Circles.create({
            id: child.id,
            value: percentage,
            radius: 50,
            width: 7,
            colors: colors[i - 1],
            textClass: 'circles-text',
            styleText: true
        }));
    }
    <!-- javascript for total sales chart-->
</script>

<!--staked column chart for payment-->
<script src="{{asset('js/themes/highcharts.js')}}"></script>
<script src="{{asset('js/themes/highcharts-more.js')}}"></script>

<!-- Payment chart js-->
<script>
    $(function paymentChart() {
        $('#payment-chart').highcharts({
            chart: {
                type: 'column'
            },
            colors: "#00719d,#2ab7ee".split(","),
            title: {
                text: 'Last 10 days comparison',
                style: {
                    color: "#4d575d",
                    fontSize: "14px",
                },
            },
            xAxis: {
                categories: ['9-7', '10-7', '11-7', '12-7', '13-7', '14-7', '15-7', '16-7', '17-7', '18-7']
            },
            yAxis: {
                min: 0,
                title: {
                    text: "Amount"
                },
                stackLabels: {
                    enabled: false,
                    style: {
                        fontWeight: 'bold',
                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'black'
                    }
                }
            },
            legend: {
                enabled: !0,
                align: "right",
                layout: "horizontal",
                labelFormatter: function () {
                    return this.name
                },
                borderColor: false,
                borderRadius: 0,
                navigation: {
                    activeColor: "#274b6d",
                    inactiveColor: "#CCC"
                },
                shadow: false,
                itemStyle: {
                    color: "#888888",
                    fontSize: "12px",
                    fontWeight: "normal"
                },
                itemHoverStyle: {
                    color: "#000"
                },
                itemHiddenStyle: {
                    color: "#CCC"
                },
                itemCheckboxStyle: {
                    position: "absolute"
                },
                symbolHeight: 10,
                symbolWidth: 10,
                symbolPadding: 5,
                verticalAlign: "bottom",
                x: 0,
                y: 0,
                title: {
                    style: {
                        fontWeight: "normal"
                    }
                }
            },
            tooltip: {
                headerFormat: '<b>{point.x}</b><br/>',
                pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}',
                backgroundColor: '#ffffff',
                borderColor: '#f0f0f0',
                shadow: true
            },
            plotOptions: {
                column: {
                    stacking: 'normal',
                    dataLabels: {
                        enabled: false,
                        color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                        style: {
                            textShadow: '0 0 3px black'
                        }
                    }
                }
            },
            credits: {
                enabled: false,
            },
            series: [{
                name: 'Card',
                data: [25000, 50000, 75000, 75000, 60000, 70000, 10000, 2500, 5000, 25000]
            }, {
                name: 'Wallet',
                data: [75000, 50000, 25000, 25000, 30000, 30000, 90000, 25000, 3000, 50000]
            }]

        });
    });
</script>

<!--staked column chart for sms details-->
<script>
    $(function smsChart() {
        $('#sms-chart').highcharts({
            chart: {
                zoomType: 'none'
            },
            colors: "#e75c5c,#9159b8".split(","),
            title: {
                text: 'Last 7 days comparison',
                style: {
                    color: "#4d575d",
                    fontSize: "14px",
                },
            },
            xAxis: [{
                categories: ['3-7', '4-7', '5-7', '6-7', '7-7', '8-7', '9-7']
            }],
            yAxis: [{ // Primary yAxis
                labels: {
                    style: {
                        color: Highcharts.getOptions().colors[1]
                    }
                },
                title: {
                    text: 'User Count',
                    style: {
                        color: Highcharts.getOptions().colors[1]
                    }
                }
            }, { // Secondary yAxis
                title: {
                    text: 'Total Days',
                    style: {
                        color: Highcharts.getOptions().colors[0]
                    }
                },
                labels: {
                    style: {
                        color: Highcharts.getOptions().colors[0]
                    }
                },
                opposite: true
            }],
            legend: {
                enabled: !0,
                align: "right",
                layout: "horizontal",
                labelFormatter: function () {
                    return this.name
                },
                borderColor: false,
                borderRadius: 0,
                navigation: {
                    activeColor: "#274b6d",
                    inactiveColor: "#CCC"
                },
                shadow: false,
                itemStyle: {
                    color: "#888888",
                    fontSize: "12px",
                    fontWeight: "normal"
                },
                itemHoverStyle: {
                    color: "#000"
                },
                itemHiddenStyle: {
                    color: "#CCC"
                },
                itemCheckboxStyle: {
                    position: "absolute",
                    width: "12px",
                    height: "12px"
                },
                symbolHeight: 10,
                symbolWidth: 10,
                symbolPadding: 5,
                verticalAlign: "bottom",
                x: 0,
                y: 0,
                title: {
                    style: {
                        fontWeight: "normal"
                    }
                }
            },

            tooltip: {
                shared: true,
                backgroundColor: '#ffffff',
                borderColor: '#f0f0f0',
                shadow: true
            },
            credits: {
                enabled: false,
            },

            series: [{
                name: 'Total Days',
                type: 'spline',
                yAxis: 1,
                data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6],
                tooltip: {
                    pointFormat: '<span style="font-weight: bold; color: {series.color}">{series.name}</span>: '
                }
            }, {
                name: 'Total Days error',
                type: 'errorbar',
                yAxis: 1,
                data: [[48, 51], [68, 73], [92, 110], [128, 136], [140, 150], [171, 179], [135, 143]],
                tooltip: {
                    pointFormat: '(error range: {point.low}-{point.high})<br/>'
                }
            }, {
                name: 'User Count',
                type: 'column',
                data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2],
                tooltip: {
                    pointFormat: '<span style="font-weight: bold; color: {series.color}">{series.name}</span>: <b>{point.y:.1f}</b> '
                }
            }, {
                name: 'User Count error',
                type: 'errorbar',
                data: [[6, 8], [5.9, 7.6], [9.4, 10.4], [14.1, 15.9], [18.0, 20.1], [21.0, 24.0], [23.2, 25.3]],
                tooltip: {
                    pointFormat: '(error range: {point.low}-{point.high})<br/>'
                }
            }]
        });
    });
</script>
<!-- Scripts Ends -->
<!-- Javascript for Datepicker -->
<script type="text/javascript" language="javascript"
        src="{{asset('js/components/datetimepicker/moment-with-locales.js')}}"></script>
<script type="text/javascript" language="javascript"
        src="{{asset('js/components/datetimepicker/bootstrap-datetimepicker.js')}}"></script>
<script>
    // Linked date and time picker
    // start date date and time picker
    $('#datepicker-default').datetimepicker();
    $(".auto-update-year").html(new Date().getFullYear());
</script>
</body>
{{-- Toogle password --}}


<script>

    $('#excel-import').click(function () {
        $('#excel-input').slideToggle();
    })


</script>


{{-- End --}}
<script type="text/javascript"
        src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>

</html>


{{--<!DOCTYPE html>--}}
{{--<html lang="en" dir="ltr">--}}
{{--  <head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}
{{--    <title>ExamReag</title>--}}
{{--    <link rel="icon" href="{{asset('icon.png')}}">--}}
{{--    <link rel="stylesheet" href="{{asset('css/style.css')}}">--}}
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">--}}
{{--    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.5/sweetalert2.min.css">--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">--}}
{{--    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>--}}
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.5/sweetalert2.all.min.js"></script>--}}
{{--      <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.17/vue.min.js"></script>--}}
{{--    <style media="screen">--}}
{{--    .dropdown-left-manual {--}}
{{--    right: 0;--}}
{{--    left: auto;--}}
{{--    padding-left: 1px;--}}
{{--    padding-right: 1px;--}}

{{--    }--}}
{{--    .dropdown-left-manual a{--}}
{{--      margin:4px;--}}
{{--    }--}}
{{--    .green {--}}
{{--      color: green;--}}
{{--    }--}}
{{--    </style>--}}
{{--  </head>--}}
{{--  <body>--}}
{{--    <div class="container-fluid">--}}
{{--      <div class="row">--}}

{{--        <div class="col-md-1">--}}
{{--            <i class="fas fa-bars" id="bars"></i>--}}
{{--        </div>--}}
{{--        <div class="col-md-11">--}}
{{--            @include('StudentLayout.navbar')--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--    <div class="container-fluid" id="app">--}}
{{--      <div class="row">--}}
{{--        <div class="col-md-1">--}}
{{--          @include('StudentLayout.sidebar')--}}

{{--        </div>--}}
{{--        <div class="col-md-11" id="content">--}}
{{--          @yield('content')--}}
{{--        </div>--}}
{{--      </div>--}}
{{--    </div>--}}
{{--  </body>--}}
{{--  --}}{{-- Toogle password --}}
{{--  <script>--}}


{{--    $('#excel-import').click(function(){--}}
{{--      $('#excel-input').slideToggle();--}}
{{--    })--}}


{{--  </script>--}}


{{--  --}}{{-- End --}}
{{--  <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>--}}
{{--  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>--}}
{{--  <script--}}
{{--  src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"--}}
{{--  integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="--}}
{{--  crossorigin="anonymous"></script>--}}
{{--  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>--}}
{{--  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>--}}
{{--  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>--}}
{{--</html>--}}
