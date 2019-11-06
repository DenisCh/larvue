@extends('master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <signature-show post_id="{{ $signature->id }}"></signature-show>
            </div>
        </div>
    </div>
@endsection