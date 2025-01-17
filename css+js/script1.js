
function toggleFavorite(button, name) {
    const messageDiv = document.getElementById("message");

    if (button.classList.contains("favorited")) {
        button.classList.remove("favorited");
        button.textContent = "Ajouter aux favoris ❤️";

       
        showMessage(`${name} a été retiré des favoris.`);
    } else {
        button.classList.add("favorited");
        button.textContent = "Retirer des favoris 💔";

        
        showMessage(`${name} a été ajouté aux favoris.`);
    }
}

function showMessage(message) {
    const messageDiv = document.getElementById("message");
    messageDiv.textContent = message;

    
    messageDiv.style.animation = "none";
    setTimeout(() => {
        messageDiv.style.animation = "";

    }, 10);
}


const ratings = {};

function rate(stars, name) {
   
    ratings[name] = stars;

    const starsElements = document.querySelectorAll(`.profile h2:contains('${name}') ~ .review-section .star`);
    starsElements.forEach((star, index) => {
        if (index < stars) {
            star.classList.add("selected"); 
        } else {
            star.classList.remove("selected"); 
        }
    });
}

function submitReview(name) {
   
    const reviewText = document.getElementById(`review-text-${name}`).value;
    const rating = ratings[name];

    if (!rating || !reviewText) {
        alert("Veuillez donner une note et laisser un avis !");
        return;
    }

   
    const reviewsList = document.getElementById(`reviews-${name}`);
    const reviewItem = document.createElement("div");
    reviewItem.className = "review-item";
    reviewItem.innerHTML = `
        <div class="review-rating">${"&#9733;".repeat(rating)}${"&#9734;".repeat(5 - rating)}</div>
        <div class="review-text">${reviewText}</div>
    `;

    reviewsList.appendChild(reviewItem);

    document.getElementById(`review-text-${name}`).value = "";
    ratings[name] = 0;
    const starsElements = document.querySelectorAll(`.profile h2:contains('${name}') ~ .review-section .star`);
    starsElements.forEach((star) => star.classList.remove("selected"));

    alert("Merci pour votre avis !");
}

function reserveService(name) {
    alert(`Merci d'avoir réservé un service avec ${name} ! Nous vous contacterons bientôt.`);
}

function rate(stars, name) {
    
    ratings[name] = stars;

    
    const starsElements = document.querySelectorAll(`#reviews-${name} ~ .review-section .star`);

    starsElements.forEach((star, index) => {
        if (index < stars) {
            star.classList.add("selected");
        } else {
            star.classList.remove("selected");
        }
    });

  
    const messageDiv = document.getElementById(`rating-message-${name}`);
    if (!messageDiv) {
        const newMessageDiv = document.createElement("div");
        newMessageDiv.id = `rating-message-${name}`;
        newMessageDiv.style.marginTop = "10px";
        newMessageDiv.style.color = "#333";
        newMessageDiv.textContent = `Vous avez donné ${stars} étoile(s).`;
        starsElements[0].parentNode.appendChild(newMessageDiv);
    } else {
        messageDiv.textContent = `Vous avez donné ${stars} étoile(s).`;
    }
}

