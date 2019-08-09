<button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-settings">
    <i class="fa fa-cog"></i> Portföy Ayarları
</button>

<div class="modal fade" id="modal-settings">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Portföy Ayarları</h4>
            </div>
            <div class="modal-body">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#addon-fields" data-toggle="tab">EK Alanlar</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="addon-fields">
                            <div class="form-group col-md-12">
                                <label for="settings.show_home">
                                    {!! Form::hidden('settings[show_home]', 0) !!}
                                    {!! Form::checkbox("settings[show_home]", 1, old('settings.show_home', isset($portfolio->settings->show_home) ? $portfolio->settings->show_home : 0), ['class'=>'flat-blue']) !!}
                                    &nbsp; Anasayfa da göster
                                </label>
                            </div>

                            @include('portfolio::admin.portfolios.partials.settings.addon-fields')
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">KAYDET VE KAPAT</button>
            </div>
        </div>
    </div>
</div>
