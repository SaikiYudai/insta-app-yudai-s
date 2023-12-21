@extends('layouts.app')

@section('title', 'Explore People')
@section('content')
    <div class="row justify-content-center">
        <div class="col-5">
            <p class="h5 text-muted mb-4">
                Search results for "<b>{{ $search }}</b>"
            </p>

            @forelse ($users as $user)
                <div class="row align-items-center">
                    <div class="col-auto">
                        @if ($user->avatar)
                            <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="rounded-circle avatar-md">
                        @else
                            <i class="fa-solid fa-circle-user text-secondary icon-md"></i>
                        @endif
                    </div>
                    <div class="col ps-0 text-truncate">
                        <a href="{{ route('profile.show', $user->id) }}"
                            class="text-decoration-none text-dark fw-bold">{{ $user->name }}</a>
                        <p class="text-muted mb-0">{{ $user->email }}</p>
                    </div>
                    <div class="col-auto">
                        @if ($user->id !== Auth::user()->id)
                            @if ($user->isFollowed())
                                <form action="{{ route('follow.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="border-0 bg-transparent p-0 text-secondary btn-sm">
                                        Following
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('follow.store', $user->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="border-0 bg-transparent P-0 text-primary btn-sm">
                                        Follow
                                    </button>
                                </form>
                            @endif
                        @endif
                    </div>
                </div>
            @empty
            @endforelse
        </div>
    </div>
@endsection
