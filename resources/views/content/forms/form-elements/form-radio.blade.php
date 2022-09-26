@extends('layouts/contentLayoutMaster')

@section('title', 'Radio')

@section('content')
    <!-- Basic Radio Button start -->
    <section id="basic-radio">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Radio Buttons</h4>
                    </div>
                    <div class="card-body">
                        <div class="demo-inline-spacing">
                            <div class="form-check form-check-inline">
                                <input id="inlineRadio1" class="form-check-input" type="radio" name="inlineRadioOptions"
                                    value="option1" checked />
                                <label class="form-check-label" for="inlineRadio1">Checked</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input id="inlineRadio2" class="form-check-input" type="radio" name="inlineRadioOptions"
                                    value="option2" />
                                <label class="form-check-label" for="inlineRadio2">Unchecked</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input id="inlineRadio3" class="form-check-input" type="radio"
                                    name="inlineRadioDisabledOptions" value="option3" checked disabled />
                                <label class="form-check-label" for="inlineRadio3">Checked disabled</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input id="inlineRadio4" class="form-check-input" type="radio"
                                    name="inlineRadioDisabledOptions" value="option4" disabled />
                                <label class="form-check-label" for="inlineRadio4">Unchecked disabled</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Basic Radio Button end -->

    <!-- Vuexy Radio Buttons Color start -->
    <section id="vuexy-radio-color">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Color</h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text mb-0">
                            To change the color of the radio use the <code>.form-check-{value}</code> for primary,
                            secondary, success,
                            danger, info, warning.
                        </p>
                        <div class="demo-inline-spacing">
                            <div class="form-check form-check-primary">
                                <input id="customColorRadio1" type="radio" name="customColorRadio1"
                                    class="form-check-input" checked />
                                <label class="form-check-label" for="customColorRadio1">Primary</label>
                            </div>
                            <div class="form-check form-check-secondary">
                                <input id="customColorRadio2" type="radio" name="customColorRadio2"
                                    class="form-check-input" checked />
                                <label class="form-check-label" for="customColorRadio2">Secondary</label>
                            </div>
                            <div class="form-check form-check-success">
                                <input id="customColorRadio3" type="radio" name="customColorRadio3"
                                    class="form-check-input" checked />
                                <label class="form-check-label" for="customColorRadio3">Success</label>
                            </div>
                            <div class="form-check form-check-danger">
                                <input id="customColorRadio5" type="radio" name="customColorRadio5"
                                    class="form-check-input" checked />
                                <label class="form-check-label" for="customColorRadio5">Danger</label>
                            </div>
                            <div class="form-check form-check-warning">
                                <input id="customColorRadio4" type="radio" name="customColorRadio4"
                                    class="form-check-input" checked />
                                <label class="form-check-label" for="customColorRadio4">Warning</label>
                            </div>
                            <div class="form-check form-check-info">
                                <input id="customRadio6" type="radio" name="customColorRadio6" class="form-check-input"
                                    checked />
                                <label class="form-check-label" for="customRadio6">Info</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Vuexy Radio Buttons Color end -->
@endsection
