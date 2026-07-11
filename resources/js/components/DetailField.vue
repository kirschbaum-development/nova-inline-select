<template>
    <PanelItem :index="index" :field="field">
        <template #value>
            <div class="flex">
                <template v-if="isInline">
                    <SelectControl
                        :id="field.uniqueKey"
                        :dusk="field.attribute"
                        v-model="value"
                        @selected="attemptUpdate"
                        @click.stop
                        class="w-full md:w-3/5"
                        :has-error="hasError"
                        :options="field.options"
                        :disabled="isReadonly"
                    >
                        <option value="" selected :disabled="! field.nullable">
                            {{ placeholder }}
                        </option>
                    </SelectControl>

                    <button
                        type="button"
                        v-if="showUpdateButton"
                        :title="__('Update')"
                        @click.stop="submit"
                        class="shadow relative ml-2 flex h-9 items-center justify-center rounded-lg px-2 bg-primary-500 hover:bg-primary-400 active:bg-primary-600 text-white dark:text-gray-900"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4">
                            <path d="M6.3 2.84A1.5 1.5 0 0 0 4 4.11v11.78a1.5 1.5 0 0 0 2.3 1.27l9.34-5.89a1.5 1.5 0 0 0 0-2.54L6.3 2.84Z" />
                        </svg>
                    </button>
                </template>

                <template v-else>
                    <template v-if="hasValue">
                        <div v-if="field.asHtml" @click.stop v-html="field.value"></div>

                        <span v-else class="whitespace-nowrap" v-text="field.value"></span>
                    </template>

                    <p v-else>&mdash;</p>
                </template>
            </div>
        </template>
    </PanelItem>
</template>

<script>
import { FormField, HandlesValidationErrors } from 'laravel-nova';
import InlineMixin from './mixins/inline';

export default {
    mixins: [
        FormField,
        HandlesValidationErrors,
        InlineMixin
    ],

    props: [
        'index',
        'resourceId'
    ],

    mounted() {
        this.isInline = this.field.inlineDetail ?? false;
        this.twoStepDisabled = this.field.detailTwoStepDisabled ?? false;
    },
}
</script>
