@if (
    $country->trashed()
)
    <x-utils.form-button
        :action="route('admin.country.restore', $country)"
        method="patch"
        button-class="btn btn-info btn-sm"
        icon="fas fa-sync-alt"
        name="confirm-item"
    >
        @lang('Restore')
    </x-utils.form-button>

    <x-utils.delete-button
        :href="route('admin.country.permanently-delete', $country)"
        :text="__('Permanently Delete')"/>
@else
    <x-utils.view-button :href="route('admin.country.show', $country)"/>
    <x-utils.edit-button :href="route('admin.country.edit', $country)"/>
    <x-utils.delete-button :href="route('admin.country.destroy', $country)"/>
@endif