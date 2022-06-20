    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
        
            <div class="modal-body">
              <div class="modalPhone">
                  <img src="<?=$directoryAsset?>/images/call.png" />
              
              <p>
                  Contact TNS Matrimony 
                  To Upgrade Your Profile
              </p>
              <p><?= !empty(Yii::$app->params['custom.upgrade-ph']) ? Yii::$app->params['custom.upgrade-ph'] : ""; ?></p>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>



      <div class="footer">
    
        <span>Copyright © 2022. All rights reserved.</span>
        </div>