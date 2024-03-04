<section class="news">
    <div class="container">
        @if(count($news))
            <h2 class="h2">
                Новости
            </h2>
            <div class="news__grid" data-news-slider>
                @foreach($news as $new)
                    <div>
                        <div class="news__item">
                            <div class="news__text">
                                <h3 class="h3">
                                    {{ $new->title }}
                                </h3>
                                <div class="text">
                                    {!! Str::limit($new->text, 200) !!}
                                </div>
                                <a class="news__popup" href="javascript:void(0)" data-js="popup"
                                   data-js-popup="news">ЧИТАТЬ ДАЛЕЕ</a>
                            </div>
                            <div class="news__image">
                                <img src="{{ asset( '/storage/' . $new->image) }}" alt="">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="news__navigations" data-news-slider-nav>
                <button class="prev">
                </button>
                <button class="next">
                </button>
            </div>
        @else
            <h3 class="h3">
                Новостей ещё нет
            </h3>
        @endif

    </div>
</section>
