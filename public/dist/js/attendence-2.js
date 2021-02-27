
const date = new Date;
const lastDay = new Date(date.getFullYear(), date.getMonth()+1,0).getDate();
const today = date.getDate();

var currentWeek = 1;
reduce = lastDay-7;
document.getElementById('currentWeek').value = currentWeek;
document.getElementById('reduce').value = reduce;   
if(today > 7){
    document.getElementById('currentWeek').value = 8;
    document.getElementById('reduce').value = lastDay-14;   
}
if(today > 14){
    document.getElementById('currentWeek').value = 15;
    document.getElementById('reduce').value = lastDay-21; 
}
if(today > 21){
    document.getElementById('currentWeek').value = 22;
    document.getElementById('reduce').value = lastDay-28; 
}
if(today > 28){
    document.getElementById('currentWeek').value = 29;
    document.getElementById('reduce').value = lastDay-lastDay; 
}
renderCalendar();

document.getElementById("btn-prev-week").addEventListener("click",function(){
    var substract = 7;
    if(document.getElementById('currentWeek').value == 29){
        var substract = lastDay-28;
        console.log("substract");
    }
    document.getElementById('currentWeek').value = +document.getElementById('currentWeek').value-7;
    document.getElementById('reduce').value = +document.getElementById('reduce').value+substract;
    renderCalendar();
},false);
document.getElementById("btn-next-week").addEventListener("click",function(){
    var substract = 7;
    if(document.getElementById('currentWeek').value == 22){
        var substract = lastDay-28;
        console.log("substract");
    }
    document.getElementById('currentWeek').value = +document.getElementById('currentWeek').value+7;
    document.getElementById('reduce').value = +document.getElementById('reduce').value-substract;
    renderCalendar();
},false);
function renderCalendar (){
    if(document.getElementById('reduce').value == 0){
        document.getElementById('btn-next-week').disabled = true;
    }else{
        document.getElementById('btn-next-week').disabled = false;
    }
    if(document.getElementById('currentWeek').value == 1){
        document.getElementById('btn-prev-week').disabled = true;
    }else{
        document.getElementById('btn-prev-week').disabled = false; 
    }
    const currentWeek = document.getElementById('currentWeek').value;
    const reduce = document.getElementById('reduce').value;
    moment.weekdays(true); // lists weekdays Saturday-Friday in Arabic
    moment.weekdays(true, 2); //will result in Monday in Arabic
    const date = new Date;
    const lastDay = new Date(date.getFullYear(), date.getMonth()+1,0).getDate();
    const monthDays = document.querySelector('#attendence_table thead tr');
    let days = `<th>អវត្តមានបុគ្គលិក</th>`;
    
    document.querySelector(".current_date h3").innerHTML = moment.months(date.getMonth());
    document.querySelector(".current_date p").innerHTML = date.toDateString();

    for(let i=currentWeek; i<=lastDay-reduce;i++){
        var dt_km = moment(`${date.getFullYear()}-${date.getMonth()+1}-${i}`, "YYYY-MM-DD HH:mm:ss").locale('km');
        var dt_en = moment(`${date.getFullYear()}-${date.getMonth()+1}-${i}`, "YYYY-MM-DD HH:mm:ss").locale('en');
        if(i=== new Date().getDate() && date.getMonth() === new Date().getMonth()){
            days += `<th id="today" class="${dt_en.format('dddd') === 'Sunday' ? 'sunday':''}">
            <span class="day_number">${i}</span>
            <span class="day_khmer">${dt_km.format('dddd')}</span>
            <span class="day_english">${dt_en.format('dddd')}</span>
            </td>`;
        }else{
            days += `<th id="day_${i}" class="${dt_en.format('dddd') === 'Sunday' ? 'sunday':''}">
            <span class="day_number">${i}</span>
            <span class="day_khmer">${dt_km.format('dddd')}</span>
            <span class="day_english">${dt_en.format('dddd')}</span>
            </td>`;
        }
        monthDays.innerHTML = days;
    }
    days +='<td>Hi</td>';
    document.getElementById("btn-prev-week").style.height = document.getElementById('today').offsetHeight+"px";
}

