<template>
    <PanelItem :index="index" :field="field">
        <template #value>
            <div class="flex">
                <template v-if="isInline">
                    <SelectControl
                        :id="field.uniqueKey"
                        :dusk="field.attribute"
                        v-model:selected="value"
                        @change="attemptUpdate"
                        @click.stop
                        class="w-full md:w-3/5"
                        :select-classes="{ 'form-input-border-error': hasError }"
                        :options="field.options"
                        :disabled="isReadonly"
                    >
                        <option value="" selected :disabled="! field.nullable">
                            {{ placeholder }}
                        </option>
                    </SelectControl>

                    <BasicButton
                        class="shadow relative ml-2 bg-primary-500 hover:bg-primary-400 active:bg-primary-600 text-white dark:text-gray-900"
                        v-if="showUpdateButton"
                        :title="__('Update')"
                        @click.stop="submit"
                    >
                        <Icon type="play" solid />
                    </BasicButton>
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
