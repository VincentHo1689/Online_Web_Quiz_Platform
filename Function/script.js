function getCookie(cname) {
  const allCookies = document.cookie;
  const cookieArray = allCookies.split(';');
  let out_name = "";
  for (const cookie of cookieArray) {
      const [name, value] = cookie.trim().split('=');
      if (name === cname) {
          out_name = value;
          break;
      }
  }
  return out_name;
}

function removeCookie(cname){
  document.cookie = cname+"=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
}

function change_quote(n){
    const quotes = new Array('Expand Your Knowledge <br> With Engaging Quizzes',
                            'Join a Community of<br> Quiz Enthusiasts',
                            'Find Quizzes That <br>Educate, Entertain Here',
                            'Test Your Knowledge <br> with AlphaQuiz',
                            'Keep Your Brain <br>Sharp with AlphaQuiz');
    var_quote = document.getElementById('quote')
    var_quote.classList.toggle('fade');
    setTimeout(() => {
        var_quote.innerHTML=quotes[Math.floor(n%4)];
        var_quote.classList.toggle('fade');
    }, 1000);
}

function loop_quote(){
    n=0
    setInterval(() => {
        change_quote(n);
        n+=1
    }, 3000);
}
function timer(time,timer_tag,form_tag){
    var timeLeft = time;
    var timer_text = document.getElementById(timer_tag);
    
    var timerId = setInterval(countdown, 1000);
    
    function countdown() {
      if (timeLeft == -1) {
        clearTimeout(timerId);
        document.forms[form_tag].submit();
      } else {
        timer_text.innerHTML = timeLeft + ' seconds remaining';
        timeLeft--;
      }
    }
  }