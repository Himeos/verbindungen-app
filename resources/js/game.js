document.addEventListener("DOMContentLoaded", () => {
    const startButton = document.getElementById('start-button');
    const gameContainer = document.getElementById('game-container');
    const cards = document.querySelectorAll('.card');
    const messageDiv = document.getElementById('message');
    const endMessageDiv = document.getElementById('endmessage');
    const selectSound = new Audio('sounds/select.wav');
    const successSound = new Audio('sounds/success.wav');
    const winSound = new Audio('sounds/win.wav');
    const failSound = new Audio('sounds/fail.wav');
    
    let selectedWords = [];
    let selectedCategories = [];
    let foundSets = 0; // Track how many sets have been found
    
    // Timer
    let seconds = 0;
    let timerElement = document.getElementById('timer');
    let timer;

    // Start the timer when the page loads
    function updateTimer() {
        let minutes = Math.floor(seconds / 60);
        let remainingSeconds = seconds % 60;
        timerElement.textContent = `${minutes}:${remainingSeconds < 10 ? '0' : ''}${remainingSeconds}`;
        seconds++;
    }

    // Start the game when the button is clicked
    startButton.addEventListener('click', () => {
        // Show the game and hide the button
        gameContainer.style.display = 'block';
        startButton.style.display = 'none';

        // Start the timer immediately
        timer = setInterval(updateTimer, 1000);
    });

    // Handle word selection
    cards.forEach(card => {
        card.addEventListener('click', () => {
            const word = card.textContent.trim();
            const category = card.dataset.category;

            // Check if the word is already selected
            if (selectedWords.includes(word)) {
                selectedWords = selectedWords.filter(w => w !== word);
                selectedCategories = selectedCategories.filter(c => c !== category);
                card.classList.remove('selected');
            } else {
                selectedWords.push(word);
                selectedCategories.push(category);
                card.classList.add('selected');
            }

            // Check if 4 words have been selected
            if (selectedWords.length === 4) {
                checkSelectedWords(); // Check if selected words belong to the same set
            } else {
                selectSound.play();
            }
        });
    });

    // Check if selected words belong to one set (same category)
    function checkSelectedWords() {
        const allSameCategory = selectedCategories.every((category, index, array) => category === array[0]);

        if (allSameCategory) {
            // If all categories are the same, show success message
            const category = selectedCategories[0];
            messageDiv.innerHTML = `<li class='green'> Kategorie: ${category}</li>`;
            
            // Remove the selected cards from the display
            cards.forEach(card => {
                if (selectedCategories.includes(card.dataset.category)) {
                    card.remove(); // Remove the matching cards from the board
                }
            });

            foundSets++; // Increase found sets counter
            successSound.play();
            
            // Check if all sets are found, and end the game
            if (foundSets === 4) {
                endGame();
            }
        } else {
            // If categories don't match, show failure message
            const categoryCounts = {};
            selectedCategories.forEach(category => {
                categoryCounts[category] = (categoryCounts[category] || 0) + 1;
            });

            const countOfThree = Object.values(categoryCounts).filter(count => count === 3).length;
            if (countOfThree === 1) {
                messageDiv.innerHTML = "<li class='blue'>1 Daneben...</li>"; // Exactly 3 words have a category in common
            } else {
                messageDiv.innerHTML = "<li class='red'>Oops..</li>"; // Words have different categories
            }

            failSound.play();
        }

        // Reset selected words and categories
        selectedWords = [];
        selectedCategories = [];

        // Remove 'selected' class from all cards
        cards.forEach(card => card.classList.remove('selected'));
    }

    // End the game once all sets are found
    function endGame() {
        clearInterval(timer); // Stop the timer when the game ends
        winSound.play();
        endMessageDiv.innerHTML = "<li class='green'>Gut gemacht!</li>";
        endMessageDiv.style.display = 'block';
       // messageDiv.style.display = 'none'; // Hide the prompt message
    }
});
