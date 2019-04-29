@extends('layouts.main')

@section('content')
<div class="container-card">
    <div class="row justify-content-center">
        <div class="col-md-12" >
            <div class="card">
                <div class="card-header">Maternal</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="/mother" method="POST" role="searchMother">
                        {{ csrf_field() }}
                        <div id="search-bar" class="input-group">
                            <input  type="text" class="form-control" name="mom"
                            placeholder="Search Mother">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                        <div id="addNewMaternal">
                            <button type="button"  class="btn btn-primary">
                                <span class="glyphicon glyphicon-plus"> </span>Add New Maternal Record
                            </button>
                        </div>
                    </form>

                    <div id="search-results" class="container">
                        @if(isset($details))
                        <p>Search results</p>
                        <h2>Mother details</h2>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($details as $mother)
                                <tr>
                                    <td>{{$mother->fname}}</td>
                                    <td>{{$mother->mname}}</td>
                                    <td>{{$mother->lname}}</td>
                                    <td>{{$mother->email}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
