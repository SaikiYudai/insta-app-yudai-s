
<div class="row">
    <div class="col-4">
        @if($user->avatar)
        <img src="{{ $user->avatar}}" alt="{{$user->name}}" class="img-thumbnail rounded-circle d-block mx-auto avatar-lg">
        @else
        <i class="fa-solid fa-circle-user text-secondary d-block text-center icon-lg"></i>
        @endif
    </div>
    <div class="col">
        <div class="row mb-3">
            <div class="col-auto">
                <h2 class="display-6 mb-0">{{$user->name}}</h2>
            </div>
            <div class="col-auto p-2">
                @if(Auth::user()->id === $user->id)
                <a href="{{route('profile.edit', $user->id )}}" class="btn btn-outline-secondary btn-sm fw-solid">Edit Profile</a>
                @endif

                {{--check if user follows or not--}}
            @if ($user->isFollowed())

            {{--unfollow btn--}}
            <form action="{{ route('follow.destroy', $user->id )}}" method="post">
                @csrf
                @method('DELETE')
                 <button type="submit" class="btn btn-outline-secondary btn-sm fw-bold">following

                 </button>

            </form>
                @else
                {{--follow button--}}
                <form action="{{route('follow.store', $user->id)}}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-sm fw-bold">Follow</button>
                </form>
            @endif
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-auto">
                <a href="{{route('profile.show', $user->id)}}" class="text-decoration-none text-dark"><strong class="me-1">{{$user->posts->count()}}</strong>
                {{$user->posts->count() > 1 ? 'posts' : 'post'}}</a>
            </div>

            <div class="col-auto">
                <a href="{{route('profile.followers', $user->id )}}" class="text-decoration-none text-dark"><strong class="me-1">
                    {{ $user->followers->count() }}
                </strong>{{$user->followers->count() > 1 ? 'followers' : 'follower'}}</a>

            </div>
             <div class="col-auto">
                <a href="" class="text-decoration-none text-dark"><strong class="me-1">
                 {{ $user->followings->count() }}
                </strong>following</a>
             </div>
        </div>

        <p class="fw-bold">{{$user->introduction}}</p>
    </div>
</div>
