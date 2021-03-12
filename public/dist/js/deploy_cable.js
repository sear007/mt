const date = new Date;
const lastDay = new Date(date.getFullYear(), date.getMonth()+1,0).getDate();
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});
moment.locale('km');
window.getDataDeployCable = function(page,show,new_row){
    
    $("#card-deploy-cable").append(`<div class="overlay"><i class="fas fa-2x fa-sync-alt fa-spin"></i></div>`);
    $("#card-deploy-cable .card-title").html(`របាយការណ៍ខ្សែរកាបទិ៍ OPN`);
    $.get({
        url: `/deploy_cable/json?page=${page}&show=${show}`,
        success:function(data){
            $("#card-deploy-cable").find('.overlay').remove();
            $("#card-deploy-cable tbody").empty();
            $("#pagination").empty();
            if(data.data.length>0){
                let paginates = '';
                paginates += `<li class="page-item ${data.current_page===1?'active disabled':''}"><a class="page-link link" data-show="${$("select[name='show']").val()}" data-page="${data.current_page-1}" href="#"><i class="fas fa-chevron-left"></i></a></li>`;
                if(data.last_page <= 5){
                    for(let i = 1; i<=data.last_page; i++){
                        if(i == data.current_page){
                            paginates += `<li class="page-item active disabled"><a class="page-link link" data-show="${$("select[name='show']").val()}" data-page="${i}" href="#">${i}</a></li>`;
                        }else{
                            paginates += `<li class="page-item"><a class="page-link link" data-show="${$("select[name='show']").val()}" data-page="${i}" href="#">${i}</a></li>`;
                        }
                    }
                }else{
                    if(data.current_page <= 4){
                        for(let i = 1; i<6; i++){
                            if(i == data.current_page){
                                paginates += `<li class="page-item active disabled"><a class="page-link link" data-show="${$("select[name='show']").val()}" data-page="${i}" href="#">${i}</a></li>`;
                            }else{
                                paginates += `<li class="page-item"><a class="page-link link" data-show="${$("select[name='show']").val()}" data-page="${i}" href="#">${i}</a></li>`;
                            }
                        }
                        paginates += `<li class="page-item disabled"><a class="page-link">...</a></li>`;
                        paginates += `<li class="page-item"><a class="page-link link" data-show="${$("select[name='show']").val()}" data-page="${data.last_page}" href="#">${data.last_page}</a></li>`;
                    }else{
                        if(data.current_page<data.last_page-5){
                            paginates += `<li class="page-item"><a class="page-link link" data-show="${$("select[name='show']").val()}" data-page="1" href="#">1</a></li>`;
                            paginates += `<li class="page-item disabled"><a class="page-link">...</a></li>`;
                            for(let i = data.current_page; i<data.current_page+6; i++){
                                if(i == data.current_page){
                                    paginates += `<li class="page-item active disabled"><a class="page-link link" data-show="${$("select[name='show']").val()}" data-page="${i}" href="#">${i}</a></li>`;
                                }else{
                                    paginates += `<li class="page-item"><a class="page-link link" data-show="${$("select[name='show']").val()}" data-page="${i}" href="#">${i}</a></li>`;
                                }
                            }
                            if(data.current_page+6 !== data.last_page){
                                paginates += `<li class="page-item disabled"><a class="page-link">...</a></li>`;
                            }
                            paginates += `<li class="page-item"><a class="page-link link" data-show="${$("select[name='show']").val()}" data-page="${data.last_page}" href="#">${data.last_page}</a></li>`;
                        }else{
                            paginates += `<li class="page-item"><a class="page-link link" data-show="${$("select[name='show']").val()}" data-page="1" href="#">1</a></li>`;
                            paginates += `<li class="page-item disabled"><a class="page-link">...</a></li>`;
                            for(let i = data.last_page-5; i<=data.last_page; i++){
                                if(i == data.current_page){
                                    paginates += `<li class="page-item active disabled"><a class="page-link link" data-show="${$("select[name='show']").val()}" data-page="${i}" href="#">${i}</a></li>`;
                                }else{
                                    paginates += `<li class="page-item"><a class="page-link link" data-show="${$("select[name='show']").val()}" data-page="${i}" href="#">${i}</a></li>`;
                                }
                            }
                        }   
                    }
                }
                //Next
                paginates += `<li class="page-item ${data.current_page===data.last_page?'active disabled':''}"><a class="page-link link" data-show="${$("select[name='show']").val()}" data-page="${data.current_page+1}" href="#"><i class="fas fa-chevron-right"></i></a></li>`;
                //paginates += `<li class="page-item disabled"><a class="page-link">...</a></li>`;
                $("#pagination").append(`<nav aria-label="Page navigation"><ul class="pagination">${paginates}</ul></nav>`);
                $(".link").click(function(e){
                    getDataDeployCable($(this).attr('data-page'),$(this).attr('data-show'),false);
                    $("#current_page").val($(this).attr('data-page'));
                    e.preventDefault();
                });
                let td = '';
                $.map(data.data,function(v,i){
                    td = `<tr>
                            <td>${ (data.current_page-1) * data.per_page +  i+1}</td>
                            <td>${v.name_pop}</td>
                            <td>${v.plan_code}</td>
                            <td>${v.request_day?v.request_day:''}</td>
                            <td>${v.return_day?v.return_day:''}</td>
                            <td>${v.send_file_opn?v.send_file_opn:''}</td>
                            <td>${v.take_invoice?v.take_invoice:''}</td>
                            <td>${v.pay_money?v.pay_money:''}</td>
                            <td>
                            <div class="btn-group">
                                <button data-toggle="tooltip" title="កែសំម្រួល" class="btn btn-default btn-sm"><i class="fas fa-edit"></i></button>
                                <button data-toggle="tooltip" title="លុបចេញ" class="btn btn-default btn-sm"><i class="fas fa-trash text-danger"></i></button>
                            </div>
                            </td>
                    </tr>`;
                    $("#card-deploy-cable tbody").append(td);
                });
                if(new_row){ $('#card-deploy-cable tbody tr:first').addClass('animate__animated  animate__headShake animate__slow"'); }
                $('[data-toggle="tooltip"]').tooltip();
            }else{
                td = `<tr>
                        <td colspan="8">
                            <h3 class="py-5">ទិន្នន័យគ្មាន</h3>
                        </td>
                    </tr>`;
                $("#card-deploy-cable tbody").append(td);
            }



        }
    });
}
getDataDeployCable(1,$("select[name='show']").val(),false);
$("select[name=show]").change(function(){
    getDataDeployCable(1,$(this).val(),false);
});