@extends('layouts.admin')


@section('title','Pengaturan Akun')

@section('content') 

      <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Pengaturan Akun</h4>
                    </div>
                    <!-- /.page title -->
                    
                </div>
                <!-- .row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">Data Akun</h3>
                             <div class="pull-right">
                            <a href="{{route('admin.add-akun')}}" class="btn btn-info waves-effect waves-light" type="button"><span class="btn-label"><i class="fa fa-plus-circle"></i>
                            </span>Tambah Akun</a>
                            </div>
                            <p class="text-muted m-b-30">Pengaturan akun untuk user</p>
                           
                            <div class="table-responsive order-detail-content">
                                <table id="myTable2" class="table table-striped">
                                    <thead>
                                        <tr>
                                          <th>No</th>
                                            <th>Username</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($akun as $data)
                                        <tr>
                                            <td>{{$data->id}}</td>
                                            <td>{{$data->username}}</td>
                                            <td>{{$data->name}}</td>
                                            <td>{{$data->jabatan}}</td>
                                            <td>
                                              <form action="{{ route('admin.pengaturan.delete',$data->id) }}" id="delete" method="POST">  {{ csrf_field() }}
                                                    {{method_field('delete')}}

                                            <td><a class="btn btn-block btn-info fa fa-pencil" href="{{ route('admin.edit-akun',$data->id)}}"></a>
                                                   
                                                <a data-id="{{$data->id}}"  href="javascript:;" class="btn btn-block btn-danger fa fa-trash btn-del-cart"></a>
                                            </td>
                                            </form>
                                        </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                            
                        </div> 
                        </div>
                    </div>
                </div>
                <!-- /.row -->

<script src="{{asset('js/app.js')}}"></script>
<script src="js/sweetalert.min.js"></script>
@include('sweet::alert')
 <script>
$('.btn-del-cart').click(function(){
                var id = $(this).attr("data-id");
                var parent = $(this).parents("tr");
                swal({
                    title: "Apakah Anda Yakin?",
                    text: "Apakah Anda yakin akan menghapus data akun ini ?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                      $.ajaxSetup({
                                headers: {
                              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                             });
                        jQuery.ajax({
                            url: "/pengaturan-akun/delete/"+ id,
                            method: 'delete',
                            type: 'GET', // For jQuery < 1.9
                            success: function(data){
                                parent.remove();
                                 swal("Berhasil Menghapus Data Akun", {
                                    icon: "success",
                                });
                                if($('tbody tr').length <= 0){
                                    $('.page-title').after('<div class="text-muted" style="text-align:center"><b>Daftar Akun Anda masih kosong.</b></div>');
                                    $('.order-detail-content').remove();
                                } 
                               
                            },
                            error: function (exception) {
                                console.log(exception);
                            }
                        });
                    }
                });
            })
  </script>



@endsection
