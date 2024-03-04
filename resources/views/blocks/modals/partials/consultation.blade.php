<div class="modal modal__lesson" id="consultation">
    <div class="modal__wrapper">
        <a href="javascript:void(0)" title="Закрыть" type="button" class="mfp-close"></a>

        <div class="modal__grid">
            <div class="modal__content">
                <h3 class="h3 modal__title">Запишитесь<br> на консультацию</h3>
                <form class="form" action="{{ route('send') }}" method="post" data-js="ajax-form">
                    @csrf
                    <label class="form__label required">
                        <input class="input input_image input_name" name="name" type="text">
                        <span>Ваше имя</span>
                    </label>
                    <label class="form__label required">
                        <input class="input input_image input_phone" type="tel" name="id">
                        <span>Ваш номер телефона</span>
                    </label>
                    <button class="btn btn_main" type="submit">Записаться</button>
                </form>
            </div>
            <div class="modal__image">
                <img  src="/image/modals/lesson.jpg" alt="">
            </div>
        </div>
    </div>
</div>
