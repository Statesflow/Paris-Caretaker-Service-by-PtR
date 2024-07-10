@extends('Front.layouts.app')
@section('title') @lang('app.app-description') @endsection
@section('content')
    <section class="intro-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8">
                    <div class="title-single-box">
                        <h1 class="title-single">@lang('app.contact_us')</h1>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">@lang('app.home')</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                @lang('app.contact_us')
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="contact">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="contact-map box">
                        <div id="map" class="contact-map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5250.950739679374!2d2.3870788125716667!3d48.849144971211416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e6727347e25d67%3A0xc73e22c1131584f7!2s242%20Rue%20du%20Faubourg%20Saint-Antoine%2C%2075012%20Paris!5e0!3m2!1sfr!2sfr!4v1720611251983!5m2!1sfr!2sfr" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 section-t8">
                    <div class="row">
                        <div class="col-md-7">
                            <form action="{{ route('message.store') }}" method="post" class="php-email-form">
                                @csrf
                                @honeypot
                                @honeypot
                                @honeypot
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <input type="text" placeholder="@lang('app.name')" class="form-control @error('name') is-invalid @enderror" name="name" id="name" autocomplete="off" aria-describedby="nameHelp" autofocus required>
                                            @error('name')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <div class="d-flex justify-content-center align-items-center bg-color-b">+33<input type="number" placeholder="@lang('app.number')" class="form-control @error('number') is-invalid @enderror" name="phone" id="phone" autocomplete="off" min="61000000" max="65999999" aria-describedby="numberHelp" required></div>
                                            @error('phone')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control @error('text') is-invalid @enderror" rows="8" placeholder="@lang('app.message')..." name="text" id="text" autocomplete="off" maxlength="500" aria-describedby="textHelp" required></textarea>
                                            @error('text')
                                            <div class="alert alert-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12 mt-4 text-center">
                                        <button type="submit" class="btn btn-a">@lang('app.send')</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-5 section-md-t3">
                            <div class="icon-box section-b2">
                                <div class="icon-box-icon">
                                    <span class="bi bi-envelope"></span>
                                </div>
                                <div class="icon-box-content table-cell">
                                    <div class="icon-box-title">
                                        <h4 class="icon-title">@lang('app.contact_us')</h4>
                                    </div>
                                    <div class="icon-box-content">
                                        <p class="mb-1">
                                            <span class="color-text-a">@lang('app.email') :</span> <a href="mailto:contact@example.com"> contact@example.com</a>
                                        </p>
                                        <p class="mb-1">
                                            <span class="color-text-a"><?php echo app('translator')->get('app.number'); ?> :</span> <a href="tel:+330123456789"> +33 01 23 45 67 89</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="icon-box section-b2">
                                <div class="icon-box-icon">
                                    <span class="bi bi-geo-alt"></span>
                                </div>
                                <div class="icon-box-content table-cell">
                                    <div class="icon-box-title">
                                        <h4 class="icon-title">@lang('app.find_us')</h4>
                                    </div>
                                    <div class="icon-box-content">
                                        <p class="mb-1">
                                            242 Rue du Faubourg Saint-Antoine, 75012 Paris, France
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="icon-box">
                                <div class="icon-box-icon">
                                    <span class="bi bi-share"></span>
                                </div>
                                <div class="icon-box-content table-cell">
                                    <div class="icon-box-title">
                                        <h4 class="icon-title">@lang('app.social')</h4>
                                    </div>
                                    <div class="icon-box-content">
                                        <div class="socials-footer">
                                            <ul class="list-inline">
                                                <li class="list-inline-item">
                                                    <a href="#" class="link-one">
                                                        <i class="bi bi-facebook" aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#" class="link-one">
                                                        <i class="bi bi-twitter" aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#" class="link-one">
                                                        <i class="bi bi-instagram" aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="#" class="link-one">
                                                        <i class="bi bi-linkedin" aria-hidden="true"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
