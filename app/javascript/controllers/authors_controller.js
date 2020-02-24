import { Controller } from "stimulus"
import consumer from "../channels/consumer"

export default class extends Controller {
  static targets = [
    'list',
    'input',
    'real_field'
  ]

  input_change(e) {
    if (e.keyCode != 13) { return }
    e.preventDefault()
    this.add()
  }

  add_passively() {
    this.add()
  }

  add(e) {
    if (e) { e.preventDefault() }

    let val = this.inputTarget.value

    if (val.replace(/[^0-9a-z]/gi, '').length < 1) {
      return;
    }

    var li = document.createElement('li')
    li.classList.add('fade-in')
    li.innerHTML = `<span class="c-white author">${val}</span> <a href='#' class="link" data-action="click->authors#clicked">x</a>`
    this.listTarget.appendChild(li)
    this.inputTarget.value = ''
    this.updateList()
  }

  clicked(e){
    e.preventDefault()
    e.target.parentElement.remove()
    this.updateList()
  }

  updateList() {
    var val = []

    this.listTarget.querySelectorAll('.author').forEach((el) => {
      val.push(`"${el.innerText}"`)
    })

    this.real_fieldTarget.value = val.join(',')
  }
}
