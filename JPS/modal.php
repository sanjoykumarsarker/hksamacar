<div class="modal fade autoModal" id="myModal" role="dialog" aria-labelledby="myModalLabel" style="background-color: transparent;" 
  data-backdrop="false" data-keyboard="false">
  
    <div class="modal-dialog" role="document">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-body">
			<h4 style="text-align: center;"> Hare Krishna Chatbox</h4>
			<p id="message_frame"> </p>
			
			<div class="row" >
				<div class="col-sm-5  frame1" >
					<hr style="color: #00ffffff; margin: 0.3em auto;">
					<div>
					<input style="width: 100%;" type="text" required class="mytext1 fontAwesome" name="tname_b" placeholder="&#xf002;  Type to search">
					<hr style="color: white; margin: 0.3em auto;">
					</div>
				<div>
					<iframe src="message_frame_user.php" style="width:100%; height:390px; overflow-x:hidden; border:0px solid #ddd;"></iframe>
				</div>
				</div>
			
				<div class="col-sm-7  frame">
					<iframe id="id_myframe_chat" scrolling="no" name="myframe_chat" style="width:100%;height:440px; border:0px ; " ></iframe>
				</div>
			</div>
		</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>