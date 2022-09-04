/***********
    ## Custom Daterange Script
****************************/
$(function () {
    // var start = moment().subtract(29, 'days');
    // var end = moment();

    var cb = function (start, end, label) {
        $('.reportrange_serverside span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    };

    var params = new window.URLSearchParams(window.location.search);
    var start = params.get('start_date');
    var end = params.get('end_date');


    var optionSet1 = {
        maxDate:  moment().add(1, 'days'),
        showDropdowns: false,
        showWeekNumbers: true,
        timePicker: false,
        timePickerIncrement: 1,
        timePicker12Hour: true,
        ranges: {
            'Today': [moment().startOf('day'),  moment().add(1, 'days')],
            'Yesterday': [moment().subtract(1, 'days'), moment()],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        opens: 'left',
        buttonClasses: ['btn btn-default'],
        applyClass: 'btn-small btn-primary',
        cancelClass: 'btn-small',
        format: 'MM/DD/YYYY',
        separator: ' to ',
        locale: {
            applyLabel: 'Submit',
            cancelLabel: 'Clear',
            fromLabel: 'From',
            toLabel: 'To',
            customRangeLabel: 'Custom',
            daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
            monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            firstDay: 1,
        }
    };
    if ((start != ""  && start != null ) && (end != ""  && end != null)) {
        console.log('sart:'+start);

        $('.reportrange_serverside span').html(moment(start).format('MMMM D, YYYY') + ' - ' + moment(end).format('MMMM D, YYYY'));
    } else if (start != ""  && start != null) {
        $('.reportrange_serverside span').html(moment(start).format('MMMM D, YYYY'));
    } else {
        $('.reportrange_serverside span').html('<i class="bx bx-calendar me-2"></i>Select date Range');
    }

    $('.reportrange_serverside').daterangepicker(optionSet1, cb);

    $('.reportrange_serverside').on('apply.daterangepicker', function (ev, picker) {

        var startDate = picker.startDate.format("YYYY-MM-DD");
        var endDate = picker.endDate.format("YYYY-MM-DD");

        var page_url = window.location.href.split('?')[0];

       var page_name =  page_url.substring(page_url.lastIndexOf('/') + 1);
       var check_datatable =  page_name.substring(page_name.lastIndexOf('-') + 1);
       var datatable_remove = page_name.substring(0,page_name.lastIndexOf('-'));
       if(check_datatable=='datatable'){
         var table_name = datatable_remove;
       }else{
        var table_name = page_name;
       }

          if(startDate != '' &&  endDate != '')
           {
            reports_date_range(table_name , startDate, endDate);
           }
           else
           {
            alert('Both Date is required');
           }
    });

    $('.reportrange_serverside').on('cancel.daterangepicker', function (ev, picker) {
        var page_url = window.location.href.split('?')[0];
        window.location.replace(page_url);
    });

  });


//

function reports_date_range( table_name, start_date='',end_date='') {
   // $('#datatables_'+table_name+'_server_side').DataTable().destroy();

    switch (table_name) {
      case 'general-activities':
       // general_activity(start_date,end_date);
       window.location.href = APP_URL+"admin/reports/"+table_name+"?start_date=" + start_date +
       "&end_date=" + end_date;
        break;

      case 'unsubscribe-users':
          unsubscribers(start_date,end_date);

          break;
      case 'registered-users':
       // registered_users(start_date,end_date);
       window.location.href = APP_URL+"admin/reports/"+table_name+"?start_date=" + start_date +
       "&end_date=" + end_date;
        break;

        case 'active-users':
       // active_users(start_date,end_date);
       window.location.href = APP_URL+"admin/reports/"+table_name+"?start_date=" + start_date +
       "&end_date=" + end_date;
        break;

        case 'ecard-recipient':
       // ecards_recipients(start_date,end_date);
       var eid = $('#eid').val();
       window.location.href =APP_URL+"admin/reports/"+table_name+"?eid="+eid+"&start_date="+start_date+"&end_date="+end_date;

        break;

        case 'ecard-details':
         // ecard_details(start_date,end_date);
         var uid = $('#uid').val();
         var status = $("input[type='radio']:checked").val();
         window.location.href =APP_URL+"admin/reports/"+table_name+"?uid="+uid+"&start_date="+start_date+"&end_date="+end_date
         +"&status="+status;
        break;


        case 'activities-by-user':
          //activities_by_user(start_date,end_date);
          var params = new window.URLSearchParams(window.location.search);

          var first_uid = params.get('uid');
          if(first_uid!=''){
           var uid = decodeURI(params);
          }else{
           var uid = $('#SelectUser').val();
          }
          window.location.href =APP_URL+"admin/reports/activities-by-user?start_date=" + start_date +
            "&end_date=" + end_date+
            "&" + uid;
        break;

        case 'ecard-status':
          //ecard_status(start_date,end_date);
          window.location.href = APP_URL+"admin/reports/"+table_name+"?start_date=" + start_date +
          "&end_date=" + end_date;
        break;

        case 'logins':
         // logins(start_date,end_date);
         window.location.href = APP_URL+"admin/reports/"+table_name+"?start_date=" + start_date +
         "&end_date=" + end_date;
        break;

        case 'bounced-back':
            window.location.href = APP_URL+"admin/reports/"+table_name+"?start_date=" + start_date +
            "&end_date=" + end_date;
           break;

      default:
        break;
    }

  }
