@extends('layouts.account')

@section('title', 'Añadir dirección')

@section('content')

<section class="d-flex align-items-center justify-content-center py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">

                <div class="card p-4">
                    <h4 class="text-center mb-4">Nueva dirección</h4>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                        @endforeach
                    </div>
                    @endif

                    <form method="POST" action="{{ route('addresses.store') }}">
                        @csrf

                        <div class="row g-3">

                            <div class="col-md-6">
                                <label class="form-label">País</label>
                                <input type="text" name="country" class="form-control" value="{{ old('country') }}" required>
                                @error('country') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Provincia</label>
                                <input type="text" name="province" class="form-control" value="{{ old('province') }}" required>
                                @error('province') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Ciudad</label>
                                <input type="text" name="city" class="form-control" value="{{ old('city') }}" required>
                                @error('city') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Código postal</label>
                                <input type="text" name="postal_code" class="form-control" value="{{ old('postal_code') }}" required>
                                @error('postal_code') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label">Calle</label>
                                <input type="text" name="street" class="form-control" value="{{ old('street') }}" required>
                                @error('street') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Número</label>
                                <input type="text" name="number" class="form-control" value="{{ old('number') }}" required>
                                @error('number') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Piso / Apartamento (opcional)</label>
                                <input type="text" name="apartment_number" class="form-control" value="{{ old('apartment_number') }}">
                                @error('apartment_number') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>

                            <div class="col-12 text-center mt-3">
                                <button type="submit" class="btn btn-dark px-5">
                                    Guardar dirección
                                </button>
                            </div>

                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
</section>

@endsection