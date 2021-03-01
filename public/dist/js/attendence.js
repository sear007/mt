

$(document).ready(function(){
  const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });
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
        moment.locale('km');
        document.querySelector(".card-title").innerHTML = `<span class="text-muted">តារាងស្រង់វត្តមាន ប្រចាំខែ </span> <strong>${moment.months(date.getMonth())}</strong> <strong>${date.getFullYear()}</strong>` ;
        document.getElementById("prev-month").innerHTML = `<i class="fas fa-chevron-left mr-2 fa-lg"></i> ${moment.months(date.getMonth()-1)}` ;
        document.getElementById("next-month").innerHTML = `${moment.months(date.getMonth()+1)} <i class="fas fa-chevron-right mr-2 fa-lg"></i>` ;
        for(let i=1; i<=lastDay;i++){
            moment.locale('km');
            if(i=== new Date().getDate() && date.getMonth() === new Date().getMonth()){
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
        }
        moment.locale('en');
        $('tbody').empty();
        $("#attendance_card").append(`<div class="overlay"><i class="fas fa-2x fa-sync-alt fa-spin"></i></div>`);
        $.get({
            url:"/json/employees",
            success: function(data){
              $.map(data.employees, function(v,i){
                let td = '';
                let option = '';
                
                for(let $i = 1; $i<=new Date(date.getFullYear(), date.getMonth()+1,0).getDate();$i++){
                   td += `<td class="att_box_td" style="text-align:center">
                   <input class="att_box " id="${v.id}-${date.getFullYear()}-${pad(date.getMonth()+1,2)}-${pad($i,2)}" data-id="${v.id}" data-date="${date.getFullYear()}-${pad(date.getMonth()+1,2)}-${pad($i,2)}" type="checkbox" />
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
        $('[data-toggle="tooltip"]').tooltip();
    };
    function pad (str, max) {
      str = str.toString();
      return str.length < max ? pad("0" + str, max) : str;
    }
})

