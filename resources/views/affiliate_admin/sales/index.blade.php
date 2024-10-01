@extends('affiliate_admin.layouts.master')
@section('content')
@section('toolbar')
   Sales
@endsection
<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
   <div class="content flex-row-fluid" id="kt_content">
      <div class="card card-bordered">
         <div class="card-header pt-5">
            <h3 class="card-title align-items-start flex-column">
               <span class="card-label fw-bolder fs-1 text-dark">Earning</span>
            </h3>
            <div class="card-toolbar">
               <ul class="nav" id="kt_chart_widget_11_tabs">
                  <li class="nav-item">
                     <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bolder px-4 me-1" data-bs-toggle="tab" id="kt_chart_widget_11_tab_1" href="#kt_chart_widget_11_tab_content_1">Week</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bolder px-4 me-1" data-bs-toggle="tab" id="kt_chart_widget_11_tab_2" href="#kt_chart_widget_11_tab_content_2">Monthly</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link btn btn-sm btn-color-muted btn-active btn-active-light fw-bolder px-4 me-1 active" data-bs-toggle="tab" id="kt_chart_widget_11_tab_3" href="#kt_chart_widget_11_tab_content_3">Yearly</a>
                  </li>
               </ul>
            </div>
         </div>

          <div class="card-body">
              <div id="kt_apexcharts_5" style="height: 500px;"></div>
          </div>
      </div>
   </div>
</div>
@endsection
@section('js')
 <script type="text/javascript">
    var element = document.getElementById('kt_apexcharts_5');

   var height = parseInt(KTUtil.css(element, 'height'));
   var labelColor = KTUtil.getCssVariableValue('--bs-gray-500');
   var borderColor = KTUtil.getCssVariableValue('--bs-gray-200');

   var baseColor = KTUtil.getCssVariableValue('--bs-primary');
   var baseLightColor = KTUtil.getCssVariableValue('--bs-light-primary');
   var secondaryColor = KTUtil.getCssVariableValue('--bs-info');

   var options = {
       series: [{
           name: 'Net Profit',
           type: 'bar',
           stacked: true,
           data: [40, 50, 65, 70, 50, 30]
       }, {
           name: 'Revenue',
           type: 'bar',
           stacked: true,
           data: [20, 20, 25, 30, 30, 20]
       }, {
           name: 'Expenses',
           type: 'area',
           data: [50, 80, 60, 90, 50, 70]
       }],
       chart: {
           fontFamily: 'inherit',
           stacked: true,
           height: height,
           toolbar: {
               show: false
           }
       },
       plotOptions: {
           bar: {
               stacked: true,
               horizontal: false,
               endingShape: 'rounded',
               columnWidth: ['12%']
           },
       },
       legend: {
           show: false
       },
       dataLabels: {
           enabled: false
       },
       stroke: {
           curve: 'smooth',
           show: true,
           width: 2,
           colors: ['transparent']
       },
       xaxis: {
           categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
           axisBorder: {
               show: false,
           },
           axisTicks: {
               show: false
           },
           labels: {
               style: {
                   colors: labelColor,
                   fontSize: '12px'
               }
           }
       },
       yaxis: {
           max: 120,
           labels: {
               style: {
                   colors: labelColor,
                   fontSize: '12px'
               }
           }
       },
       fill: {
           opacity: 1
       },
       states: {
           normal: {
               filter: {
                   type: 'none',
                   value: 0
               }
           },
           hover: {
               filter: {
                   type: 'none',
                   value: 0
               }
           },
           active: {
               allowMultipleDataPointsSelection: false,
               filter: {
                   type: 'none',
                   value: 0
               }
           }
       },
       tooltip: {
           style: {
               fontSize: '12px'
           },
           y: {
               formatter: function (val) {
                   return '$' + val + ' thousands'
               }
           }
       },
       colors: [baseColor, secondaryColor, baseLightColor],
       grid: {
           borderColor: borderColor,
           strokeDashArray: 4,
           yaxis: {
               lines: {
                   show: true
               }
           },
           padding: {
               top: 0,
               right: 0,
               bottom: 0,
               left: 0
           }
       }
   };

   var chart = new ApexCharts(element, options);
   chart.render();
 </script>
@endsection
