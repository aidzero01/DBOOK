const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");

form.onsubmit = (e)=>{
    e.preventDefault(); // 폼 제출 방지
}

sendBtn.onclick = ()=>{
    // let's start Ajax
    let xhr = new XMLHttpRequest(); // XMLHttpRequest 객체는 서버로부터 XML 데이터를 전송받아 처리하는 데 사용
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState === XMLHttpRequest.DONE){
            if(xhr.status === 200){
                inputField.value = "";  // 메시지가 데이터베이스에 삽입되면 입력 필드 비워둠
                scrollToBottom();
            }
        }
    }
    // we have to send the form data through akax to php
    let formData = new FormData(form); // 새로운 폼 객체 생성
    xhr.send(formData); // php에 폼 데이터 전송
}

chatBox.onmouseenter= ()=>{
    chatBox.classList.add("active");
}
chatBox.onmouseleave= ()=>{
    chatBox.classList.remove("active");
}

setInterval(() => {
    // let's start Ajax
    let xhr = new XMLHttpRequest(); // XMLHttpRequest 객체는 서버로부터 XML 데이터를 전송받아 처리하는 데 사용
    xhr.open("POST", "php/get-chat.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                chatBox.innerHTML = data;
                if(!chatBox.classList.contains("active")){
                    scrollToBottom();
                }
            }
        }
    }
    let formData = new FormData(form); // 새로운 폼 객체 생성
    xhr.send(formData); // php에 폼 데이터 전송
}, 500); // 0.5초마다 함수 실행 

function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
}

