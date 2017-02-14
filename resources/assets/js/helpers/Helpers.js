class Helpers
{
  /**
   * Scroll the window to a given location
   * Utilizes npm package 'smoothscroll-polyfill', required in routes.js
   *
   * @param {string | object} An element's query selector or an object like {top: 100, left: 150}
   * @param {boolean}         Whether or not to smoothly scroll the window
   */
  scrollTo(location, smooth = true)
  {
    if (typeof location === 'string') {
      // scroll to particular element
      let options = {};
      if (smooth) {
        options.behavior = 'smooth'
      }
      document.querySelector(location).scrollIntoView(options);
    }

    else if (typeof location === 'object') {
      // scroll to particular pixel position
      if (smooth) {
        location.behavior = 'smooth'
      }
      window.scroll(location);
    }
  }
}

export default new Helpers;