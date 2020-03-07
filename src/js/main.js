function ready(fn) {
  if (document.readyState != 'loading'){
    console.log('testing Js');
  } else {
    document.addEventListener('DOMContentLoaded', fn);
  }
}
