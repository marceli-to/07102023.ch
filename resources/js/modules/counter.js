(function () {

  const selectors = {
    wrapper: '[data-counter-wrapper]',
    counter: '[data-counter]',
  };

  const init = () => {
    // update the counter every second
    setInterval(updateCounter, 1000);
  };

  const updateCounter = () => {
    // calculate the difference between current timestamp and the timestamp for the 7th of October 2023 at 7pm
    const difference = Date.parse('2023-10-07T19:00:00') - Date.now();
    // calculate the number of days, hours, minutes and seconds from the difference
    let days = Math.floor(difference / (1000 * 60 * 60 * 24));
    let hours = Math.floor((difference / (1000 * 60 * 60)) % 24);
    if (hours < 10) {
      hours = `0${hours}`;
    }

    let minutes = Math.floor((difference / (1000 * 60)) % 60);
    // add a leading zero to the minutes if it's less than 10
    if (minutes < 10) {
      minutes = `0${minutes}`;
    }

    let seconds = Math.floor((difference / 1000) % 60);
    // add a leading zero to the seconds if it's less than 10
    if (seconds < 10) {
      seconds = `0${seconds}`;
    }

    // get the counter element
    const counter = document.querySelector(selectors.counter);

    // set the counter text
    counter.textContent = `${days}:${hours}:${minutes}:${seconds}`;

    // remove hidden class from the wrapper
    const wrapper = document.querySelector(selectors.wrapper);
    wrapper.classList.remove('is-hidden');
  };


  // init if we have a counter element
  const counter = document.querySelector(selectors.counter);
  if (counter) {
    init();
  }
 
})();