@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content py-3">
      <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h3 class="py-2">១.១ បើកខ្សែកាប OPN</h3>
               <div class="card card-outline card-info" id="card-deploy-cable">
                   <div class="card-body">
                    <div class="d-flex justify-content-between mb-2">
                        <div>
                            <a target="blank" href="{{url('/deploy_cable/print')}}" id="print-data" data-html="true" data-toggle="tooltip" title="<h3>ព្រីនឯកសារ</h3>"  class="btn btn-default"><i class="fas fa-print"></i></a>
                            <span data-html="true" data-toggle="tooltip" title="<h3>បញ្ចូលទិន្នន័យ</h3>">
                                <button data-toggle="modal" data-target="#add" id="print-data"  class="btn btn-default"><i class="fas fa-plus"></i></button>
                            </span>
                         </div>
                        <div>
                            <select class="custom-select" name="show">
                                <option selected  value="20">បង្ហាញម្តង 20</option>
                                <option  value="50">បង្ហាញម្តង 50</option>
                                <option value="100">បង្ហាញម្តង 100</option>
                                <option  value="500">បង្ហាញម្តង 500</option>
                            </select>
                            <input type="hidden" value="1" id="current_page">
                        </div>
                    </div>
                       <div class="table-responsive">
                           <table class="table table-bordered table-sm deploy_cable" id="deploy_cable">
                               <thead>
                                   <tr>
                                       <th>No</th>  
                                       <th>Name POP</th>
                                       <th>Plan Code</th>
                                       <th>Request<span class="text-muted">(Day)</span></th>
                                       <th>Return<span class="text-muted">(Day)</span></th>
                                       <th>Send File OPN<span class="text-muted">(Day)</span></th>
                                       <th>Take Invoice<span class="text-muted">(Day)</span></th>
                                       <th>Pay Money<span class="text-muted">(Day)</span></th>
                                       <th><i class="fas fa-cogs"></i></th>
                                   </tr>
                               </thead>
                               <tbody>
                                   
                               </tbody>
                           </table>
                       </div>
                       <div class="my-5" id="pagination"></div>
                   </div>
               </div>
            </div>
        </div>
      </div>
    </section>
</div>
<div class="modal fade" id="add">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="card" id="addForm">
                    <div class="card-header">
                        <h3 class="card-title">ទំរង់បញ្ចូលទិន្នន័យ</h3>
                    </div>
                    <div class="card-body">
                        <form id="formAdd">
                            @csrf
                            <div class="form-group mb-1">
                                <span class="text-muted" for="name_pop">Name POP</span>
                                <input name="name_pop" id="name_pop"  type="text" class="form-control form-control-sm form-control form-control-sm-sm">
                            </div>
                            <div class="form-group mb-1">
                                <span class="text-muted" for="plan_code">Plan Code</span>
                                <input name="plan_code" id="plan_code"  type="text" class="form-control form-control-sm form-control form-control-sm-sm" >
                            </div>
                            <div class="form-group mb-1">
                                <span class="text-muted" for="request_day">Request Day</span>
                                <div class="input-group date" id="request_day" data-target-input="nearest">
                                    <input name="request_day" type="text" class="form-control form-control-sm datetimepicker-input" data-target="#request_day"/>
                                    <div class="input-group-append" data-target="#request_day" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                <span class="text-muted" for="return_day">Return Day</span>
                                <div class="input-group date" id="return_day" data-target-input="nearest">
                                    <input name="return_day" type="text" class="form-control form-control-sm datetimepicker-input" data-target="#return_day"/>
                                    <div class="input-group-append" data-target="#return_day" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                <span class="text-muted" for="send_file_opn">Send file opn</span>
                                <div class="input-group date" id="send_file_opn" data-target-input="nearest">
                                    <input name="send_file_opn" type="text" class="form-control form-control-sm datetimepicker-input" data-target="#send_file_opn"/>
                                    <div class="input-group-append" data-target="#send_file_opn" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                <span class="text-muted" for="take_invoice">Take Invoice</span>
                                <div class="input-group date" id="take_invoice" data-target-input="nearest">
                                    <input name="take_invoice" type="text" class="form-control form-control-sm datetimepicker-input" data-target="#take_invoice"/>
                                    <div class="input-group-append" data-target="#take_invoice" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                <span class="text-muted" for="pay_money">Pay Money</span>
                                <div class="input-group date" id="pay_money" data-target-input="nearest">
                                    <input name="pay_money" type="text" class="form-control form-control-sm datetimepicker-input" data-target="#pay_money"/>
                                    <div class="input-group-append" data-target="#pay_money" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-dark " >បញ្ចូនទិន្នន័យ</button>
                            <button type="reset" class="btn btn-default" >លុបចោល</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="edit">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="card" id="addForm">
                    <div class="card-header">
                        <h3 class="card-title">កែសំម្រួលទិន្នន័យ</h3>
                    </div>
                    <div class="card-body">
                        <form id="formEdit">
                            @csrf
                            <input type="hidden" name="id" id="id_edit">
                            <div class="form-group mb-1">
                                <span class="text-muted" for="name_pop_edit">Name POP</span>
                                <input name="name_pop" id="name_pop_edit"  type="text" class="form-control form-control-sm form-control form-control-sm-sm">
                            </div>
                            <div class="form-group mb-1">
                                <span class="text-muted" for="plan_code_edit">Plan Code</span>
                                <input name="plan_code" id="plan_code_edit"  type="text" class="form-control form-control-sm form-control form-control-sm-sm" >
                            </div>
                            <div class="form-group mb-1">
                                <span class="text-muted" for="request_day_edit">Request Day</span>
                                <div class="input-group date" id="request_day_edit" data-target-input="nearest">
                                    <input name="request_day" id="request_day_edit_input" type="text" class="form-control form-control-sm datetimepicker-input" data-target="#request_day_edit"/>
                                    <div class="input-group-append" data-target="#request_day_edit" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                <span class="text-muted" for="return_day_edit">Return Day</span>
                                <div class="input-group date" id="return_day_edit" data-target-input="nearest">
                                    <input name="return_day" id="return_day_edit_input" type="text" class="form-control form-control-sm datetimepicker-input" data-target="#return_day_edit"/>
                                    <div class="input-group-append" data-target="#return_day_edit" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                <span class="text-muted" for="send_file_opn_edit">Send file opn</span>
                                <div class="input-group date" id="send_file_opn_edit" data-target-input="nearest">
                                    <input name="send_file_opn" id="send_file_opn_edit_input" type="text" class="form-control form-control-sm datetimepicker-input" data-target="#send_file_opn_edit"/>
                                    <div class="input-group-append" data-target="#send_file_opn_edit" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                <span class="text-muted" for="take_invoice_edit">Take Invoice</span>
                                <div class="input-group date" id="take_invoice_edit" data-target-input="nearest">
                                    <input name="take_invoice" id="take_invoice_edit_input" type="text" class="form-control form-control-sm datetimepicker-input" data-target="#take_invoice_edit"/>
                                    <div class="input-group-append" data-target="#take_invoice_edit" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-1">
                                <span class="text-muted" for="pay_money_edit">Pay Money</span>
                                <div class="input-group date" id="pay_money_edit" data-target-input="nearest">
                                    <input name="pay_money" id="pay_money_edit_input" type="text" class="form-control form-control-sm datetimepicker-input" data-target="#pay_money_edit"/>
                                    <div class="input-group-append" data-target="#pay_money_edit" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-dark" >កែសំម្រួលទិន្នន័យ</button>
                            <button type="reset" class="btn btn-default" >លុបចោល</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@section('styles')
