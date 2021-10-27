<x-layout>
    <article>
        <h1>
            {!! $post->title !!}
        </h1>
        <p>
            By <a href="/authors/{{ $post->author->user_name }}">{{ $post->author->name }}</a> in <a
                href="/categories/{{ $post->category->slug }}">
                {{ $post->category->name }} </a>
        </p>
        <div>
            {!! $post->body !!}
        </div> <br>
        <div><a href="/">Go Back</a></div>
    </article>
</x-layout>