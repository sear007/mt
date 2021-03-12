
$(document).ready(function(){
  const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});
  //request_leave 
  $("#request-leave-btn").click(function(e){
    if(!$("#request-leave-reason").val()){
        $("#request-leave-reason").addClass('is-invalid');
        setTimeout(function(){
            $("#request-leave-reason").removeClass('is-invalid');
        },3000);
    }
    if(!$("#request_leave_date").val()){
        $("#request_leave_date").addClass('is-invalid');
        setTimeout(function(){
            $("#request_leave_date").removeClass('is-invalid');
        },3000);
    }
    if($("#request_leave_date").val() && $("#request-leave-reason").val() ){
        submitRequest();
    }
    e.preventDefault();
});
disable(true);
$("#request-leave-employee").change(function(){
    disable(false);
});
$.get({
url:"/json/employees",
success: function(data){
    $.map(data.employees, function(v,i){
    let option = '';
    option += `<option value="${v.id}">${v.name}</option>`;
    $("#request-leave-employee").append(option);
    });
}
})

$('#request_leave_date').datetimepicker({
    format: 'DD-MM-YYYY'
});
function disable(optoin){
    $("#request-leave-btn").prop("disabled",optoin);
}
function submitRequest(){
    $.ajax({
        url:"/attendance/request_leave",
        method: "POST",
        data: $("#request-leave-employee-form").serialize(),
        success: function(data){
            if(data.status_code === 200){
                Toast.fire({
                    icon: 'success',
                    html: `${data.message}`,
                })
            }else{
                Toast.fire({
                    icon: 'error',
                    html: `${data.message}`,
                })
            }
            renderCalendar();
        },
        error: function(x,s){
          console.error(x.responseText);
        }
    })
}
  // Render Calendar
  var _holidays = {
    'M': {//Month, Day
            '01/01': ["New Year's Day","ចូលឆ្នាំសកល"],
            '07/01': ["Victory over Genocide Day","ទិវា​ជ័យជម្នះ​លើ​របប​ប្រល័យ​ពូជ​សាសន៍"],
            '08/03': ["International Women's Day","ទិវា​នារី​អន្តរជាតិ"],
            '14/04': ["Khmer New Year Day","ពិធី​បុណ្យ​ចូល​ឆ្នាំ​ថ្មី ប្រពៃណី​ជាតិ"],
            '15/04': ["Khmer New Year Day","ពិធី​បុណ្យ​ចូល​ឆ្នាំ​ថ្មី ប្រពៃណី​ជាតិ"],
            '16/04': ["Khmer New Year Day","ពិធី​បុណ្យ​ចូល​ឆ្នាំ​ថ្មី ប្រពៃណី​ជាតិ"],
            '26/04': ["Visak Bochea Day","ពិធី​បុណ្យ​វិសាខ​បូជា"],
            '30/04': ["Royal Plowing Ceremony","ព្រះ​រាជ​ពិធី​ច្រត់​ព្រះ​នង្គ័ល"],
            '01/05': ["International Labor Day","ទិវា​ពលកម្ម​អន្តរជាតិ"],
            '14/05': ["King's Birthday, Norodom Sihamoni","ព្រះ​រាជ​ពិធី​បុណ្យ​ចម្រើន​ព្រះ​ជន្ម ព្រះ​ករុណា​ព្រះ​បាទ​សម្តេច ព្រះ​បរម​នាថ នរោត្តម សីហមុនី ព្រះ​មហាក្សត្រ នៃ​ព្រះរាជាណាចក្រ​កម្ពុជា"],
            '08/06': ["King's Mother Birthday, Norodom Monineath Sihanouk","ព្រះ​រាជ​ពិធី​បុណ្យ​ចម្រើន​ព្រះ​ជន្ម សម្តេច​ព្រះ​មហាក្សត្រី នរោត្តម មុនិនាថ សីហនុ ព្រះ​វររាជ​មាតា​ជាតិ​ខ្មែរ"],
            '24/08': ["Constitutional Day","ទិវា​ប្រកាស​រដ្ឋ​ធម្មនុញ្ញ"],
            '05/10': ["Pchum Ben Day","ពិធី​បុណ្យ​ភ្ជុំ​បិណ្ឌ"],
            '06/10': ["Pchum Ben Day","ពិធី​បុណ្យ​ភ្ជុំ​បិណ្ឌ"],
            '07/10': ["Pchum Ben Day","ពិធី​បុណ្យ​ភ្ជុំ​បិណ្ឌ"],
            '15/10': ["Commemoration Day of King's Father, Norodom Sihanouk","ព្រះ​រាជ​ពិធី​គ្រង​ព្រះ​បរម​រាជ​សម្បត្តិ​របស់ ព្រះ​ករុណា ព្រះ​បាទ​សម្តេច​ព្រះ​បរមនាថ នរោត្តម សីហមុនី ព្រះ​មហាក្សត្រ នៃ​ព្រះរាជាណាចក្រ​កម្ពុជា"],
            '09/11': ["Independence Day","ពិធី​បុណ្យ​ឯករាជ្យ​ជាតិ"],
            '18/11': ["Water Festival Ceremony","ព្រះ​រាជ​ពិធី​បុណ្យ​អុំ​ទូក បណ្ដែត​ប្រទីប និង​សំពះ​ព្រះ​ខែ អកអំបុក"],
            '19/11': ["Water Festival Ceremony","ព្រះ​រាជ​ពិធី​បុណ្យ​អុំ​ទូក បណ្ដែត​ប្រទីប និង​សំពះ​ព្រះ​ខែ អកអំបុក"],
            '20/11': ["Water Festival Ceremony","ព្រះ​រាជ​ពិធី​បុណ្យ​អុំ​ទូក បណ្ដែត​ប្រទីប និង​សំពះ​ព្រះ​ខែ អកអំបុក"],
        },
    };
    const date = new Date;
    renderCalendar();
    document.getElementById("next-month").addEventListener("click",function(){
        date.setMonth(date.getMonth() +1);
        renderCalendar();
    },false);
    document.getElementById("prev-month").addEventListener("click",function(){
        date.setMonth(date.getMonth() -1);
        renderCalendar();
    },false);
    function renderCalendar (){
        const lastDay = new Date(date.getFullYear(), date.getMonth()+1,0).getDate();
        const monthDays = document.querySelector('#attendence_table thead tr');
        let days = `<th>ឈ្មោះបុគ្គលិក</th>`;
        let holidays = '';
        moment.locale('km');
        document.querySelector(".card-title").innerHTML = `<span class="text-muted">តារាងស្រង់វត្តមាន ប្រចាំខែ </span> <strong>${moment.months(date.getMonth())}</strong> <strong>${k_number(date.getFullYear())}</strong>` ;
        document.getElementById("prev-month").innerHTML = `<i class="fas fa-chevron-left mr-2 fa-lg"></i> ${moment.months(date.getMonth()-1)}` ;
        document.getElementById("next-month").innerHTML = `${moment.months(date.getMonth()+1)} <i class="fas fa-chevron-right mr-2 fa-lg"></i>` ;
        $("#data-print-start").val(`${date.getFullYear()}-${pad(date.getMonth()+1,2)}-01`);
        $("#data-print-end").val(`${date.getFullYear()}-${pad(date.getMonth()+1,2)}-${lastDay}`);
        $("#data-print-month").val(`${pad(date.getMonth()+1,2)}`);
        $("#data-print-year").val(`${date.getFullYear()}`);
        $("#data-print-lastday").val(`${lastDay}`);
        for(let i=1; i<=lastDay;i++){
            moment.locale('km');
            if( i === new Date().getDate() && date.getMonth() === new Date().getMonth() ){
                days += `<th id="today" class="${moment.weekdaysShort(i) == 'អា' ? 'sunday':'' } ${_holidays['M'][pad(i,2)+'/'+pad(date.getMonth()+1,2)] ? 'holiday':''}">
                <span class="day_number">${i}</span>
                <span class="day_khmer">${moment.weekdaysShort(i)}</span>
                </th>`;
            }else{
                days += `<th  data-html="true" title="<p class='h3'>${_holidays['M'][pad(i,2)+'/'+pad(date.getMonth()+1,2)] ? _holidays['M'][pad(i,2)+'/'+pad(date.getMonth()+1,2)][1]:'' }</p>" data-toggle="${_holidays['M'][pad(i,2)+'/'+pad(date.getMonth()+1,2)] ? 'tooltip':'' }" class="${moment.weekdaysShort(i) == 'អា' ? 'sunday':'' } ${_holidays['M'][pad(i,2)+'/'+pad(date.getMonth()+1,2)] ? 'holiday':''}">
                <span class="day_number">${i}</span>
                <span class="day_khmer">${moment.weekdaysShort(i)}</span>
                </td>`;
            }
            monthDays.innerHTML = days;
            if(_holidays['M'][pad(i,2)+'/'+pad(date.getMonth()+1,2)]){
              holidays += `<li class="list-group-item"><strong class="text-danger">ថ្ងៃ${moment.weekdays(i)}</strong> <strong class="text-danger">ទី${pad(i,2)}</strong> : <span class="text-muted">${_holidays['M'][pad(i,2)+'/'+pad(date.getMonth()+1,2)][1]}</span></li>`
            }
            
            document.querySelector("#card-holiday .card-header").innerHTML = `ថ្ងៃឈប់សំរាក់ប្រចាំខែ ${moment.months(date.getMonth())}`;
            document.querySelector("#card-holiday .card-body").innerHTML = holidays;
        }

        if(holidays === ''){
          $("#card-holiday").addClass('d-none');
        }else{
          $("#card-holiday").removeClass('d-none');
        }
        
        moment.locale('en');
        $('tbody').empty();
        $("#attendance_card").append(`<div class="overlay"><i class="fas fa-2x fa-sync-alt fa-spin"></i></div>`);
  
        $.get({
            url:`/json/employees`,
            success: function(data){
              console.log(data);
              $.map(data.employees, function(value,i){
                let td = '';
                let option = '';
                for(let $i = 1; $i<=new Date(date.getFullYear(), date.getMonth()+1,0).getDate();$i++){
                   td += `<td  style="${$i === new Date().getDate() && date.getMonth() === new Date().getMonth() ? 'background: #c4d8c7':''}" id="td-${value.id}-${date.getFullYear()}-${pad(date.getMonth()+1,2)}-${pad($i,2)}" class="att_box_td text-center" style="text-align:center">
                    <input ${$i > new Date().getDate() && date.getMonth() == new Date().getMonth() ? 'disabled':''}  class="att_box " id="${value.id}-${date.getFullYear()}-${pad(date.getMonth()+1,2)}-${pad($i,2)}" data-id="${value.id}" data-date="${date.getFullYear()}-${pad(date.getMonth()+1,2)}-${pad($i,2)}" type="checkbox" />
                   </td>`;
                }
                $("tbody").append(`<tr><td>${value.name}</td>${td}</tr>`);
              });
              //Attendaces
              $.get({
                url: `/json/attendances?last_day=${lastDay}&month=${date.getMonth()+1}&year=${date.getFullYear()}`,
                success:function(d){
                  if(d.attendances.length > 0 ){
                    let request_leaves = '';
                    $.map(d.attendances,function(v){
                      if(v.attendance){
                        $(`#${v.employee_id}-${v.date}`).prop('checked',true);
                      }else{
                        request_leaves += `<li class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                          <h5 class="mb-1">${data.employees[v.employee_id-1]['name']}</h5>
                          <small>សុំច្បាប់</small>
                        </div>
                        <p class="mb-1">ហេតុផល៖ ${v.request_leave}</p>
                        <small>${v.date}</small>
                        </li>`;
                        document.querySelector('#card-request-leave ul').innerHTML = request_leaves;
                        $(`#td-${v.employee_id}-${v.date}`).addClass('request_leave');
                        $(`#td-${v.employee_id}-${v.date}`).empty();
                        $(`#td-${v.employee_id}-${v.date}`).append('ច');
                        $(`#td-${v.employee_id}-${v.date}`).attr('data-toggle','tooltip');
                        $(`#td-${v.employee_id}-${v.date}`).css('background-color','#dce0b7');
                        $(`#td-${v.employee_id}-${v.date}`).css('cursor','pointer');
                        $(`#td-${v.employee_id}-${v.date}`).prop('title',`${v.request_leave}`);
                        $('[data-toggle="tooltip"]').tooltip();
                        $(`#td-${v.employee_id}-${v.date}`).click(function(){
                          Swal.fire({
                            title: 'ដាក់ច្បាប់ '+ v.date,
                            html: `${v.request_leave}`,
                            showDenyButton: true,
                            showCancelButton: true,
                            showConfirmButton: false,
                            denyButtonText: `ដក់ច្បាប់វិញ`,
                            showCancelButton:false,
                          }).then((result) => {
                            if (result.isDenied) {
                              $.ajax({
                                url:"/attendance/request_leave/destroy",
                                method:"post",
                                data:{"_token":$('meta[name="csrf-token"]').attr('content'),"id":v.id},
                                success: function(data){
                                  Swal.fire(data, '', 'success');
                                }
                              });
                              renderCalendar();
                            }
                          })
                        })
                      }
                    });
                  }else{
                    $("#card-request-leave").addClass('d-none');
                  }
                  moment.locale('km');
                  if(document.querySelectorAll('.request_leave').length > 0){
                    $("#card-request-leave").removeClass('d-none');
                    $("#card-request-leave .card-title").text(`ឈ្មោះស្នើរសុំច្បាប់ប្រចាំខែ ${moment.months(date.getMonth())}/${date.getFullYear()}`);
                  }
                },
                error:function(x,s){
                  console.error(x.responseText);
                }
              });
              $(".att_box").change(function(){
                if(this.checked) {
                    submitData($(this).attr("data-id"),$(this).attr("data-date"));
                }else{
                    removeData($(this).attr("data-id"),$(this).attr("data-date"));
                }
              });
              function submitData(id,value){
                $.ajax({
                  url:"/attendance/store",
                  method:"post",
                  data:{"_token":$('meta[name="csrf-token"]').attr('content'),"date":value,"id":id},
                  success:function(data){
                    Toast.fire({
                      icon: 'success',
                      html: `ជំរាបសួរ! ទិន្នន័យត្រូវបានបញ្ចូន សូមអរគុណ។`,
                    });
                    //renderCalendar();
                  },
                  error:function(x,s){
                    console.error(x.responseText);
                  }
                });
              }
              function removeData(id,value){
                $.ajax({
                  url:"/attendance/destroy",
                  method:"post",
                  data:{"_token":$('meta[name="csrf-token"]').attr('content'),"date":value,"id":id},
                  success:function(data){
                    console.log(data);
                    Toast.fire({
                      icon: 'error',
                      html:`ជំរាបសួរ! ទិន្នន័យត្រូវបានលុបចេញ សូមអរគុណ។`,
                    })
                  }
                });
              }
              $("#attendance_card").find($(".overlay")).remove();
            },
            error:function(x,s){
              console.error();
            }
        });
        $('[data-toggle="tooltip"]').tooltip();
    };
    function pad (str, max) {
      str = str.toString();
      return str.length < max ? pad("0" + str, max) : str;
    }
})