function deletePublication(event) {
    event.preventDefault();
    const publicationContainer = event.target.closest('div');
    publicationContainer.remove();
}

function editPublication(event) {
    event.preventDefault();
    const publicationContainer = event.target.closest('div');
    console.log("Edit action for publication:", publicationContainer.textContent);
}

function toggleReaction(event) {
    const reactionButton = event.target;
    const reactionType = reactionButton.dataset.reaction;
    const reactionCountElement = reactionButton.querySelector('strong');
    let reactionCount = parseInt(reactionCountElement.textContent);

    if (reactionButton.classList.contains('active')) {
        reactionButton.classList.remove('active');
        reactionCount--;
    } else {
        reactionButton.classList.add('active');
        reactionCount++;
    }

    reactionCountElement.textContent = reactionCount;
}

document.addEventListener('DOMContentLoaded', () => {
    filterPublicationsByCategory();
    filterPublicationsByButton();

    const deleteButtons = document.querySelectorAll('.nav1 p img[src="supprimer.png"]');
    deleteButtons.forEach(button => {
        button.addEventListener('click', deletePublication);
    });

    const editButtons = document.querySelectorAll('.nav1 p img[src="modi.png"]');
    editButtons.forEach(button => {
        button.addEventListener('click', editPublication);
    });

    const reactionButtons = document.querySelectorAll('.Para button');
    reactionButtons.forEach(button => {
        button.addEventListener('click', toggleReaction);
    });
});
function filterPublicationsByCategory() {
    document.querySelector('input[name="search"]').addEventListener('input', function() {
        const searchText = this.value.toLowerCase();
        const articles = document.querySelectorAll('.Para');

        articles.forEach(article => {
            const articleCategories = article.querySelector('span').textContent.toLowerCase();
            if (articleCategories.includes(searchText) ) {
                article.style.display = 'block';
            } else {
                article.style.display = 'none';
            }
        });
    });
}








function filterPublicationsByButton() {
    const categoryButtons = document.querySelectorAll('aside ul li button');
    
    categoryButtons.forEach(button => {
        button.addEventListener('click', function() {
            const categoryName = button.textContent.toLowerCase();
            const articles = document.querySelectorAll('.Para');

            articles.forEach(article => {
                const categorySpan = article.nextElementSibling.querySelector('span');
                const articleCategories = categorySpan ? categorySpan.textContent.toLowerCase() : '';
                
                if (articleCategories.includes('#' + categoryName) || categoryName === 'toutes les catégories') {
                    article.parentElement.style.display = 'block';
                } else {
                    article.parentElement.style.display = 'none';
                }
            });
        });
    });
}
function deletePublication(event) {
    event.preventDefault();
    const publicationContainer = event.target.closest('.Para').parentElement;
    publicationContainer.remove();
}

function editPublication(event) {
    event.preventDefault();
    const publicationContainer = event.target.closest('.Para').parentElement;
    console.log("Edit action for publication:", publicationContainer.textContent);
}

const deleteButtons = document.querySelectorAll('.nav1 p img[src="supprimer.png"]');
deleteButtons.forEach(button => {
    button.addEventListener('click', deletePublication);
});

const editButtons = document.querySelectorAll('.nav1 p img[src="modi.png"]');
editButtons.forEach(button => {
    button.addEventListener('click', editPublication);
});
function toggleReaction(event) {
    const reactionButton = event.target;
    const reactionType = reactionButton.dataset.reaction;
    const reactionCountElement = reactionButton.querySelector('strong');
    let reactionCount = parseInt(reactionCountElement.textContent);

    if (reactionButton.classList.contains('active')) {
        reactionButton.classList.remove('active');
        reactionCount--;
    } else {
        reactionButton.classList.add('active');
        reactionCount++;
    }

    reactionCountElement.textContent = reactionCount;
}
const reactionButtons = document.querySelectorAll('.Para button');
reactionButtons.forEach(button => {
    button.addEventListener('click', toggleReaction);
});