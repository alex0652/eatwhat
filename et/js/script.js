// window.addEventListener('load',function(){


//   const but = document.getElementById('button')
//   but.addEventListener('click', function(){
//     console.log("click")
//     document.getElementById("demo").innerHTML += "function was executed! "
//     document.getElementById("demo").innerHTML += "<br/>"
//   })
// })


// const store_name = document.getElementById("store_name")
// const open_time = document.getElementById("open_time")
// const close_time = document.getElementById("close_time")
// const menu = document.getElementById("menu")
// const addedBtn = document.getElementById("addedBtn")
// const deletedBtn = document.getElementById("deletedBtn")
// const list = document.getElementById("list")

// const listContent = []

// function render(){
//   let htmlStr = ''

//   listContent.forEach(function(item){
//     htmlStr = htmlStr + `
//     <div class="item">
//         <div>
//           <p>店家名稱：${item.store_name}</p>
//           <p>營業時間：${item.open_time} ~ ${item.close_time}</p>
//           <p>目錄: ${item.menu}</p>
//         </div>
//       </div>
//     `
//   })
//   list.innerHTML = htmlStr
// }

// addedBtn.addEventListener('click',function(){

//   listContent.unshift({
//     store_name: store_name.value,
//     open_time: open_time.value,
//     close_time: close_time.value,
//     menu: menu.value
//   })
//   render()
// })

// deletedBtn.addEventListener('click',function(){
//   listContent.shift()
//   let htmlStr = ''

//   render()
    
// })
var store_name = document.getElementById('store_name');
var open_time = document.getElementById('open_time');
var close_time = document.getElementById('close_time');


btn.addEventListener('click',function(){
  store_name = store_name.value,
  open_time = open_time.value,
  close_time = close_time.value,
  console.log("store:", store_name);
})


