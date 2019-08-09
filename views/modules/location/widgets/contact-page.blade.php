<div class="contact-info m-bot-20">
    <div class="row-contact-info row">
        <div class="col-contact-info col-md-6 col-lg-4">
            <div class="row">
                <h3 class="col-sm-3 col-md-3">@lang('themes::location.title.visit us')</h3>
                <div class="col-right col-sm-8 col-md-8 col-sm-offset-1 col-md-offset-1">
                    <div class="contact-info-row col-sm-6 col-md-12">
                        {{ $location->present()->address }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-contact-info col-md-6 col-lg-4">
            <div class="row">
                <h3 class="col-sm-3 col-md-3">@lang('themes::location.title.call us')</h3>
                <div class="col-right col-sm-8 col-md-8 col-sm-offset-1 col-md-offset-1">
                    <div class="contact-info-row col-sm-6 col-md-12">
                        {{ $location->phone1 }}<br/>
                        {{ $location->phone2 }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-contact-info col-md-6 col-lg-4">
            <div class="row">
                <h3 class="col-sm-3 col-md-3">@lang('themes::location.title.write us')</h3>
                <div class="col-right col-sm-8 col-md-8 col-sm-offset-1 col-md-offset-1">
                    <div class="contact-info-row col-sm-6 col-md-12">
                        {!! Html::email($location->email) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
