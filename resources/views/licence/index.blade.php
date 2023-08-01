@extends('index')
@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="container">
            <div class="main-box height-item setting-box">
                <div class="row">
                    @each('components.licence',\App\Models\Licence::all(),'licence')
                </div>
            </div>
        </div>
    </div>
    @if (\Session::has('success'))
        <div class="alert alert-success" style="text-align: center;">
            <span>{!! \Session::get('success') !!}</span>
        </div>
    @endif
    @if (\Session::has('fail'))
        <div class="alert alert-danger" style="text-align: center;">
            <span>{!! \Session::get('fail') !!}</span>
        </div>
    @endif
@endsection

