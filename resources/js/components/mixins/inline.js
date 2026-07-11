import find from 'lodash/find';

export default {
    data: () => ({
        isInline: false,
        showUpdateButton: false,
        twoStepDisabled: false
    }),

    computed: {
        /**
         * Determine if the field has a value other than null.
         */
        hasValue() {
            return this.field.value !== null
        },

        /**
         * Return the placeholder text for the field.
         */
        placeholder() {
            return this.field.placeholder || this.__('Choose an option')
        }
    },

    methods: {
        async submit() {
            let formData = new FormData();

            formData.append(this.field.attribute, this.value ?? '');
            formData.append('_method', 'PUT');

            return Nova.request().post(`/nova-api/${this.resourceName}/${this.resourceId}`, formData)
                .then(() => {
                    let option = find(this.field.options, option => option.value == this.value);
                    let label = option ? option.label : this.value;

                    Nova.success(`${this.field.name} updated to "${label}"`);
                }, (response) => {
                    Nova.error(response);
                })
                .finally(() => {
                    this.showUpdateButton = false;
                });
        },

        attemptUpdate(optionOrEvent) {
            /*
             * Nova v5's SelectControl emits `@selected` with the selected option object.
             * Fall back to reading a native event target (older behaviour) just in case.
             */
            if (optionOrEvent?.target) {
                this.value = optionOrEvent.target.value;
            } else if (optionOrEvent != null && optionOrEvent.value !== undefined) {
                this.value = optionOrEvent.value;
            }

            if (this.twoStepDisabled) {
                return this.submit();
            }

            this.showUpdateButton = true;
        }
    }
}
