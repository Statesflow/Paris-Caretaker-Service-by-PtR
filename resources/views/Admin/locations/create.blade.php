@extends('Admin.layouts.app')
@section('title') @lang('app.location') - @lang('app.create') @endsection
@section('content')
    <div class="container-xxl py-3">
        <div class="d-block h4 text-danger text-center border-bottom py-2 mb-3">
            @lang('app.location') - @lang('app.create')
        </div>
        <div class="row justify-content-center">
            <form action="{{ route('admin.locations.store') }}" method="post" enctype="multipart/form-data" class="col-md-6 col-lg-4">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">
                        Name_en <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" maxlength="32" required>
                    @error('name')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="name_fr" class="form-label fw-bold">
                        Name_fr <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control @error('name_fr') is-invalid @enderror" name="name_fr" id="name_fr" value="{{ old('name_fr') }}" maxlength="32" required>
                    @error('name_fr')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label fw-bold">
                        Slug <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" value="{{ old('slug') }}" maxlength="32" required>
                    @error('slug')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="sort_order" class="form-label fw-bold">
                        Sort_order <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control @error('sort_order') is-invalid @enderror" name="sort_order" id="sort_order" value="{{ old('sort_order') }}" maxlength="5" required>
                    @error('sort_order')
                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check2-circle"></i> @lang('app.store')
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
