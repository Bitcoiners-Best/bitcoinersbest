import consumer from "./consumer"

consumer.subscriptions.create("VoteChannel", {
  connected() {
    // Called when the subscription is ready for use on the server
  },

  disconnected() {
    // Called when the subscription has been terminated by the server
  },

  received(data) {
    $(`#vote-count-${data.resource_id}`).text(data.votes);
    let resourceEl = $(`#resource-${data.resource_id}`)
    resourceEl.attr('data-vote-count', data.votes)

    let prevEl = resourceEl.prev()
    if (prevEl != null) {
      let prevVoteCount = prevEl.attr('data-vote-count')

      if (prevVoteCount < data.votes) {
        tinysort('.resources-container > .resource', {
          data: 'vote-count',
          forceStrings: false,
          order: 'desc'
        })
      }
    }
    $(`#resource-${data.resource_id}`).attr('data-vote-count', data.votes)
  }
});
