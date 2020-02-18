import { Controller } from "stimulus"

export default class extends Controller {
  static targets = [ "invoice" ];

  validate() {
    // Using setTimeout in order to allow function to receive new value after pasting
    setTimeout(() => {this.validateReal()}, 1)
  }

  validateReal(){
    let value = this.invoiceTarget.value

    if (value.startsWith('lightning:')) {
      value = value.substr('lightning:'.length, value.length)

      this.invoiceTarget.value = value
    }
  }
}
