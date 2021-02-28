

$(document).ready(function(){
  
  const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });
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
        moment.locale('km');
        document.querySelector(".card-title").innerHTML = `<span class="text-muted">តារាងស្រង់វត្តមាន ប្រចាំខែ </span> <strong>${moment.months(date.getMonth())}</strong> <strong>${date.getFullYear()}</strong>` ;
        document.getElementById("prev-month").innerHTML = `<i class="fas fa-chevron-left mr-2 fa-lg"></i> ${moment.months(date.getMonth()-1)}` ;
        document.getElementById("next-month").innerHTML = `${moment.months(date.getMonth()+1)} <i class="fas fa-chevron-right mr-2 fa-lg"></i>` ;
        for(let i=1; i<=lastDay;i++){
            moment.locale('km');
            if(i=== new Date().getDate() && date.getMonth() === new Date().getMonth()){
                days += `<th  id="today" class="${moment.weekdaysShort(i) == 'អា' ? 'sunday':'' }">
                <span class="day_number">${i}</span>
                <span class="day_khmer">${moment.weekdaysShort(i)}</span>
                </th>`;
            }else{
                days += `<th id="day_${i}" class="${moment.weekdaysShort(i) == 'អា' ? 'sunday':'' } ">
                <span class="day_number">${i}</span>
                <span class="day_khmer">${moment.weekdaysShort(i)}</span>
                </td>`;
            }
            monthDays.innerHTML = days;
        }
        moment.locale('en');
        $('tbody').empty();
        $("#attendance_card").append(`<div class="overlay"><i class="fas fa-2x fa-sync-alt fa-spin"></i></div>`);
        $.get({
            url:"/json/employees",
            success: function(data){
              console.log(data.employees);
              $.map(data.employees, function(v,i){
                
                let td = '';
                for(let $i = 1; $i<=new Date(date.getFullYear(), date.getMonth()+1,0).getDate();$i++){
                   td += `<td style="text-align:center">
                   <input class="att_box " id="${v.id}-${date.getFullYear()}-${date.getMonth()+1}-${$i}" data-id="${v.id}" data-date="${date.getFullYear()}-${date.getMonth()+1}-${$i}" type="checkbox" />

                   </td>`;
                }
                $("tbody").append(`<tr><td>${v.name}</td>${td}</tr>`);
                if(v.attendances_count > 0 ){
                  $.map(v.attendances,function(v){
                    $(`#${v.employee_id}-${v.date}`).prop('checked',true);
                  });
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
                      
                    })
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
            }
        });
    }
})

