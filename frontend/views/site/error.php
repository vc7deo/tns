<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception $exception */

use yii\helpers\Html;

$this->title = $name;
?>


        <div class="container">
            <div class="page-wrapper">

                <!-- End Header -->
                <main class="main account">

                    <div class="page-content mt-4 mb-10 pb-6">

                        <div class="container">
                                <div class="error-not-found">
                                    <h2>
                                      <?= Html::encode($this->title) ?>
                                    </h2>
                                    <h5>
                                        <?= nl2br(Html::encode($message)) ?>
                                    </h5>
                                    <h6>
                                        The above error occurred while the Web server was processing your request.<br>
                                         If you think something is broken, report a problem.
                                    </h6>
                                </div>
                        </div>
                            </div>
                   
                </main>
            </div>
        </div>