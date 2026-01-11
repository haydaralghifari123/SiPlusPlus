@extends('layouts.user.app')

@section('content')
<div class="row">

    @forelse ($data['userCourse'] as $userCourse)
        <div class="col-md-3 mb-3">
            <div class="card h-100">

                {{-- IMAGE --}}
                <img
                    class="card-img-top img-fluid"
                    src="{{ $userCourse->course->image_path ?? asset('images/default-course.png') }}"
                    alt="Course Image"
                    style="height: 200px; object-fit: cover;"
                >

                <div class="card-body d-flex flex-column">

                    {{-- TITLE --}}
                    <h5 class="card-title">
                        {{ $userCourse->course->name ?? 'Nama kursus tidak tersedia' }}
                    </h5>

                    <hr>

                    {{-- PROGRESS --}}
                    <div class="mb-3">
                        <b>
                            Progress :
                            @if(isset($userCourse->progress_percent))
                                {{ $userCourse->progress_percent == 100 
                                    ? 'Selesai' 
                                    : $userCourse->progress_percent . '%' }}
                            @else
                                0%
                            @endif
                        </b>
                    </div>

                    {{-- BUTTON --}}
                    <a
                        href="{{ route('user.course.learn', [
                            'id' => $userCourse->id,
                            'progress' => max(1, $userCourse->progress)
                        ]) }}"
                        class="btn btn-primary btn-block mt-auto"
                    >
                        Lanjutkan Belajar
                    </a>

                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-info">
                Kamu belum memiliki kursus.
            </div>
        </div>
    @endforelse

</div>
@endsection
