@extends('layouts.main')

@section('content')
<!-- <div class="container-maternal" style="margin-left:25%">
    <div class="row justify-content-center">
        <div class="col-md-8" >
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="searchcon">
                <form action="/search" method="POST" role="search">
                    {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" placeholder="Search mother">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div> -->

<!-- <div class="container" id="container-maternal">
    <div class="col-md-6 col-md-offset-3">
        <div class="row">
            <form>
                
            </form>	 -->

            <div class="container" id="container-maternal">
                <div class="col-md-12 col-md-offset-3">
                    <div class="row">
                        <form role="form" id="search-form">
                            <div class="form-group">
                                <div class="input-group">
                                    <input id="1" type="text" class="form-control" name="search" placeholder="Search mother">
                                    <span class="input-group-btn">
                                        <button class="btn btn-success" type="submit">
                                            <i class="glyphicon glyphicon-search" aria-hidden="true"></i> Search
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
@endsection
