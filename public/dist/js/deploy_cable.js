const date = new Date;
const lastDay = new Date(date.getFullYear(), date.getMonth()+1,0).getDate();
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
});
moment.locale('km');
window.updateDataDeployCable = function(formData){
    $.ajax({
        url:'/deploy_cable/update',
        method:"post",
        data: formData,
        success:function(data){
            if(data.code===200){
                Toast.fire({ icon: 'success',html: `<span class="text-muted" class="ml-2">${data.message}</span>`,});
                getDataDeployCable(1,$("select[name='show']").val(),true);
                $("#edit").modal('hide');
            }else{
                $.map(data.errors,function(v,i){
                    $(`#${i}_edit`).addClass('is-invalid');
                    setTimeout(() => { $(`#${i}_edit`).removeClass('is-invalid')  }, 2000);
                })
            }
        },
        error:function(x,s){
            console.error(x);
            Toast.fire({ icon: 'error',html: `<span class="text-muted" class="ml-2">ប្រព័ន្នទិន្នន័យមានបញ្ហា សូមអធ្យាស្រ័យ។</span><br><span class="text-muted" class="ml-2">ទំនាក់ទំនង ០៧៧៦៦៦១៦៥</span>`,})
        }
    })
}
window.editDataDeployCable = function(id){
    $.get({
        url:"/deploy_cable/edit/"+id,
        success:function(data){
            $("#edit").modal('show');
            $("#id_edit").val(id);
            $("#name_pop_edit").val(data.name_pop);
            $("#plan_code_edit").val(data.plan_code);
            $("#request_day_edit_input").val(data.request_day ? moment(data.request_day).locale('en').format("DD-MM-YYYY"):'');
            $("#return_day_edit_input").val(data.return_day ? moment(data.return_day).locale('en').format("DD-MM-YYYY"):'');
            $("#send_file_opn_edit_input").val(data.send_file_opn ? moment(data.send_file_opn).locale('en').format("DD-MM-YYYY"):'');
            $("#take_invoice_edit_input").val(data.take_invoice ? moment(data.take_invoice).locale('en').format("DD-MM-YYYY"):'');
            $("#pay_money_edit_input").val(data.pay_money ? moment(data.pay_money).locale('en').format("DD-MM-YYYY"):'');
        },
        error:function(x,s){
            console.error(x);
            Toast.fire({ icon: 'error',html: `<span class="text-muted" class="ml-2">ប្រព័ន្នទិន្នន័យមានបញ្ហា សូមអធ្យាស្រ័យ។</span><br><span class="text-muted" class="ml-2">ទំនាក់ទំនង ០៧៧៦៦៦១៦៥</span>`,})
        }
    })
}
window.removeDataDeployCable = function(id){
    if(confirm("បញ្ជាក់! តើពិតជាលុបទិន្នន័យនេះមែនទេ?")){
        $.ajax({
            url:"/deploy_cable/destroy",
            method:"post",
            data:{"id":id,"_token":$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                getDataDeployCable(1,$("select[name='show']").val(),false);
                $('[data-toggle="tooltip"]').tooltip('hide');
                Toast.fire({ icon: 'success',html: `<span class="text-muted" class="ml-2">${data.message}</span>`});
            },
            error:function(x,s){
                console.error(x);
                Toast.fire({ icon: 'error',html: `<span class="text-muted" class="ml-2">ប្រព័ន្នទិន្នន័យមានបញ្ហា សូមអធ្យាស្រ័យ។</span><br><span class="text-muted" class="ml-2">ទំនាក់ទំនង ០៧៧៦៦៦១៦៥</span>`,})
            }
        });
    }
}
window.getDataDeployCable = function(page,show,new_row){
    $("#card-deploy-cable").append(`<div class="overlay"><i class="fas fa-2x fa-sync-alt fa-spin"></i></div>`);
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
                            <td>${v.request_day?moment(v.request_day).locale('en').format("DD-MM-YYYY"):''}</td>
                            <td>${v.return_day?moment(v.return_day).locale('en').format("DD-MM-YYYY"):''}</td>
                            <td>${v.send_file_opn?moment(v.send_file_opn).locale('en').format("DD-MM-YYYY"):''}</td>
                            <td>${v.take_invoice?moment(v.take_invoice).locale('en').format("DD-MM-YYYY"):''}</td>
                            <td>${v.pay_money?moment(v.pay_money).locale('en').format("DD-MM-YYYY"):''}</td>
                            <td style="width:100px;padding:0">
                            <div class="btn-group btn-block ">
                                <button onclick="return editDataDeployCable(${v.id})" data-toggle="tooltip" title="កែសំម្រួល" class="btn btn-flat btn-default btn-sm"><i class="fas fa-edit"></i></button>
                                <button onclick="return removeDataDeployCable(${v.id})" data-toggle="tooltip" title="លុបចេញ" class="btn btn-flat btn-default btn-sm"><i class="fas fa-trash text-danger"></i></button>
                            </div>
                            </td>
                    </tr>`;
                    $("#card-deploy-cable tbody").append(td);
                });
                if(new_row){ $('#card-deploy-cable tbody tr:first').addClass('animate__animated  animate__headShake animate__slow"'); }
                $('[data-toggle="tooltip"]').tooltip();
            }else{
                td = `<tr>
                        <td colspan="9">
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