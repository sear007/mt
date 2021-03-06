@extends('layouts.app')
@section('content')

<div class="content-wrapper">
    <section class="content py-3">
      <div class="container-fluid">
          <div class="row justify-content-center">
              <div class="col-md-12 col-lg-9">
                <h3 class="py-2">២.២ បញ្ជីរឈ្មោះបុគ្គលិក</h3>
                  <div class="card card-outline card-info" id="card-list-employees">
                      <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <div>
                              <a target="blank" href="#" id="print-data" data-html="true" data-toggle="tooltip" title="ព្រីនឯកសារ"  class="btn btn-default btn-sm"><i class="fas fa-print"></i></a>
                              <span data-html="true" data-toggle="tooltip" title="បញ្ចូលទិន្នន័យ">
                                  <button data-toggle="modal" data-target="#modalAdd"  class="btn btn-default btn-sm"><i class="fas fa-plus"></i></button>
                              </span>
                             </div>
                            <div>
                                <select class="custom-select custom-select-sm " name="show">
                                    <option value="5">បង្ហាញម្តង 5</option>
                                    <option value="10">បង្ហាញម្តង 10</option>
                                    <option value="20">បង្ហាញម្តង 20</option>
                                    <option selected value="50">បង្ហាញម្តង 50</option>
                                    <option value="100">បង្ហាញម្តង 100</option>
                                </select>
                                <input type="hidden" value="1" id="current_page">
                            </div>
                        </div>
                          <div class="table-responsive">
                              <table class="table table-bordered table-sm table-employee" id="table-list-employees">
                                  <thead>
                                      <tr>
                                          <th style="width: 4%;text-align:center" class="text-center">#</th>
                                          <th style="width: 22%;text-align:center">ឈ្មោះ</th>
                                          <th style="width: 22%;text-align:center">មុខងារ</th>
                                          <th style="width: 22%;text-align:center">ហត្ថលេខា</th>
                                          <th style="width: 22%;text-align:center">ថ្ងៃត្រូវបើក</th>
                                          <th style="width: 8%;text-align:center" ><i class="fas fa-cogs"></i></th>
                                      </tr>
                                  </thead>
                                  <tbody></tbody>
                              </table>
                              <div class="d-flex justify-content-between">
                                  <div id="pagination-employees"></div>
                                  <div id="page_status">បង្ហាញ <span id="page_from"></span> ដល់ <span id="page_to"></span> ក្នុង <span id="page_total"></span> </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </section>
</div>
<div class="modal fade" id="modalEdit">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="card" id="cardEdit">
                    <div class="card-body">
                        <form id="modalEditForm">
                            @csrf
                            <input type="hidden" name="id" id="id_edit">
                            <label for="">ឈ្មោះបុគ្គលិក</label>
                            <input type="text" name="name_edit" id="name_edit" class="form-control mb-2">
                            <label for="">មុខដំណែង</label>
                            <input type="text" name="position_edit" id="position_edit" class="form-control mb-2">
                            <button class="btn-flat btn btn-default" type="submit" > កែប្រែទិន្នន័យ </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalAdd">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            បញ្ចូលឈ្មោះបុគ្គលិក
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <form id="formStoreDataEmployee">
                                @csrf
                                <label for="">ឈ្មោះបុគ្គលិក</label>
                                <input type="text" name="name" id="name" class="form-control mb-2">
                                <label for="">មុខដំណែង</label>
                                <input type="text" name="position" id="position" class="form-control mb-2">
                                <button id="btnStoreDataEmployee" class="btn-flat btn btn-default" type="button" >បញ្ចូលទិន្នន័យ </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('styles')
