<template>
    <div class="flex">
        <template v-if="field.inlineIndex">
            <select-control
                :id="field.attribute"
                v-model="value"
                class="flex-1 form-control form-select"
                :class="errorClasses"
                :options="field.options"
                :disabled="isReadonly"
                @change="attemptUpdate">

                <option value="" selected>{{ __('Choose an option') }}</option>
            </select-control>

            <button
                class="btn btn-default btn-primary flex items-center justify-center px-3 ml-2"
                :title="__('Update')"
                v-if="showUpdateButton"
                @click="submit">

                <icon type="play" class="text-white" style="margin-left: 7px"/>
            </button>
        </template>

        <template v-else>
            {{ displayValue }}
        </template>
    </div>
</template>

<script>
    import { FormField, HandlesValidationErrors } from 'laravel-nova';
    import InlineInit from './mixins/init';
    import InlineMixin from './mixins/inline';

    export default {
        mixins: [FormField, HandlesValidationErrors, InlineInit, InlineMixin],

        props: ['resourceName', 'field'],

        computed: {
            resourceId() {
                return this.$parent.resource.id.value;
            }
        },

        methods: {
            attemptUpdate() {
                if (this.field.indexTwoStepDisabled) {
                    return this.submit();
                }

                this.showUpdateButton = true;
            }
        }
    }
</script>
