@extends('layouts.app')

@section('content')


    <div class="container">

        <div class="row">


            <div class="col-md-12" >

                <div class="card">
                    <div class="card-header">{{ __('States') }}</div>
                    <div class="card-body">
                        <div class="row">

                            @foreach($states as $state)
                                <div class="col-md-3" >
                                    <div class="alert alert-primary" role="alert">

                                        <h5>{{$state->name}}</h5>

                                        <p>country : {{$state->country->name}}</p>



                                    </div>


                                </div>

                            @endforeach

                        </div>
                        {{ $states->links('pagination::bootstrap-4') }}

                    </div>

                </div>

            </div>

        </div>

    </div>



@endsection


