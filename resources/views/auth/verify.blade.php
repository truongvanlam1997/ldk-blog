@extends('layouts.app')
@section('content')
<section class="content-header">
    <h1>
        {{ __('Verify Your Email Address') }}

    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {{ __('Account') }}</a></li>
        <li class="active">{{ __('Verify') }}</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <div style="text-align:center " class="card-body">
        @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
        @endif

        <h4> {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }}, <a
                href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
        </h4>
    </div>

</section>



@endsection
