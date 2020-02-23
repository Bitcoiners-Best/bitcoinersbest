import { Controller } from "stimulus"
import consumer from "../channels/consumer"

import InfinityScroll from 'infinite-scroll';

export default class extends Controller {
  static targets = [ "pagination" ];

  connect() {
    if ($('.next_page').length > 0) {
      this.infinityscroll = new InfinityScroll(
        document.querySelector('.resources-container'),
        {
          path: '.next_page',
          append: '.resource',
          status: '.page-load-status'
        }
      );
      $('#infinite-scrolling').hide()
    }
  }

  disconnect() {
    if (this.infinityscroll) {
      this.infinityscroll.destroy()
    }
  }
}
