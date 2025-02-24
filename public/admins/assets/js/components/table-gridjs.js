/*
Template Name: Larkon - Responsive 5 Admin Dashboard
Author: Techzaa
File: datatable js
*/

var inteData = [];
     $.ajax({
          url: 'getAllAdminApplications',
          method: 'GET',
          dataType: 'json',
          async: false,
          success: function(response) {


               var myData = response.data;
          
               // for (let i = 0; i < myData.length; i++) {
               //      const element = myData[i];
               //      console.log('Old Status: '+myData[i].id);
                    
               // }

               myData.forEach(element => {

                    var texts = '';
                var badge_type = '';

                if (element.rent_status == 1) {
                    texts = 'INCOMPLETE';
                    badge_type = 'warning';
                } else if (element.rent_status == 2) {
                    texts = 'PENDING';
                    badge_type = 'info';
                } else if (element.rent_status == 3) {
                    texts = 'REVIEW';
                    badge_type = 'dark';
                } else if (element.rent_status == 4) {
                    texts = 'APPROVED';
                    badge_type = 'success';
                }else if (element.rent_status == 5) {
                    texts = 'DELIVERED';
                    badge_type = 'primary';
                } else if (element.rent_status == 0) {
                    texts = 'DECLINED';
                    badge_type = 'danger';
                } else {
                    texts = 'NOT APPLIED';
                    badge_type = 'dark';
                }
                    console.log('Old Status: '+element.id);

                    var actionBtn = '<div class="d-flex gap-2">'+
                                             '<a href="#!" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>'+
                                             '<a href="#!" class="btn btn-soft-primary btn-sm"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>'+
                                             '<a href="#!" class="btn btn-soft-danger btn-sm"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></a>'+
                                        '</div>'
                    inteData.push([element.id, chaangeDateFormat(element.created_at), element.f_name+' '+element.l_name, element.monthly_bugbet, (element.monthly_bugbet*element.months_payback), texts, "<button>M</button>"]);


               });
          //     console.log('Old Status: '+response.data);
               //  maiData.push(inteData);
          },
          error: function(data) {
               console.log(data);
          }
     });


     // console.log(inteData);


class GridDatatable {

     init() {
          this.GridjsTableInit();
     }

     GridjsTableInit() {

          // search Table
          if (document.getElementById("table-search"))
               new gridjs.Grid({
                    columns: ["App ID", 'Created At', "App Name", "Total Payment", "Amount", "Status", "Action"],
                    pagination: {
                         limit: 5
                    },
                    search: true,
                    sort: true,
                    data: function () {
                         return new Promise(function (resolve) {
                              setTimeout(function () {
                                   resolve(
                                        inteData
                                   )
                              }, 2000);
                         });
                    }
               }).render(document.getElementById("table-search"));

     

          // Loading State Table
          // if (document.getElementById("table-loading-state"))
          //      new gridjs.Grid({
          //           columns: ["Name", "Email", "Position", "Company", "Country"],
          //           pagination: {
          //                limit: 5
          //           },
          //           sort: true,
          //           data: function () {
          //                return new Promise(function (resolve) {
          //                     setTimeout(function () {
          //                          resolve([
          //                               ["Alice", "alice@example.com", "Software Engineer", "ABC Company", "United States"],
          //                               ["Bob", "bob@example.com", "Product Manager", "XYZ Inc", "Canada"],
          //                               ["Charlie", "charlie@example.com", "Data Analyst", "123 Corp", "Australia"],
          //                               ["David", "david@example.com", "UI/UX Designer", "456 Ltd", "United Kingdom"],
          //                               ["Eve", "eve@example.com", "Marketing Specialist", "789 Enterprises", "France"],
          //                               ["Frank", "frank@example.com", "HR Manager", "ABC Company", "Germany"],
          //                               ["Grace", "grace@example.com", "Financial Analyst", "XYZ Inc", "Japan"],
          //                               ["Hannah", "hannah@example.com", "Sales Representative", "123 Corp", "Brazil"],
          //                               ["Ian", "ian@example.com", "Software Developer", "456 Ltd", "India"],
          //                               ["Jane", "jane@example.com", "Operations Manager", "789 Enterprises", "China"]
          //                          ])
          //                     }, 2000);
          //                });
          //           }
          //      }).render(document.getElementById("table-loading-state"));

     }
     

}


document.addEventListener('DOMContentLoaded', function (e) {
     new GridDatatable().init();
});


          

    // Convert To Readable Dates
    function chaangeDateFormat(datess) {
     const date = new Date(datess);
     formartedDate = date.toLocaleString('en-US', { year: 'numeric', month: 'long', day: 'numeric' })
     return formartedDate;
 }

 // Convert To Readable Date And Time
 function chaangeDateTimeFormat(datetimes) {
     // var d = new Date(Date.parse(datetimes.replace(/-/g, "/")));

     var d = new Date(datetimes);
     var month = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'Aug', 'September', 'October', 'November', 'December'];
     var date = d.getDate() + " " + month[d.getMonth()] + ", " + d.getFullYear();
     var time = d.toLocaleTimeString().toUpperCase().replace(/([\d]+:[\d]+):[\d]+(\s\w+)/g, "$1$2");
     return (date + " " + time);
 }