export default {
    data() {
        return {
            showUpdateButton: false
        }
    },

    computed: {
        displayValue() {
            return this.field.displayUsingLabels
                ? _.find(this.field.options, { value: this.field.value }).label
                : this.field.value;
        }
    },

    methods: {
        async submit() {
            let formData = new FormData();

            formData.append(this.field.attribute, this.value);
            formData.append('_method', 'PUT');

            return Nova.request().post(`/nova-api/${this.resourceName}/${this.resourceId}`, formData)
                .then(() => {
                    let option = _.find(this.field.options, ['value', this.value]);

                    this.$toasted.show(`Status updated to "${option.label}"`, { type: 'success' });
                }, (response) => {
                    this.$toasted.show(response, { type: 'error' });
                })
                .finally(() => {
                    this.showUpdateButton = false;

                });
        }
    }
}
