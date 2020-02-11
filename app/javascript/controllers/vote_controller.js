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
  }

  disconnect() {
    if (this.invoiceCheckInterval) {
      clearInterval(this.invoiceCheckInterval);
    }
  }

  checkInvoiceStatus(id, resource_id) {
    let lntx = new LNPayLnTx(id);
    lntx.getInfo((result) =>  {
      if (result.settled == 1) {
        clearInterval(this.invoiceCheckInterval);
        this.invoiceSettled(resource_id)
      }
    });
  }

  invoiceSettled(resource_id) {
    $(`#resource-${resource_id} .votes .vote`).attr('data-user-votes', 2);

    const titleElement = $('#invoiceModal [data-invoice-role="title"]')
    titleElement.fadeOut((el) => {
      titleElement.text('')
      titleElement.show()
    })

    $('#invoice-modal-unsettled').fadeOut(() => {
      $('#invoice-modal-settled').fadeIn()
    })
  }

  user_signedin() {
    return $('body').hasClass('signed-in')
  }

  setup_invoice(data) {
    $('#invoiceModal [data-invoice-role="total"]').text('10k');
    $('#invoice-input').val(data.payment_request);

    this.invoiceCheckInterval = setInterval(
      () => { this.checkInvoiceStatus(data.payment_id, data.resource_id) },
    1500)

    QRCode.toCanvas($('#invoiceModal [data-invoice-role="qr"]')[0], `lightning:${data.payment_request}`);

    this.show_invoice_modal_with_modal_body('#invoice-modal-unsettled', this.data.get('title'))
  }

  show_invoice_modal_with_modal_body(sel, title) {
    $('#invoiceModal [data-invoice-role="title"]').text(title)
    $(`#invoiceModal .modal-body:not(${sel}`).hide()
    $(`#invoiceModal .modal-body${sel}`).show()
    $('#invoiceModal').modal('show')
  }

  invoice_modal() {
    if (this.user_signedin()) {
      const vote_url = this.data.get('url')

      fetch(vote_url)
        .then(response => response.json())
        .then(data => {
          // When the server comes back immediately with a settled vote, there's a single vote
          if (data.settled) {
            $(`#resource-${data.resource_id} .votes .vote`).attr('data-user-votes', 1);
          } else if (!data.error) {
            this.setup_invoice(data);
          } else {
            this.show_invoice_modal_with_modal_body(`[data-error='${data.error}']`, '')
          }
        })
    } else {
      $('#signin-modal').modal('show');
    }
  }
}
