const date = new Date;
const lastDay = new Date(date.getFullYear(), date.getMonth()+1,0).getDate();
moment.locale('km');
window.getDataDeployCable = function(page,show){
    $("#card-deploy-cable").append(`<div class="overlay"><i class="fas fa-2x fa-sync-alt fa-spin"></i></div>`);
    $("#card-deploy-cable .card-title").html(`របាយការណ៍ខ្សែរកាបទិ៍ OPN`);
    $.get({
        url: `/deploy_cable/json?page=${page}&show=${show}`,
        success:function(data){
            $("#card-deploy-cable").find('.overlay').remove();
            $("#card-deploy-cable tbody").empty();
            $("#pagination").empty();
            let paginates = '';
            let adjacents = "2";

            if (data.current_page == 1) {
                paginates += `<li class="page-item active disabled"><a class="page-link link" data-show="${$("select[name='show']").val()}" data-page="1" href="#"><i class="fas fa-chevron-left"></i></a></li>`;
            }else{
                paginates += `<li class="page-item"><a class="page-link link" data-show="${$("select[name='show']").val()}" data-page="${data.current_page-1}" href="#"><i class="fas fa-chevron-left"></i></a></li>`;
            }

            if(data.current_page < 5){
                for(let i = 1; i< 6; i++){
                    if(i == data.current_page){
                        paginates += `<li class="page-item active disabled"><a class="page-link link" data-show="${$("select[name='show']").val()}" data-page="${i}" href="#">${i}</a></li>`;
                    }else{
                        paginates += `<li class="page-item"><a class="page-link link" data-show="${$("select[name='show']").val()}" data-page="${i}" href="#">${i}</a></li>`;
                    }
                }
                //Skip
                paginates += `<li class="page-item disabled"><a class="page-link">...</a></li>`;
                //last
                paginates += `<li class="page-item"><a class="page-link link" data-show="${$("select[name='show']").val()}" data-page="${data.last_page}" href="#">${data.last_page}</a></li>`;
             }
             if(data.current_page >= 5 && data.current_page < data.last_page - 5){
                paginates += `<li class="page-item"><a class="page-link link" data-show="${$("select[name='show']").val()}" data-page="1" href="#">1</a></li>`;
                paginates += `<li class="page-item disabled"><a class="page-link">...</a></li>`;
                for(let i = data.current_page; i<= data.current_page+4;i++){
                    if(i == data.current_page){
                        paginates += `<li class="page-item active disabled"><a class="page-link link" data-show="${$("select[name='show']").val()}" data-page="${i}" href="#">${i}</a></li>`;
                    }else{
                        paginates += `<li class="page-item"><a class="page-link link" data-show="${$("select[name='show']").val()}" data-page="${i}" href="#">${i}</a></li>`;
                    }
                }
                //Skip
                paginates += `<li class="page-item disabled"><a class="page-link">...</a></li>`;
                //last
                paginates += `<li class="page-item"><a class="page-link link" data-show="${$("select[name='show']").val()}" data-page="${data.last_page}" href="#">${data.last_page}</a></li>`;
             }
             if(data.current_page+5 >= data.last_page ){
                paginates += `<li class="page-item"><a class="page-link link" data-show="${$("select[name='show']").val()}" data-page="1" href="#">1</a></li>`;
                paginates += `<li class="page-item disabled"><a class="page-link">...</a></li>`;
                for(let i = data.last_page-5; i<= data.last_page;i++){
                    if(i == data.current_page){
                        paginates += `<li class="page-item active disabled"><a class="page-link link" data-show="${$("select[name='show']").val()}" data-page="${i}" href="#">${i}</a></li>`;
                    }else{
                        paginates += `<li class="page-item"><a class="page-link link" data-show="${$("select[name='show']").val()}" data-page="${i}" href="#">${i}</a></li>`;
                    }
                }
             }

             if (data.current_page+5 >= data.last_page ) {
                paginates += `<li class="page-item active disabled"><a class="page-link link" data-show="${$("select[name='show']").val()}" data-page="1" href="#"><i class="fas fa-chevron-right"></i></a></li>`;
            }else{
                paginates += `<li class="page-item"><a class="page-link link" data-show="${$("select[name='show']").val()}" data-page="${data.current_page+1}" href="#"><i class="fas fa-chevron-right"></i></a></li>`;
            }

             

            //paginates += `<li class="page-item disabled"><a class="page-link">...</a></li>`;


            $("#pagination").append(`<nav aria-label="Page navigation"><ul class="pagination">${paginates}</ul></nav>`);
            $(".link").click(function(e){
                getDataDeployCable($(this).attr('data-page'),$(this).attr('data-show'));
                $("#current_page").val($(this).attr('data-page'));
                e.preventDefault();
            });
            let td = '';
            $.map(data.data,function(v,i){
                td = `<tr>
                <td>${ (data.current_page-1) * data.per_page +  i+1}</td>
                <td>P5013</td>
                <td>PPH.I.U.PP.020121.03</td>
                <td>16/01/2021</td>
                <td>16/01/2021</td>
                <td>16/01/2021</td>
                <td></td>
                <td></td>
            </tr>`;
            $("#card-deploy-cable tbody").append(td);
            })
            console.log(data);
        }
    });
}
getDataDeployCable(1,$("select[name='show']").val());