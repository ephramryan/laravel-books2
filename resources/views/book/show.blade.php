
<div class="book-detail">

    <div class="book-detail__data">

        <div class="book-detail__image">
            <img src="{{ $book->image }}" alt="{{ $book->title }} cover">
        </div>

        <div class="book-detail__info">

            <h1 class="book-detail__headline">{{ $book->title }}</h1>

            <p class="book-detail__author">
                <strong>By</strong> {{ $book->authors->pluck('name')->join(', ') }}
            </p>

            <div class="book-detail__description">
                {!! $book->description !!}
            </div>

        </div>

    </div>

    <div class="book-detail__reviews">
        <h2>User reviews</h2>

        <div class="book-detail__reviews-list">
            @foreach ($reviews as $review)
                <div class="book-detail__review">
                    <div class="book-detail__review-time">
                        {{ $review->updated_at->format('j. n. Y, G:i') }}
                    </div>
                    <div class="book-detail__review-author">
                        by <strong>{{ $review->user->name }}</strong>:
                    </div>
                    <div class="book-detail__review-text">
                        {{ $review->text }}
                    </div>
                </div>
            @endforeach
        </div>

        <br><br>

        @auth
            <form
                class="book-detail__review-form"
                action="{{ route('book.review', $book->id) }}"
                method="post"
            >
                @csrf
                <textarea
                    name="text"
                    cols="60"
                    rows="10"
                    placeholder="Write your review here..."
                >{{ old('text', $users_review ? $users_review->text : '') }}</textarea><br>
                <br>

                <button>Submit review</button>

            </form>

        @else
            <p><a href="/login">Log in</a> to write a review!</p>

        @endauth
    </div>

</div>
