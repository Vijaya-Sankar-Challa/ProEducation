@extends('master')

@section('title')
		Inbox | Pro Education
@endsection

@section('keywords')
	 Inbox
@endsection

@section('description')
	 Inbox
@endsection

@section('style')
	<style type="text/css">
		.row.row-broken {
		    padding-bottom: 0;
		}
		.col-inside-lg {
		    padding: 20px;
		}
		.chat {
		    height: calc(100vh - 110px);
		}
		.decor-default {
		    background-color: #ffffff;
		}
		.chat-users h6 {
		    font-size: 20px;
		    margin: 0 0 20px;
		}
		.chat-users .user {
		    position: relative;
		    padding: 0 0 0 50px;
		    display: block;
		    cursor: pointer;
		    margin: 0 0 20px;
		}
		.chat-users .user .avatar {
		    top: 0;
		    left: 0;
		}
		.chat .avatar {
		    width: 40px;
		    height: 40px;
		    position: absolute;
		}
		.chat .avatar img {
		    display: block;
		    border-radius: 20px;
		    height: 100%;
		}
		.chat .avatar .status.off {
		    border: 1px solid #5a5a5a;
		    background: #ffffff;
		}
		.chat .avatar .status.online {
		    background: #4caf50;
		}
		.chat .avatar .status.busy {
		    background: #ffc107;
		}
		.chat .avatar .status.offline {
		    background: #ed4e6e;
		}
		.chat-users .user .status {
		    bottom: 0;
		    left: 28px;
		}
		.chat .avatar .status {
		    width: 10px;
		    height: 10px;
		    border-radius: 5px;
		    position: absolute;
		}
		.chat-users .user .name {
		    font-size: 14px;
		    font-weight: bold;
		    line-height: 20px;
		    white-space: nowrap;
		    overflow: hidden;
		    text-overflow: ellipsis;
		}
		.chat-users .user .mood {
		    font: 200 14px/20px "Raleway", sans-serif;
		    white-space: nowrap;
		    overflow: hidden;
		    text-overflow: ellipsis;
		}

		/*****************CHAT BODY *******************/
		.chat-body h6 {
		    font-size: 20px;
		    margin: 0 0 20px;
		}
		.chat-body .answer.left {
		    padding: 0 0 0 58px;
		    text-align: left;
		    float: left;
		}
		.chat-body .answer {
		    position: relative;
		    max-width: 600px;
		    overflow: hidden;
		    clear: both;
		}
		.chat-body .answer.left .avatar {
		    left: 0;
		}
		.chat-body .answer .avatar {
		    bottom: 36px;
		}
		.chat .avatar {
		    width: 40px;
		    height: 40px;
		    position: absolute;
		}
		.chat .avatar img {
		    display: block;
		    border-radius: 20px;
		    height: 100%;
		}
		.chat-body .answer .name {
		    font-size: 14px;
		    line-height: 36px;
		}
		.chat-body .answer.left .avatar .status {
		    right: 4px;
		}
		.chat-body .answer .avatar .status {
		    bottom: 0;
		}
		.chat-body .answer.left .text {
		    background: #ebebeb;
		    color: #333333;
		    border-radius: 8px 8px 8px 0;
		}
		.chat-body .answer .text {
		    padding: 12px;
		    font-size: 16px;
		    line-height: 26px;
		    position: relative;
		}
		.chat-body .answer.left .text:before {
		    left: -30px;
		    border-right-color: #ebebeb;
		    border-right-width: 12px;
		}
		.chat-body .answer .text:before {
		    content: '';
		    display: block;
		    position: absolute;
		    bottom: 0;
		    border: 18px solid transparent;
		    border-bottom-width: 0;
		}
		.chat-body .answer.left .time {
		    padding-left: 12px;
		    color: #333333;
		}
		.chat-body .answer .time {
		    font-size: 16px;
		    line-height: 36px;
		    position: relative;
		    padding-bottom: 1px;
		}
		/*RIGHT*/
		.chat-body .answer.right {
		    padding: 0 58px 0 0;
		    text-align: right;
		    float: right;
		}

		.chat-body .answer.right .avatar {
		    right: 0;
		}
		.chat-body .answer.right .avatar .status {
		    left: 4px;
		}
		.chat-body .answer.right .text {
		    background: #7266ba;
		    color: #ffffff;
		    border-radius: 8px 8px 0 8px;
		}
		.chat-body .answer.right .text:before {
		    right: -30px;
		    border-left-color: #7266ba;
		    border-left-width: 12px;
		}
		.chat-body .answer.right .time {
		    padding-right: 12px;
		    color: #333333;
		}

		/**************ADD FORM ***************/
		.chat-body .answer-add {
		    clear: both;
		    position: relative;
		    margin: 20px -20px -20px;
		    padding: 20px;
		    background: #46be8a;
		}
		.chat-body .answer-add input {
		    border: none;
		    background: none;
		    display: block;
		    width: 100%;
		    font-size: 16px;
		    line-height: 20px;
		    padding: 0;
		    color: #ffffff;
		}
		.chat input {
		    -webkit-appearance: none;
		    border-radius: 0;
		}
		.chat-body .answer-add .answer-btn-1 {
		    background: url("http://91.234.35.26/iwiki-admin/v1.0.0/admin/img/icon-40.png") 50% 50% no-repeat;
		    right: 56px;
		}
		.chat-body .answer-add .answer-btn {
		    display: block;
		    cursor: pointer;
		    width: 36px;
		    height: 36px;
		    position: absolute;
		    top: 50%;
		    margin-top: -18px;
		}
		.chat-body .answer-add .answer-btn-2 {
		    background: url("http://91.234.35.26/iwiki-admin/v1.0.0/admin/img/icon-41.png") 50% 50% no-repeat;
		    right: 20px;
		}
		.chat input::-webkit-input-placeholder {
		   color: #fff;
		}

		.chat input:-moz-placeholder { /* Firefox 18- */
		   color: #fff;  
		}

		.chat input::-moz-placeholder {  /* Firefox 19+ */
		   color: #fff;  
		}

		.chat input:-ms-input-placeholder {  
		   color: #fff;  
		}
		.chat input {
		    -webkit-appearance: none;
		    border-radius: 0;
		}
	</style>