<link rel="stylesheet" href="{{ asset('dist/css/bootstrap-datetimepicker.min.css') }}" />
<link rel="stylesheet" href="{{ asset('dist/css/sweetalert2.min.css') }}" />
<link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}" />
<link rel="stylesheet" href="{{ asset('dist/css/animate.min.css') }}" />
@endsection
@section('scripts')
<script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('plugins/moment/locales.js') }}"></script>
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{ asset('dist/js/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('dist/js/deploy_cable.js') }}"></script>
<script>
    $('#request_day,#return_day,#send_file_opn,#take_invoice,#pay_money').datetimepicker({
        format: 'DD-MM-YYYY',
        useCurrent: false,
        autoclose: true,
    });
    $('#request_day_edit,#return_day_edit,#send_file_opn_edit,#take_invoice_edit,#pay_money_edit').datetimepicker({
        format: 'DD-MM-YYYY',
        useCurrent: false,
        autoclose: true,
    });

    $("#formEdit").submit(function(e){
        updateDataDeployCable($(this).serialize());
        e.preventDefault();
    })

    $("#formAdd").submit(function(e){
        e.preventDefault();
        var formData = $(this).serialize();
            submitBtn = $(this).find($('button[type=submit]'));
            submitBtn.prepend('<i class="fas fa-sync-alt fa-spin mr-3 text-info"></i>');
            submitBtn.prop('disabled',true);
            $.ajax({
                url:"{{ route('deploy_cable_store') }}",
                method:"post",
                data:formData,
                success:function(data){
                    console.log(data);
                    submitBtn.find('i').remove();
                    submitBtn.prop('disabled',false);
                    if(data.code===200){
                        Toast.fire({ icon: 'success',html: `<span class="text-muted" class="ml-2">${data.message}</span>`,});
                        getDataDeployCable(1,$("select[name='show']").val(),true);
                    }else{
                        $.map(data.errors,function(v,i){
                            $(`#${i}`).addClass('is-invalid');
                            setTimeout(() => { $(`#${i}`).removeClass('is-invalid')  }, 2000);
                        })
                    }
                },
                error:function(x,s){
                    console.error(x);
                    submitBtn.find('i').remove();
                    submitBtn.prop('disabled',false);
                    Toast.fire({ icon: 'error',html: `<span class="text-muted" class="ml-2">ប្រព័ន្នទិន្នន័យមានបញ្ហា សូមអធ្យាស្រ័យ។</span><br><span class="text-muted" class="ml-2">ទំនាក់ទំនង ០៧៧៦៦៦១៦៥</span>`,})
                }
            })
    });
</script>

@endsection
@endsection