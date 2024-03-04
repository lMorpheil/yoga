<section class="questions">
    <div class="container">
        <h2 class="h2">
            Остались вопросы?
        </h2>
        <div class="questions__subtitle">
            Запишитесь на <strong>бесплатную консультацию</strong><br> со специалистом
        </div>
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
</section>
