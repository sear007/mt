renderCalendar();
function renderCalendar (){
    moment.weekdays(true); // lists weekdays Saturday-Friday in Arabic
    moment.weekdays(true, 2); //will result in Monday in Arabic
    const date = new Date;
    const lastDay = new Date(date.getFullYear(), date.getMonth()+1,0).getDate();
    const monthDays = document.querySelector('#attendence_table thead tr');
    let days = `<th>អវត្តមានបុគ្គលិក</th>`;
    document.querySelector(".current_date h3").innerHTML = moment.months(date.getMonth());
    document.querySelector(".current_date p").innerHTML = date.toDateString();


    

    for(let i=1; i<=lastDay;i++){
        moment.locale('km');
        if(i=== new Date().getDate() && date.getMonth() === new Date().getMonth()){
            days += `<th id="today" class="${moment.weekdaysShort(i) == 'អា' ? 'sunday':'' }">
            <span class="day_number">${i}</span>
            <span class="day_khmer">${moment.weekdaysShort(i)}</span>
            </th>`;
        }else{
            days += `<th id="day_${i}" class="${moment.weekdaysShort(i) == 'អា' ? 'sunday':'' }">
            <span class="day_number">${i}</span>
            <span class="day_khmer">${moment.weekdaysShort(i)}</span>
            </td>`;
        }
        monthDays.innerHTML = days;
    }
}

