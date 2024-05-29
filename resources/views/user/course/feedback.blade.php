@extends('layouts.educrat_user')
@section('content')
    @include('user.course.partials.accordion-lessons')

    <section class="layout-pb-lg lg:pt-40">
        <div class="container">
            <div class="row justify-center">
                <div class="col-xxl-8 col-xl-7 col-lg-8">
                    <div class="relative pt-40">
                        <div class="pb-30">
                            <a href="{{route('user.home')}}"
                               class="btn btn-outline-primary float-end">{{__('Regresar')}}</a>
                            @if(!$lesson && $course)
                                <h1 class="mb-3">{{__('Cierre')}}</h1>
                            @endif
                            <h2>{{$lesson?$lesson->name:$course->name}}</h2>
                            <p class="text-muted">{{$course->name}}</p>
                        </div>
                        <div>
                            <form action="{{ route('user.course.feedback.store', $course) }}" method="POST">
                                @csrf


                                <div class="form-group mb-3">
                                    <label for="rate">Valoración:</label>
                                    <p class="text-muted">
                                        Qué tan satisfecho está con el curso, siendo 1 muy insatisfecho y 5 el valor máximo de muy satisfecho
                                    </p>
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="rate" id="rate1"
                                                   value="1" required {{ old('rate') == '1' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineRadio1">1</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="rate" id="rate2"
                                                   value="2" required {{ old('rate') == '2' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineRadio1">2</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="rate" id="rate3"
                                                   value="3" required {{ old('rate') == '3' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineRadio1">3</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="rate" id="rate4"
                                                   value="4" required {{ old('rate') == '4' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineRadio1">4</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="rate" id="rate5"
                                                   value="5" required {{ old('rate') == '5' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="inlineRadio1">5</label>
                                        </div>
                                    </div>
                                    @error('rate')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group mb-5">
                                    <label for="comments">{{__('Commentarios')}}</label>
                                    <textarea class="form-control @error('comments') is-invalid @enderror" id="comments"
                                              name="comments" rows="5" required>{{ old('comments') }}</textarea>
                                    @error('comments')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary">{{__('Guardar')}}</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection
