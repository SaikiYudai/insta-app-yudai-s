{{--clickable image--}}
<div class="container p-0">
    <a href="{{route('post.show', $post->id) }}">
        <img src="{{$post->image}}" alt="{{$post->id}}" class="w-100">
    </a>
</div>
<div class="card-body">
    {{--heart btn + no. of likes * categories--}}
    <div class="row align-items-center">
        <div class="col-auto">
            {{--check if user liked the post--}}
            @if ($post->isLiked())
            {{--unlike btn--}}
            <form action="{{ route('like.destroy', $post->id )}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm shadow-none p-0">
                    <i class="fa-solid fa-heart text-danger"></i>
                </button>
            </form>

            @else
            {{--like btn--}}
            <form action="{{route('like.store', $post->id)}}" method="post">
                @csrf
                <button type="submit" class="btn btn-sm shadow-none p-0">
                    <i class="fa-regular fa-heart "></i>
                </button>
            </form>
            @endif
        </div>
        <div class="col-auto px-0">
            <span>
                {{--count of likes--}}
                {{ $post->likes->count() }}
            </span>
        </div>
        <div class="col text-end">
            @forelse($post->categoryPost as $category_post)
                <div class="badge bg-secondary bg-opacity-50">
                    {{$category_post->category->name}}
                </div>
            @empty
                <div class="badge bg-dark bg-opacity-50">Uncategorized</div>
            @endforelse
        </div>
    </div>

    {{--owner + description--}}
    <a href="{{route('profile.show', $post->user->id)}}"
    class="text-decoration-none text-dark fw-bold">{{$post->user->name}}</a>
    &nbsp;
    <p class="d-inline fw-light">{{$post->description}}</p>
    <p class="text-uppercase text-muted xsmall">{{date('M d, y', strtotime($post->created_at))}}</p>

    {{--Comments later--}}
    @include('users.posts.contents.comments')
</div>
