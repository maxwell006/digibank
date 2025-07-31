@extends('backend.layouts.app')
@section('title')
    {{ __('Add New Plan') }}
@endsection

@section('content')
    <div class="main-content">
        <div class="page-title">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-xl-12">
                        <div class="title-content">
                            <h2 class="title">{{ __('Add New Plan') }}</h2>
                            <a href="{{ url()->previous() }}" class="title-btn"><i
                                    data-lucide="corner-down-left"></i>{{ __('Back') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <form action="{{ route('admin.plan.fdr.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="site-card">
                            <div class="site-card-header">
                                <h3 class="title">{{ __('Basic Info') }}</h3>
                            </div>
                            <div class="site-card-body">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="site-input-groups">
                                            <label class="box-input-label" for="">
                                                {{ __('Plan Name:') }}
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="name" value="{{ old('name') }}"
                                                class="box-input" placeholder="Plan name" required />
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="site-input-groups">
                                            <label class="box-input-label" for="">
                                                {{ __('Min Amount:') }}
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="input-group joint-input">
                                                <input type="number" name="minimum_amount"
                                                    value="{{ old('minimum_amount') }}" class="form-control" required />
                                                <span
                                                    class="input-group-text">{{ setting('site_currency', 'global') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="site-input-groups">
                                            <label class="box-input-label" for="">
                                                {{ __('Max Amount:') }}
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="input-group joint-input">
                                                <input type="number" name="maximum_amount"
                                                    value="{{ old('maximum_amount') }}" class="form-control" required />
                                                <span
                                                    class="input-group-text">{{ setting('site_currency', 'global') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="site-input-groups">
                                            <label class="box-input-label" for="">
                                                {{ __('Interest Rate:') }}
                                                <span class="text-danger">*</span>
                                                <i data-lucide="info"data-bs-toggle="tooltip"
                                                    data-bs-original-title="{{ __('User will receive this interest amount in every receiving interval') }}"></i>
                                            </label>
                                            <div class="input-group joint-input">
                                                <input type="number" step="0.01" name="interest_rate"
                                                    value="{{ old('interest_rate') }}" class="form-control" required />
                                                <span class="input-group-text">{{ __('%') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="site-input-groups">
                                            <label class="box-input-label" for="">
                                                {{ __('Receiving Interval:') }}
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="input-group joint-input">
                                                <input type="number" name="intervel" value="{{ old('intervel') }}"
                                                    class="form-control" required />
                                                <span class="input-group-text">{{ __('Days') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="site-input-groups">
                                            <label class="box-input-label" for="">
                                                {{ __('Lock In Period:') }}
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="input-group joint-input">
                                                <input type="number" name="period" value="{{ old('period') }}"
                                                    class="form-control" required />
                                                <span class="input-group-text">{{ __('Days') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="site-input-groups">
                                            <label class="box-input-label"
                                                for="">{{ __('Add maturity platform fee?') }}</label>
                                            <div class="switch-field same-type">
                                                <input type="radio" id="add-fee-yes" name="add_maturity_platform_fee"
                                                    checked="" value="1" />
                                                <label for="add-fee-yes">{{ __('Yes') }}</label>
                                                <input type="radio" id="add-fee-no" name="add_maturity_platform_fee"
                                                    value="0" />
                                                <label for="add-fee-no">{{ __('No') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6" id="maturity-platform-fee-sec">
                                        <div class="site-input-groups">
                                            <label class="box-input-label"
                                                for="">{{ __('Maturity platform fee:') }}</label>
                                            <div class="input-group joint-input">
                                                <input type="number" name="maturity_platform_fee"
                                                    value="{{ old('maturity_platform_fee') }}"
                                                    oninput="this.value = validateDouble(this.value)"
                                                    class="form-control" />
                                                <span
                                                    class="input-group-text">{{ setting('site_currency', 'global') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <p class="alert alert-success paragraph mb-0 mt-2 fst-italic profit-info">
                                            <i data-lucide="info"></i>
                                            <strong>Minimum <span class="min-value"></span> {{ setting('site_currency') }}
                                                to a maximum <span class="max-value"></span>
                                                {{ setting('site_currency') }} will get the user every <span
                                                    class="interval-days"></span> days.</strong>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="site-card">
                            <div class="site-card-header">
                                <h3 class="title">{{ __('FDR Return') }}</h3>
                            </div>
                            <div class="site-card-body">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="site-input-groups">
                                            <label class="box-input-label" for="">{{ __('FDR Return Type') }}<i
                                                    data-lucide="info"data-bs-toggle="tooltip"
                                                    data-bs-original-title="{{ __('Compounding is the profit will be generated after adding the profit with the fdr amount.') }}"></i></label>
                                            <div class="switch-field same-type">
                                                <input type="radio" id="radio-seven" name="is_compounding"
                                                    checked="" value="1" />
                                                <label for="radio-seven">{{ __('Compounding') }}</label>
                                                <input type="radio" id="radio-eight" name="is_compounding"
                                                    value="0" />
                                                <label for="radio-eight">{{ __('Non Compounding') }}</label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="site-card">
                            <div class="site-card-header">
                                <h3 class="title">{{ __('FDR Cancellation') }}</h3>
                            </div>
                            <div class="site-card-body">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="site-input-groups">
                                            <label class="box-input-label" for="">{{ __('Can Cancel') }}</label>
                                            <div class="switch-field same-type">
                                                <input type="radio" id="radio-can-cancel" name="can_cancel"
                                                    checked="" value="1" />
                                                <label for="radio-can-cancel">{{ __('Yes') }}</label>
                                                <input type="radio" id="radio-can-cancel1" name="can_cancel"
                                                    value="0" />
                                                <label for="radio-can-cancel1">{{ __('No') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6" id="cancel_type_sec">
                                        <div class="site-input-groups">
                                            <label class="box-input-label" for="">{{ __('Cancel Type') }}</label>
                                            <div class="switch-field same-type">
                                                <input type="radio" id="radio-cancel-type" name="cancel_type"
                                                    checked="" value="anytime" />
                                                <label for="radio-cancel-type">{{ __('Anytime') }}</label>
                                                <input type="radio" id="radio-cancel-type1" name="cancel_type"
                                                    value="fixed" />
                                                <label for="radio-cancel-type1">{{ __('Fixed') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6" id="cancel_time_sec">
                                        <div class="site-input-groups">
                                            <label class="box-input-label"
                                                for="">{{ __('Cancellation Time:') }}</label>
                                            <div class="input-group joint-input">
                                                <input type="number" name="cancel_days"
                                                    value="{{ old('cancel_days') }}" class="form-control" />
                                                <span class="input-group-text">{{ __('Days') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6" id="cancel_fee_sec">
                                        <div class="site-input-groups">
                                            <label class="box-input-label"
                                                for="">{{ __('Cancellation Charge:') }}</label>
                                            <div class="position-relative">
                                                <input type="number" value="{{ old('cancel_days') }}" class="box-input"
                                                    placeholder="Charge" name="cancel_fee"
                                                    oninput="this.value = validateDouble(this.value)" />
                                                <div class="prcntcurr">
                                                    <select name="cancel_fee_type" class="form-select" id="">
                                                        <option value="percentage"
                                                            @if (old('cancel_fee_type') == 'percentage') selected @endif>
                                                            {{ __('%') }}
                                                        </option>
                                                        <option value="fixed"
                                                            @if (old('cancel_fee_type') == 'fixed') selected @endif>
                                                            {{ $currencySymbol }}
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="site-card">
                            <div class="site-card-header">
                                <h3 class="title">
                                    {{ __('FDR Increase Info') }}
                                </h3>
                            </div>
                            <div class="site-card-body">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="site-input-groups">
                                            <label class="box-input-label" for="">
                                                {{ __('Add New Fund to Existing FDR ?') }}
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="switch-field same-type">
                                                <input type="radio" id="radio-can-add" name="is_add_fund_fdr"
                                                    checked="" value="1" />
                                                <label for="radio-can-add">{{ __('Yes') }}</label>
                                                <input type="radio" id="radio-can-add1" name="is_add_fund_fdr"
                                                    value="0" />
                                                <label for="radio-can-add1">{{ __('No') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6" id="fdr-increase-type">
                                        <div class="site-input-groups">
                                            <label class="box-input-label"
                                                for="">{{ __('Increase Type') }}</label>
                                            <div class="switch-field same-type">
                                                <input type="radio" id="increment-unlimited" name="increment_type"
                                                    checked="" value="unlimited" />
                                                <label for="increment-unlimited">{{ __('Unlimited') }}</label>
                                                <input type="radio" id="increment-fixed" name="increment_type"
                                                    value="fixed" />
                                                <label for="increment-fixed">{{ __('Fixed') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6" id="fdr-max-increase">
                                        <div class="site-input-groups">
                                            <label class="box-input-label"
                                                for="">{{ __('Max Increase:') }}</label>
                                            <div class="input-group joint-input">
                                                <input type="number" name="increment_times"
                                                    value="{{ old('increment_times') }}"
                                                    oninput="this.value = validateDouble(this.value)"
                                                    class="form-control" />
                                                <span class="input-group-text">
                                                    {{ __('Times') }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6" id="fdr-min-increase-amount">
                                        <div class="site-input-groups">
                                            <label class="box-input-label" for="">
                                                {{ __('Min Increase Amount:') }}
                                            </label>
                                            <div class="input-group joint-input">
                                                <input type="number" name="min_increment"
                                                    value="{{ old('min_increment') }}"
                                                    oninput="this.value = validateDouble(this.value)"
                                                    class="form-control" />
                                                <span class="input-group-text">
                                                    {{ setting('site_currency', 'global') }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6" id="fdr-max-increase-amount">
                                        <div class="site-input-groups">
                                            <label class="box-input-label"
                                                for="">{{ __('Max Increase Amount:') }}</label>
                                            <div class="input-group joint-input">
                                                <input type="number" name="max_increment"
                                                    value="{{ old('max_increment') }}"
                                                    oninput="this.value = validateDouble(this.value)"
                                                    class="form-control" />
                                                <span
                                                    class="input-group-text">{{ setting('site_currency', 'global') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6" id="fdr-increase-charge-type">
                                        <div class="site-input-groups">
                                            <label class="box-input-label"
                                                for="">{{ __('Increase Charge Type') }}</label>
                                            <div class="switch-field same-type">
                                                <input type="radio" id="increment-charge-yes"
                                                    name="increment_charge_type" checked="" value="1" />
                                                <label for="increment-charge-yes">{{ __('Yes') }}</label>
                                                <input type="radio" id="increment-charge-no"
                                                    name="increment_charge_type" value="0" />
                                                <label for="increment-charge-no">{{ __('No') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6" id="fdr-increase-charge">
                                        <div class="site-input-groups">
                                            <label class="box-input-label"
                                                for="">{{ __('Increase Charge:') }}</label>
                                            <div class="input-group joint-input">
                                                <input type="number" name="increment_fee"
                                                    value="{{ old('increment_fee') }}"
                                                    oninput="this.value = validateDouble(this.value)"
                                                    class="form-control" />
                                                <span class="input-group-text">
                                                    {{ setting('site_currency', 'global') }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="site-card">
                            <div class="site-card-header">
                                <h3 class="title">
                                    {{ __('FDR Decrease Info') }}
                                </h3>
                            </div>
                            <div class="site-card-body">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="site-input-groups">
                                            <label class="box-input-label" for="">
                                                {{ __('Deduct Fund to Existing FDR ?') }}
                                                <span class="text-danger">*</span>
                                            </label>
                                            <div class="switch-field same-type">
                                                <input type="radio" id="radio-can-deduct" name="is_deduct_fund_fdr"
                                                    checked="" value="1" />
                                                <label for="radio-can-deduct">{{ __('Yes') }}</label>
                                                <input type="radio" id="radio-can-deduct1" name="is_deduct_fund_fdr"
                                                    value="0" />
                                                <label for="radio-can-deduct1">{{ __('No') }}</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6" id="fdr-decrease-type">
                                        <div class="site-input-groups">
                                            <label class="box-input-label"
                                                for="">{{ __('Decrease Type') }}</label>
                                            <div class="switch-field same-type">
                                                <input type="radio" id="decrement-unlimited" name="decrement_type"
                                                    checked="" value="unlimited" />
                                                <label for="decrement-unlimited">{{ __('Unlimited') }}</label>
                                                <input type="radio" id="decrement-fixed" name="decrement_type"
                                                    value="fixed" />
                                                <label for="decrement-fixed">{{ __('Fixed') }}</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6" id="fdr-max-decrease">
                                        <div class="site-input-groups">
                                            <label class="box-input-label"
                                                for="">{{ __('Max Decrease:') }}</label>
                                            <div class="input-group joint-input">
                                                <input type="number" name="decrement_times"
                                                    value="{{ old('decrement_times') }}"
                                                    oninput="this.value = validateDouble(this.value)"
                                                    class="form-control" />
                                                <span class="input-group-text">
                                                    {{ __('Times') }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6" id="fdr-min-decrease-amount">
                                        <div class="site-input-groups">
                                            <label class="box-input-label"
                                                for="">{{ __('Min Decrease Amount:') }}</label>
                                            <div class="input-group joint-input">
                                                <input type="number" name="min_decrement"
                                                    value="{{ old('min_decrement') }}"
                                                    oninput="this.value = validateDouble(this.value)"
                                                    class="form-control" />
                                                <span class="input-group-text">
                                                    {{ setting('site_currency', 'global') }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6" id="fdr-max-decrease-amount">
                                        <div class="site-input-groups">
                                            <label class="box-input-label" for="">
                                                {{ __('Max Decrease Amount:') }}
                                            </label>
                                            <div class="input-group joint-input">
                                                <input type="number" name="max_decrement"
                                                    oninput="this.value = validateDouble(this.value)"
                                                    class="form-control" />
                                                <span class="input-group-text">
                                                    {{ setting('site_currency', 'global') }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6" id="fdr-decrease-charge-type">
                                        <div class="site-input-groups">
                                            <label class="box-input-label" for="">
                                                {{ __('Decrease Charge Type') }}
                                            </label>
                                            <div class="switch-field same-type">
                                                <input type="radio" id="decrement-charge-yes"
                                                    name="decrement_charge_type" checked="" value="1" />
                                                <label for="decrement-charge-yes">{{ __('Yes') }}</label>
                                                <input type="radio" id="decrement-charge-no"
                                                    name="decrement_charge_type" value="0" />
                                                <label for="decrement-charge-no">{{ __('No') }}</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6" id="fdr-decrease-charge">
                                        <div class="site-input-groups">
                                            <label class="box-input-label"
                                                for="">{{ __('Decrease Charge:') }}</label>
                                            <div class="input-group joint-input">
                                                <input type="number" name="decrement_fee"
                                                    value="{{ old('decrement_fee') }}"
                                                    oninput="this.value = validateDouble(this.value)"
                                                    class="form-control" />
                                                <span class="input-group-text">
                                                    {{ setting('site_currency', 'global') }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="site-card">
                            <div class="site-card-header">
                                <h3 class="title">{{ __('FDR Featured Info') }}</h3>
                            </div>
                            <div class="site-card-body">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="site-input-groups">
                                            <label class="box-input-label" for="">{{ __('Featured') }}</label>
                                            <div class="switch-field same-type">
                                                <input type="radio" id="radio-can-featured" name="featured"
                                                    checked="" value="1" />
                                                <label for="radio-can-featured">{{ __('Yes') }}</label>
                                                <input type="radio" id="radio-can-featured1" name="featured"
                                                    value="0" />
                                                <label for="radio-can-featured1">{{ __('No') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6" id="badge">
                                        <div class="site-input-groups">
                                            <label class="box-input-label" for="">{{ __('Badge:') }}</label>
                                            <div class="input-group joint-input">
                                                <input type="text" name="badge" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="site-card">
                            <div class="site-card-header">
                                <h3 class="title">{{ __('FDR Status') }}</h3>
                            </div>
                            <div class="site-card-body">
                                <div class="col-xl-6">
                                    <div class="site-input-groups">
                                        <label class="box-input-label" for="">{{ __('Status:') }}</label>
                                        <div class="switch-field same-type">
                                            <input type="radio" id="radio-five" name="status" checked=""
                                                value="1" />
                                            <label for="radio-five">{{ __('Active') }}</label>
                                            <input type="radio" id="radio-six" name="status" value="0" />
                                            <label for="radio-six">{{ __('Deactivate') }}</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <button type="submit" class="site-btn-sm primary-btn w-100">
                                {{ __('Add New Plan') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        (function($) {
            "use strict";

            function calculateProfit() {
                var minAmount = parseFloat($('input[name=minimum_amount]').val());
                var maxAmount = parseFloat($('input[name=maximum_amount]').val());
                var intervalDays = $('input[name=intervel]').val();
                var interestRate = parseFloat($('input[name=interest_rate]').val());

                $('span.min-value').text((minAmount / 100) * interestRate);
                $('span.max-value').text((maxAmount / 100) * interestRate);
                $('span.interval-days').text(intervalDays);

                if (!isNaN(minAmount) && !isNaN(maxAmount) && intervalDays.length > 0 && !isNaN(interestRate)) {
                    $('.profit-info').show();
                    return;
                }

                $('.profit-info').hide();
            }

            calculateProfit();

            $('input[name=minimum_amount],input[name=maximum_amount],input[name=intervel],input[name=interest_rate]')
                .on('input', function() {
                    calculateProfit();
                });

            function toggleElementsVisibility() {
                var canCancel = $('input[name="can_cancel"]:checked').val();

                // Check the value and show/hide elements accordingly
                if (canCancel == 1) {
                    $('#cancel_type_sec').show();
                    $('#cancel_fee_sec').show();
                    $('#empty_col').show();
                    toggleTimeVisibility();
                } else {
                    $('#cancel_time_sec').hide();
                    $('#cancel_type_sec').hide();
                    $("#cancel_fee_sec").hide();
                    $("#empty_col").hide();
                }
            }

            function toggleTimeVisibility() {
                var cancel_type = $('input[name="cancel_type"]:checked').val();

                if (cancel_type === 'fixed') {
                    $('#cancel_time_sec').show();
                    $('#empty_col').show();
                } else {
                    $('#cancel_time_sec').hide();
                    $('#empty_col').hide();
                }
            }

            function deductFund() {
                var deduct = $('input[name="is_deduct_fund_fdr"]:checked').val();
                if (deduct === '1') {
                    $('#deduct_fund_charge').show();
                } else {
                    $('#deduct_fund_charge').hide();
                }
            }

            function toggleBadgeVisibility() {
                var featured = $('input[name="featured"]:checked').val();
                if (featured === '1') {
                    $('#badge').show();
                } else {
                    $('#badge').hide();
                }
            }

            function toggleIncreaseTypeVisibility() {
                var type = $('input[name="increment_type"]:checked').val();
                if (type === 'fixed') {
                    $('#fdr-min-increase').show();
                    $('#fdr-max-increase').show();
                } else {
                    $('#fdr-min-increase').hide();
                    $('#fdr-max-increase').hide();
                }
            }

            function toggleDecreaseTypeVisibility() {
                var type = $('input[name="decrement_type"]:checked').val();
                if (type === 'fixed') {
                    $('#fdr-max-decrease').show();
                } else {
                    $('#fdr-max-decrease').hide();
                }
            }

            function toggleIncrementChargeType() {
                var type = $('input[name="increment_charge_type"]:checked').val();
                if (type == 1) {
                    $('#fdr-increase-charge').show();
                } else {
                    $('#fdr-increase-charge').hide();
                }
            }

            function toggleDecrementChargeType() {
                var type = $('input[name="decrement_charge_type"]:checked').val();
                if (type == 1) {
                    $('#fdr-decrease-charge').show();
                } else {
                    $('#fdr-decrease-charge').hide();
                }
            }

            function togglePlatformFee() {
                var type = $('input[name="add_maturity_platform_fee"]:checked').val();

                if (type == 1) {
                    $('#maturity-platform-fee-sec').show();
                } else {
                    $('#maturity-platform-fee-sec').hide();
                }
            }

            // Initial toggle on page load
            toggleElementsVisibility();
            toggleTimeVisibility();
            deductFund();
            toggleBadgeVisibility();
            toggleIncreaseTypeVisibility();
            toggleDecreaseTypeVisibility();

            $('input[name="can_cancel"]').on('change', function() {
                toggleElementsVisibility();
            });

            $('input[name="cancel_type"]').on('change', function() {
                toggleTimeVisibility();
            });

            $('input[name="increment_charge_type"]').on('change', function() {
                toggleIncrementChargeType();
            });

            $('input[name="decrement_charge_type"]').on('change', function() {
                toggleDecrementChargeType();
            });

            $('input[name="is_deduct_fund_fdr"]').on('change', function() {
                deductFund();
            });

            $('input[name="featured"]').on('change', function() {
                toggleBadgeVisibility();
            });

            $('input[name="is_add_fund_fdr"]').on('change', function() {
                if ($(this).val() == 1) {


                    var type = $('input[name="increment_type"]:checked').val();

                    if (type === 'fixed') {
                        $('#fdr-min-increase').show();
                        $('#fdr-max-increase').show();
                    } else {
                        $('#fdr-min-increase').hide();
                        $('#fdr-max-increase').hide();
                    }

                    $('#fdr-increase-type').show();
                    $('#fdr-increase-charge').show();
                    $('#fdr-increase-charge-type').show();
                    $('#fdr-min-increase-amount').show();
                    $('#fdr-max-increase-amount').show();
                } else {

                    $('#fdr-min-increase').hide();
                    $('#fdr-max-increase').hide();

                    $('#fdr-max-increase').hide();
                    $('#fdr-increase-type').hide();
                    $('#fdr-increase-charge').hide();
                    $('#fdr-increase-charge-type').hide();
                    $('#fdr-min-increase-amount').hide();
                    $('#fdr-max-increase-amount').hide();
                }
            });

            $('input[name="increment_type"]').on('change', function() {
                toggleIncreaseTypeVisibility();
            });

            $('input[name="is_deduct_fund_fdr"]').on('change', function() {
                if ($(this).val() == 1) {

                    var type = $('input[name="decrement_type"]:checked').val();
                    if (type === 'fixed') {
                        $('#fdr-max-decrease').show();
                    } else {
                        $('#fdr-max-decrease').hide();
                    }

                    $('#fdr-decrease-type').show();
                    $('#fdr-decrease-charge-type').show();
                    $('#fdr-decrease-charge').show();
                    $('#fdr-min-decrease-amount').show();
                    $('#fdr-max-decrease-amount').show();
                } else {

                    $('#fdr-max-decrease').hide();
                    $('#fdr-max-decrease').hide();
                    $('#fdr-decrease-type').hide();
                    $('#fdr-decrease-charge-type').hide();
                    $('#fdr-decrease-charge').hide();
                    $('#fdr-min-decrease-amount').hide();
                    $('#fdr-max-decrease-amount').hide();
                }
            });

            $('input[name="decrement_type"]').on('change', function() {
                toggleDecreaseTypeVisibility();
            });

            $('input[name="add_maturity_platform_fee"]').on('change', function() {
                togglePlatformFee();
            });

        })(jQuery);
    </script>
@endsection
