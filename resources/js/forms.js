import Base from './_base-controller';
import Inputmask from 'inputmask';

export default class Forms extends Base {

    /**
     * Инициализация
     *
     * @returns {boolean}
     */
    _init() {
        this.$forms = $('[data-js="ajax-form"]');

        return true;
    }

    /**
     * Бинд событий
     *
     * @returns {boolean}
     */
    _bind() {

        this.$forms.each((i, el) => {
            this.initForm($(el));
        });

        this._bindTo($(window), 'modal:opened', (ev, data) => {
            this.initForm($(data).find('[data-js="ajax-form"]'));
        });

        return true;
    }

    /**
     * Инициализация формы
     *
     * @param $form
     */
    initForm($form) {

        if (!$form.length) {
            return;
        }

        let $input = $form.find('.input');

        this._bindTo($input, 'focus', (e) => {
            let $input = $(e.currentTarget);
            $input.parent().addClass('focused');
            $input.parent().removeClass('error');
        });

        this._bindTo($input, 'blur', (e) => {
            let $input = $(e.currentTarget);
            if ($.trim($input.val()) === '') {
                $input.parent().removeClass('focused');
            }
        });

        let options = {
            mask: '+7 (h99) 999-99-99',
            showMaskOnHover: false,
            definitions: {
                'h': {
                    validator: "[0-6-9]",
                    cardinality: 1
                },
            }
        };

        let im = new Inputmask(options);
        // im.mask('.input_phone');

        this._bindTo($form, 'submit', (ev) => {
            ev.preventDefault();
            this.ajax($(ev.target));
            return false;
        });
    }

    /**
     * Отправка формы
     *
     * @param $form
     */
    ajax($form) {
        let phone = $.trim($form.find('[name="id"]').val()),
            $submit = $form.find('[type="submit"]'),
            $input = $form.find('.input'),
            text = $submit.text();

        $form.find('.required').removeClass('error');
        $submit.prop('disabled', true);
        $submit.text('Отправка…');

        //let phoneValidation = phone.toString().replace(/[^0-9]/g, '');

        //if (((phone !== '') && (phoneValidation.length === 11))) {

            $.ajax({
                url: $form.attr('action'),
                type: $form.attr('method'),
                dataType: 'json',
                data: $form.serialize(),
                success: (response) => {
                    $input.val('');
                    $input.closest('.form__group').removeClass('focused');
                    $form.trigger('form:done', response);
                },
                error: function (e,i,v) {
                    console.log(e);
                    console.log(i);
                    console.log(v)
                    alert('Ой, что-то пошло не так! \r\n Заявку НЕ удалось отправить');
                    $submit.prop('disabled', false);
                    $submit.text(text);
                },
                complete: function (jqXHR, text_status) {
                    $form.trigger('form:complete', jqXHR, text_status);
                    $submit.prop('disabled', false);
                    $submit.text(text);
                },
            });
        // } else {
        //     setTimeout(function () {
        //         $form.find('.required').addClass('error');
        //         $submit.prop('disabled', false);
        //         $submit_text.text(text);
        //     }, 100);
        // }
    }
}
