import { Controller } from "stimulus"

export default class extends Controller {
  static targets = [ "source", "button" ]

  copy() {
    this.sourceTarget.select();
    document.execCommand("copy");

    this.buttonTarget.innerText = '✓ Copied!';

    setTimeout(() => {
      this.buttonTarget.innerText = 'Copy Payment Request';
    }, 2500);
  }
}
