@extends('frontend.layouts.main')
@section('title', $cms->title)
@section('header')
@php    
    $page = $cms->title; 
@endphp
@section('content')
<div class="l-main-container">
    <section class="container b-welcome-box">
        <div class="row">
            <div class="col-md-offset-1 col-md-10">
                <h2 class="is-global-title f-left f-legacy-h1">{{ $cms->title }}</h2>
                {!! $cms->long_description !!}                
        </div>
    </section>
</div>
@stop