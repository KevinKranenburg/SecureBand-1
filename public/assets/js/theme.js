let themeBtn = document.querySelectorAll('.theme-btn'),
	themeInput = document.querySelector('#theme'),
	balls = document.querySelectorAll('.ball');

console.log(document.cookie)
	
// true == light theme
// false == dark theme
let theme = document.documentElement.dataset.theme == 'light' ? true : false
	
themeBtn.forEach(btn => {
	btn.addEventListener('click', () => {
		theme ? document.documentElement.dataset.theme = 'dark' : document.documentElement.dataset.theme = 'light'
		theme ? themeBtn.forEach(btn => btn.firstElementChild.style.transform = "translateX(35px)") : themeBtn.forEach(btn => btn.firstElementChild.style.transform = "translateX(0)")
		theme ? document.cookie = "theme=dark;" : document.cookie = "theme=light;"
		theme ? theme = false : theme = true
		console.log(document.cookie)
	})
})

