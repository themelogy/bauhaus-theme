<a id="writeus" href="#contact_form" class="btn-upper btn-yellow btn">@lang('themes::contact.write us')</a> <a target="_blank" href="https://www.google.com/maps/dir/Current+Location/{{ setting('contact::contact-map-lat') }},{{ setting('contact::contact-map-lng') }}" class="btn-upper btn-yellow btn">@lang('themes::contact.directions')</a>
<div id="contact_form" class="m-top-20">
    <h3 class="text-themecolor m-bot-20">{{ trans('themes::contact.form.title') }}</h3>
    {{--<p class="fs-sm-08">{{ trans('themes::contact.messages.info') }}</p>--}}

    <div class="alert alert-success" role="alert" v-show="success">
        @{{ successMessage }}
    </div>

    {!! Form::open(['v-on:submit'=>'submitForm', 'class' => 'contact', 'method'=>'post', 'v-show'=>'!success']) !!}
    {!! Form::hidden('from', Request::path()) !!}

    <div class="row">
        <div class="col-md-6">
            <div class="form-group":class="{ 'has-error' : hasError('first_name') }">
                <input type="text" name="first_name" value="" placeholder="{{ trans('contact::contacts.form.first_name') }}" class="form-control form-control-sm" v-model="input.first_name" :class="{ 'is-invalid' : hasError('first_name') }" />
                <div v-for="error in errors.first_name" class="help-block">@{{ error }}</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group":class="{ 'has-error' : hasError('last_name') }">
                <input type="text" name="last_name" value="" placeholder="{{ trans('contact::contacts.form.last_name') }}" class="form-control form-control-sm" v-model="input.last_name" :class="{ 'is-invalid' : hasError('last_name') }"/>
                <div v-for="error in errors.last_name" class="help-block">@{{ error }}</div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group" :class="{ 'has-error' : hasError('phone') }">
                <input type="text" name="phone" value="" placeholder="{{ trans('contact::contacts.form.phone') }}" class="form-control form-control-sm" v-model="input.phone" :class="{ 'is-invalid' : hasError('phone') }"/>
                <div v-for="error in errors.phone" class="help-block">@{{ error }}</div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group" :class="{ 'has-error' : hasError('email') }">
                <input type="text" name="email" value="" placeholder="{{ trans('contact::contacts.form.email') }}" class="form-control form-control-sm" v-model="input.email" :class="{ 'is-invalid' : hasError('email') }"/>
                <div v-for="error in errors.email" class="help-block">@{{ error }}</div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group" :class="{ 'has-error' : hasError('enquiry') }">
                <textarea name="enquiry" class="form-control form-control-sm" placeholder="{{ trans('contact::contacts.form.enquiry') }}" rows="3" v-model="input.enquiry" :class="{ 'is-invalid' : hasError('enquiry') }"></textarea>
                <div v-for="error in errors.enquiry" class="help-block">@{{ error }}</div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6" :class="{ 'has-error' : hasError('enquiry') }">
            {!! Captcha::image('captcha_contact') !!}
            <div class="help-block" style="display: block !important;" v-if="hasError('captcha_contact')">@{{ getError('captcha_contact') }}</div>
        </div>
    </div>
    <div class="row m-top-20">
        <div class="col-md-6">
            <button type="submit" class="btn-upper btn-yellow btn">{{ trans('global.buttons.send') }}</button>
        </div>
    </div>

    {!! Form::close() !!}
</div>

@push('scripts')
    {!! Theme::script('vendor/vue/vue.js') !!}
    {!! Theme::script('vendor/axios/axios.min.js') !!}
    {!! Theme::script('vendor/loading-overlay/loadingoverlay.min.js') !!}
@endpush

@push('js-inline')
    <script>
        $('#contact_form').hide();
        $('#writeus').click(function(){
           $('#contact_form').toggle('slow');
           setTimeout(function(){
               $('html, body').animate({
                   scrollTop: $('#writeus').offset().top
               }, 1000);
           },500);
        });

        @if(App::environment()=='local')
            Vue.config.devtools = true;
        @endif
        window.axios.defaults.headers.common['X-CSRF-TOKEN']     = '{{ csrf_token() }}';
        window.axios.defaults.headers.common['Cache-Control']    = 'no-cache';
        new Vue({
            el: '#contact_form',
            data: {
                input: {
                    first_name: '',
                    last_name: '',
                    phone: '',
                    email:'',
                    enquiry: '',
                    captcha_contact: ''
                },
                errors: {},
                success: false,
                successMessage: ''
            },
            methods: {
                submitForm: function (e) {
                    e.preventDefault();
                    this.success = false;
                    this.input.captcha_contact = grecaptcha.getResponse(captcha_contact);
                    this.ajaxStart(true);
                    axios.post('{{ route('api.contact.send') }}', this.$data.input)
                        .then(response => {
                            this.successMessage = response.data.message;
                            this.success = true;
                            this.resetForm();
                            this.ajaxStart(false);
                        })
                        .catch(error => {
                            this.errors = error.response.data;
                            this.success = false;
                            this.ajaxStart(false);
                            grecaptcha.reset(captcha_contact);
                        });
                },
                getError: function (field) {
                    if(this.errors[field]) {
                        return this.errors[field][0];
                    }
                },
                hasError: function (field) {
                    if(this.errors[field]) {
                        return true;
                    }
                    return false;
                },
                resetForm: function () {
                    var self = this;
                    Object.keys(this.$data.input).forEach(function(key, index){
                        self.$data.input[key] = '';
                    });
                },
                ajaxStart: function (loading) {
                    if (loading) {
                        $('form', this.$el).LoadingOverlay("show",{
                            zIndex: 100
                        });
                    } else {
                        $('form', this.$el).LoadingOverlay("hide",{
                            zIndex: 100
                        });
                    }
                }
            }
        });
    </script>
    {!! Captcha::setLang(locale())->scriptWithCallback(['captcha_contact']) !!}
@endpush
