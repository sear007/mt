@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <section class="content py-3">
      <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
               <div class="card" id="card-deploy-cable">
                   <div class="card-header">
                       <h3 class="card-title"></h3>
                       <div class="card-tools">
                        <button id="print-data" data-html="true" data-toggle="tooltip" title="<h3>ព្រីនឯកសារ</h3>"  class="btn btn-default btn-lg"><i class="fas fa-print"></i></button>
                        <button data-toggle="modal" data-target="#add" id="print-data" data-html="true" data-toggle="tooltip" title="<h3>បញ្ចូលទិន្នន័យ</h3>" class="btn btn-default btn-lg"><i class="fas fa-plus"></i></button>
                       </div>
                       <div class="card-tools mr-3">
                        <select class="custom-select custom-select-lg" name="show">
                            <option selected  value="20">បង្ហាញម្តង 20</option>
                            <option  value="50">បង្ហាញម្តង 50</option>
                            <option value="100">បង្ហាញម្តង 100</option>
                            <option  value="500">បង្ហាញម្តង 500</option>
                        </select>
                       </div>
                   </div>
                   <div class="card-body">
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
                            <div class="form-group mb-3">
                                <span class="text-muted" for="name_pop">Name POP</span>
                                <input name="name_pop" id="name_pop"  type="text" class="form-control form-control-sm">
                            </div>
                            <div class="form-group mb-3">
                                <span class="text-muted" for="plan_code">Plan Code</span>
                                <input name="plan_code" id="plan_code"  type="text" class="form-control form-control-sm" >
                            </div>
                            <div class="form-group mb-3">
                                <span class="text-muted" for="request_day">Request Day</span>
                                <input name="request_day" id="request_day" data-toggle="datetimepicker" data-target="#request_day"  type="text" class="form-control form-control-smdatetimepicker-input" >
                            </div>
                            <div class="form-group mb-3">
                                <span class="text-muted" for="return_day">Return Day</span>
                                <input name="return_day" id="return_day" data-toggle="datetimepicker" data-target="#return_day" type="text" class="form-control form-control-sm" >
                            </div>
                            <div class="form-group mb-3">
                                <span class="text-muted" for="send_file_opn">Send file opn</span>
                                <input name="send_file_opn" id="send_file_opn" data-toggle="datetimepicker" data-target="#send_file_opn"  type="text" class="form-control form-control-sm" >
                            </div>
                            <div class="form-group mb-3">
                                <span class="text-muted" for="take_invoice">Take Invoice</span>
                                <input name="take_invoice" id="take_invoice" data-toggle="datetimepicker" data-target="#take_invoice"   type="text" class="form-control form-control-sm" >
                            </div>
                            <div class="form-group mb-3">
                                <span class="text-muted" for="pay_money">Pay Money</span>
                                <input name="pay_money" id="pay_money" data-toggle="datetimepicker" data-target="#pay_money"  type="text" class="form-control form-control-sm" >
                            </div>
                            <button type="submit" class="btn btn-default btn-lg" >បញ្ចូនទិន្នន័យ</button>
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
    $('#request_day,#return_day,#send_file_opn,#take_invoice,#pay_money').datetimepicker({format: 'L'});
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
                    submitBtn.find('i').remove();
                    submitBtn.prop('disabled',false);
                    Toast.fire({ icon: 'error',html: `<span class="text-muted" class="ml-2">ប្រព័ន្នទិន្នន័យមានបញ្ហា សូមអធ្យាស្រ័យ។</span><br><span class="text-muted" class="ml-2">ទំនាក់ទំនង ០៧៧៦៦៦១៦៥</span>`,})
                }
            })
    
    });
</script>

@endsection
@endsection