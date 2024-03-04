<section class="schedule">
    <div class="container">
        <h2 class="h2">
            Расписание груповых занятий
        </h2>
        <div class="schedule__wrapper">
            <table class="schedule__table">
                <tr class="schedule__row">
                    <td class="schedule__ceil"><b>пн</b></td>
                    @foreach($monday as $key=>$value)
                        <td class="schedule__ceil">
                            <b>{{ $value->hour . ':' . $value->minute }}</b><br>
                            {{ $value->section }}<br>
                            {{ $value->price }}  ₽
                        </td>
                    @endforeach
                    <?php for($i = 0;$i <= abs($maxCount - count($monday));$i++): ?>
                    <td class="schedule__ceil"></td>
                    <?php endfor; ?>
                </tr>

                <tr class="schedule__row">
                    <td class="schedule__ceil"><b>вт</b></td>
                    @foreach($tuesday as $key=>$value)
                        <td class="schedule__ceil">
                            <b>{{ $value->hour . ':' . $value->minute }}</b><br>
                            {{ $value->section }}<br>
                            {{ $value->price }}  ₽
                        </td>
                    @endforeach
                    <?php for($i = 0;$i <= abs($maxCount - count($tuesday));$i++): ?>
                    <td class="schedule__ceil"></td>
                    <?php endfor; ?>
                </tr>
                <tr class="schedule__row">
                    <td class="schedule__ceil"><b>ср</b></td>
                    @foreach($wednesday as $key=>$value)
                        <td class="schedule__ceil">
                            <b>{{ $value->hour . ':' . $value->minute }}</b><br>
                            {{ $value->section }}<br>
                            {{ $value->price }}  ₽
                        </td>
                    @endforeach
                    <?php for($i = 0;$i <= abs($maxCount - count($wednesday));$i++): ?>
                    <td class="schedule__ceil"></td>
                    <?php endfor; ?>
                </tr>
                <tr class="schedule__row">
                    <td class="schedule__ceil"><b>чт</b></td>
                    @foreach($thursday as $key=>$value)
                        <td class="schedule__ceil">
                            <b>{{ $value->hour . ':' . $value->minute }}</b><br>
                            {{ $value->section }}<br>
                            {{ $value->price }}  ₽
                        </td>
                    @endforeach
                    <?php for($i = 0;$i <= abs($maxCount - count($thursday));$i++): ?>
                    <td class="schedule__ceil"></td>
                    <?php endfor; ?>
                </tr>
                <tr class="schedule__row">
                    <td class="schedule__ceil"><b>пт</b></td>
                    @foreach($friday as $key=>$value)
                        <td class="schedule__ceil">
                            <b>{{ $value->hour . ':' . $value->minute }}</b><br>
                            {{ $value->section }}<br>
                            {{ $value->price }}  ₽
                        </td>
                    @endforeach
                    <?php for($i = 0;$i <= abs($maxCount - count($friday));$i++): ?>
                    <td class="schedule__ceil"></td>
                    <?php endfor; ?>
                </tr>
                <tr class="schedule__row">
                    <td class="schedule__ceil"><b>сб</b></td>
                    @foreach($saturday as $key=>$value)
                        <td class="schedule__ceil">
                            <b>{{ $value->hour . ':' . $value->minute }}</b><br>
                            {{ $value->section }}<br>
                            {{ $value->price }}  ₽
                        </td>
                    @endforeach
                    <?php for($i = 0;$i <= abs($maxCount - count($saturday));$i++): ?>
                    <td class="schedule__ceil"></td>
                    <?php endfor; ?>
                </tr>
                <tr class="schedule__row">
                    <td class="schedule__ceil"><b>вс</b></td>
                    @foreach($sunday as $key=>$value)
                        <td class="schedule__ceil">
                            <b>{{ $value->hour . ':' . $value->minute }}</b><br>
                            {{ $value->section }}<br>
                            {{ $value->price }}  ₽
                        </td>
                    @endforeach
                    <?php for($i = 0;$i <= abs($maxCount - count($sunday));$i++): ?>
                    <td class="schedule__ceil"></td>
                    <?php endfor; ?>
                </tr>
            </table>
        </div>
        <button class="btn schedule__btn about__btn" type="button" data-js="popup"
                data-js-popup="lesson">Записаться на занятие</button>
    </div>
</section>
