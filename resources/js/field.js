import IndexField from './components/IndexField';
import DetailField from './components/DetailField';
import FormField from './components/FormField';
import NovaButton from './components/NovaButton';

Nova.booting((app) => {
  app.component('nova-button', NovaButton);
  app.component('index-nova-button', IndexField);
  app.component('detail-nova-button', DetailField);
  app.component('form-nova-button', FormField);
});