<link rel="stylesheet" href="{{ asset('dist/css/sweetalert2.min.css') }}" />
@endsection
@section('scripts')
<script src="{{ asset('dist/js/sweetalert2.all.min.js') }}"></script>
<script>
    window.getDataEmployees = function(show,page){
        $("#card-list-employees").append(`<div class="overlay"><i class="fas fa-2x fa-sync-alt fa-spin"></i></div>`);
        $.ajax({
            url:`employees/?show=${show}&page=${page}`,
            success: function(data){
                console.log(data.data);
                if(data.data.data.length > 0){
                    if(data.code === 200){
                        $("#page_from").text(data.data.from);
                        $("#page_to").text(data.data.to);
                        $("#page_total").text(data.data.total);
                        $("#card-list-employees").find($(".overlay")).remove();
                        $("#table-list-employees tbody").empty();
                        let paginates = '';
                        for (let i = 1; i <= data.data.last_page; i++){
                            paginates += `<li class="page-item ${data.data.current_page===i?'active disabled':''}"><a class="page-link" data-show="${$("select[name='show']").val()}" data-page="${i}" href="#">${i}</a></li>`;
                            
                        }
                        $("#pagination-employees").empty();
                        $("#pagination-employees").append(`<nav aria-label="Page navigation"><ul class="pagination" id="pagination-employees">${paginates}</ul></nav>`);
                        
                        $.map(data.data.data, function(v,i){
                            var tr = `<tr>
                            <td class="text-center">${ (data.data.current_page-1) * data.data.per_page +  i+1}</td>
                            <td>${v.name}</td>
                            <td><span class="text-muted">${v.position}</span></td>
                            <td></td>
                            <td></td>
                            <td style="width:70px;padding:0">
                                <div class="btn-group btn-block">
                                    <button onclick="return editDataEmployee(${v.id})" class="btn btn-sm btn-flat btn-default"><i class="fas fa-edit"></i></button>
                                    <button  onclick="return destroyDataEmployee(${v.id},'${v.name}')" class="btn btn-sm btn-flat btn-default"><i class="fas fa-trash text-danger"></i></button>
                                </div>
                            </td>
                            </tr>`;
                            $("#table-list-employees").append(tr);
                        });
                        $(".page-link").click(function(e){
                            getDataEmployees($(this).attr('data-show'),$(this).attr('data-page'));
                            $("#current_page").val($(this).attr('data-page'));
                            e.preventDefault();
                        });
                    }
                }else{
                    $("#table-list-employees tbody").empty();
                    $("#pagination-employees").empty();
                    $("#page_status").empty();
                    $("#card-list-employees").find($(".overlay")).remove();
                    $("#table-list-employees").append(`<tr><td colspan="7" class="p-5 text-center h1">គ្មានទិន្នន័យ</td></tr>`);
                }
            }
        })
    }
    
    window.storeDataEmployee = function(){
        $.ajax({
            url:"{{ route('employees_store') }}",
            method:"post",
            data:$('#formStoreDataEmployee').serialize(),
            success: function(data){
                if(data.code === 200){
                    Swal.fire(data.message, '', 'success');
                    getDataEmployees($("select[name='show']").val(),$("#current_page").val());
                }else{
                    $.map(data.errors,function(v,i){
                        $(`#${i}`).addClass('is-invalid');
                    })
                }
            },
            error: function(jqXHR, textStatus ){
                console.log(jqXHR.responseText);
            }
        })
    }
    window.editDataEmployee = function(id){
        $.get({
            url:"/employees/edit/"+id,
            success:function(data){
                $("#modalEdit").modal('show');
                $("#id_edit").val(data.data.id);
                $("#name_edit").val(data.data.name);
                $("#position_edit").val(data.data.position);
                $("#salary_edit").val(data.data.salary);
                $("#modalEditForm").on("submit",function(e){
                    $.ajax({
                        url:"{{ route('employees_update') }}",
                        method:"post",
                        data:$(this).serialize(),
                        success:function(data){
                            if(data.code === 200){
                                getDataEmployees($("select[name='show']").val(),$("#current_page").val());
                                Swal.fire(data.message, '', 'success');
                            }else{
                                $.map(data.errors,function(v,i){
                                    $(`#${i}`).addClass('is-invalid');
                                });
                                setTimeout(() => {
                                    $('.is-invalid').removeClass('is-invalid');
                                }, 3000);
                            }
                        },
                        error:function(x,t){
                            console.log(x);
                        }
                    })
                    e.preventDefault();
                })
            },
            error: function(x,s){
                console.log(x.responseText);
            }
        })
    };
    window.destroyDataEmployee = function(id,name){
        Swal.fire({
        icon: 'question',
        title: 'តើលោកអ្នកពិតជាចង់លុប '+name+' ចេញពីបញ្ជីរឈ្មោះមែនទេ?',
        showCancelButton: true,
        showDenyButton: true,
        showConfirmButton: false,
        cancelButtonText: `ចាកចេញ`,
        denyButtonText: `លុបចោល`,
        }).then((result)=>{
            if(result.isDenied){
                $.ajax({
                    url:"{{ route('employees_destroy') }}",
                    method:"POST",
                    data:{"id":id,"name":name,"_token":"{{ csrf_token() }}"},
                    success:function(data){
                        if(data.code === 200){
                            getDataEmployees($("select[name='show']").val(), 1);
                            Swal.fire(data.message, '', 'success');
                        }
                    },
                    error:function(x,t){
                        console.log(x);
                    }
                })
            }
        })
    };
    $("#btnStoreDataEmployee").click(function(){
        storeDataEmployee();
    });
    getDataEmployees($("select[name='show']").val(),$("#current_page").val());
    $("select[name='show']").change(function(){ 
        getDataEmployees($(this).val(),$("#current_page").val()); 
    });
    
</script>

@endsection