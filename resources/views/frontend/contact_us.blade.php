 @extends('layouts.frontend_layout')

@section('page_title') {{ __('lang.contact_us') }} @endsection

@section('main_content')
    <main class="site-content flex-1">
        <section class="contact-us_section section-padding">
            <div class="container">
                <div class="grid grid-cols-12 md:gap-6 gap-4">
                    <div class="lg:col-span-10 col-span-12 lg:col-start-2 col-start-auto">
                        <div class="grid grid-cols-12 md:gap-x-6 gap-x-4">
                            <!-- Left: Contact Info -->
                            <div class="md:col-span-6 col-span-12 contact-details">
                                <div class="contact-title-wrap md:pb-8 sm:pb-6 pb-4 border-b border-stock-color">
                                    <h2 class="contact-title">{{ __('lang.contact_us') }}</h2>
                                    <p class="contact-info">
                                        {{ __('lang.contact_us_message') }}
                                    </p>
                                </div>

                                <!-- Address -->
                                <div class="contact-item">
                                    <div class="icon">
                                        <i class="fa-solid fa-location-dot"></i>
                                    </div>
                                    <div class="Throuh">
                                        <h3 class="title">{{ __('lang.office') }}</h3>
                                        <a href="#" class="link">{{isEnglish()?getOptionData('address_en'):getOptionData('address')}}</a>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="contact-item">
                                    <div class="icon">
                                        <i class="fa-solid fa-envelope"></i>
                                    </div>
                                    <div class="Throuh">
                                        <h3 class="title">{{ __('lang.email') }}</h3>
                                        <a href="mailto:{{getOptionData('email')}}" class="link {{getOptionData('email')==null?'hidden':''}}">{{getOptionData('email')}}</a>{{getOptionData('email_2')==null?'':','}}
                                        <a href="mailto:{{getOptionData('email_2')}}" class="link {{getOptionData('email')==null?'hidden':''}}">{{getOptionData('email')}}</a>
                                    </div>
                                </div>
                                <!-- Phone -->
                                <div class="contact-item">
                                    <div class="icon">
                                        <i class="fa-solid fa-phone"></i>
                                    </div>
                                    <div class="Throuh">
                                        <h3 class="title">{{ __('lang.phone') }}</h3>
                                        <a href="tel:{{getOptionData('phone_1')}}" class="link {{getOptionData('phone_1')==null?'hidden':''}}">{{isEnglish()?getOptionData('phone_1'):bangla_number(getOptionData('phone_1'))}}</a>{{getOptionData('phone_2')==null?'':','}}
                                         <a href="tel:{{getOptionData('phone_2')}}" class="link {{getOptionData('phone_2')==null?'hidden':''}}">{{isEnglish()?getOptionData('phone_2'):bangla_number(getOptionData('phone_2'))}}</a>

                                    </div>
                                </div>
                            </div>
                            <!-- Right: Contact Form -->
                            <div class="md:col-span-6 col-span-12">
                                <div class="contact-form-wrap">
                                    <form method="post" action="{{route('submit_message')}}" class="md:space-y-6 space-y-4">
                                        @csrf
                                        <input required name="name" type="text" placeholder="{{__('lang.name')}}" class="contact-input" />
                                        <input required name="email" type="email" placeholder="{{__('lang.your_email_address')}}" class="contact-input" />
                                        <input required name="phone" type="text" placeholder="{{__('lang.phone_number')}}" class="contact-input" />
                                        <textarea required name="message" placeholder="{{__('lang.your_message')}}" rows="4" class="contact-input"></textarea>
                                        <button type="submit" class="contact-button">
                                            {{__('lang.send_message')}} <i class="fa-solid fa-arrow-right-long"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('js')
    <!-- SweetAlert2 CSS & JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '{{__('lang.success')}}!',
                text: '{{ session('success') }}',
                confirmButtonColor: 'black',
                confirmButtonText: '{{__('lang.ok')}}'
            });
        </script>
    @endif
@endsection
