import { Controller } from "stimulus"

export default class extends Controller {
  connect() {
    $('form[data-remote]').on('ajax:before', (e, d) => {
      $('form[data-remote] #error-messages').fadeOut()
    })
  }
}
