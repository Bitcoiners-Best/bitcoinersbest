import { Controller } from "stimulus"
import consumer from "../channels/consumer"

import QRCode from 'qrcode';

export default class extends Controller {
  connect() {
    const lnpayKey = $('body').data().lnpayKey
    LNPay.Initialize(lnpayKey);
    $('#invoiceModal').on('hidden.bs.modal', (e) => { this.handle_hidden_modal();} )
  }

  handle_hidden_modal() {
    if (this.invoiceCheckInterval) {
      clearInterval(this.invoiceCheckInterval);
    }

    $('#invoice-modal-unsettled').show()
    $('#invoice-modal-settled').hide()
  }

  disconnect() {
    if (this.invoiceCheckInterval) {
      clearInterval(this.invoiceCheckInterval);
    }
  }

  checkInvoiceStatus(id) {
    let lntx = new LNPayLnTx(id);
    lntx.getInfo((result) =>  {
      if (result.settled == 1) {
        clearInterval(this.invoiceCheckInterval);
        this.invoiceSettled()
      }
    });
  }

  invoiceSettled() {
    $('#invoice-modal-unsettled').fadeOut(() => {
      $('#invoice-modal-settled').fadeIn()
    })
  }

  voted(resource_id) {
    $(`#resource-${resource_id} .votes .vote`).addClass('already-voted');
  }

  user_signedin() {
    return $('body').hasClass('signed-in')
  }

  setup_invoice(data) {
    $('#invoiceTotal').text('10k');
    $('#invoice-input').val(data.payment_request);

    this.invoiceCheckInterval = setInterval(
      () => { this.checkInvoiceStatus(data.payment_id) },
    1500)

    QRCode.toCanvas($('#invoice-canvas')[0], `lightning:${data.payment_request}`);

    $('#invoiceModal').modal('show');
  }

  invoice_modal() {
    if (this.user_signedin()) {
      const vote_url = this.data.get('url')

      fetch(vote_url)
        .then(response => response.json())
        .then(data => {
          if (data.settled) {
            this.voted(data.resource_id);
          } else if (!data.error) {
            this.setup_invoice(data);
          } else {
            $('#invoice-modal-unsettled').hide()
            $('#invoice-modal-settled').hide()
            $(`#invoiceModal [data-error='${data.error}']`).show()
            $('#invoiceModal').modal('show');
          }
        })
    } else {
      $('#signin-modal').modal('show');
    }
  }
}
