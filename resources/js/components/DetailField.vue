<template>
    <panel-item :field="field">
        <template slot="value" v-if="field.inlineDetail">
            <div class="flex w-full">
                <select-control
                    :id="field.attribute"
                    v-model="value"
                    class="flex-1 form-control form-select"
                    :class="errorClasses"
                    :options="field.options"
                    :disabled="isReadonly"
                    @change="attemptUpdate">

                    <option value="" selected>
                        {{ __('Choose an option') }}
                    </option>
                </select-control>

                <button
                    class="btn btn-default btn-primary flex items-center justify-center px-3 ml-2"
                    :title="__('Update')"
                    v-if="showUpdateButton"
                    @click="submit">

                    <icon type="play" class="text-white" style="margin-left: 7px"/>
                </button>
            </div>
        </template>

        <template slot="value" v-else>
            {{ displayValue }}
        </template>
    </panel-item>
</template>

<script>
    import { FormField, HandlesValidationErrors } from 'laravel-nova';
    import InlineInit from './mixins/init';
    import InlineMixin from './mixins/inline';

    export default {
        mixins: [FormField, HandlesValidationErrors, InlineInit, InlineMixin],

        props: ['resource', 'resourceName', 'resourceId', 'field'],

        methods: {
            attemptUpdate() {
                if (this.field.detailTwoStepDisabled) {
                    return this.submit();
                }

                this.showUpdateButton = true;
            }
        }
    }
</script>
