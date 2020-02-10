import { Controller } from "stimulus"

export default class extends Controller {
  static targets = [ "mobileMenu" ]

  open() {
    this.mobileMenuTarget.classList.add('isActiveEvents');
  }

  close() {
    this.mobileMenuTarget.classList.remove('isActiveEvents');
  }
}
