@extends('app.layout')
@section('content')
    <div class="mb-3"></div>
    <h1>Welcome to Leads Manager !</h1>
    <p class="fst-italic text-black-50">Made by Med Reda Kamal</p>
    <hr />
    <div class="row">
        <div class="col-12 col-md-3">
            <x-leads.add />
        </div>
        <div class="col-12 col-md-9">
            <x-leads.list />
        </div>
        <x-ajax />
    </div>
@endsection
