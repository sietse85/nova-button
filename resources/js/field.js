import IndexField from './components/IndexField'
import DetailField from './components/DetailField'
import FormField from './components/FormField'

Nova.booting((app, store) => {
  app.component('index-nova-button', IndexField)
  app.component('detail-nova-button', DetailField)
  app.component('form-nova-button', FormField)
})
