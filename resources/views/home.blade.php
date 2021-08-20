@extends('layouts.AdminLTE.index')

@section('icon_page', 'dashboard')

@section('title', 'Dashboard ')

@section('page_menu')

@section('content')

@include('courses.my_progress', ['content' => $data['my_progress']])

<div class="row">
    <section class="col-lg-7 connectedSortable">
        @include('courses.forum', ['content' => $data['forum']])
        @include('courses.news', ['content' => $data['news']])
    </section>

    <section class="col-lg-5 connectedSortable">
        @include('courses.in_progress', ['content' => $data['in_progress']])
    </section>
</div>

@endsection
