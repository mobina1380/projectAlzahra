(() => {
    alert('ksfjkf');
    const speechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;

    const warning = document.querySelector('[data-warning]');
    const result = document.querySelector('[data-result]');
    const button = document.querySelector('[data-button]');

    /*
     * Hide the warning and show the form.
     */
    const resetWarning = () => {
        warning.innerHTML = '';

        warning.classList.add('hidden');
        result.classList.remove('hidden');
    }

    /*
     * Show a warning.
     */
    const showWarning = (message) => {
        warning.innerHTML = message;

        warning.classList.remove('hidden');
        result.classList.add('hidden');
        button.classList.add('hidden');
    };

    /**
     * Show the results
     */
    const setResult = event => {
        result.classList.remove('hidden');
        button.classList.add('hidden');
        result.innerHTML = event.results[0][0].transcript;

        resetWarning();
    };

    // Check if our browser supports the speech recognition APi.
    if (('SpeechRecognition' in window) || ('webkitSpeechRecognition' in window)) {
        /*
         * We will call this function when the user presses the listen button.
         * This function will start listening to the users voice input and output the results in the results div.
         */
        const listen = event => {
            // Create a new speechRecognition instance, and configure it
            const recognition = new speechRecognition();
            recognition.lang = 'en-US';
            recognition.interimResults = true;
            recognition.onresult = setResult;
            recognition.onerror = showWarning;

            // Disable the button
            button.innerHTML = '... Listening';
            button.disabled = true;

            // Start listening
            recognition.start();

        };


        // Add an eventListener to the button so we can listen when the user presses the button.
        button.addEventListener('mouseup', listen);

    } else {
        // Our browser does not support the speech recognition API, we'll show an error message.
        showWarning('Looks like your browser does not support speech recognition, check the browser support <a href="https://developer.mozilla.org/en-US/docs/Web/API/SpeechRecognition" title="Check for browser support on caniuse" target="_blank">here</a>.');
    }
})();
