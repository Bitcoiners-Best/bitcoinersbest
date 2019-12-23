<template>

  <b-modal hide-footer id="invoice-modal" centered title="">
    <!-- <h2 class="c-white">Invoice Total</h2> -->
    <h3 class="mb-20 c-white"><span class="c-brand">{#}</span> sats</h3>
    <h6 class="mb-20 c-gray-1">All proceeds will be donated to an open-source bitcoin/lightning projects.</h6>
    <h1>QR</h1>
    <a class="btn btn-rect-lg btn-block mb-20 push-button" href="#">Copy Payment Request</a>
    <h6 class="mb-0"><span class="c-gray-1">Powered by </span><a class="link" href="">paywall.link</a></h6>

  <!-- TODO: When the invoice is paid, this success message should replace the modal-body content above -->
  <!-- <img src="" alt="">
  <h2 class="mb-30 c-white">Successfully upvoted</h2>
  <h6 class="mb-30 c-gray-1">Thank you for supporting bitcoin education.</h6>
  <h6 class="mb-30 c-gray-1">Help us decide who to support. Vote on the recipient of this month’s donation to a bitcoin open source project.</h6>
  <h5><a class="link medium close-modal" href="" aria-label="Close">Done</a></h5> -->
  </b-modal>
</template>

<script>
    export default {
        name: 'Invoice',
    }

</script>

<style>
</style>
