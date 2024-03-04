@extends('layout.public')

@section('content')
    @include('blocks.first-screen.first-screen')
    @include('blocks.about.about')
    @include('blocks.main-slider.main-slider')
    @include('blocks.directions.directions')
    @include('blocks.price.price')
    @include('blocks.faq.faq')
    @include('blocks.employees.employees')
    @include('blocks.actions.actions')
    @include('blocks.reviews.reviews')
    @include('blocks.questions.questions')
@endsection
