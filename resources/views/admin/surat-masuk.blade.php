@extends('layouts.admin')

@section('title','Form Surat Masuk')

@section('content')
    {{--<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}
    {{--<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>--}}
    {{--<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>--}}
    <style type="text/css">
        body{
            margin-top:40px;
        }

        .cursor-not-allow {
            cursor: not-allowed !important;
        }

        .stepwizard-step p {
            margin-top: 10px;
        }

        .stepwizard-row {
            display: table-row;
        }

        .stepwizard {
            display: table;
            width: 100%;
            position: relative;
        }

        .stepwizard-step button[disabled] {
            opacity: 1 !important;
            filter: alpha(opacity=100) !important;
        }

        .stepwizard-row:before {
            top: 14px;
            bottom: 0;
            position: absolute;
            content: " ";
            width: 100%;
            height: 1px;
            background-color: #ccc;
            z-order: 0;

        }

        .stepwizard-step {
            display: table-cell;
            text-align: center;
            position: relative;
        }

        .btn-circle {
            width: 30px;
            height: 30px;
            text-align: center;
            padding: 6px 0;
            font-size: 12px;
            line-height: 1.428571429;
            border-radius: 15px;
        }
    </style>
      <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <!-- .page title -->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Form Data Surat Masuk</h4>
                    </div>
                    <!-- /.page title -->
                    
                </div>
                <!-- .row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <h3 class="box-title">Silahkan Isi Form Surat Masuk</h3>
                            @if($errors->count() > 0)
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    @foreach($errors->all() as $error)
                                        {{$error}}<br>
                                    @endforeach
                                </div>
                            @endif
                            <div class="stepwizard">
                                <div class="stepwizard-row setup-panel">
                                    <div class="stepwizard-step">
                                        <a href="#step-1" class="btn btn-primary btn-circle">1</a>
                                        <p>Scan atau Upload Surat Masuk</p>
                                    </div>
                                    <div class="stepwizard-step">
                                        <a href="#step-2" class="btn btn-default btn-circle cursor-not-allow" disabled>2</a>
                                        <p>Masukkan Title dan Subject</p>
                                    </div>
                                    <div class="stepwizard-step">
                                        <a href="#step-3" class="btn btn-default btn-circle cursor-not-allow" disabled>3</a>
                                        <p>Pilih Jenis Surat</p>
                                    </div>
                                </div>
                            </div>
                            <form role="form" action="{{route('admin.surat-masuk.upload')}}" enctype="multipart/form-data" method="post">
                                {{ csrf_field() }}
                                {{ method_field('post') }}
                                <div class="row setup-content" id="step-1">
                                    <div class="col-xs-12">
                                        <div class="col-md-12">
                                            <h3> Step 1</h3>
                                            <div class="form-group {{ !$errors->has('file') ?: 'has-error' }}">
                                                <input type="file" id="input-file-now-custom-2" name="file" class="dropify" data-height="500" required="required" data-show-remove="false" />

                                            </div>
                                            <button class="btn btn-primary nextBtn btn-lg pull-right cursor-not-allow" type="button" >Next</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row setup-content" id="step-2">
                                    <div class="col-xs-12">
                                        <div class="col-md-12">
                                            <h3> Step 2</h3>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-xs-3 control-label">Indeks</label>
                                                    <div class="col-xs-5">
                                                        <input type="text" class="form-control" name="indeks" required /><br>
                                                    </div>
                                                </div>


                                                <div class="row">
                                                    <label class="col-xs-3 control-label">Dari</label>
                                                    <div class="col-xs-5">
                                                        <input type="text" class="form-control" name="dari" required/><br>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-xs-3 control-label">Perihal</label>
                                                    <div class="col-xs-5">
                                                        <textarea class="form-control" rows="5" name="perihal" required></textarea><br>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-xs-3 control-label">Tgl / No Surat</label>
                                                    <div class="col-xs-5">
                                                        <input type="text" class="form-control" name="tgl_no_surat" required /><br>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <label class="col-xs-3 control-label">Tgl Surat Masuk</label>
                                                    <div class="col-xs-5">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="datepicker-autoclosed" placeholder="mm/dd/yyyy" name="tgl_surat_masuk" required> <span class="input-group-addon"><i class="icon-calender"></i></span> </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <button class="btn btn-primary nextBtn btn-lg pull-right" type="button" >Next</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row setup-content" id="step-3">
                                    <div class="col-xs-12">
                                        <div class="col-md-12">
                                            <h3> Step 3</h3>
                                            <div class="form-group">
                                                <div class="radio radio-danger">
                                                    <input type="radio" name="jenis_surat" id="radio6" value="Express">
                                                    <label for="radio6" class="btn btn-danger btn-rounded"><i class="fa fa-envelope-o"> Express</i> </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="radio radio-danger">
                                                    <input type="radio" name="jenis_surat" id="radio7" value="Standar">
                                                    <label for="radio7" class="btn btn-success btn-rounded"><i class="fa fa-envelope-o"> Standar</i> </label>
                                                </div>
                                            </div>
                                            <button class="btn btn-success btn-lg pull-right" type="submit">Finish!</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        {{--     <div id="exampleValidator" class="wizard">
                                <ul class="wizard-steps" role="tablist">
                                    <li class="active" role="tab">
                                        <h4><span><i class="ti-upload"></i></span>Scan atau Upload Surat Masuk</h4> </li>
                                    <li role="tab">
                                        <h4><span><i class="ti-pencil-alt"></i></span>Masukkan Title dan Subject</h4> </li>
                                    <li role="tab">
                                        <h4><span><i class="ti-email"></i></span>Pilih Jenis Surat</h4> </li>
                                </ul>
                                <form id="validation" class="form-horizontal" action="{{route('admin.surat-masuk.upload')}}" enctype="multipart/form-data" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('post') }}
                                    <div class="wizard-content">
                                        <div class="wizard-pane active" role="tabpanel">
                                            <div class="form-group {{ !$errors->has('file') ?: 'has-error' }}">
                                                <input type="file" id="input-file-now-custom-2" name="file" class="dropify" data-height="500" />

                                            </div>
                                        </div>
                                        <div class="wizard-pane" role="tabpanel">
                                            <div class="form-group">
                                                <div class="row">
                                                <label class="col-xs-3 control-label">Indeks</label>
                                                <div class="col-xs-5">
                                                    <input type="text" class="form-control" name="indeks" /><br>
                                                </div>
                                            </div>
                                                
                                            <div class="row">
                                                <label class="col-xs-3 control-label">Tgl Penyelesaian</label>
                                                <div class="col-xs-5">
                                                    
                                            <input type="date" class="form-control" id="datepicker-autoclose" placeholder="mm/dd/yyyy" name="tgl_selesai"><span class="input-group-addon"><i class="icon-calender"></i></span> <br> 
                                                </div>
                                                
                                            </div>
                                             
                                              <div class="row">
                                                <label class="col-xs-3 control-label">Dari</label>
                                                <div class="col-xs-5">
                                                    <input type="text" class="form-control" name="dari" /><br>
                                                </div>
                                            </div>

                                             <div class="row">
                                                <label class="col-xs-3 control-label">Perihal</label>
                                                <div class="col-xs-5">
                                                     <textarea class="form-control" rows="5" name="perihal"></textarea><br>
                                                </div>
                                            </div>

                                             <div class="row">
                                                <label class="col-xs-3 control-label">Tgl/No Surat Masuk</label>
                                                <div class="col-xs-5">
                                                    <input type="text" class="form-control" name="tgl_no_surat" /><br>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <label class="col-xs-3 control-label">Tgl Surat Masuk</label>
                                                <div class="col-xs-5">
                                                    
                                            <input type="date" class="form-control" id="datepicker-autoclose" placeholder="mm/dd/yyyy" name="tgl_surat_masuk"><span class="input-group-addon"><i class="icon-calender"></i></span> 
                                                </div>
                                                
                                            </div>

                                            </div>
                                        </div>
                                        <div class="wizard-pane" role="tabpanel">
                                            <div class="form-group">
                                                <center>
                                                <div class="col-xs-6">
                                                    <button class="btn btn-danger btn-rounded waves-effect waves-light" type="button" name="jenis_surat" value="Express"><span class="btn-label"><i class="fa fa-envelope-o"></i></span>Express</button>
                                            </div>
                                            <div class="col-xs-6">
                                                    <button class="btn btn-success btn-rounded waves-effect waves-light" type="button" name="jenis_surat" value="Standar"><span class="btn-label"><i class="fa fa-envelope-o"></i></span>Standar</button>
                                            </div>
                                            </center>
                                        </div>
                                    </div>
                                </form>
                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
                <!-- /.row -->
                <script src="{{asset('js/app.js')}}"></script>
                <script src="js/sweetalert.min.js"></script>
                @include('sweet::alert')
    <script type="text/javascript">
        $(document).ready(function () {

            $('#input-file-now-custom-2').change(function () {
               if ($(this).val() === '' || $(this).val() === null) {
                   $('.nextBtn').addClass('cursor-not-allow');
               } else {
                   $('.nextBtn').removeClass('cursor-not-allow');
               }
            });
            $('.dropify-clear').click( function () {
                $('.nextBtn').addClass('cursor-not-allow');
            });

            var navListItems = $('div.setup-panel div a'),
                allWells = $('.setup-content'),
                allNextBtn = $('.nextBtn');

            allWells.hide();

            navListItems.click(function (e) {
                e.preventDefault();
                var $target = $($(this).attr('href')),
                    $item = $(this);

                if (!$item.hasClass('disabled')) {
                    navListItems.removeClass('btn-primary').addClass('btn-default');
                    $item.addClass('btn-primary');
                    allWells.hide();
                    $target.show();
                    $target.find('input:eq(0)').focus();
                }
            });

            allNextBtn.click(function(){
                var curStep = $(this).closest(".setup-content"),
                    curStepBtn = curStep.attr("id"),
                    nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                    curInputs = curStep.find("input[type='text'],input[type='url'],input[type='file'],input[type='date']"),
                    isValid = true;

                $(".form-group").removeClass("has-error");
                for(var i=0; i<curInputs.length; i++){
                    if (!curInputs[i].validity.valid){
                        isValid = false;
                        $(curInputs[i]).closest(".form-group").addClass("has-error");
                    }
                }

                if (isValid)
                    nextStepWizard.removeAttr('disabled').trigger('click');
            });

            $('div.setup-panel div a.btn-primary').trigger('click');

            $('#datepicker-autoclosed').datepicker({
                autoclose: true,
                todayHighlight: true,
                orientation: 'auto',
                format: 'yyyy/mm/dd'
            });
        });

    </script>
@endsection
