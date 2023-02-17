const searchBar = document.querySelector(".users .search input"),
searchBtn = document.querySelector(".users .search button"),
usersList = document.querySelector(".users .users-list");

searchBtn.onclick = () => {
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchBtn.classList.toggle("active");
    searchBar.value = "";
}

searchBar.onkeyup = ()=>{
    let searchTerm = searchBar.value;
    if(searchTerm != ""){
        searchBar.classList.add("active");
    }
    else{
        searchBar.classList.remove("active");
    }
    // let's start Ajax
    let xhr = new XMLHttpRequest(); // XMLHttpRequest 객체는 서버로부터 XML 데이터를 전송받아 처리하는 데 사용
    xhr.open("POST", "php/search.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                usersList.innerHTML = data;
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm);
}
setInterval(() => {
    // let's start Ajax
    let xhr = new XMLHttpRequest(); // XMLHttpRequest 객체는 서버로부터 XML 데이터를 전송받아 처리하는 데 사용
    xhr.open("GET", "php/users.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                //  usersList.innerHTML = data;
                if(!searchBar.classList.contains("active")){  // 검색창이 활성화되지 않음면 data추가
                    usersList.innerHTML = data;
                }
            }
        }
    }
    xhr.send();
}, 500); // 0.5초마다 함수 실행 