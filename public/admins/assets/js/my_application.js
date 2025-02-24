
$(document).ready(function () {

    var maiData = [];

    loadAllAppications();
    function loadAllAppications() {
        // var bbb = new DataTable('#exampletbl');
        
        $("#exampletbl").DataTable({
            order: [0, 'desc'],
            pageLength: 10 ,
            "lengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]],
            responsive: true,
        });
    
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
                        // console.log('Old Status: '+element.id);
                        inteData.push([element.f_name, "alice@example.com", "Software Engineer", "ABC Company", "United States"]);


                   });
              //     console.log('Old Status: '+response.data);
                    maiData.push(inteData);
                  },
                  error: function(data) {
                      console.log(data);
                  }
              });
    
            //   return maiData;
    
    }


    });
    
    