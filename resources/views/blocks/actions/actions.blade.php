@if(count($actions))
    <section class="actions">
        <div class="container">
            <h2 class="h2">
                Акции
            </h2>
            <div class="actions__wrapper" data-actions-wrapper>
                <div class="actions__grid" data-actions-slider>
                    @foreach($actions as $action)
                        <figure class="actions__item">
                            <img src="{{ asset( '/storage/' . $action->image) }}" alt="">
                            <figcaptions>
                                {{ $action->text }}
                            </figcaptions>
                        </figure>
                    @endforeach
                </div>
                <div class="actions__navigation" data-actions-navigation>
                    <button class="prev">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="42" viewBox="0 0 28 42" fill="none">
                            <path d="M25 39L3 21L25 3" stroke="#232323" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                    <button class="next">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="42" viewBox="0 0 28 42" fill="none">
                            <path d="M3 39L25 21L3 3" stroke="#232323" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>
                </div>
            </div>
            <button class="btn btn_main actions__btn" data-js="popup"
                    data-js-popup="consultation" type="button">Записаться на занятие</button>
        </div>
    </section>
@endif

