import IndexField from './components/IndexField';
import DetailField from './components/DetailField';
import FormField from './components/FormField';

Nova.booting(app => {
    app.component('index-inline-select', IndexField);
    app.component('detail-inline-select', DetailField);
    app.component('form-inline-select', FormField);
});
