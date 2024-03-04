@if(!empty($news))
    @foreach($news as $new)
        <div class="modal modal__news" id="news">
            <div class="modal__wrapper">
                <a href="javascript:void(0)" title="Закрыть" type="button" class="mfp-close"></a>
                <h3 class="h3 modal__title">
                    {{ $new->title }}
                </h3>
                <div class="modal__grid">
                    <div class="modal__content">
                        {!! $new->text !!}
                    </div>
                    <div class="modal__image">
                        <img src="{{ asset( '/storage/' . $new->big_image) }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif
