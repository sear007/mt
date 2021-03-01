

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
            console.log(data);
        }
    })
}