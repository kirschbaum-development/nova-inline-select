<template>
    <default-field :field="field" :errors="errors">
        <template slot="field">
            <select-control
                :id="field.attribute"
                v-model="value"
                class="w-full form-control form-select"
                :class="errorClasses"
                :options="field.options"
                :disabled="isReadonly">

                <option value="" selected>{{ __('Choose an option') }}</option>
            </select-control>
        </template>
    </default-field>
</template>

<script>
    import { FormField, HandlesValidationErrors } from 'laravel-nova';
    import InlineInit from './mixins/init';

    export default {
        mixins: [FormField, HandlesValidationErrors, InlineInit],

        props: ['resourceName', 'resourceId', 'field']
    }
</script>
