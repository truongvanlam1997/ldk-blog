@extends('layouts.app')
@section('content')
<div class="container-fluid  ">


    <section class="content-header">
        <h1>
            {{ __('Create Post') }}

        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> {{ __('Home') }}</a></li>
            <li class="active">{{ __('Create Post') }}</li>
        </ol>
    </section>
    <script type="text/javascript">
        function  readURL(input,thumbimage) {
         if  (input.files && input.files[0]) { //Sử dụng  cho Firefox - chrome
         var  reader = new FileReader();
          reader.onload = function (e) {
          $("#thumbimage").attr('src', e.target.result);
           }
           reader.readAsDataURL(input.files[0]);
          }
          else  { // Sử dụng cho IE
            $("#thumbimage").attr('src', input.value);
        
          }
          $("#thumbimage").show();
          $('.filename').text($("#uploadfile").val());
          $('.Choicefile').css('background', '#C4C4C4');
          $('.Choicefile').css('cursor', 'default');
          $(".removeimg").show();
          $(".Choicefile").unbind('click'); //Xóa sự kiện  click trên nút .Choicefile
                
        }
        $(document).ready(function () {
         $(".Choicefile").bind('click', function  () { //Chọn file khi .Choicefile Click
          $("#uploadfile").click();
                     
         });
         $(".removeimg").click(function () {//Xóa hình  ảnh đang xem
            $("#thumbimage").attr('src', '').hide();
            $("#myfileupload").html('<input type="file" id="uploadfile"  onchange="readURL(this);" />');
            $(".removeimg").hide();
            $(".Choicefile").bind('click', function  () {//Tạo lại sự kiện click để chọn file
             $("#uploadfile").click();
            });
            $('.Choicefile').css('background','#0877D8');
            $('.Choicefile').css('cursor', 'pointer');
            $(".filename").text("");
          });
         })
      </script>
    <style type="text/css">
        .Choicefile
         {
          display:block;
          background:#0877D8;
          border:1px solid #fff;
          color:#fff;
          width:100px;
          text-align:center;
          text-decoration:none;
          cursor:pointer;
          padding:5px 0px;
          }
          #uploadfile,.removeimg
          {
           display:none;
          }
          #thumbbox
          {
           position:relative;
           width:100px;
          }
          .removeimg
          {
          background:  url("http://png-3.findicons.com/files/icons/2181/34al_volume_3_2_se/24/001_05.png")  repeat scroll 0 0 transparent;
          height: 24px;
          position: absolute;
          right: -285px;
          top: 5px;
          width: 24px;
         
          }
       </style>
  
    <!-- Main content -->
    <section class="content">

        <div class="row">

            <form action="{{ route('post.insert') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="col-md-8">
                    <div class="row">
                        {{-- <div class="col-md-4">
                            @include('components.files.basic', [
                            'name' => 'thumbnail',
                            'label' => __('Thumbnail'),
                            ])
                        </div> --}}
                        <div  style="padding-left:20px">
                            <label> Thumbnail</label>
                                <div id="myfileupload">
                                    <input type="file" id="uploadfile" name="thumbnail" onchange="readURL(this);" />
                                    <!--      Name  mà server request về sẽ là ImageUpload-->
            
                                </div>
                                <div id="thumbbox">
                                <img height="200px" width="400px"  alt="Thumb image" id="thumbimage" style="display:none" />
                                    <a class="removeimg" href="javascript:"></a>
                                </div>
                                <div id="boxchoice">
                                    <a href="javascript:" class="Choicefile">Chọn file</a>
                                    <p style="clear:both"></p>
                                </div>
                               
                            </div>

                    </div>
                    <div class="row">

                        <div class="col-md-8">
                            @include('components.inputs.basic', [
                            'name' => 'title',
                            'type' => 'text',
                            'label' => __('Title'),
                            'isRequired' => true,
                            'default' => '',

                            ])
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12 ">
                            @include('components.textarea.basic', [
                            'name' => 'content',
                            'label' => __('Content'),
                            'isRequired' => true,
                            'row' => 10,
                            'default' => '',
                            ])
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-10">
                            @include('components.textarea.basic', [
                            'name' => 'description',
                            'label' => __('Description'),
                            'row' => 5,
                            'default' => '',
                            ])
                        </div>
                    </div>

                </div>
                <div class="col-md-4">

                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <div>
                                    <div>
                                        <label for="category">{{__('Category')}}</label><br>
                                    </div>
                                    <div class="container bg-info text-white pt-20">

                                        {{$repositoryCategory->displayCategories($repositoryCategory->getArrayCategories()) }}

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-10">
                            @include('components.textarea.basic', [
                            'name' => 'tag',
                            'label' => __('Tags'),
                            'row' => 3,
                            'default' => '',
                            'placeholder' => 'Write tag separated by commas (,) '
                            ])
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-8">

                            @include('components.selects.basic', [
                            'name' => 'author_id',
                            'label' => __('Author'),
                            'isRequired' => true,
                            'default' => '',
                            'options' => $authors,
                            ])
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-md-12">
                            @include('components.inputs.basic', [
                            'name' => 'slug',
                            'type' => 'text',
                            'label' => __('Slug'),
                            'default' => '',
                            ])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">

                            @include('components.selects.basic', [
                            'name' => 'status',
                            'label' => __('Status'),
                            'isRequired' => true,
                            'default' => '',
                            'options' => ['0' => 'Enable', '1' => 'Disable', '3' =>'Draft','4' =>'Private']
                            ])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group ">
                                <label for="publish_at">{{__('Publish at')}}</label>
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                    </div>
                                    <input data-provide="datepicker" class="form-control datepicker" name='published_at'
                                        placeholder="Select date" data-date-format="yyyy/mm/dd" value="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-primary">{{__('Create')}}</button>
                    </div>

                </div>



            </form>
        </div>
    </section>
</div>


@endsection
