<tr>
    <td class="text-center">
        <input type="checkbox" name="services[]" id="check-row" value="{{ json_encode($service) }}" class="form-check-input">
    </td>
    <td>
        {{ $service['biller_name'] }}
    </td>
    <td>
        {{ $service['biller_code'] }}
    </td>
    <td>
        {{ $service['country'] }}
    </td>
    <td>
        {{ $service['amount'] }}
    </td>
    <td>
        <button type="button" class="round-icon-btn red-btn" id="addService" data-info="{{ json_encode($service) }}">
            <i data-lucide="plus-circle"></i>
        </button>
        <button type="button" class="round-icon-btn primary-btn d-none" id="addedService" disabled>
            <i data-lucide="check-circle"></i>
        </button>
    </td>
</tr>