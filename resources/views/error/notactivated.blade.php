@extends('layouts.app')
@section('content')
<section class="content-header">
    <h1>
        {{ __('Account Not Activated') }}

    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {{ __('Account') }}</a></li>
        <li class="active">{{ __('Error') }}</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <h2 style="text-align:center ; color:red">
        
        {{ __('Yours Account Not Activated, Please Activated To Countinue Connection') }}
    </h2>


</section>



@endsection
