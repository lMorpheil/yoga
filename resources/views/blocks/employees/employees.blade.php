<section class="employees">
    <div class="container">
        <h2 class="h2">
            Наши преподаватели
        </h2>
        <div class="employees__wrapper">
            <div class="employees__slider" data-employees-wrapper>

                 @foreach($employees as $employee)
                    <a class="employees__item" href="javascript:void(0)" data-js="popup" data-js-popup="employees-{{ $employee->id }}">
                        <figure>
                            <img src="{{ asset( '/storage/' . $employee->previews) }}" alt="">
                            <figcaption class="employees__tablet">
                                <div class="employees__title">
                                    {{ $employee->name }}
                                </div>
                                <div class="employees__profession">
                                    {{ $employee->profession }}
                                </div>
                            </figcaption>
                        </figure>
                    </a>
                 @endforeach

            </div>
            <div class="employees__navigation" data-employees-navigation>
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
    </div>
</section>
