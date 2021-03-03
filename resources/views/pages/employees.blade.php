@extends('layouts.app')
@section('content')

<div class="content-wrapper">
    <section class="content py-3">
      <div class="container-fluid">
          <div class="row">
              <div class="col-md-3">
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
                                  <label for="">ប្រាក់ខែ</label>
                                  <input type="number" name="salary" id="salary" class="form-control mb-4">
                                  <button id="btnStoreDataEmployee" class="btn-flat btn btn-default" type="button" >បញ្ចូលទិន្នន័យ </button>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-md-9 col-lg-6">
                  <div class="card" id="card-list-employees">
                      <div class="card-header">
                          <h3 class="card-title">
                              បញ្ជីរឈ្មោះបុគ្គលិក
                          </h3>
                          <div class="card-tools">
                              <select class="form-control" name="show">
                                  <option  value="5">បង្ហាញ 5 ឈ្មោះ</option>
                                  <option value="10">បង្ហាញ 10 ឈ្មោះ</option>
                                  <option selected value="20">បង្ហាញ 20 ឈ្មោះ</option>
                                  <option value="50">បង្ហាញ 50 ឈ្មោះ</option>
                                  <option value="100">បង្ហាញ 100 ឈ្មោះ</option>
                              </select>
                          </div>
                      </div>
                      <div class="card-body">
                          <div class="table-responsive">
                              <table class="table table-bordered table-sm" id="table-list-employees">
                                  <thead>
                                      <tr>
                                          <th>#</th>
                                          <th>ឈ្មោះ</th>
                                      </tr>
                                  </thead>
                                  <tbody></tbody>
                              </table>
                              <div id="pagination-employees"></div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </section>
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
                if(data.code === 200){
                    $("#card-list-employees").find($(".overlay")).remove();
                    $("#table-list-employees tbody").empty();
                    let paginates = '';
                    for (let i = 1; i <= data.data.total/data.data.per_page; i++){
                        paginates += `<li class="page-item ${data.data.current_page===i?'active disabled':''}"><a class="page-link" data-show="${$("select[name='show']").val()}" data-page="${i}" href="#">${i}</a></li>`;
                    }
                    $("#pagination-employees").empty();
                    $("#pagination-employees").append(`<nav aria-label="Page navigation"><ul class="pagination" id="pagination-employees">${paginates}</ul></nav>`);
                    
                    $.map(data.data.data, function(v,i){
                        var data = `<tr>
                        <td></td>
                        <td>${v.name}</td>
                        </tr>`;
                        $("#table-list-employees").append(data);
                        $("#table-list-employees tbody tr").each(function(idx){
                            $(this).children("td:eq(0)").html(idx+1);
                        })
                    });
                    $(".page-link").click(function(e){
                        getDataEmployees($(this).attr('data-show'),$(this).attr('data-page'));
                        e.preventDefault();
                    });
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
                    getDataEmployees($("select[name='show']").val(),1);
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
    $("#btnStoreDataEmployee").click(function(){
        storeDataEmployee();
    });
    getDataEmployees($("select[name='show']").val(),1);
    $("select[name='show']").change(function(){ 
        getDataEmployees($(this).val(),1); 
    });
    
</script>
@endsection