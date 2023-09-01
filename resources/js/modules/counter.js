(function () {

  const selectors = {
    wrapper: '[data-counter-wrapper]',
    counter: '[data-counter]',
  };

  const init = () => {
    // update the counter every second
    //setInterval(updateCounter, 1000);
  };

  const updateCounter = () => {
    // calculate the difference between current timestamp and the timestamp for the 7th of October 2023 at 7pm
    const difference = Date.parse('2023-10-07T19:00:00') - Date.now();
    // calculate the number of days, hours, minutes and seconds from the difference
    const days = Math.floor(difference / (1000 * 60 * 60 * 24));
    const hours = Math.floor((difference / (1000 * 60 * 60)) % 24);
    const minutes = Math.floor((difference / (1000 * 60)) % 60);
    const seconds = Math.floor((difference / 1000) % 60);
    // get the counter element
    const counter = document.querySelector(selectors.counter);

    // set the counter text
    counter.textContent = `${days}:${hours}:${minutes}:${seconds}`;

    // remove hidden class from the wrapper
    const wrapper = document.querySelector(selectors.wrapper);
    wrapper.classList.remove('is-hidden');
  };


  init();
  
})();