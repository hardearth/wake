<!-- Button trigger modal -->
<button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#course-comment-{{$course->id}}">
    {{__('Comentar')}}
</button>

<!-- Modal -->
<div class="modal fade" id="course-comment-{{$course->id}}" tabindex="-1" aria-labelledby="course-comment-{{$course->id}}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">{{__('Agregar comentario')}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('user.course.comments.store', $course) }}" method="POST">
            <div class="modal-body" style="background-color: #ECEFF1">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="title">{{__('Titulo')}}</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="comment">{{__('Comentario')}}</label>
                        <textarea class="form-control @error('comment') is-invalid @enderror" id="comment" name="comment" rows="5" required>{{ old('comment') }}</textarea>
                        @error('comment')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Cerrar')}}</button>
                <button type="submit" class="btn btn-primary">{{__('Agregar')}}</button>
            </div>
            </form>
        </div>
    </div>
</div>
