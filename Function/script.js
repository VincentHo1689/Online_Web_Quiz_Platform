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