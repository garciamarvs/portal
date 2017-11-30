var chatOffset  = 0;
var chatNumLogs = 0;
$(document).ready(function(){
	$.ajax({
		type: 'POST',
		url: base_url+'home/start_chat',
		data: ({
			type: 'start_chat'
		}),
		dataType: "json",
		success: function(data){
			if(data.status == 'success'){
				startChat(data.chats);				
				setTimeout(function(){
					chatNumLogs = data.chats.length;
					setInterval(function(){
						$.ajax({
							type: 'POST',
							url: base_url+'home/chat_log',
							data: ({
								type: 'chat_log',
								start: chatOffset
							}),
							dataType: "json",
							success: function(data){
								if(data.status == 'success'){
									if(data.chats != false){
										update(data.chats);
										var elem = document.getElementById('chat-box');
										elem.scrollTop = elem.scrollHeight;
									}
									// console.log('Updated');
								}
							}
						});
					},2500);
				},1000);
			}
		}
	});

	$('#msg').keyup(function (event) {
    if (event.keyCode == 13) {
        var content = this.value;  
        var caret = getCaret(this);          
        if(event.shiftKey){
            this.value = content.substring(0, caret - 1) + "\n" + content.substring(caret, content.length);
            event.stopPropagation();
        } else {
            this.value = content.substring(0, caret - 1) + content.substring(caret, content.length);
            sendMsg();
        }
    }
	});

	$('#send').on('click', function(){
		sendMsg();
	});
});

function sendMsg(){
	var msg = $('#msg').val();
	$.ajax({
		type: 'POST',
		url: base_url+'home/sendMsg',
		data: ({
			type: 'sendMsg',
			msg: msg
		}),
		dataType: "json",
		success: function(data){
			if(data.status == 'success'){
				// console.log('Message Sent');
				$('#msg').val('');
				$.ajax({
					type: 'POST',
					url: base_url+'home/chat_log',
					data: ({
						type: 'chat_log',
						start: chatOffset
					}),
					dataType: "json",
					success: function(data){
						if(data.status == 'success'){
							if(data.chats != false){
								update(data.chats);
								var elem = document.getElementById('chat-box');
								elem.scrollTop = elem.scrollHeight;
							}
							// console.log('Updated');
						}
					}
				});
			}
		}
	});
}

function startChat(chat_log){
	for (var i=chat_log.length-1; i >= 0; i--) {
		var content = '<div class="left"><img class="message-avatar img-circle pull-left" src="'+base_url+'assets/img/users/'+chat_log[i].img+'"><div class="author-name">'+chat_log[i].name+'<br><small class="chat-date">'+chat_log[i].time+'</small></div><div class="chat-message">'+chat_log[i].msg+'</div></div>';
		$("#chat-box").append(content);

		if(i==0){
			chatOffset = chat_log[i].id;
		}
	}
}

function update(chat_log){
	for (var i=chat_log.length-1; i >= 0; i--) {
		if(chatNumLogs > 20){
			$('#chat-box div').first().remove();
		}
		var content = '<div class="left"><img class="message-avatar img-circle pull-left" src="'+base_url+'assets/img/users/'+chat_log[i].img+'"><div class="author-name">'+chat_log[i].name+'<br><small class="chat-date">'+chat_log[i].time+'</small></div><div class="chat-message">'+chat_log[i].msg+'</div></div>';
		$("#chat-box").append(content);
		chatNumLogs++;
		if(i==0){
			chatOffset = chat_log[i].id;
		}
	}
}

function getCaret(el) { 
    if (el.selectionStart) { 
        return el.selectionStart; 
    } else if (document.selection) { 
        el.focus();
        var r = document.selection.createRange(); 
        if (r == null) { 
            return 0;
        }
        var re = el.createTextRange(), rc = re.duplicate();
        re.moveToBookmark(r.getBookmark());
        rc.setEndPoint('EndToStart', re);
        return rc.text.length;
    }  
    return 0; 
}