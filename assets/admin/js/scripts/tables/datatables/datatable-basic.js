/*=========================================================================================
    File Name: datatables-basic.js
    Description: Basic Datatable
    ----------------------------------------------------------------------------------------
    Item Name: Modern Admin - Clean Bootstrap 4 Dashboard HTML Template
    Version: 1.0
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(document).ready(function () {

    /****************************************
    *       js of zero configuration        *
    ****************************************/

    $('.data-table').DataTable();

    // #DataTables_Table_0_filter > label > input
    // #DataTables_Table_2_filter > label > input
    // $('.data-table').DataTable({}); #basic-datatables_filter > label > input
    $('#basic-datatables').DataTable({});
    $('#basic-datatables_filter > label > input').attr('placeholder', 'إبحث هنا ...').css(('text-align', 'center'));
    $('#basic-datatables_filter > label > input').css('height', '40px');
    $('#basic-datatables_filter > label ').css('width', '100%').css('padding-right', '0px');
    $('#basic-datatables_filter > label ').css('margin', '0px');
    $('#basic-datatables_length > label ').css('width', '100%').css('margin', '0px');
    $('#basic-datatables_length > label ').addClass('rs-select2--dark rs-select2--md m-r-10 rs-select2--border');
    $('#basic-datatables_wrapper > div:nth-child(1) > div:nth-child(1)').addClass("js-select2");
    $('#basic-datatables_wrapper > div:nth-child(1) > div:nth-child(1)').removeClass("col-md-6").addClass('col-md-2 p-l-20');
    $('#basic-datatables_wrapper > div:nth-child(1) > div:nth-child(2)').removeClass("col-md-6").addClass('col-md-10 p-r-20');
    $("#basic-datatables_info").css("display", "none");

    // / #DataTables_Table_0_filter > label > input
    // #DataTables_Table_2_filter > label > input
    // $('.data-table').DataTable({}); #basic-datatables_filter > label > input
    $('#basic-datatables1').DataTable({});
    $('#basic-datatables1_filter > label > input').attr('placeholder', 'إبحث هنا ...').css(('text-align', 'center'));
    $('#basic-datatables1_filter > label > input').css('height', '40px');
    $('#basic-datatables1_filter > label ').css('width', '100%').css('padding-right', '0px');
    $('#basic-datatables1_filter > label ').css('margin', '0px');
    $('#basic-datatables1_length > label ').css('width', '100%').css('margin', '0px');
    $('#basic-datatables1_length > label ').addClass('rs-select2--dark rs-select2--md m-r-10 rs-select2--border');
    $('#basic-datatables1_wrapper > div:nth-child(1) > div:nth-child(1)').addClass("js-select2");
    $('#basic-datatables1_wrapper > div:nth-child(1) > div:nth-child(1)').removeClass("col-md-6").addClass('col-md-2 p-l-20');
    $('#basic-datatables1_wrapper > div:nth-child(1) > div:nth-child(2)').removeClass("col-md-6").addClass('col-md-10 p-r-20');
    $("#basic-datatables1_info").css("display", "none");

    // / #DataTables_Table_0_filter > label > input
    // #DataTables_Table_2_filter > label > input
    // $('.data-table').DataTable({}); #basic-datatables_filter > label > input
    $('#basic-datatables2').DataTable({});
    $('#basic-datatables2_filter > label > input').attr('placeholder', 'إبحث هنا ...').css(('text-align', 'center'));
    $('#basic-datatables2_filter > label > input').css('height', '40px');
    $('#basic-datatables2_filter > label ').css('width', '100%').css('padding-right', '0px');
    $('#basic-datatables2_filter > label ').css('margin', '0px');
    $('#basic-datatables2_length > label ').css('width', '100%').css('margin', '0px');
    $('#basic-datatables2_length > label ').addClass('rs-select2--dark rs-select2--md m-r-10 rs-select2--border');
    $('#basic-datatables2_wrapper > div:nth-child(1) > div:nth-child(1)').addClass("js-select2");
    $('#basic-datatables2_wrapper > div:nth-child(1) > div:nth-child(1)').removeClass("col-md-6").addClass('col-md-2 p-l-20');
    $('#basic-datatables2_wrapper > div:nth-child(1) > div:nth-child(2)').removeClass("col-md-6").addClass('col-md-10 p-r-20');
    $("#basic-datatables2_info").css("display", "none");

    /**************************************
    *       js of default ordering        *
    **************************************/

    $('.default-ordering').DataTable({
        "order": [[3, "desc"]]
    });

    /************************************
    *       js of multi ordering        *
    ************************************/

    $('.multi-ordering').DataTable({
        columnDefs: [{
            targets: [0],
            orderData: [0, 1]
        }, {
            targets: [1],
            orderData: [1, 0]
        }, {
            targets: [4],
            orderData: [4, 0]
        }]
    });

    /*************************************
    *       js of complex headers        *
    *************************************/

    $('.complex-headers').DataTable();

    /*************************************
    *       js of dom positioning        *
    *************************************/

    $('.dom-positioning').DataTable({
        "dom": '<"top"i>rt<"bottom"flp><"clear">'
    });

    /************************************
    *       js of alt pagination        *
    ************************************/

    $('.alt-pagination').DataTable({
        "pagingType": "full_numbers"
    });

    /*************************************
    *       js of scroll vertical        *
    *************************************/

    $('.scroll-vertical').DataTable({
        "scrollY": "200px",
        "scrollCollapse": true,
        "paging": false
    });

    /************************************
    *       js of dynamic height        *
    ************************************/

    $('.dynamic-height').DataTable({
        scrollY: '50vh',
        scrollCollapse: true,
        paging: false
    });

    /***************************************
    *       js of scroll horizontal        *
    ***************************************/

    $('.scroll-horizontal').DataTable({
        "scrollX": true
    });

    /**************************************************
    *       js of scroll horizontal & vertical        *
    **************************************************/

    $('.scroll-horizontal-vertical').DataTable({
        "scrollY": 200,
        "scrollX": true
    });

    /**********************************************
    *       Language - Comma decimal place        *
    **********************************************/

    $('.comma-decimal-place').DataTable({
        "language": {
            "decimal": ",",
            "thousands": "."
        }
    });


});