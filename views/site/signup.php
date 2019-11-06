<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;
use yii\web\View;

$this->title = 'Signup';
?>

<section class="signup mt-50 text-center">
  <svg width="79.28" height="92" viewBox="0 0 35 40" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M0 27.3171V10.0813L17.2358 0L34.4715 10.0813V29.5935L17.2358 40L2.27642 31.2195L12.6829 25.3659V30.2439L17.2358 32.8455V20.1626L5.52846 13.3333V18.8618L10.4065 21.4634L0 27.3171Z" fill="white"/>
  </svg>
	<h2 class="cycle slide mt-50">
		<span class="c-white">Discover and upvote your favorite bitcoin</span>
		<span class="cycle-wrapper">
			<b class="c-brand is-visible">podcast</b>
			<b class="c-brand">thread</b>
			<b class="c-brand">book</b>
      <b class="c-brand">article</b>
		</span>
	</h2>
  <!-- <p class="mt-50 c-white">Join a community of Bitcoin builders and makers.</p> -->
  <p class="mt-50 mb-0 c-white">All sats spent to upvote content are donated to an open source project!</p>
  <div class="text-center mt-50 mb-50 auth-cta">
    <button class="btn btn-rect-xl twitter c-white"><svg class="mr-15" width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M6.24792 15.869C13.7453 15.869 17.845 9.76428 17.845 4.47072C17.845 4.29733 17.8414 4.12472 17.8335 3.95288C18.6294 3.38741 19.3211 2.68173 19.8667 1.87842C19.1364 2.19748 18.3504 2.41227 17.526 2.50912C18.3675 2.01315 19.0136 1.22859 19.3183 0.29328C18.5308 0.752146 17.6587 1.08566 16.7301 1.26569C15.9863 0.486982 14.9274 0 13.7548 0C11.5039 0 9.67854 1.79407 9.67854 4.00561C9.67854 4.31998 9.7143 4.62576 9.78424 4.91904C6.39654 4.75151 3.39267 3.15739 1.38254 0.733405C1.03249 1.32544 0.830639 2.01315 0.830639 2.74695C0.830639 4.13682 1.55022 5.36385 2.64448 6.08163C1.97576 6.06132 1.34757 5.8809 0.798454 5.58059C0.797854 5.5974 0.797855 5.61379 0.797855 5.63175C0.797855 7.57187 2.20284 9.19177 4.06794 9.55886C3.72544 9.65063 3.36505 9.69984 2.99314 9.69984C2.7309 9.69984 2.47541 9.67447 2.22707 9.62759C2.746 11.2194 4.25072 12.3777 6.03476 12.4101C4.63971 13.4848 2.88229 14.1249 0.972286 14.1249C0.643687 14.1249 0.319062 14.1065 0 14.0694C1.80391 15.2058 3.94596 15.869 6.24813 15.869" fill="white"/>
    </svg>Join with Twitter</button>
    <!-- <h6 class="c-white-offset mt-20">We will never post anything to your Twitter account</h6> -->
    <button class="btn btn-rect-xl bg-brand c-black"><svg class="mr-15" width="10" height="17" viewBox="0 0 10 17" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M4.47692 8.91917H0.761182C0.309406 8.91917 -0.0459241 8.53267 0.00483732 8.09662L0.827172 0.882007C0.88301 0.381542 1.31956 0 1.83732 0H6.02514C6.74595 0 7.23834 0.708578 6.9693 1.36265L5.49215 4.95509H9.23326C9.8221 4.95509 10.1876 5.57944 9.88809 6.07495L4.01499 15.7572C3.72057 16.2378 2.96423 15.9504 3.08098 15.4054L4.47692 8.91917Z" fill="#1D2229"/>
    </svg>Lightning Auth</button>
  </div>
</section>
