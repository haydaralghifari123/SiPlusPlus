<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Belajar Kursus</title>

    <link rel="stylesheet" href="{{ asset('mazer/assets/css/main/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('mazer/assets/images/logo/favicon.svg') }}">
</head>

<body>

<nav class="navbar navbar-light">
    <div class="container-fluid d-flex align-items-center">
        <a href="{{ route('frontend.user.course.index') }}" class="me-3">
            <i class="bi bi-chevron-left"></i>
        </a>
        <a class="navbar-brand" href="{{ route('frontend.user.course.index') }}">
            <img src="{{ asset('mazer/assets/images/logo/logo.svg') }}" alt="Logo">
        </a>
    </div>
</nav>

<div class="container-fluid mt-3">
    <div class="row">

        {{-- VIDEO --}}
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>
                        {{ $current_course->number }}. {{ $current_course->name }}
                    </h4>
                </div>

                <div class="card-body">
                    <iframe
                        class="w-100 rounded"
                        height="400"
                        src="https://www.youtube.com/embed/{{ $current_course->link }}"
                        allowfullscreen>
                    </iframe>
                </div>

                <div class="card-footer d-flex justify-content-between">
                    <div>
                        @if ($current_course->number > 1)
                            <a href="{{ route('user.course.learn', [
                                $userCourse->id,
                                $current_course->number - 1
                            ]) }}" class="btn btn-secondary">
                                Sebelumnya
                            </a>
                        @endif
                    </div>

                    <div>
                        @if ($current_course->number < $userCourse->course->total_item)
                            <a href="{{ route('user.course.learn', [
                                $userCourse->id,
                                $current_course->number + 1
                            ]) }}" class="btn btn-primary">
                                Selanjutnya
                            </a>
                        @else
                            <a href="{{ route('frontend.user.course.index') }}" class="btn btn-success">
                                Selesai
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- LIST MATERI --}}
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4>Materi</h4>
                </div>

                <div class="card-body">
                    @foreach ($userCourse->course->detail as $detail)
                        <a href="{{ route('user.course.learn', [
                            $userCourse->id,
                            $detail->number
                        ]) }}" class="text-decoration-none">

                            <div class="alert
                                {{ $detail->number == $current_course->number
                                    ? 'alert-primary'
                                    : 'alert-secondary' }}">
                                {{ $detail->number }}. {{ $detail->name }}
                            </div>

                        </a>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>

</body>
</html>
