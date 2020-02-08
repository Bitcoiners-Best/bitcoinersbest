import { Controller } from "stimulus"
import consumer from "../channels/consumer"

export default class extends Controller {
  static targets = [
    'select',
    'container'
  ]

  selected(v) {
    this.containerTarget.classList = this.selectTarget.value;
  }
}