@endsection

@section('content')
	<div class="content container-fluid bootstrap snippets" style="padding-top: 10px;">
      <div class="row row-broken">
        <div class="col-sm-3 col-xs-12" style="height: 100%">
          <div class="col-inside-lg decor-default chat" style="overflow: hidden; outline: none;" tabindex="5000">
            <div class="chat-users">
              <h6>Online</h6>
                <div class="user">
                    <div class="avatar">
                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="User name">
                    <div class="status online"></div>
                    </div>
                    <div class="name">User name</div>
                    <div class="mood">User mood</div>
                </div>
            </div>
          </div>
        </div>
        <div class="col-sm-9 col-xs-12 chat" style="overflow: scroll;">
          <div class="col-inside-lg decor-default">
            <div class="chat-body">
              <h6>Mini Chat</h6>
              <div class="answer left">
	                <div class="avatar">
	                  <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="User name">
	                  <div class="status offline"></div>
	                </div>
	                <div id="username" class="name">Alexander Herthic</div>
	                <div class="text">
	                  Lorem ipsum dolor amet, consectetur adipisicing elit Lorem ipsum dolor amet, consectetur adipisicing elit Lorem ipsum dolor amet, consectetur adiping elit
	                </div>
	                <div class="time">5 min ago</div>
              </div>
              <div class="answer right">
	                <div class="avatar">
	                  <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="User name">
	                  <div class="status offline"></div>
	                </div>
	                <div class="name">Alexander Herthic</div>
	                <div class="text">
	                  Lorem ipsum dolor amet, consectetur adipisicing elit Lorem ipsum dolor amet, consectetur adipisicing elit Lorem ipsum dolor amet, consectetur adiping elit
	                </div>
	                <div class="time">5 min ago</div>
              </div>
              <div id="chat-window"></div>
              <div id="typingStatus" style="padding: 15px"></div>
              <div class="answer-add">
              	<input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input class="form-control" type="text" id="text" placeholder="Write a message" autofocus style="padding: 20px 10px;"  onblur="notTyping()">
                <span class="answer-btn answer-btn-1"></span>
                <span class="answer-btn answer-btn-2"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('script')
	<script src="{{ url('js/inbox_vue.js') }}"></script>
	
@endsection