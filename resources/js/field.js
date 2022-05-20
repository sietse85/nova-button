import IndexField from './components/IndexField';
import DetailField from './components/DetailField';
import FormField from './components/FormField';
import NovaButton from './components/NovaButton';
import Modal from './components/ConfirmModal';

Nova.booting((app) => {
  app.component('confirm-modal', Modal);
  app.component('nova-button', NovaButton);
  app.component('index-nova-button', IndexField);
  app.component('detail-nova-button', DetailField);
  app.component('form-nova-button', FormField);
});
