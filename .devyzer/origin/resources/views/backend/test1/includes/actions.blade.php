@if (
    $test1->trashed()
)
    <x-utils.form-button
        :action="route('admin.test1.restore', $test1)"
        method="patch"
        button-class="btn btn-info btn-sm"
        icon="fas fa-sync-alt"
        name="confirm-item"
    >
        @lang('Restore')
    </x-utils.form-button>

    <x-utils.delete-button
        :href="route('admin.test1.permanently-delete', $test1)"
        :text="__('Permanently Delete')"/>
@else
    <x-utils.view-button :href="route('admin.test1.show', $test1)"/>
    <x-utils.edit-button :href="route('admin.test1.edit', $test1)"/>
    <x-utils.delete-button :href="route('admin.test1.destroy', $test1)"/>
@endif