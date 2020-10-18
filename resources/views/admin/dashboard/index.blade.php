@extends('admin.parts.layout')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-4 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{$data['man']}}</h3>

                    <p>Men profiles</p>
                </div>
                <div class="icon">
                    <i class="fas fa-male"></i>
                </div>
                <a href="{{route('admin.man.index')}}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-4 col-6">
            <!-- small card -->
            <div class="small-box bg-pink">
                <div class="inner">
                    <h3>{{$data['woman']}}</h3>

                    <p>Women profiles</p>
                </div>
                <div class="icon">
                    <i class="fas fa-female"></i>
                </div>
                <a href="{{route('admin.woman.index')}}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-4 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>
                        {{$data['videoCost']->value}}
                        <small>{{$data['videoCost']->append}}/min</small>
                    </h3>

                    <p>Video cost per minute</p>
                </div>
                <div class="icon">
                    <i class="fas fa-money-check-alt"></i>
                </div>
                <a href="{{route('admin.settings.index')}}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
    </div>
@endsection
